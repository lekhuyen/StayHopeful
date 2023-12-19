<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DonateInfo;
use App\Models\News;
use App\Models\Project;
use App\Models\Video;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $projects = Project::orderBy('id', 'desc')->limit(5)->get();
        $blogs = News::orderBy('id', 'desc')->get();
        $blogs = News::orderBy('id', 'desc')->paginate(7);
        return view('frontend.blog.blog', compact('categories', 'projects', 'blogs'));
    }

    public function blog_finished()
    {
        return view('frontend.blog.blog_finished');
    }

    // detail, related project
    public function viewdetail($id)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $project = Project::find($id);
        $comments = $project->comments;
        $category = $project->category;
        $projects = Project::where('category_id', $category->id)
            ->where('id', '!=', $project->id)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();
        $volunterCountRegisterByProject = Volunteer::where('project_id',$id)->get();
        session()->put("project_id", $id);
        $user = session()->get("userInfo");
        $checkUserProject = 0;
        if($project->quantity == $volunterCountRegisterByProject->count()){
            $checkUserProject = 1;
        }

        // if ($user) {
        //     $volunteerPersonByProjects = Volunteer::where('email', $user['email'])->get();
        //     //dd($volunteerPersonByProjects);
        //     if ($volunteerPersonByProjects->count() > 0) {
        //         foreach ($volunteerPersonByProjects as $key => $projectItem) {
        //             $projectId = $projectItem->project_id;
        //             if($projectId == $id){
        //                 $checkUserProject = 1;
        //                 break;
        //             }
        //         }
        //     }
        // }
        return view('frontend.detail-post.detail', compact('categories', 'project', 'projects', 'comments', 'checkUserProject'));
    }
    public function viewmarquee()
    {
        return view('frontend.info_donate.info_donate', compact('project'));
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
    public function project_index()
    {
        $projects = Project::orderBy('id', 'desc')->paginate(8);
        return view('frontend.project.index', compact('projects'));
    }

    // news-detail
    public function news_detail($id)
    {
        $new = News::find($id);
        return view('frontend.blog.news_detail', compact('new'));
        // return view('frontend.blog.news_detail', compact('categories', 'projects', 'new'));
    }

    
    //search
    public function search(Request $request){
        $keywork = $request->keywork;
        // $projects = Project::where('title', 'like','%'.$keywork.'%')->get();
        $projects = Project::where(function ($query) use ($keywork) {
            $query->where('title', 'like', '%' . $keywork . '%')
                ->orWhere('description', 'like', '%' . $keywork . '%');
        })->paginate(8);

        if($projects->count() > 0){
            return view('frontend.search.index', compact('projects'));
        } else {
            return view('frontend.search.not_result', compact('keywork'));
        }
    }

}
