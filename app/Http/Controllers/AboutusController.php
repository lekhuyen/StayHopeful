<?php

namespace App\Http\Controllers;

use App\Models\aboutuscalltoaction;
use App\Models\aboutuslogo;
use App\Models\aboutusmember;
use App\Models\aboutuspage;
use App\Models\aboutusteam;
use App\Models\aboutustitle;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index() {
        $mainPages = aboutustitle::all();
        $aboutUsPages = Aboutuspage::where('section', 'aboutus')->get();

        $logoPages = aboutuslogo::all();
        $leftcallPages = aboutuscalltoaction::where('section', 'leftcall')->get();
        $teamPage = Aboutuscalltoaction::where('section', 'team')->get();
        $teampic1Page = Aboutuspage::where('section', 'teampic1')->get();
        $teampic2Page = Aboutuspage::where('section', 'teampic2')->get();
        $questionPages = Aboutuspage::where('section', 'question')->get();
        // Pass all variables to the view
        return view("frontend.aboutus.aboutus", compact("mainPages", "aboutUsPages", "logoPages",
        "leftcallPages", "teamPage", "teampic1Page", "teampic2Page", "questionPages"));   
    }

    public function aboutus_whoweare() {
        $teamMembers = aboutusteam::all();
        $ourfounderPages = aboutusmember::all();
        return view('frontend.aboutus.aboutus_whoweare', compact('teamMembers', 'ourfounderPages'));
    }

    public function showTeamMemberDetail($id)
    {
        // Retrieve the team member from the database
        $teamMember = AboutusTeam::find($id);
        $ourfounderPages = aboutusmember::find($id);

        // Pass the team member data to the view
        return view('frontend.aboutus.detail_member', compact('teamMember', 'ourfounderPages'));
    }

    public function johndoe()
    {
        return view('frontend.aboutus.johndoe');
    }

    public function janesmith()
    {
        return view('frontend.aboutus.janesmith');
    }

    public function robertjohnson()
    {
        return view('frontend.aboutus.robertjohnson');
    }

    public function kaigreene()
    {
        return view('frontend.aboutus.kaigreene');
    }

    public function oliverhudson()
    {
        return view('frontend.aboutus.oliverhudson');
    }

    public function showPerson($person)
    {
        // Assuming you have blade views named after each person, like 'johndoe.blade.php', 'janedoe.blade.php', etc.
        return view('aboutus.' . strtolower($person));
    }

}
