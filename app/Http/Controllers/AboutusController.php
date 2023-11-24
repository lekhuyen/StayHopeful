<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index() {
        return view("frontend.aboutus.aboutus");
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
