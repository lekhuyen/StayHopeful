<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::orderBy('id', 'desc')->get();
        return view('frontend.adminpage.projects.index', compact('projects'));
    }

    public function create(){
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.adminpage.projects.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'money'=> 'bail|required|numeric',
            'money2'=> 'bail|required|numeric',
            'category_id'=> 'required',
            'status'=> 'required',
            'image.*'=> 'image|mimes:jpeg,png,jpg,webp|max:10096',
            'image.*'=> 'required',
        ]);

        $projects = new Project();
        $projects->title = $request->title;
        $projects->description = $request->description;
        $projects->money = $request->money;
        $projects->money2 = $request->money2;
        $projects->status = $request->status;
        $projects->category_id = $request->category_id;

        $projects->save();

        if($request->hasFile('image')){
            $images = $request->file('image');
            foreach($images as $image){
                $fileName = time().'_'.$image->getClientOriginalName();
                $PublicImagePath = public_path("images");
                $image->move($PublicImagePath,$fileName);
                $imagePath ='images/'.$fileName;

                $projectImage = new ProjectImage();
                $projectImage->image = $imagePath;
                $projectImage->project_id = $projects->id;

                $projectImage->save();
            }
        }
        
        
        return redirect()->route('project.index')->with('success', 'Project created successfully');
    }

}
