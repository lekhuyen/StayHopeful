<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('id', 'desc')->get();
        return view('frontend.adminpage.news.index', compact('news'));
    }
    public function create()
    {
        return view('frontend.adminpage.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,webp|max:10096',
            'image' => 'required',
        ]);
        $news = new News();
        $news->title = $request->title;
        $news->description = $request->description;

        $news->save();

        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $fileName = time() . '_' . $image->getClientOriginalName();
                $PublicImagePath = public_path("images");
                $image->move($PublicImagePath, $fileName);
                $imagePath = 'images/' . $fileName;

                $newsImage = new NewsImage();
                $newsImage->image = $imagePath;
                $newsImage->news_id = $news->id;

                $newsImage->save();
            }
        }


        return redirect()->route('news.index')->with('success', 'Project created successfully');
    }



    public function edit($id)
    {
        $news = News::find($id);
        return view('frontend.adminpage.news.update', compact('news'));
    }

    // delete imageChild
    public function deleteImgChild($imgId)
    {
        NewsImage::find($imgId)->delete();
        return response()->json(['error' => ['Delete fails']]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $news = News::find($id);
        $news->title = $request->title;
        $news->description = $request->description;

        $news->save();


        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = public_path('images');
                $image->move($imagePath, $imageName);
                $imagePath = 'images/' . $imageName;

                $newsImage = new NewsImage();
                $newsImage->image = $imagePath;
                $newsImage->news_id = $news->id;
                $newsImage->save();
            }
        }
        return redirect()->route('news.index')->with('success', 'News created successfully');
    }


    //softDelete
    public function trash_image(Request $request)
    {
        $images = NewsImage::onlyTrashed()->get();
        return view('frontend.adminpage.news.trash_image', compact('images'));
    }

    public function untrash_image($id)
    {
        $image = NewsImage::withTrashed()->find($id);
        $image->restore();
        return back();
    }

    public function news_image_forcedelete($id)
    {
        $image = NewsImage::withTrashed()->find($id);
        $image->forceDelete();
        if (File::exists($image->image)) {
            File::delete($image->image);
        }


        return back();
    }


    public function delete($id)
    {
        $news = News::find($id);
        $news->delete();

        return response()->json(['error' => ['Delete fails']]);
    }


    //news SoftDelete
    public function news_trash()
    {
        $news = News::onlyTrashed()->get();
        return view('frontend.adminpage.news.news_trash', compact('news'));
    }

    public function news_untrash($id)
    {
        $news = News::withTrashed()->find($id);
        $news->restore();
        return back();
    }

    public function news_forcedelete($id)
    {
        $news = News::withTrashed()->find($id);
        $news->forceDelete();
        foreach ($news->images as $image) {
            if (File::exists($image->image)) {
                File::delete($image->image);
            }
        }
        return back();
    }


    // news-detail
    public function news_detail($id){
        $new = News::find($id);
        return view('frontend.blog.news_detail', compact('new'));
        // return view('frontend.blog.news_detail', compact('categories', 'projects', 'new'));
    }
}
