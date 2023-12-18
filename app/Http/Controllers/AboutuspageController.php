<?php

namespace App\Http\Controllers;

use App\Models\aboutuscalltoaction;
use App\Models\Aboutusimage;
use App\Models\aboutuspage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutuspageController extends Controller
{
    public function aboutus_page_index() {
        $mainPages = Aboutuspage::all();
        $aboutUsPages = Aboutuspage::where('section', 'aboutus')->get();
        $logoPages = Aboutuspage::where('section', 'logo')->get();
        $leftcallPages = aboutuscalltoaction::where('section', 'leftcall')->get();
        $teamPage = Aboutuscalltoaction::where('section', 'team')->get();
        $teampic1Page = Aboutuspage::where('section', 'teampic1')->get();
        $teampic2Page = Aboutuspage::where('section', 'teampic2')->get();
        $mainquestionPage = Aboutuspage::where('section', 'mainquestion')->get();
        $questionPages = Aboutuspage::where('section', 'question')->get();
        // Pass all variables to the view
        return view("frontend.aboutus.aboutus_page_index", compact("mainPages", "aboutUsPages", "logoPages",
        "leftcallPages", "teamPage", "teampic1Page", "teampic2Page","mainquestionPage", "questionPages"));
    }

    //main
    public function aboutus_page_create_main() {
        $mainPages = Aboutuspage::all();
        return view("frontend.aboutus.aboutus_page_create_main", compact("mainPages"));
    }

    public function aboutus_page_store_main(Request $request)
    {
        $request->validate([
            "title" => "nullable",
            "description" => "nullable",
            "section" => "required",
            "images" => "nullable|array",
            "images.*" => "image|mimes:jpeg,png,jpg|max:4096",
        ]);

        $mainPage = new Aboutuspage();
        $mainPage->title = $request->title;
        $mainPage->description = $request->description;
        $mainPage->section = $request->section;
        $mainPage->save();

        if ($request->hasFile("images")) {
            foreach ($request->file("images") as $item) {
                $filename = time() . "_" . $item->getClientOriginalName();
                $destinationPath = public_path("img/aboutus_images");

                $item->move($destinationPath, $filename);
                $imagePath = "img/aboutus_images/" . $filename;

                $newImage = new Aboutusimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $mainPage->id;
                $newImage->save();
            }
        }

        $mainPages = Aboutuspage::all();
        return redirect()->route('aboutuspage.index')->with('mainPages', $mainPages)
        ->with("success", "Main page created successfully");
    }

    public function aboutus_page_edit_main(aboutuspage $mainPages) {
        return view("frontend.aboutus.aboutus_page_edit_main", compact("mainPages"));
    }

    public function aboutus_page_update_main(Request $request, Aboutuspage $mainPages)
    {   
        $request->validate([
            "title" => "nullable",
            "description" => "nullable",
            "section" => "required",
            "images" => "nullable|array",
            "images.*" => "image|mimes:jpeg,png,jpg|max:4096",
        ]);

        $mainPages->title = $request->title;
        $mainPages->description = $request->description;
        $mainPages->section = $request->section;
        $mainPages->save();

        if ($request->hasFile("images")) {

            // Delete existing images if any
            $mainPages->images()->delete();

            foreach ($request->file("images") as $item) {
                $filename = time() . "_" . $item->getClientOriginalName();
                $destinationPath = public_path("img/aboutus_images");

                $item->move($destinationPath, $filename);
                $imagePath = "img/aboutus_images/" . $filename;

                $newImage = new Aboutusimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $mainPages->id;
                $newImage->save();
            }
        }

        return redirect()->route("aboutuspage.index")
            ->with("success", "About us main page updated successfully");
    }
    
    public function aboutus_page_delete_main(aboutuspage $mainPages)
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

        if (!$aboutusmain) {
            $aboutusmain = aboutuscalltoaction::find($id);
        }

        return view('frontend.aboutus.aboutus_page_detail', compact('aboutusmain'));
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
            "images.*" => "image|mimes:jpeg,png,jpg|max:4096",
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

                $newImage = new Aboutusimage();
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
            "images.*" => "image|mimes:jpeg,png,jpg|max:4096",
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
    
                $newImage = new Aboutusimage();
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
        $logoPages = Aboutuspage::where('section', 'logo')->get();
        return view("frontend.aboutus.aboutus_page_create_logo", compact('logoPages'));
    }

    public function aboutus_page_store_logo(Request $request)
    {
        $request->validate([
            "title" => "nullable",
            "images" => "required",
            "images.*" => "image|mimes:jpeg,png,jpg|max:4096",
        ]);

        $logoPage = new Aboutuspage();
        $logoPage->title = $request->title;
        $logoPage->section = 'logo';

        $logoPage->save();

        if ($request->hasFile("images")) {
            foreach ($request->file("images") as $item) {
                $filename = time() . "_" . $item->getClientOriginalName();
                $destinationPath = public_path("img/aboutus_images");

                $item->move($destinationPath, $filename);
                $imagePath = "img/aboutus_images/" . $filename;

                $newImage = new Aboutusimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $logoPage->id;
                $newImage->save();
            }
        }

        $mainPages = Aboutuspage::where('section', 'logo')->get();

        return redirect()->route('aboutuspage.index')->with("success", $logoPage)
        ->with("success", "Logo page created successfully");
    }

    public function aboutus_page_edit_logo(Aboutuspage $logoPage)
    {
        return view("frontend.aboutus.aboutus_page_edit_logo", compact("logoPage"));
    }

    public function aboutus_page_update_logo(Request $request, Aboutuspage $logoPage) // Adjusted parameter name
    {
        $request->validate([
            "title" => "nullable",
            "images" => "required",
            "images.*" => "image|mimes:jpeg,png,jpg|max:4096",
        ]);

        $logoPage->title = $request->title;
        $logoPage->save();

        if ($request->hasFile("images")) {
            if ($logoPage->images->count() > 0) {
                foreach ($logoPage->images as $image) {
                    $imageUrl = $image->url_image;

                    if (File::exists($imageUrl) && $image->aboutus_id === $logoPage->id) {
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

                $newImage = new Aboutusimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $logoPage->id;
                $newImage->save();
            }
        }

        return redirect()->route("aboutuspage.index")
            ->with("success", "About us logo page updated successfully");
    }

    public function aboutus_page_delete_logo(Aboutuspage $logoPage) // Adjusted parameter name
    {
        // Delete related images
        foreach ($logoPage->images as $image) {
            if (File::exists($image->url_image)) {
                File::delete($image->url_image);
            }
            $image->delete();
        }

        // Delete the logo page
        $logoPage->delete();

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
            "title" => "nullable",
            "description" => "nullable",
            "lefttitle" => "required", 
            "leftdescription" => "required",
            "middletitle" => "required", 
            "middledescription" => "required",
            "righttitle" => "required", 
            "rightdescription" => "required",
        ]);


        $leftcallPages = new aboutuscalltoaction();
        

        $leftcallPages->title = $request->title;
        $leftcallPages->description = $request->description;

        $leftcallPages->lefttitle = $request->lefttitle;
        $leftcallPages->leftdescription = $request->leftdescription;
        
        $leftcallPages->middletitle = $request->middletitle;
        $leftcallPages->middledescription = $request->middledescription;

        $leftcallPages->righttitle = $request->righttitle;
        $leftcallPages->rightdescription = $request->rightdescription;

        $leftcallPages->section = 'leftcall';
        $leftcallPages->save();

        // Retrieve the left call pages

        $leftcallPage = aboutuscalltoaction::where('section', 'leftcall')->get();

        // Redirect to the index page with the left call pages and a success message
        return redirect()->route('aboutuspage.index')->with('leftcall', $leftcallPage)
            ->with("success", "Left call page created successfully");
    }

    public function aboutus_page_edit_leftcall(aboutuscalltoaction $leftcallPages) {
        return view("frontend.aboutus.aboutus_page_edit_call_left", compact("leftcallPages"));
    }

    public function aboutus_page_update_leftcall(Request $request, aboutuscalltoaction $leftcallPages)
    {

        $request->validate([
            "title" => "nullable",
            "description" => "nullable",
            "lefttitle" => "required", 
            "leftdescription" => "required",
            "middletitle" => "required", 
            "middledescription" => "required",
            "righttitle" => "required", 
            "rightdescription" => "required",

        ]);

        $leftcallPages->title = $request->title;
        $leftcallPages->description = $request->description;

        
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
            "title" => "nullable",
            "description" => "nullable",
            "middletitle" => "nullable",
            "middledescription" => "nullable",
            "images" => "required",
            "images.*" => "image|mimes:jpeg,png,jpg|max:4096",
        ]);

        $teamPage = new aboutuscalltoaction();
        $teamPage->title = $request->title;
        $teamPage->description = $request->description;
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

                $newImage = new Aboutusimage();
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
            "title" => "nullable",
            "description" => "nullable",
            "images" => "required",
            "images.*" => "image|mimes:jpeg,png,jpg|max:4096",
        ]);

        $teamPage->title = $request->title;
        $teamPage->description = $request->description;
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

                $newImage = new Aboutusimage();
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
        $teampic1Page = Aboutuspage::where('section', 'teampic1')->get();
        return view("frontend.aboutus.aboutus_page_create_teampic1", compact("teampic1Page"));
    }

    public function aboutus_page_store_teampic1(Request $request)
    {
        $request->validate([
            "images" => "required|array",
            "images.*" => "image|mimes:jpeg,png,jpg|max:4096",
        ]);

        $teampic1Page = new Aboutuspage();
        $teampic1Page->section = 'teampic1';
        $teampic1Page->save();

        if ($request->hasFile("images")) {
            foreach ($request->file("images") as $item) {
                $filename = time() . "_" . $item->getClientOriginalName();
                $destinationPath = public_path("img/aboutus_images");

                $item->move($destinationPath, $filename);
                $imagePath = "img/aboutus_images/" . $filename;

                $newImage = new Aboutusimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $teampic1Page->id;
                $newImage->save();
            }
        }

        $mainPages = Aboutuspage::where('section', 'teampic1')->get();

        return redirect()->route('aboutuspage.index')->with('teampic1Page', $teampic1Page)
        ->with("success", "Main page created successfully");
    }

    public function aboutus_page_edit_teampic1(Aboutuspage $teampic1Page) {
        return view("frontend.aboutus.aboutus_page_edit_teampic1", compact("teampic1Page"));
    }

    public function aboutus_page_update_teampic1(Request $request, Aboutuspage $teampic1Page)
    {   
        $request->validate([
            "images" => "required",
            "images.*" => "image|mimes:jpeg,png,jpg|max:4096",
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

                $newImage = new Aboutusimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $teampic1Page->id;
                $newImage->save();
            }
        }

        return redirect()->route("aboutuspage.index")
            ->with("success", "Team picture page updated successfully");
    }
    
    public function aboutus_page_delete_teampic1(aboutuspage $teampic1Page)
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
        $teampic2Page = Aboutuspage::where('section', 'teampic2')->get();
        return view("frontend.aboutus.aboutus_page_create_teampic2", compact("teampic2Page"));
    }

    public function aboutus_page_store_teampic2(Request $request)
    {
        $request->validate([
            "images" => "required|array",
            "images.*" => "image|mimes:jpeg,png,jpg|max:4096",
        ]);

        $teampic2Page = new Aboutuspage();
        $teampic2Page->section = 'teampic2';
        $teampic2Page->save();

        if ($request->hasFile("images")) {
            foreach ($request->file("images") as $item) {
                $filename = time() . "_" . $item->getClientOriginalName();
                $destinationPath = public_path("img/aboutus_images");

                $item->move($destinationPath, $filename);
                $imagePath = "img/aboutus_images/" . $filename;

                $newImage = new Aboutusimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $teampic2Page->id;
                $newImage->save();
            }
        }

        $mainPages = Aboutuspage::where('section', 'teampic2')->get();

        return redirect()->route('aboutuspage.index')->with('teampic2Page', $teampic2Page)
        ->with("success", "Main page created successfully");
    }

    public function aboutus_page_edit_teampic2(Aboutuspage $teampic2Page) {
        return view("frontend.aboutus.aboutus_page_edit_teampic1", compact("teampic2Page"));
    }

    public function aboutus_page_update_teampic2(Request $request, Aboutuspage $teampic2Page)
    {   
        $request->validate([
            "images" => "required",
            "images.*" => "image|mimes:jpeg,png,jpg|max:4096",
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

                $newImage = new Aboutusimage();
                $newImage->url_image = $imagePath;
                $newImage->aboutus_id = $teampic2Page->id;
                $newImage->save();
            }
        }

        return redirect()->route("aboutuspage.index")
            ->with("success", "Team picture 2 updated successfully");
    }
    
    public function aboutus_page_delete_teampic2(aboutuspage $teampic2Page)
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

    //Main Question sector
    public function aboutus_page_create_mainquestion() {
        $mainquestionPage = Aboutuspage::where('section', 'mainquestion')->get();
        return view("frontend.aboutus.aboutus_page_create_mainquestion", compact("mainquestionPage"));
        
    }

    public function aboutus_page_store_mainquestion(Request $request)
    {
        $request->validate([
            "title" => "nullable",
            "description" => "nullable",
        ]);


        $mainquestionPage = new Aboutuspage();

        $mainquestionPage->title = $request->title;
        $mainquestionPage->description = $request->description;

        $mainquestionPage->section = 'mainquestion';
        $mainquestionPage->save();

        // Retrieve the left call pages

        $mainquestionPage = Aboutuspage::where('section', 'mainquestion')->get();

        // Redirect to the index page with the left call pages and a success message
        return redirect()->route('aboutuspage.index')->with('mainquestion', $mainquestionPage)
            ->with("success", "Main Question page created successfully");
    }

    public function aboutus_page_edit_mainquestion(Aboutuspage $mainquestionPage) {
        return view("frontend.aboutus.aboutus_page_edit_mainquestion", compact("mainquestionPage"));
    }

    public function aboutus_page_update_mainquestion(Request $request, Aboutuspage $mainquestionPage)
    {

        $request->validate([
            "title" => "nullable",
            "description" => "nullable",


        ]);

        $mainquestionPage->title = $request->title;
        $mainquestionPage->description = $request->description;

        $mainquestionPage->save();

        return redirect()->route("aboutuspage.index")->with("success", "Question page updated successfully");
    }

    
    public function aboutus_page_delete_mainquestion(Aboutuspage $mainquestionPage)
    {
        // Delete the main page
        $mainquestionPage->delete();

        // Redirect to the index page with success message
        return redirect()->route('aboutuspage.index')->with('success', 'Question page deleted successfully');
    }

    // Question sector
    public function aboutus_page_create_question() {
        $questionPages = Aboutuspage::where('section', 'question')->get();
        return view("frontend.aboutus.aboutus_page_create_question", compact("questionPages"));
        
    }

    public function aboutus_page_store_question(Request $request)
    {
        $request->validate([
            "title" => "nullable",
            "description" => "nullable",
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
            "title" => "nullable",
            "description" => "nullable",


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
}