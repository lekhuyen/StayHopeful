<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use Illuminate\Http\Request;

class AdminPermissionsController extends Controller
{
    public function create(){
        return view('frontend.adminpage.permissions.create');
    }
    public function store(Request $request){
        $permission = Permissions::create([
            'name'=>$request->name,
            'display_name'=>$request->name,
            'parent_id'=>0,
        ]);
        foreach ($request->module_children as $value) {
            Permissions::create([
                'name'=>$value,
                'display_name'=>$value,
                'parent_id'=>$permission->id,
                'key_code'=>strtolower($request->name.'_'.$value),
            ]);
        }
        return redirect()->route('roles.index');
    }
}
