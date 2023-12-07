<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class UserAdminController extends Controller
{
    public function index(){
        $users = User::all();
        return view('frontend.adminpage.user_list.index', compact('users'));
    }

    public function create(){
        $roles = Role::all();
        return view('frontend.adminpage.user_list.create', compact('roles'));
    }
    public function store(Request $request){
        $verify_token = Str::random(6);
        $emailUser=$request->email;
        try {
            DB::beginTransaction();
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->status = 1;
            $user->save();

            $name = 'StayHopeful';

            Mail::send('frontend.login.verified_email', compact('verify_token'), function ($email) use ($name, $emailUser) {
                $email->subject('Confirm Register');
                $email->to($emailUser, $name);
            });

            $roleIds = $request->role_id;
            $user->roles()->attach($roleIds);
            DB::commit();

            return redirect()->route('staff.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage(),'--Line:'.$exception->getLine());
        }

    }


    public function edit($id){
        $roles = Role::all();
        $user = User::find($id);
        $roleUser = $user->roles;

        return view('frontend.adminpage.user_list.edit', compact('user', 'roles', 'roleUser'));
    }

    public function update(Request $request, $id){
        try {
            DB::beginTransaction();
            $user = User::find($id)->update([
                'name'=> $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user = User::find($id);
            $roleIds = $request->role_id;
            $user->roles()->sync($roleIds);
            DB::commit();

            return redirect()->route('staff.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage(),'--Line:'.$exception->getLine());
        }

    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        $user->roles()->detach();
        return back();
    }
}
