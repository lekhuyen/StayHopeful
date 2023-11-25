<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        return view('frontend.adminpage.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.adminpage.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'money' => 'bail|required|numeric',
            'money2' => 'bail|required|numeric',
            'category_id' => 'required',
            'status' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,webp|max:10096',
            'image' => 'required',
        ]);
        $projects = new Project();
        $projects->title = $request->title;
        $projects->description = $request->description;
        $projects->money = $request->money;
        $projects->money2 = $request->money2;
        $projects->status = $request->status;
        $projects->category_id = $request->category_id;

        $projects->save();

        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $fileName = time() . '_' . $image->getClientOriginalName();
                $PublicImagePath = public_path("images");
                $image->move($PublicImagePath, $fileName);
                $imagePath = 'images/' . $fileName;

                $projectImage = new ProjectImage();
                $projectImage->image = $imagePath;
                $projectImage->project_id = $projects->id;

                $projectImage->save();
            }
        }


        return redirect()->route('projectAd.index')->with('success', 'Project created successfully');
    }



    public function edit($id)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $project = Project::find($id);
        return view('frontend.adminpage.projects.update', compact('project', 'categories'));
    }

    public function deleteImgChild($imgId)
    {
        // return response()->json($imgId);
        // $image = ProjectImage::find($imgId);
        //     if(File::exists($image->image)){
        //         File::delete($image->image);
        //     }
        ProjectImage::find($imgId)->delete();
        return response()->json(['error' => ['Delete fails']]);
    }


    // softdelete
    public function trash_image(Request $request)
    {
        $images = ProjectImage::onlyTrashed()->get();
        return view('frontend.adminpage.projects.trash_image', compact('images'));
    }
    public function untrash_image($id)
    {
        $image = ProjectImage::withTrashed()->find($id);
        $image->restore();
        return back();
    }
    public function projectAd_forcedelete($id)
    {
        $image = ProjectImage::withTrashed()->find($id);
        $image->forceDelete();
        if (File::exists($image->image)) {
            File::delete($image->image);
        }


        return back();
    }
    // ---------------------------------------


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'money' => 'bail|required|numeric',
            'money2' => 'bail|required|numeric',
            'category_id' => 'required',
        ]);

        $projects = Project::find($id);
        $projects->title = $request->title;
        $projects->description = $request->description;
        $projects->money = $request->money;
        $projects->money2 = $request->money2;
        $projects->category_id = $request->category_id;

        $projects->save();


        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = public_path('images');
                $image->move($imagePath, $imageName);
                $imagePath = 'images/' . $imageName;

                $projectImage = new ProjectImage();
                $projectImage->image = $imagePath;
                $projectImage->project_id = $projects->id;
                $projectImage->save();
            }
        }
        return redirect()->route('projectAd.index')->with('success', 'Project created successfully');
    }


    public function delete($id)
    {
        // return response()->json($id);
        $project = Project::find($id);
        $project->delete();
        // if($project!=null){
        //     $check = $project->delete();
        //     if($check) {
        //         foreach($project->images as $image){
        //             if(File::exists($image->image)){
        //                 File::delete($image->image);
        //             }
        //             $image->delete();
        //         }
        //     }
        // }
        return response()->json(['error' => ['Delete fails']]);
    }


    //project SoftDelete
    public function project_trash()
    {
        $projects = Project::onlyTrashed()->get();
        return view('frontend.adminpage.projects.project_trash', compact('projects'));
    }
    public function project_untrash($id)
    {
        $projects = Project::withTrashed()->find($id);
        $projects->restore();
        return back();
    }
    public function project_forcedelete($id)
    {
        $projects = Project::withTrashed()->find($id);
        $projects->forceDelete();
        foreach ($projects->images as $image) {
            if (File::exists($image->image)) {
                File::delete($image->image);
            }
        }
        return back();
    }

    //project status
    public function finish_status($id)
    {
        $project = Project::find($id);
        if ($project) {
            $project->update(['status' => 0]);
            return back();
        }

        return response()->json(['error' => ['Updated fails']]);
    }
    public function unfinish_status($id)
    {
        $project = Project::find($id);
        if ($project) {
            $project->update(['status' => 1]);
            return back();
        }

        return response()->json(['error' => ['Updated fails']]);
    }
}
