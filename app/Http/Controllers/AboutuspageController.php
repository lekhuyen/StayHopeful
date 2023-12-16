<?php

namespace App\Http\Controllers;

use App\Models\Aboutusimage;
use App\Models\aboutuspage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AboutuspageController extends Controller
{
    public function aboutus_page_index() {
        // Fetch data for both Main and About Us Pages
        $mainPages = aboutuspage::where('section', 'main')->get();
        $aboutUsPages = aboutuspage::where('section', 'aboutus')->get();
    
        // Pass both variables to the view
        return view("frontend.aboutus.aboutus_page_index", compact("mainPages", "aboutUsPages"));
    }

    //main
    public function aboutus_page_create_main() {
        $mainPages = Aboutuspage::where('section', 'main')->get();
        return view("frontend.aboutus.aboutus_page_create_main", compact("mainPages"));
    }

    public function aboutus_page_store_main(Request $request)
    {
        $request->validate([
            "title" => "required",
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
            "title" => "required",
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

        // Pass the team member data to the view
        return view('frontend.aboutus.aboutus_page_detail', compact('aboutusmain'));
    }

    public function Aboutus_main_detail($id)
    {
        // Retrieve the main page from the database
        $mainPages = aboutuspage::find($id);

        // Pass the main page data to the view
        return view('frontend.aboutus.aboutus_main_detail', compact('mainPages'));
    }

    public function Aboutus_aboutus_detail($id)
    {
        // Retrieve the about us page from the database
        $aboutUsPages = aboutuspage::find($id);

        // Pass the about us page data to the view
        return view('frontend.aboutus.aboutus_aboutus_detail', compact('aboutUsPages'));
    }


    //about us
    public function aboutus_page_create_aboutus() {
        $aboutUsPages = Aboutuspage::where('section', 'aboutus')->get();
        return view("frontend.aboutus.aboutus_page_create_aboutus", compact('aboutUsPages'));
    }


    public function aboutus_page_store_aboutus(Request $request)
    {
        $request->validate([
            "title" => "required",
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
            "title" => "required",
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
}