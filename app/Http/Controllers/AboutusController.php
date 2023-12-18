<?php

namespace App\Http\Controllers;

use App\Models\aboutuscalltoaction;
use App\Models\aboutuspage;
use App\Models\aboutusteam;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index() {
        $mainPages = Aboutuspage::where('section', 'main')->get();
        $aboutUsPages = Aboutuspage::where('section', 'aboutus')->get();
        $logoPages = Aboutuspage::where('section', 'logo')->get();
        $leftcallPages = aboutuscalltoaction::where('section', 'leftcall')->get();
        $teamPage = Aboutuscalltoaction::where('section', 'team')->get();
        $teampic1Page = Aboutuspage::where('section', 'teampic1')->get();
        $teampic2Page = Aboutuspage::where('section', 'teampic2')->get();
        $mainquestionPage = Aboutuspage::where('section', 'mainquestion')->get();
        $questionPages = Aboutuspage::where('section', 'question')->get();
        // Pass all variables to the view
        return view("frontend.aboutus.aboutus", compact("mainPages", "aboutUsPages", "logoPages",
        "leftcallPages", "teamPage", "teampic1Page", "teampic2Page","mainquestionPage", "questionPages"));   
    }

    public function aboutus_whoweare() {
        $teamMembers = aboutusteam::all();

        return view('frontend.aboutus.aboutus_whoweare', compact('teamMembers'));
    }

    public function showTeamMemberDetail($id)
    {
        // Retrieve the team member from the database
        $teamMember = AboutusTeam::find($id);

        // Pass the team member data to the view
        return view('frontend.aboutus.detail_member', compact('teamMember'));
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
