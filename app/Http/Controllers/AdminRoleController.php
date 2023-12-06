<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('frontend.adminpage.roles.index', compact('roles'));
    }
    public function create(){
        $permissionsParent = Permissions::where('parent_id', 0)->get();
        
        return view('frontend.adminpage.roles.create', compact('permissionsParent'));
    }
    public function store(Request $request){
        $roles = new Role();
        $roles->name = $request->name;
        $roles->display_name = $request->display_name;

        $roles->save();
        $roles->permissions()->attach($request->permission_id);
        
        return redirect()->route('roles.index');
    }
    public function edit($id){
        $roles = Role::find($id);
        $permissionsParent = Permissions::where('parent_id', 0)->get();
        $permissionsChecked = $roles->permissions;
        return view('frontend.adminpage.roles.edit', compact('roles', 'permissionsParent', 'permissionsChecked'));
    }

    public function update(Request $request, $id){
        Role::find($id)->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $roles = Role::find($id);
        $roles->permissions()->sync($request->permission_id);
        
        return redirect()->route('roles.index');
    }

    public function delete($id){
        $role = Role::find($id);
        $role->delete();
        $role->permissions()->detach();
        return back();
    }


    
}
