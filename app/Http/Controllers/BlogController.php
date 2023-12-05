<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Project;
use App\Models\Video;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(6);
        $categories = Category::orderBy('id', 'desc')->get();
        $projects = Project::orderBy('id', 'desc')->limit(5)->get();
        $blogs = News::orderBy('id', 'desc')->get();
        $blogs = News::paginate(7);
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
        $comments = $project->comments;
        $category = $project->category;
        $projects = Project::where('category_id', $category->id)
                            ->where('id','!=', $project->id)
                            ->orderBy('id', 'desc')
                            ->limit(5)
                            ->get();
        session()->put("project_id",$id);
        $user = session()->get("userInfo");
        $checkUserProject = 0;
        if($user){
            $volunteerPersonByProject = Volunteer::where('email',$user['email'])->first();
            if($volunteerPersonByProject != null){
                $projectId = $volunteerPersonByProject->project_id;
                $checkUserProject = ($projectId == $id);
            }

        }
        // dd($checkUserProject);
        return view('frontend.detail-post.detail', compact('categories','project', 'projects', 'comments','checkUserProject'));
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
        $projects = Project::paginate(8);
        return view('frontend.project.index', compact('projects'));
    }

    // news-detail
    public function news_detail($id){
        $new = News::find($id);
        return view('frontend.blog.news_detail', compact('new'));
        // return view('frontend.blog.news_detail', compact('categories', 'projects', 'new'));
    }

}
