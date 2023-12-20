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
        $projects = Project::orderBy('id', 'desc')->paginate(4);

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
        $project = Project::find($id);
        $project->delete();

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
    public function showEditEvent($id)
    {
        $project = Project::find($id);
        return view("frontend.adminpage.projects.edit_event", compact('project'));
    }
    public function activeEvent(Request $request, Project $project)
    {
        $request->validate([
            "start_date" => "required|date|before_or_equal:end_date",
            "end_date" => "required|date|after_or_equal:start_date",
            "quantity" => "required|numeric|min:2",
            "status_event" => "required",

        ]);
        $project->update($request->all());
        if ($request->status_event == 1) {
            return redirect()->route("projectAd.index")->with("success", "The event is opening.");
        } else {
            return redirect()->route("projectAd.index")->with("success", "The event is already closed.");
        }

        // $project = Project::find($id);
        // if($project->status == 1){
        //     $project->status_event  =$project->status_event? false:true;
        //     $project->save();
        //     if($project->status_event == true){
        //         return redirect()->route("projectAd.index")->with("success","Su kien da duoc open");
        //     }else{
        //         return redirect()->route("projectAd.index")->with("success","Su kien da duoc close");
        //     }
        // }else{
        //     return redirect()->route("projectAd.index")->with("success","project chua quyen gop du tien de hoat dong cho su kien");
        // }
    }
    public function sortEvent($type)
    {
        $projects = Project::orderBy('id', 'desc')->paginate(4);

        if ($type == "active") {
            $projects = Project::where("status_event", '=', 1)->paginate(4);
        }
        else if ($type == "deActive") {
            $projects = Project::where("status_event", '=', 0)->paginate(4);
        }else if ($type == "finish") {
            $projects = Project::where("status", '=', 1)->paginate(4);
        } else if ($type == "ongoing") {
            $projects = Project::where("status", '=', 0)->paginate(4);
        } else {
            $projects = Project::orderBy('id', 'desc')->paginate(4);
        }
        return view('frontend.adminpage.projects.index', compact('projects'));
    }
}
