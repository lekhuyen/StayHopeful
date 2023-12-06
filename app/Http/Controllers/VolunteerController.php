<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index()
    {
        return view("volunteer.index");
    }

    public function create()
    {
        $projects  = Project::all();
        $project_id = session()->get("project_id");
        $user = session()->get("userInfo");
        return view("frontend.volunteer.create", compact("projects", "project_id", "user"));
    }
    // "finding_source", "enrolled", "name", "phone", "email", "role", "project_id",
    // "volunteer_description", "rel_name", "rel_relationship", "rel_phone"
    public function store(Request $request)
    {
        $request->validate([
            "finding_source" => "required",
            "name" => "required",
            "phone" => "required",
            "email" => "required",
            "volunteer_description" => "required",
            "rel_name" => "required",
            "rel_relationship" => "required",
            "rel_phone" => "required",
        ]);
        Volunteer::create($request->all());
        $findUser =  User::where('email', $request->email)->first();
        if($findUser != null){
            $findUser->is_volunteer = true;
            $findUser->save();
        }else{
            $userCreate = new User();
            $userCreate->email = $request->email;
            $userCreate->password = "12345";
            $userCreate->is_volunteer = true;
           $userCreate->save();
        }
        // dd($request->all());
        return redirect()->back()->with("success", "Cam on ban da dang ky");
    }
}
