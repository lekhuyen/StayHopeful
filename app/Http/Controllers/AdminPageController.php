<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function viewsidebar(){
        return view('frontend.adminpage.index');
    }
    public function viewdashboard(){
        return view('frontend.adminpage.dashboard');
    }
    public function viewmanagermember(){
        return view('frontend.adminpage.member');
    }
    public function viewmanagerdesign(){
        return view('frontend.adminpage.design');
    }
    public function viewlistuser(){
        return view('frontend.adminpage.listuser');
    }
    public function viewtest(){
        return view('frontend.language.languagetest');
    }
}
