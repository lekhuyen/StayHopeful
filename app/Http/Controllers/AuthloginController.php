<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthloginController extends Controller
{
    public function index(){
        return view('frontend.authlogin.login');
    }
}