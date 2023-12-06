<?php

namespace App\Http\Controllers;

use App\Models\aboutusimage;
use App\Models\aboutusteam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutusteamController extends Controller
{
    public function aboutus_team_index() {
        $aboutusteams = aboutusteam::paginate(5); // Use paginate for pagination
        return view("frontend.aboutusteam.index", compact("aboutusteams"));
    }

    public function aboutus_team_detail($id)
    {
        // dd("Trying to access aboutus_team_detail with ID: $id");

        $aboutusteam = aboutusteam::find($id);

        return view('frontend.aboutus.whoweare_detail', compact('aboutusteam'));
    }

    public function aboutus_team_create() {
        return view("frontend.aboutusteam.create_aboutus");
    }
    
    public function aboutus_team_store(Request $request) {
        $request->validate ([
            "name" => "required",
            "age" => "required|numeric",
            "email" => "required|email",
            "skill" => "required",
            "status" => "required|in:0,1",
            "description" => "nullable", 
            "images" => "required",
            "images.*" => "image|mimes:jpeg,png,jpg|max:4096",
        ]);
        $aboutus = new aboutusteam();
        $aboutus->name = $request->name;
        $aboutus->age = $request->age;
        $aboutus->email = $request->email;
        $aboutus->skill = $request->skill;
        $aboutus->status = $request->status;
        $aboutus->description = $request->description;


        $aboutus->save();
        if ($request->hasFile("images")) {
            foreach ($request->file("images") as $item) {
                $filename = time()."_".$item->getClientOriginalName();
                $destinationPath = public_path("img/aboutus_images");

                $item->move($destinationPath, $filename);
                $imagePath = "img/aboutus_images/".$filename;

                $newImage = new aboutusimage();
                $newImage->url_image = $imagePath;

                $newImage->aboutus_id = $aboutus->id;
                $newImage->save();
            }
            
        }
        $aboutusteams = aboutusteam::all();

        return view("frontend.aboutusteam.index", compact("aboutusteams"))->with("success", "Team created successfully");

    }



    public function aboutus_team_edit(aboutusteam $aboutusteam) {
        return view("frontend.aboutusteam.edit_aboutus", compact("aboutusteam"));
    }

    public function aboutus_team_update(Request $request, aboutusteam $aboutusteam) {
        $request->validate ([
            "name" => "required",
            "age" => "required|numeric",
            "email" => "required|email",
            "skill" => "required",
            "status" => "required|in:0,1",
            "description" => "nullable", // Making description optional
            "images.*" => "image|mimes:jpeg,png,jpg|max:4096",
        ]);

        $aboutusteam->name = $request->name;
        $aboutusteam->age = $request->age;
        $aboutusteam->email = $request->email;
        $aboutusteam->skill = $request->skill;
        $aboutusteam->status = $request->status;
        $aboutusteam->description = $request->description;

        $aboutusteam->save();
        if ($request->hasFile("images")) {

            //delete old images if they existed
                if ($aboutusteam->images->count() > 0) {
                    foreach ($aboutusteam->images as $image) {
    
                        // delete trong servce
                        if (File::exists($image->url_image)) {
                            File::delete($image->url_image);
                        }
    
                        $image->delete(); //delete trong database
                    }
                }
            
            foreach ($request->file("images") as $item) {
                $filename = time()."_".$item->getClientOriginalName();
                $destinationPath = public_path("img/aboutus_images");

                $item->move($destinationPath, $filename);
                $imagePath = "img/aboutus_images/".$filename;

                $newImage = new aboutusimage();
                $newImage->url_image = $imagePath;

                $newImage->aboutus_id = $aboutusteam->id;
                $newImage->save();
            }
        }
        return redirect()->route("aboutusteam.index")->with("success","Team created successfully");
    }

    public function aboutus_team_delete(aboutusteam $aboutusteam)
    {
        // Delete related images
        foreach ($aboutusteam->images as $image) {
            if (File::exists($image->url_image)) {
                File::delete($image->url_image);
            }
            $image->delete();
        }

        // Delete the team member
        $aboutusteam->delete();

        return redirect()->route("aboutusteam.index")->with("success", "Team member deleted successfully");
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        // Paginate the query results
        $aboutusteams = Aboutusteam::where('name', 'like', "%$search%")->paginate(5);

        return view('frontend.aboutusteam.index', compact('aboutusteams'));
    }
}
