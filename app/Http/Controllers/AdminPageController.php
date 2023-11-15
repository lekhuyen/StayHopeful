<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function viewsidebar(){
        return view('fontend.adminpage.adminindex');
    }
    public function viewdashboard(){
        return view('fontend.adminpage.dashboard');
    }
    public function viewmanagermember(){
        return view('fontend.adminpage.managermember');
    }
}
