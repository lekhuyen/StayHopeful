<?php

namespace App\Http\Controllers;

use App\Models\aboutuscalltoaction;
use App\Models\Aboutuscalltoactionimage;
use App\Models\Aboutusimage;
use App\Models\aboutuslogo;
use App\Models\aboutuslogoimage;
use App\Models\aboutusmember;
use App\Models\aboutusmemberimage;
use App\Models\aboutuspage;
use App\Models\aboutuspageimage;
use App\Models\aboutustitle;
use App\Models\aboutustitleimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AboutuspageController extends Controller
{
    public function aboutus_page_index() {
        $mainPages = aboutustitle::all();
        $aboutUsPages = Aboutuspage::where('section', 'aboutus')->get();

        $logoPages = aboutuslogo::all();
        $leftcallPages = aboutuscalltoaction::where('section', 'leftcall')->get();
        $teamPage = Aboutuscalltoaction::where('section', 'team')->get();
        $teampic1Page = Aboutuscalltoaction::where('section', 'teampic1')->get();
        $teampic2Page = Aboutuscalltoaction::where('section', 'teampic2')->get();
        $questionPages = Aboutuspage::where('section', 'question')->get();


        // Pass all variables to the view
        return view("frontend.aboutus.aboutus_page_index", compact("mainPages", "aboutUsPages", "logoPages",
        "leftcallPages", "teamPage", "teampic1Page", "teampic2Page", "questionPages", ));
    }

    //About Us Member Main Page
    public function aboutus_member_index() {
        $ourfounderPages = aboutusmember::all();
        return view("frontend.aboutus.aboutus_member_index", compact("ourfounderPages"));
    }

    public function Aboutus_member_detail($id)
    {
        $aboutusmember = aboutusmember::find($id);

        return view('frontend.aboutus.aboutus_page_member_detail', compact('aboutusmember'));
    }

    
    //main
    public function aboutus_page_create_main() {
        $mainPages = aboutustitle::all();
        return view("frontend.aboutus.aboutus_page_create_main", compact("mainPages"));
    }

    public function aboutus_page_store_main(Request $request)
    {
        $request->validate([
            "title" => "nullable",
            "description" => "nullable",
            "section" => "required",
            "images" => "nullable|array",
            "images.*" => "image|mimes:jpeg,png,jpg,bmp,gif,svg, webp|max:4096",
        
        ], [
            'required' => "Input cannot be empty.",
            'min' => "Input must have at least :min.",
            'max' => "Input must have at least :max.",        
        ]);

        $mainPages = new aboutustitle();
        $mainPages->title = $request->title;
        $mainPages->description = $request->description;
        $mainPages->section = $request->section;
        $mainPages->save();

        if ($request->hasFile("images")) {
            foreach ($request->file("images") as $item) {
                $filename = time() . "_" . $item->getClientOriginalName();
                $destinationPath = public_path("img/aboutus_images");

                $item->move($destinationPath, $filename);
                $imagePath = "img/aboutus_images/" . $filename;

                $newImage = new aboutustitleimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $mainPages->id;
                $newImage->save();
            }
        }

        $mainPages = aboutustitle::all();
        return redirect()->route('aboutuspage.index')->with('mainPages', $mainPages)
        ->with("success", "Main page created successfully");
    }

    public function aboutus_page_edit_main(aboutustitle $mainPages) {
        return view("frontend.aboutus.aboutus_page_edit_main", compact("mainPages"));
    }

    public function aboutus_page_update_main(Request $request, aboutustitle $mainPages)
    {   
        $request->validate([
            "title" => "nullable",
            "description" => "nullable",
            "section" => "required",
            "images" => "nullable|array",
            "images.*" => "image|mimes:jpeg,png,jpg,bmp,gif,svg, webp|max:4096",
        ], [
            'required' => "Input cannot be empty.",
            'min' => "Input must have at least :min.",
            'max' => "Input must have at least :max.",        
        ]);

        $mainPages->title = $request->title; 
        $mainPages->description = $request->description;
        $mainPages->section = $request->section;
        $mainPages->save();

        if ($request->hasFile("images")) {

            if ($mainPages->images->count() > 0) {
                foreach ($mainPages->images as $image) {
                    $imageUrl = $image->url_image;
    
                    if (File::exists($imageUrl) && $image->aboutus_id === $mainPages->id) {
                        File::delete($imageUrl);
                    }
    
                    // Delete the image record
                    $image->delete();
                }
            }

            foreach ($request->file("images") as $item) {
                $filename = time() . "_" . $item->getClientOriginalName();
                $destinationPath = public_path("img/aboutus_images");

                $item->move($destinationPath, $filename);
                $imagePath = "img/aboutus_images/" . $filename;

                $newImage = new aboutustitleimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $mainPages->id;
                $newImage->save();
            }
        }

        return redirect()->route("aboutuspage.index")
            ->with("success", "About us main page updated successfully");
    }
    
    public function aboutus_page_delete_main(aboutustitle $mainPages)
    {
        // Delete related images
        foreach ($mainPages->images as $image) {
            if (File::exists($image->url_image)) {
                File::delete($image->url_image);
            }
            $image->delete();
        }
        // Delete the main page
        $mainPages->delete();

        // Redirect to the index page with success message
        return redirect()->route('aboutuspage.index')->with('success', 'Main page deleted successfully');
    }

    public function Aboutus_page_detail($id)
    {
        $aboutusmain = aboutuspage::find($id);
        $aboutustitle = aboutustitle::find($id);
        if (!$aboutusmain) {
            $aboutusmain = aboutuscalltoaction::find($id);
        }

        return view('frontend.aboutus.aboutus_page_detail', compact('aboutusmain', 'aboutustitle'));
    }

    //about us
    public function aboutus_page_create_aboutus()
    {
        $aboutUsPages = Aboutuspage::where('section', 'aboutus')->get();
        return view("frontend.aboutus.aboutus_page_create_aboutus", compact('aboutUsPages'));
    }

    public function aboutus_page_store_aboutus(Request $request)
    {
        $request->validate([

            "description" => "nullable",
            "images" => "nullable|array",
            "images.*" => "image|mimes:jpeg,png,jpg,bmp,gif,svg, webp|max:4096",
        ], [
            'min' => "Input must have at least :min.",
            'max' => "Input must have at least :max.",        
        ]);

        $aboutuspage = new aboutuspage();

        $aboutuspage->description = $request->description;
        $aboutuspage->section = 'aboutus';
        $aboutuspage->save();

        if ($request->hasFile("images")) {
            foreach ($request->file("images") as $item) {
                $filename = time() . "_" . $item->getClientOriginalName();
                $destinationPath = public_path("img/aboutus_images");

                $item->move($destinationPath, $filename);
                $imagePath = "img/aboutus_images/" . $filename;

                $newImage = new aboutuspageimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $aboutuspage->id;
                $newImage->save();
            }
        }

        $aboutUsPages = Aboutuspage::where('section', 'aboutus')->get();
        return redirect()->route('aboutuspage.index')->with('aboutUsPages', $aboutUsPages)
        ->with("success", "About us page created successfully");
    }
    

    public function aboutus_page_delete_aboutus(aboutuspage $aboutuspage)
    {
        // Delete related images
        foreach ($aboutuspage->images as $image) {
            if (File::exists($image->url_image)) {
                File::delete($image->url_image);
            }
            $image->delete();
        }

        // Delete the about us page
        $aboutuspage->delete();

        // Redirect to the index page with success message
        return redirect()->route('aboutuspage.index')->with('success', 'About us page deleted successfully');
    }

    public function Aboutus_page_main($id) {
        // Assuming you are fetching data from the database
        $mainPage = Aboutuspage::find($id);
    
        // Check if the main page with the given ID exists
        if (!$mainPage) {
            abort(404); // You can customize this to handle the case when the page is not found
        }
    
        // Pass the data to the view
        return view('frontend.aboutus.aboutus', ['mainPage' => $mainPage]);
    }

    public function aboutus_page_edit_aboutus(aboutuspage $aboutUsPages) {
        
        return view("frontend.aboutus.aboutus_page_edit_aboutus", compact("aboutUsPages"));
    }
    
    
    public function aboutus_page_update_aboutus(Request $request, aboutuspage $aboutUsPages) {
        $request->validate([

            "description" => "nullable",
            "images" => "nullable|array",
            "images.*" => "image|mimes:jpeg,png,jpg,bmp,gif,svg, webp|max:4096",
        ], [
            'min' => "Input must have at least :min",
            'max' => "Input must have at least :max.",        
        ]);
    
        $aboutUsPages->description = $request->description;
        $aboutUsPages->save();
    
        if ($request->hasFile("images")) {
            if ($aboutUsPages->images->count() > 0) {
                foreach ($aboutUsPages->images as $image) {
                    $imageUrl = $image->url_image;
    
                    if (File::exists($imageUrl) && $image->aboutus_id === $aboutUsPages->id) {
                        File::delete($imageUrl);
                    }
    
                    // Delete the image record
                    $image->delete();
                }
            }
    
            foreach ($request->file("images") as $item) {
                $filename = time() . "_" . $item->getClientOriginalName();
                $destinationPath = public_path("img/aboutus_images");
    
                $item->move($destinationPath, $filename);
                $imagePath = "img/aboutus_images/" . $filename;
    
                $newImage = new aboutuspageimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $aboutUsPages->id;
                $newImage->save();
            }
        }
    
        return redirect()->route("aboutuspage.index")
            ->with("success", "About us page updated successfully");
    }

    //logo sector left table
    public function aboutus_page_create_logo()
    {
        $logoPages = aboutuslogo::all();
        return view("frontend.aboutus.aboutus_page_create_logo", compact('logoPages'));
    }

    public function aboutus_page_store_logo(Request $request)
    {
        $request->validate([
            
            "images" => "nullable|array",
            "images.*" => "image|mimes:jpeg,png,jpg,bmp,gif,svg, webp|max:4096",
        ], [
            'min' => "Input must have at least :min",
            'max' => "Input must have at least :max.",        
        ]);

        $logoPages = new aboutuslogo();
        $logoPages->save();

        if ($request->hasFile("images")) {
            foreach ($request->file("images") as $item) {
                $filename = time() . "_" . $item->getClientOriginalName();
                $destinationPath = public_path("img/aboutus_images");

                $item->move($destinationPath, $filename);
                $imagePath = "img/aboutus_images/" . $filename;

                $newImage = new aboutuslogoimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $logoPages->id;
                $newImage->save();
            }
        }

        return redirect()->route('aboutuspage.index')->with("success", "Logo page created successfully");
    }

    public function aboutus_page_edit_logo(aboutuslogo $logoPages)
    {
        return view("frontend.aboutus.aboutus_page_edit_logo", compact("logoPages"));
    }

    public function aboutus_page_update_logo(Request $request, aboutuslogo $logoPages)
    {
        $request->validate([
            "images" => "nullable|array",
            "images.*" => "image|mimes:jpeg,png,jpg,bmp,gif,svg, webp|max:4096",
        ], [
            'min' => "Input must have at least :min",
            'max' => "Input must have at least :max.",        
        ]);

        if ($request->hasFile("images")) {
            // Delete existing images if any
            foreach ($logoPages->images as $image) {
                $imageUrl = $image->url_image;

                if (File::exists($imageUrl) && $image->aboutus_id === $logoPages->id) {
                    File::delete($imageUrl);
                }

                // Delete the image record
                $image->delete();
            }

            // Upload and associate new images
            foreach ($request->file("images") as $item) {
                $filename = time() . "_" . $item->getClientOriginalName();
                $destinationPath = public_path("img/aboutus_images");

                $item->move($destinationPath, $filename);
                $imagePath = "img/aboutus_images/" . $filename;

                $newImage = new aboutuslogoimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $logoPages->id;
                $newImage->save();
            }
        }

        return redirect()->route("aboutuspage.index")->with("success", "About us logo page updated successfully");
    }

    public function aboutus_page_delete_logo(aboutuslogo $logoPages)
    {
        // Delete related images
        foreach ($logoPages->images as $image) {
            if (File::exists($image->url_image)) {
                File::delete($image->url_image);
            }
            $image->delete();
        }

        // Delete the logo page
        $logoPages->delete();

        // Redirect to the index page with success message
        return redirect()->route('aboutuspage.index')->with('success', 'Logo page deleted successfully');
    }



    //left Call 
    public function aboutus_page_create_leftcall() {
        $leftcallPages = aboutuscalltoaction::where('section', 'leftcall')->get();
        return view("frontend.aboutus.aboutus_page_create_call_left", compact("leftcallPages"));
        
    }

    public function aboutus_page_store_leftcall(Request $request)
    {
        $request->validate([
            "lefttitle" => "required", 
            "leftdescription" => "required",
            "middletitle" => "required", 
            "middledescription" => "required",
            "righttitle" => "required", 
            "rightdescription" => "required",
        ], [
            'required' => "Input cannot be empty.",
        ]);

        $leftcallPages = new aboutuscalltoaction();

        $leftcallPages->lefttitle = $request->lefttitle;
        $leftcallPages->leftdescription = $request->leftdescription;
        
        $leftcallPages->middletitle = $request->middletitle;
        $leftcallPages->middledescription = $request->middledescription;

        $leftcallPages->righttitle = $request->righttitle;
        $leftcallPages->rightdescription = $request->rightdescription;

        $leftcallPages->section = 'leftcall';
        $leftcallPages->save();

        // No need to query again, use the existing $leftcallPages object
        return redirect()->route('aboutuspage.index')->with('leftcall', $leftcallPages)
            ->with("success", "Left call page created successfully");
    }

        public function aboutus_page_edit_leftcall(aboutuscalltoaction $leftcallPages) {
            return view("frontend.aboutus.aboutus_page_edit_call_left", compact("leftcallPages"));
        }

    public function aboutus_page_update_leftcall(Request $request, aboutuscalltoaction $leftcallPages)
    {

        $request->validate([
            "lefttitle" => "required", 
            "leftdescription" => "required",
            "middletitle" => "required", 
            "middledescription" => "required",
            "righttitle" => "required", 
            "rightdescription" => "required",
        ], [
            'required' => "Input cannot be empty.",
        ]);

        
        $leftcallPages->lefttitle = $request->lefttitle;
        $leftcallPages->leftdescription = $request->leftdescription;
        
        $leftcallPages->middletitle = $request->middletitle;
        $leftcallPages->middledescription = $request->middledescription;

        $leftcallPages->righttitle = $request->righttitle;
        $leftcallPages->rightdescription = $request->rightdescription;
        $leftcallPages->save();

        return redirect()->route("aboutuspage.index")->with("success", "left call page updated successfully");
    }

    
    public function aboutus_page_delete_leftcall(aboutuscalltoaction $leftcallPages)
    {
        // Delete the main page
        $leftcallPages->delete();

        // Redirect to the index page with success message
        return redirect()->route('aboutuspage.index')->with('success', 'Left call page deleted successfully');
    }

    //Team
    public function aboutus_page_create_team()
    {
        $teamPage = aboutuscalltoaction::where('section', 'team')->get();
        return view("frontend.aboutus.aboutus_page_create_team", compact('teamPage'));
    }

    public function aboutus_page_store_team(Request $request)
    {
        $request->validate([

            "middletitle" => "nullable",
            "middledescription" => "nullable",
            "images" => "required",
            "images.*" => "image|mimes:jpeg,png,jpg,bmp,gif,svg, webp|max:4096",
        ]);

        $teamPage = new aboutuscalltoaction();

        $teamPage->middletitle = $request->middletitle;
        $teamPage->middledescription = $request->middledescription;
        $teamPage->section = 'team';
        $teamPage->save();

        if ($request->hasFile("images")) {
            foreach ($request->file("images") as $item) {
                $filename = time() . "_" . $item->getClientOriginalName();
                $destinationPath = public_path("img/aboutus_images");

                $item->move($destinationPath, $filename);
                $imagePath = "img/aboutus_images/" . $filename;

                $newImage = new Aboutuscalltoactionimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $teamPage->id;
                $newImage->save();
            }
        }

        return redirect()->route('aboutuspage.index')->with("success", "Team page created successfully");
    }

    public function aboutus_page_edit_team(aboutuscalltoaction $teamPage) {
        return view("frontend.aboutus.aboutus_page_edit_team", compact("teamPage"));
    }

    public function aboutus_page_update_team(Request $request, aboutuscalltoaction $teamPage)
    {   
        $request->validate([
            "middletitle" => "nullable",
            "middledescription" => "nullable",
            "images" => "required",
            "images.*" => "image|mimes:jpeg,png,jpg,bmp,gif,svg, webp|max:4096",
            
        ], [
            'required' => "Input cannot be empty.",
            'min' => "Input must have at least :min",
            'max' => "Input must have at least :max.",        
        ]);

        $teamPage->middletitle = $request->middletitle;
        $teamPage->middledescription = $request->middledescription;
        $teamPage->save();

        if ($request->hasFile("images")) {

            if ($teamPage->images->count() > 0) {
                foreach ($teamPage->images as $image) {
                    $imageUrl = $image->url_image;
            

                    if (File::exists($imageUrl) && $image->aboutus_id === $teamPage->id) {
                        File::delete($imageUrl);
                    }
            
                    // Delete the image record
                    $image->delete();
                }
            }

            foreach ($request->file("images") as $item) {
                $filename = time() . "_" . $item->getClientOriginalName();
                $destinationPath = public_path("img/aboutus_images");

                $item->move($destinationPath, $filename);
                $imagePath = "img/aboutus_images/" . $filename;

                $newImage = new Aboutuscalltoactionimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $teamPage->id;
                $newImage->save();
            }
        }

        return redirect()->route("aboutuspage.index")
            ->with("success", "Team page updated successfully");
    }

    public function aboutus_page_delete_team(aboutuscalltoaction $teamPage)
    {
        foreach ($teamPage->images as $image) {
            File::delete($image->url_image);
            $image->delete();
        }

        $teamPage->delete();

        return redirect()->route('aboutuspage.index')->with('success', 'Team page deleted successfully');
    }

    //Team pic 1
    public function aboutus_page_create_teampic1() {
        $teampic1Page = Aboutuscalltoaction::where('section', 'teampic1')->get();
        return view("frontend.aboutus.aboutus_page_create_teampic1", compact("teampic1Page"));
    }

    public function aboutus_page_store_teampic1(Request $request)
    {
        $request->validate([
            "images" => "required|array",
            "images.*" => "image|mimes:jpeg,png,jpg,bmp,gif,svg, webp|max:4096",
        ], [
            'required' => "Input cannot be empty.",
            'min' => "Input must have at least :min",
            'max' => "Input must have at least :max.",        
        ]);

        $teampic1Page = new Aboutuscalltoaction();
        $teampic1Page->section = 'teampic1';
        $teampic1Page->save();

        if ($request->hasFile("images")) {
            foreach ($request->file("images") as $item) {
                $filename = time() . "_" . $item->getClientOriginalName();
                $destinationPath = public_path("img/aboutus_images");

                $item->move($destinationPath, $filename);
                $imagePath = "img/aboutus_images/" . $filename;

                $newImage = new Aboutuscalltoactionimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $teampic1Page->id;
                $newImage->save();
            }
        }

        $teampic1Page = Aboutuscalltoaction::where('section', 'teampic1')->get();

        return redirect()->route('aboutuspage.index')->with('teampic1Page', $teampic1Page)
        ->with("success", "Main page created successfully");
    }

    public function aboutus_page_edit_teampic1(Aboutuscalltoaction $teampic1Page) {
        return view("frontend.aboutus.aboutus_page_edit_teampic1", compact("teampic1Page"));
    }

    public function aboutus_page_update_teampic1(Request $request, Aboutuscalltoaction $teampic1Page)
    {   
        $request->validate([
            "images" => "required",
            "images.*" => "image|mimes:jpeg,png,jpg,bmp,gif,svg, webp|max:4096",
        ], [
            'required' => "Input cannot be empty.",
            'min' => "Input must have at least :min",
            'max' => "Input must have at least :max.",        
        ]);

        $teampic1Page->save();

        if ($request->hasFile("images")) {

            if ($teampic1Page->images->count() > 0) {
                foreach ($teampic1Page->images as $image) {
                    $imageUrl = $image->url_image;
            

                    if (File::exists($imageUrl) && $image->aboutus_id === $teampic1Page->id) {
                        File::delete($imageUrl);
                    }
            
                    // Delete the image record
                    $image->delete();
                }
            }

            foreach ($request->file("images") as $item) {
                $filename = time() . "_" . $item->getClientOriginalName();
                $destinationPath = public_path("img/aboutus_images");

                $item->move($destinationPath, $filename);
                $imagePath = "img/aboutus_images/" . $filename;

                $newImage = new Aboutuscalltoactionimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $teampic1Page->id;
                $newImage->save();
            }
        }

        return redirect()->route("aboutuspage.index")
            ->with("success", "Team picture page updated successfully");
    }
    
    public function aboutus_page_delete_teampic1(Aboutuscalltoaction $teampic1Page)
    {
        // Delete related images
        foreach ($teampic1Page->images as $image) {
            if (File::exists($image->url_image)) {
                File::delete($image->url_image);
            }
            $image->delete();
        }
        // Delete the main page
        $teampic1Page->delete();

        // Redirepage with successct to the index  message
        return redirect()->route('aboutuspage.index')->with('success', 'Team pic 1 page deleted successfully');
    }

    //Team pic 2
    public function aboutus_page_create_teampic2() {
        $teampic2Page = Aboutuscalltoaction::where('section', 'teampic2')->get();
        return view("frontend.aboutus.aboutus_page_create_teampic2", compact("teampic2Page"));
    }

    public function aboutus_page_store_teampic2(Request $request)
    {
        $request->validate([
            "images" => "required|array",
            "images.*" => "image|mimes:jpeg,png,jpg,bmp,gif,svg, webp|max:4096",
        ], [
            'required' => "Input cannot be empty.",
            'min' => "Input must have at least :min",
            'max' => "Input must have at least :max.",        
        ]);

        $teampic2Page = new Aboutuscalltoaction();
        $teampic2Page->section = 'teampic2';
        $teampic2Page->save();

        if ($request->hasFile("images")) {
            foreach ($request->file("images") as $item) {
                $filename = time() . "_" . $item->getClientOriginalName();
                $destinationPath = public_path("img/aboutus_images");

                $item->move($destinationPath, $filename);
                $imagePath = "img/aboutus_images/" . $filename;

                $newImage = new Aboutuscalltoactionimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $teampic2Page->id;
                $newImage->save();
            }
        }

        $teampic2Page = Aboutuscalltoaction::where('section', 'teampic2')->get();

        return redirect()->route('aboutuspage.index')->with('teampic2Page', $teampic2Page)
        ->with("success", "Main page created successfully");
    }

    public function aboutus_page_edit_teampic2(Aboutuscalltoaction $teampic2Page) {
        return view("frontend.aboutus.aboutus_page_edit_teampic2", compact("teampic2Page"));
    }

    public function aboutus_page_update_teampic2(Request $request, Aboutuscalltoaction $teampic2Page)
    {   
        $request->validate([
            "images" => "required",
            "images.*" => "image|mimes:jpeg,png,jpg,bmp,gif,svg, webp|max:4096",
        ], [
            'required' => "Input cannot be empty.",
            'min' => "Input must have at least :min.",
            'max' => "Input must have at least :max.",        
        ]);

        $teampic2Page->save();

        if ($request->hasFile("images")) {

            if ($teampic2Page->images->count() > 0) {
                foreach ($teampic2Page->images as $image) {
                    $imageUrl = $image->url_image;
            

                    if (File::exists($imageUrl) && $image->aboutus_id === $teampic2Page->id) {
                        File::delete($imageUrl);
                    }
            
                    // Delete the image record
                    $image->delete();
                }
            }

            foreach ($request->file("images") as $item) {
                $filename = time() . "_" . $item->getClientOriginalName();
                $destinationPath = public_path("img/aboutus_images");

                $item->move($destinationPath, $filename);
                $imagePath = "img/aboutus_images/" . $filename;

                $newImage = new Aboutuscalltoactionimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $teampic2Page->id;
                $newImage->save();
            }
        }

        return redirect()->route("aboutuspage.index")
            ->with("success", "Team picture 2 updated successfully");
    }
    
    public function aboutus_page_delete_teampic2(Aboutuscalltoaction $teampic2Page)
    {
        // Delete related images
        foreach ($teampic2Page->images as $image) {
            if (File::exists($image->url_image)) {
                File::delete($image->url_image);
            }
            $image->delete();
        }
        // Delete the main page
        $teampic2Page->delete();

        // Redirect to the index page with success message
        return redirect()->route('aboutuspage.index')->with('success', 'Team picture 2 page deleted successfully');
    }

    // Question sector
    public function aboutus_page_create_question() {
        $questionPages = Aboutuspage::where('section', 'question')->get();
        return view("frontend.aboutus.aboutus_page_create_question", compact("questionPages"));
        
    }

    public function aboutus_page_store_question(Request $request)
    {
        $request->validate([
            "title" => "required|string|min:1|max:100",
            "description" => "required|string",
        ], [
            'required' => "Input cannot be empty.",
            'min' => "Input must have at least :min character.",
            'max' => "Input must have at least :max character.",        
        ]);


        $questionPages = new Aboutuspage();

        $questionPages->title = $request->title;
        $questionPages->description = $request->description;

        $questionPages->section = 'question';
        $questionPages->save();

        // Retrieve the left call pages

        $questionPages = Aboutuspage::where('section', 'question')->get();

        // Redirect to the index page with the left call pages and a success message
        return redirect()->route('aboutuspage.index')->with('leftcall', $questionPages)
            ->with("success", "Question page created successfully");
    }

    public function aboutus_page_edit_question(Aboutuspage $questionPages) {
        return view("frontend.aboutus.aboutus_page_edit_question", compact("questionPages"));
    }

    public function aboutus_page_update_question(Request $request, Aboutuspage $questionPages)
    {

        $request->validate([
            "title" => "required|string|min:1|max:100",
            "description" => "required|string",
        ], [
            'required' => "Input cannot be empty.",
            'min' => "Input must have at least :min character.",
            'max' => "Input must have at least :max character.",        
        ]);

        $questionPages->title = $request->title;
        $questionPages->description = $request->description;

        $questionPages->save();

        return redirect()->route("aboutuspage.index")->with("success", "Question page updated successfully");
    }
    
    public function aboutus_page_delete_question(Aboutuspage $questionPages)
    {
        // Delete the main page
        $questionPages->delete();

        // Redirect to the index page with success message
        return redirect()->route('aboutuspage.index')->with('success', 'Question page deleted successfully');
    }

    //Founder
    public function aboutus_page_create_founder() {
        $ourfounderPages = aboutusmember::all();
        return view("frontend.aboutus.aboutus_member_create_founder", compact("ourfounderPages"));
        
    }

    public function aboutus_page_store_founder(Request $request)
    {
        $request->validate([
            "title" => "required|string|min:1|max:100",
            "description" => "required|string|min:1|max:1000",
            "leftdescription" => "required|string|min:1|max:1000",
            "middletitle" => "required|string|min:1|max:100",
            "middledescription" => "required|string|min:1|max:1000",
            "section" => "nullable",
            "images" => "nullable|array",
            "images.*" => "image|mimes:jpeg,png,jpg,bmp,gif,svg, webp|max:4096",
            'video' => 'nullable|mimes:mp4,avi,etc|max:10240',
        ], [
            'required' => "Input cannot be empty.",
            'min' => "Input must have at least :min character.",
            'max' => "Input must have at least :max character.",        
        ]);

        $ourfounderPages = new aboutusmember();

        $ourfounderPages->title = $request->title;
        $ourfounderPages->description = $request->description;
        $ourfounderPages->leftdescription = $request->leftdescription;
        $ourfounderPages->middletitle = $request->middletitle;
        $ourfounderPages->middledescription = $request->middledescription;
        $ourfounderPages->section = $request->section;
        // Save the model to get an ID
        $ourfounderPages->save();

        $videoPath = null; // Initialize the variable outside of the if block

        // Handle video upload
        if ($request->hasFile('video')) {
            // Generate a unique filename for the video
            $videoFilename = time() . "_" . $request->file('video')->getClientOriginalName();
            
            // Store the video with the generated filename
            $videoPath = $request->file('video')->storeAs('videos', $videoFilename, 'public');

            // Update the model with the video path
            $ourfounderPages->video = $videoPath;
            $ourfounderPages->save();
        }

        // Handle image upload
        if ($request->hasFile("images")) {
            foreach ($request->file("images") as $item) {
                $filename = time() . "_" . $item->getClientOriginalName();
                $destinationPath = public_path("img/aboutus_images");

                $item->move($destinationPath, $filename);
                $imagePath = "img/aboutus_images/" . $filename;

                $newImage = new aboutusmemberimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $ourfounderPages->id;
                $newImage->save();
            }
        }
        $ourfounderPages = aboutusmember::all();

        return redirect()->route('aboutusmember.index')->with('ourfounderPages', $ourfounderPages)
            ->with("success", "Founder created successfully");
    }


    public function aboutus_page_edit_founder(aboutusmember $ourfounderPages) {
        return view("frontend.aboutus.aboutus_member_edit_founder", compact("ourfounderPages"));
    }

    public function aboutus_page_update_founder(Request $request, aboutusmember $ourfounderPages)
    {
        $request->validate([
            "title" => "required|string|min:1|max:100",
            "description" => "required|string|min:1|max:1000",
            "leftdescription" => "required|string|min:1|max:1000",
            "middletitle" => "required|string|min:1|max:100",
            "middledescription" => "required|string|min:1|max:1000",
            "section" => "nullable",
            "images" => "nullable|array",
            "images.*" => "image|mimes:jpeg,png,jpg,bmp,gif,svg, webp|max:4096",
            'video' => 'nullable|mimes:mp4,avi,etc|max:10240',
        ], [
            'required' => "Input cannot be empty.",
            'min' => "Input must have at least :min character.",
            'max' => "Input must have at least :max character.",        
        ]);

    // Add this line to trim the description before saving

        $ourfounderPages->title = $request->title;
        $ourfounderPages->description = trim($request->description);
        $ourfounderPages->leftdescription = trim($request->leftdescription);
        $ourfounderPages->middletitle = $request->middletitle;
        $ourfounderPages->middledescription =trim($request->middledescription);
        $ourfounderPages->section = $request->section;
        $ourfounderPages->save();

        // Insert new images
        if ($request->hasFile("images")) {

            if ($request->hasFile("images")) {
                foreach ($request->file("images") as $item) {
                    $filename = time() . "_" . $item->getClientOriginalName();
                    $destinationPath = public_path("img/aboutus_images");
            
                    $item->move($destinationPath, $filename);
                    $imagePath = "img/aboutus_images/" . $filename;
            
                    $newImage = new aboutusmemberimage();
                    $newImage->url_image = $imagePath;
                    $ourfounderPages->images()->save($newImage);
                }
            }
        }

        // Update or add the new video
        if ($request->hasFile('video')) {
            // Delete the existing video file
            if (!empty($ourfounderPages->video) && Storage::exists($ourfounderPages->video)) {
                Storage::delete($ourfounderPages->video);
            }

            // Upload the new video file
            $videoPath = $request->file('video')->store('videos', 'public');

            // Update the video path in the database
            $ourfounderPages->video = $videoPath;
        }

        $ourfounderPages->save();

        return redirect()->route("aboutusmember.index")->with("success", "Founder page updated successfully");
    }


    public function aboutus_page_delete_founder(aboutusmember $ourfounderPages)
    {
        // Delete related images
        foreach ($ourfounderPages->images as $image) {
            if (File::exists($image->url_image)) {
                File::delete($image->url_image);
            }
            $image->delete();
        }

        // Delete the associated video file
        if ($ourfounderPages->video && Storage::exists($ourfounderPages->video)) {
            Storage::delete($ourfounderPages->video);
        }

        // Delete the main page
        $ourfounderPages->delete();

        // Redirect to the index page with success message
        return redirect()->route('aboutusmember.index')->with('success', 'Founder page deleted successfully');
    }

    
    public function Aboutus_intro_detail($id)
    {
        $ourfounderPages = aboutusmember::find($id);
        $aboutusmember = aboutuspage::find($id);

        if (!$aboutusmember) {
            $aboutusmember = aboutuscalltoaction::find($id);
        }

        return view('frontend.aboutus.aboutus_member_intro_detail', compact('aboutusmember', 'ourfounderPages'));
    }

    public function showMainMemberDetail($memberId)
    {
        // Your existing code to retrieve $aboutusmember...

        // Assuming you have a method to get the video path for the member, adjust as needed
        $videoPath = $this->getVideoPathForMember($memberId);

        // Pass $aboutusmember and $videoPath to the view
        return view('frontend.aboutus.aboutus_member_detail', compact('aboutusmember', 'videoPath'));
    }
}