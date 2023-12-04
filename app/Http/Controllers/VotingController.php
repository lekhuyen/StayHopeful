<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Voting;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function index()
    {
        $votes = Voting::all();
        $projects = Project::all();
        return view("frontend.volunteer.index", compact("votes", "projects"));
    }
    public function create()
    {
        return view("frontend.volunteer.create");
    }
}
