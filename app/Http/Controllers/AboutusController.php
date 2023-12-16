<?php

namespace App\Http\Controllers;

use App\Models\aboutuspage;
use App\Models\aboutusteam;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index() {
        $aboutuspages = aboutuspage::all();  // Fetch all aboutus pages

        return view("frontend.aboutus.aboutus", compact("aboutuspages"));
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
