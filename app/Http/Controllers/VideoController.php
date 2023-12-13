<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->paginate(4);
        return view('frontend.adminpage.video.index', compact('videos'));
    }
    public function create()
    {
        return view('frontend.adminpage.video.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required',
        ]);

        if ($request->hasFile('video')) {
            $videos = $request->file('video');
            foreach ($videos as $video) {
                $fileName = time() . '_' . $video->getClientOriginalName();
                $PublicVideoPath = public_path("images");
                $video->move($PublicVideoPath, $fileName);
                $imagePath = 'images/' . $fileName;

                $videos = new Video();
                $videos->video = $imagePath;
                $videos->save();
            }
        }


        return redirect()->route('video-list.index')->with('success', 'Video created successfully');
    }


    public function edit($id)
    {
        $videos = Video::find($id);
        return view('frontend.adminpage.video.update', compact('videos'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'video' => 'required',
        ]);

        if ($request->hasFile('video')) {
            $videos = $request->file('video');
            foreach ($videos as $video) {
                $fileName = time() . '_' . $video->getClientOriginalName();
                $PublicVideoPath = public_path("images");
                $video->move($PublicVideoPath, $fileName);
                $imagePath = 'images/' . $fileName;

                $videos = new Video();
                $videos->video = $imagePath;
                $videos->save();
            }
        }

        return redirect()->route('video-list.index')->with('success', 'Video created successfully');
    }

    public function delete($id)
    {
        $video = Video::find($id);
        $video->delete();

        return response()->json(['error' => ['Delete fails']]);
    }


    //softDelete
    public function video_trash()
    {
        $videos = Video::onlyTrashed()->get();
        return view('frontend.adminpage.video.trash_video', compact('videos'));
    }

    public function video_untrash($id)
    {
        $video = Video::withTrashed()->find($id);
        $video->restore();
        return back();
    }

    public function video_forcedelete($id)
    {
        $video = Video::withTrashed()->find($id);
        $video->forceDelete();
        if (File::exists($video->video)) {
            File::delete($video->video);
        }

        return back();
    }
}
