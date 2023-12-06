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
            'name'=>$request->module_parent,
            'display_name'=>$request->module_parent,
            'parent_id'=>0,
        ]);
        foreach ($request->module_childrent as $value) {
            Permissions::create([
                'name'=>$value,
                'display_name'=>$value,
                'parent_id'=>$permission->id,
                'key_code'=>strtolower($request->module_parent.'_'.$value),
            ]);
        }
        return redirect()->route('roles.index');
    }
}
