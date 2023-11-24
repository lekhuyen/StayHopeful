<?php

namespace App\Http\Controllers;

use App\Models\Categories_sliders;
use App\Models\Slider;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Psy\Readline\Hoa\Console;

use function Laravel\Prompts\alert;

class AdminPageController extends Controller
{
    public function viewsidebar()
    {
        return view('frontend.adminpage.index');
    }
    public function viewdashboard()
    {
        return view('frontend.adminpage.dashboard');
    }
    public function viewmanagerpost()
    {
        return view('frontend.adminpage.post');
    }
    public function viewmanagerdesign()
    {
        $sliders = Sliders::all();
        $categories = Categories_sliders::all();
        return view('frontend.adminpage.design', compact('categories', 'sliders'));
    }
    public function sliderview(){
        $slider = Sliders::all();
        return view('welcome',compact('slider'));
    }
    public function create_slider(Request $request)
    {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
            $slider = new Sliders();
            $slider->url_image = 'images/' . $filename;
            $slider->slider_name = $request->nameimg;
            $slider->categories_sliders_id = $request->categories;
            $slider->save();

        }

        return redirect()->back()->with('success', 'Slider created successfully');
    }
    public function update_slider(Request $request, Sliders $slider)
    {
        if ($request->hasFile('image')) {
            if (File::exists($slider->url_image)) {
                File::delete(public_path($slider->url_image));
            }
            $image = $request->file('image');
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
            $slider->url_image = 'images/' . $filename;
        }
        $slider->slider_name = $request->nameimage;
        $slider->categories_sliders_id = $request->catogries;
        $slider->save();

        return redirect()->back()->with('success', 'Success update Sliders');


    }
    public function delete_slider(Sliders $slider)
{
    $imagePath = public_path($slider->url_image);

    $slider->delete();

    if (File::exists($imagePath)) {
        File::delete($imagePath);
    }

    return redirect()->back()->with('success', 'Slider deleted successfully');
}
    public function getSliderImage($id)
    {
        $slider = Sliders::find($id);
        return response()->json(['url' => asset($slider->url_image)]);
    }
    public function viewlistuser()
    {
        return view('frontend.adminpage.listuser');
    }


}
