<?php

namespace App\Http\Controllers;

use App\Models\CommentPost;
use App\Models\Like;
use App\Models\PostImage;
use App\Models\User;
use App\Models\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserPostController extends Controller
{
    public function index()
    {
        $posts = UserPost::orderBy('id', 'desc')->paginate(2);
        return view('frontend.adminpage.user_post.index', compact('posts'));
    }
    public function detail_post($id)
    {
        $post = UserPost::find($id);
        return view('frontend.adminpage.user_post.post_detail', compact('post'));
    }

    //show-web

    public function show_post_home(Request $request)
    {
        $posts = UserPost::orderBy('id', 'desc')
            ->where('status', 0)
            ->get();

        // $comments = CommentPost::where(['post_id' => $request->post_id, 'reply_id' => 0])->orderBy('id', 'desc')->get();
        // if($comments->count() > 0 || $posts) {
        // } else {
        //     return response()->json(['status' => 'error', 'message' => 'Loi']);

        // }
        $user = User::all();

        return view('frontend.post_page.index', compact('posts', 'user'));
    }

    // like - user - post

    public function like(Request $request)
    {
        $post_id = $request->post_id;
        $user_id = auth()->user()->id;

        $like = Like::where('id_post', $post_id)
            ->where('id_user', $user_id)
            ->first();

        if ($like) {
            $like->delete();
        } else {
            $like = Like::create([
                'id_post' => $post_id,
                'id_user' => $user_id
            ]);
        }

        $like_count = Like::where('id_post', $post_id)
            ->count();
        $like_user = Like::where('id_post', $post_id)
            ->where('id_user', $user_id)
            ->count();

        return response()->json([
            'status' => 'success',
            'count' => $like_count,
            'like_user' => $like_user
        ], 200);
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

        return back()->with("isPending", true);
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


    // edit post(user)
    public function edit_post(Request $request)
    {

        $id = $request->post_id;
        $post = UserPost::find($id);
        if ($post) {
            $post->title = $request->title;

            $post->save();

            // $images_id = $request->image_id;
            // if(count($images_id) > 0) {
            //     foreach($images_id as $image_id) {
            //         $post_images = PostImage::find($image_id);
            //         if ($post_images) {
            //             if(File::exists($post_images->image)){
            //                 File::delete($post_images->image);
            //             }
            //             PostImage::find($image_id)->delete();
            //         }

            //     }
            // }

        }


        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $fileName = time() . '_' . $image->getClientOriginalName();
                $PublicImagePath = public_path("images");
                $image->move($PublicImagePath, $fileName);
                $imagePath = 'images/' . $fileName;

                $postImage = new PostImage();
                $postImage->image = $imagePath;
                $postImage->post_id = $post->id;

                $postImage->save();
            }
            return back()->with('success', 'Cập nhật thành công');
        }


        return back()->with('error', 'Bản ghi không tồn tại');
    }

    public function delete_post_image($id)
    {
        $images = PostImage::find($id);
        if (File::exists($images->image)) {
            File::delete($images->image);
        }
        PostImage::find($id)->delete();
        return back();
    }



    public function delete_post_user($id)
    {
        $project = UserPost::find($id);
        $project->delete();

        return response()->json(['error' => ['Delete fails']]);
    }
    public function updateprofile(Request $request, $id)
    {

        $age = $request->age;
        $phone = $request->phone;
        $address = $request->address;
        $user = User::find($id);
        $user->age = $age;
        $user->phone = $phone;
        $user->address = $address;
        if ($request->hasFile('images')) {
            if (File::exists($user->avatar)) {
                $imagePath = public_path($user->avatar);
                File::delete($imagePath);
            }
            $image = $request->file('images');
                $fileName = time() . '_' . $image->getClientOriginalName();
                $PublicImagePath = public_path("images");
                $image->move($PublicImagePath, $fileName);
                $imagePath = 'images/' . $fileName;
                $user->avatar = $imagePath;

        }
        $user->save();
        return redirect()->back()->with('success', 'Update Successfully');
    }
}
