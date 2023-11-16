<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function viewsidebar(){
        return view('frontend.adminpage.adminindex');
    }
    public function viewdashboard(){
        return view('frontend.adminpage.dashboard');
    }
    public function viewmanagermember(){
        return view('frontend.adminpage.managermember');
    }
    public function viewmanagerdesign(){
        return view('frontend.adminpage.managerdesign');
    }
    public function viewlistuser(){
        return view('frontend.adminpage.listuser');
    }

}
