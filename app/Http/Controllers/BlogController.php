<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Project;
use App\Models\Video;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $projects = Project::orderBy('id', 'desc')->limit(5)->get();
        $blogs = News::orderBy('id', 'desc')->get();
        return view('frontend.blog.blog', compact('categories', 'projects', 'blogs'));
    }

    public function blog_finished()
    {
        return view('frontend.blog.blog_finished');
    }

    // detail, related project
    public function viewdetail($id){
        $categories = Category::orderBy('id', 'desc')->get();
        $project = Project::find($id);
        $category = $project->category;
        $projects = Project::where('category_id', $category->id)
                            ->where('id','!=', $project->id)
                            ->orderBy('id', 'desc')
                            ->limit(5)
                            ->get();
        return view('frontend.detail-post.detail', compact('categories','project', 'projects'));
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
        $videos = Video::orderBy('id', 'desc')->get();
        return view('frontend.video_page.video', compact('videos'));
    }


    // project 
    public function project_index(){
        $projects = Project::orderBy('id', 'desc')->get();
        return view('frontend.project.index', compact('projects'));
    }

}
