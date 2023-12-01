<?php

namespace App\Http\Controllers;

use App\Models\PostImage;
use App\Models\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserPostController extends Controller
{
    public function index(){
        $posts = UserPost::orderBy('status', 'desc')->paginate(4);
        return view('frontend.adminpage.user_post.index', compact('posts'));
    }
    public function detail_post($id){
        $post = UserPost::find($id);
        return view('frontend.adminpage.user_post.post_detail', compact('post'));
    }

    //show-web

    public function show_post_home(){
        $posts = UserPost::orderBy('id', 'desc')
        ->where('status', 0)
        ->get();

        return view('frontend.post_page.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $user_id = session('userInfo')['id'];
        $request->validate([
            'title' => 'required',
        ]);
        $userPost = new UserPost();
        $userPost->title = $request->title;
        $userPost->user_id = $user_id;

        $userPost->save();

        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $fileName = time() . '_' . $image->getClientOriginalName();
                $PublicImagePath = public_path("images");
                $image->move($PublicImagePath, $fileName);
                $imagePath = 'images/' . $fileName;

                $postImage = new PostImage();
                $postImage->image = $imagePath;
                $postImage->post_id = $userPost->id;

                $postImage->save();
            }
        }


        return back()->with('success', 'Tao thanh cong, bai viet dang cho duyet');
    }

    //duyet bai viet
    public function choduyet($id)
    {
        $post = UserPost::find($id);
        if ($post) {
            $post->update(['status' => 0]);
            return back();
        }

        return response()->json(['error' => ['Updated fails']]);
    }
    public function daduyet($id)
    {
        $post = UserPost::find($id);
        if ($post) {
            $post->update(['status' => 1]);
            return back();
        }

        return response()->json(['error' => ['Updated fails']]);
    }


    public function delete($id)
    {
        $post = UserPost::find($id);
        $post->delete();

        return response()->json(['error' => ['Delete fails']]);
    }


    //post SoftDelete
    public function post_trash()
    {
        $posts = UserPost::onlyTrashed()->get();
        return view('frontend.adminpage.user_post.post_trash', compact('posts'));
    }
    public function post_untrash($id)
    {
        $post = UserPost::withTrashed()->find($id);
        $post->restore();
        return back();
    }
    public function post_forcedelete($id)
    {
        $post = UserPost::withTrashed()->find($id);
        $post->forceDelete();
        foreach ($post->images as $image) {
            if (File::exists($image->image)) {
                File::delete($image->image);
            }
        }
        return back();
    }
}
