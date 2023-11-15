<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailPostController extends Controller
{
    public function index(){
        return view('frontend.detailpost.detail');
    }
}
