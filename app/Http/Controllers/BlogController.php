<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.blog.blog', compact('categories'));
    }

    public function blog_finished()
    {
        return view('frontend.blog.blog_finished');
    }
    public function viewdetail($id){
        $categories = Category::orderBy('id', 'desc')->get();
        $project = Project::find($id);
        return view('frontend.detail-post.detail', compact('categories','project'));
    }
    
    public function blog_detail()
    {
        return view('frontend.blog.blog_detail');
    }
    public function project($id)
    {
        $category = Category::find($id);
        return view('frontend.project.project', compact('category'));
    }
    //video page
    public function video()
    {
        return view('frontend.video_page.video');
    }
}
