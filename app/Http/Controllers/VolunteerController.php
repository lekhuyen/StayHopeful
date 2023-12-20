<?php

namespace App\Http\Controllers;

use App\Mail\VolunteerMail;
use App\Models\Project;
use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VolunteerController extends Controller
{
    public function index()
    {
        $volunteers = Volunteer::all();
        $arrayPeopleVolunteer = [];
        foreach ($volunteers as $key => $item) {
            $arrayPeopleVolunteer[$key]["project"] = $item->project_id;
            $arrayPeopleVolunteer[$key]["value"] = $item->project_id;
        }
        $summedCounts = [];

        // Loop through the array to count occurrences of each project
        foreach ($arrayPeopleVolunteer as $item) {
            $projectId = $item['project'];

            // If the project ID exists in the summedCounts array, increment count
            if (array_key_exists($projectId, $summedCounts)) {
                $summedCounts[$projectId]++;
            } else {
                // If the project ID doesn't exist, set count to 1
                $summedCounts[$projectId] = 1;
            }
        }
        // dd($summedCounts[2]);
        // $summedCounts will contain the summed counts for each project ID
        $projects = Project::orderBy('id','desc')->paginate(5);
        // $projects = Project::paginate(6);
        return view("frontend.volunteer.index", compact('projects', 'summedCounts'));
    }

    public function create()
    {
        $projects  = Project::all();
        $project_id = session()->get("project_id");
        $user = session()->get("userInfo");
        $volunteers = Volunteer::all();
        return view("frontend.volunteer.create", compact("projects", "project_id", "user", "volunteers"));
    }

    public function store(Request $request)
    {
        // $messages = [
        //     "phone.required" => "Please input a valid phone number with at least 10 digits.",
        //     "rel_phone.required" => "Please input a valid phone number with at least 10 digits."
        // ];

        $request->validate([
            "finding_source" => "required",
            "name" => "bail|required|min:3|max:10",
            "phone" => 'bail|required|regex:/^(\d{10}$)/',
            "email" => "bail|required|email",
            "volunteer_description" => "bail|required|min:3|max:255",
            "rel_name" => "bail|required|min:3|max:10",
            "rel_relationship" => "bail|required|min:3|max:10",
            "rel_phone" => 'bail|required|regex:/^(\d{10}$)/',
            "project_id" => "required"
        ],[
            'required' => 'The :attribute cannot be blanked',
            'rel_phone.required' => 'The relative phone cannot be blanked',
            'rel_relationship.required' => 'The relative relationship cannot be blanked',
            'rel_name.required' => 'The relative name cannot be blanked',
            'min' => 'The :attribute at least :min char',
            'max' => 'The :attribute must greater than :min char',




        ]);
        // $userForProject = Volunteer::where(["email","=",$request->email,])->first();
        $userForProject = Volunteer::where("email","=",$request->email,'and')->where('project_id','=',$request->project_id)->first();
        if($userForProject != null){
            return redirect()->back()->with("warning", "ban da tham gia su kien nay roi.Ok");
        }
        Volunteer::create($request->all());
        $project = Project::find($request->project_id);

        $findUser =  User::where('email', $request->email)->first();

        if ($findUser != null) {

            $findUser->is_volunteer = true;
            $findUser->save();
        } else {
            $userCreate = new User();
            $userCreate->email = $request->email;
            $userCreate->name = $request->name;
            $userCreate->password = "12345";
            $userCreate->is_volunteer = true;
            $userCreate->save();
        }
        Mail::to($request->email)->send(new VolunteerMail($project));
        return redirect()->back()->with("success", "Thanks for being a part of us.");
    }

    public function detail($id)
    {
        $volunteers = Volunteer::where("project_id", "=", $id)->get();
        return response()->json([
            "volunteers" => $volunteers
        ]);
    }
}
