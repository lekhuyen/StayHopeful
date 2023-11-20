<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('frontend.blog.blog');
    }
    public function detail(){
        return view('frontend.side_right.side_right');
    }
    

    public function blog_finished()
    {
        return view('frontend.blog.blog_finished');
    }
    public function viewdetail(){
        return view('frontend.side_right.side_right');
    }
    
    public function blog_detail()
    {
        return view('frontend..blog.blog_detail');
    }
}
