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
        // Fetch data for Main, About Us, and Logo Pages
        $mainPages = Aboutuspage::where('section', 'main')->get();
        $aboutUsPages = Aboutuspage::where('section', 'aboutus')->get();
        $logoPages = Aboutuspage::where('section', 'logo')->get();
        $leftcallPages = aboutuscalltoaction::where('section', 'leftcall')->get();
        $introwhoPages = Aboutuspage::where('section', 'introwho')->get();


        // Pass all variables to the view
        return view("frontend.aboutus.aboutus_page_index", compact("mainPages", "aboutUsPages", "logoPages", "introcallPages", "leftcallPages", "introwhoPages"));
    }

    //main
    public function aboutus_page_create_main() {
        $mainPages = Aboutuspage::where('section', 'main')->get();
        return view("frontend.aboutus.aboutus_page_create_main", compact("mainPages"));
    }

    public function aboutus_page_store_main(Request $request)
    {
        $request->validate([
            "title" => "nullable",
            "description" => "nullable",
            "images" => "required",
            "images.*" => "image|mimes:jpeg,png,jpg|max:4096",
        ]);

        $mainPage = new aboutuspage();
        $mainPage->title = $request->title;
        $mainPage->description = $request->description;
        $mainPage->section = 'main';
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

        $mainPages = Aboutuspage::where('section', 'main')->get();

        return redirect()->route('aboutuspage.index')->with('mainPages', $mainPages)
        ->with("success", "Main page created successfully");
    }

    public function aboutus_page_edit_main(aboutuspage $mainPages) {
        return view("frontend.aboutus.aboutus_page_edit_main", compact("mainPages"));
    }

    public function aboutus_page_update_main(Request $request, aboutuspage $mainPages)
    {

        $request->validate([
            "title" => "nullable",
            "description" => "nullable",
            "images" => "required",
            "images.*" => "image|mimes:jpeg,png,jpg|max:4096",
        ]);

        $mainPages->title = $request->title;
        $mainPages->description = $request->description;
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
        // Retrieve the team member from the database
        $aboutusmain = aboutuspage::find($id);
        $aboutusmain = aboutuscalltoaction::find($id);

        // Pass the team member data to the view
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
            "title" => "nullable",
            "description" => "nullable",
            "images" => "required",
            "images.*" => "image|mimes:jpeg,png,jpg|max:4096",
        ]);

        $aboutuspage = new aboutuspage();
        $aboutuspage->title = $request->title;
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
            "title" => "nullable",
            "description" => "nullable",
            "images" => "required",
            "images.*" => "image|mimes:jpeg,png,jpg|max:4096",
        ]);
    
        $aboutUsPages->title = $request->title;
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
    public function aboutus_page_create_logo() {
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

    $logoPages = new aboutuspage();
    $logoPages->title = $request->title;
    $logoPages->section = 'logo';
    
    $logoPages->save();

    if ($request->hasFile("images")) {
        foreach ($request->file("images") as $item) {
            $filename = time() . "_" . $item->getClientOriginalName();
            $destinationPath = public_path("img/aboutus_images");

            $item->move($destinationPath, $filename);
            $imagePath = "img/aboutus_images/" . $filename;

            $newImage = new Aboutusimage();
            $newImage->url_image = $imagePath;
            $newImage->aboutus_id = $logoPages->id;
            $newImage->save();
        }
    }

    return redirect()->route('aboutuspage.index')->with("success", "About us page created successfully");
}


    public function aboutus_page_edit_logo(aboutuspage $logoPages) {
        return view("frontend.aboutus.aboutus_page_edit_logo", compact("logoPages"));
    }

    public function aboutus_page_update_logo(Request $request, aboutuspage $logoPages)
    {

        $request->validate([
            "title" => "nullable",
            "images" => "required",
            "images.*" => "image|mimes:jpeg,png,jpg|max:4096",
        ]);

        $logoPages->title = $request->title;
        $logoPages->save();

        if ($request->hasFile("images")) {

            if ($logoPages->images->count() > 0) {
                foreach ($logoPages->images as $image) {
                    $imageUrl = $image->url_image;
            

                    if (File::exists($imageUrl) && $image->aboutus_id === $logoPages->id) {
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
                $newImage->aboutus_id = $logoPages->id;
                $newImage->save();
            }
        }

        return redirect()->route("aboutuspage.index")
            ->with("success", "About us main page updated successfully");
    }

    public function aboutus_page_delete_logo(aboutuspage $logoPages)
    {
        // Delete related images
        foreach ($logoPages->images as $image) {
            if (File::exists($image->url_image)) {
                File::delete($image->url_image);
            }
            $image->delete();
        }

        // Delete the main page
        $logoPages->delete();

        // Redirect to the index page with success message
        return redirect()->route('aboutuspage.index')->with('success', 'Main page deleted successfully');
    }

    //intro Call 
    public function aboutus_page_create_introcall() {
        $introcallPages = Aboutuspage::where('section', 'introcall')->get();
        return view("frontend.aboutus.aboutus_page_create_introcall", compact("introcallPages"));
    }

    public function aboutus_page_store_call(Request $request)
    {
        $request->validate([
            "title" => "nullable",
            "description" => "nullable",
        ]);

        $introcallPages = new aboutuspage();
        $introcallPages->title = $request->title;
        $introcallPages->description = $request->description;
        $introcallPages->section = 'introcall';
        $introcallPages->save();

        $introcallPages = Aboutuspage::where('section', 'introcall')->get();

        return redirect()->route('aboutuspage.index')->with('introcall', $introcallPages)
        ->with("success", "Intro call page created successfully");
    }

    public function aboutus_page_edit_introcall(aboutuspage $introcallPages) {
        return view("frontend.aboutus.aboutus_page_edit_introcall", compact("introcallPages"));
    }

    public function aboutus_page_update_introcall(Request $request, aboutuspage $introcallPages)
    {

        $request->validate([
            "title" => "nullable",
            "description" => "nullable",

        ]);

        $introcallPages->title = $request->title;
        $introcallPages->description = $request->description;
        $introcallPages->save();

        if ($request->hasFile("images")) {

            if ($introcallPages->images->count() > 0) {
                foreach ($introcallPages->images as $image) {
                    $imageUrl = $image->url_image;
            

                    if (File::exists($imageUrl) && $image->aboutus_id === $introcallPages->id) {
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
                $newImage->aboutus_id = $introcallPages->id;
                $newImage->save();
            }
        }

        return redirect()->route("aboutuspage.index")
            ->with("success", "About us main page updated successfully");
    }

    
    public function aboutus_page_delete_call(aboutuspage $introcallPages)
    {
        // Delete related images
        foreach ($introcallPages->images as $image) {
            if (File::exists($image->url_image)) {
                File::delete($image->url_image);
            }
            $image->delete();
        }

        // Delete the main page
        $introcallPages->delete();

        // Redirect to the index page with success message
        return redirect()->route('aboutuspage.index')->with('success', 'Intro page deleted successfully');
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
        dd($request);
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

    //Who We Are
    public function aboutus_page_create_introwho() {
        $introwhoPages = Aboutuspage::where('section', 'introwho')->get();
        return view("frontend.aboutus.aboutus_page_create_introwho", compact("introcallPages"));
    }

    public function aboutus_page_store_introwho(Request $request)
    {
        $request->validate([
            "title" => "nullable",
            "description" => "nullable",
        ]);

        $introwhoPages = new aboutuspage();
        $introwhoPages->title = $request->title;
        $introwhoPages->description = $request->description;
        $introwhoPages->section = 'introcall';
        $introwhoPages->save();

        $introwhoPages = Aboutuspage::where('section', 'introwho')->get();

        return redirect()->route('aboutuspage.index')->with('introcall', $introwhoPages)
        ->with("success", "Intro call page created successfully");
    }

    public function aboutus_page_edit_introwho(aboutuspage $introcallPages) {
        return view("frontend.aboutus.aboutus_page_edit_introwho", compact("introwhoPages"));
    }

    public function aboutus_page_update_introwho(Request $request, aboutuspage $introwhoPages)
    {

        $request->validate([
            "title" => "nullable",
            "description" => "nullable",

        ]);

        $introwhoPages->title = $request->title;
        $introwhoPages->description = $request->description;
        $introwhoPages->save();

        if ($request->hasFile("images")) {

            if ($introwhoPages->images->count() > 0) {
                foreach ($introwhoPages->images as $image) {
                    $imageUrl = $image->url_image;
            

                    if (File::exists($imageUrl) && $image->aboutus_id === $introwhoPages->id) {
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
                $newImage->aboutus_id = $introwhoPages->id;
                $newImage->save();
            }
        }

        return redirect()->route("aboutuspage.index")
            ->with("success", "Who We are page updated successfully");
    }

    
    public function aboutus_page_delete_introwho(aboutuspage $introwhoPages)
    {
        // Delete related images
        foreach ($introwhoPages->images as $image) {
            if (File::exists($image->url_image)) {
                File::delete($image->url_image);
            }
            $image->delete();
        }

        // Delete the main page
        $introwhoPages->delete();

        // Redirect to the index page with success message
        return redirect()->route('aboutuspage.index')->with('success', 'Who we are page deleted successfully');
    }
}