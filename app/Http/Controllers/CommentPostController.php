<?php

namespace App\Http\Controllers;

use App\Models\CommentPost;
use App\Models\ReplyComment;
use App\Models\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentPostController extends Controller
{
    // public function post_comment(Request $request,$post_id){
    //     $user_id = session('userInfo')['id'];
    //     $validator = Validator::make($request->all(), [
    //         'content'=>'required',
    //     ],[
    //         'content.required'=> 'Noi dung khong duoc de trong',
    //     ]);
    //     if($validator->passes()){
    //         $data = [
    //             'user_id'=> $user_id,
    //             'content'=> $request->content,
    //             'post_id'=>$post_id,
    //             'isReply'=>$request->isReply,
    //             'comment_id'=>$request->commentid,
    //             'reply_id'=>$request->reply_id ? $request->reply_id:0
    //         ];

    // $comment = CommentPost::create($data);            
    // if($comment){
    //     $comments = CommentPost::where(['post_id'=>$post_id])->orderBy('id', 'desc')->get();

    // return view('frontend.post_page.list_comment', compact('comments'));
    // return response()->json($comments);
    // }
    //     }
    //     return response()->json(['error'=> $validator->errors()->first()]);
    // }


    public function storeComment(Request $request, $post_id)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required',
        ], [
            'content.required' => 'Noi dung khong duoc de trong',
        ]);
        $user_id = auth()->user()->id;
        if ($validator->passes()) {
            CommentPost::create([
                'content' => $request->content,
                'post_id' => $post_id,
                'user_id' => $user_id,
                'status' => 1,
            ]);
            
        }
        $comments = CommentPost::where(['post_id' => $post_id])->orderBy('id', 'desc')->get();
            if ($comments) {
                return view('frontend.post_page.list_comment', compact('comments'));
                // return response()->json($comments);
            }
        return response()->json(['error' => $validator->errors()->first()]);
    }

    public function storeCommentReply(Request $request, $post_id)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required',
        ], [
            'content.required' => 'Noi dung khong duoc de trong',
        ]);
        $user_id = auth()->user()->id;
        if ($validator->passes()) {
            ReplyComment::create([
                'content' => $request->content,
                'post_id' => $post_id,
                'user_id' => $user_id,
                'comment_id' => $request->comment_id,
                'status' => 1,
            ]);
            
        }
        $replyComment = ReplyComment::where(['post_id' => $post_id])->orderBy('id', 'desc')->get();
            if ($replyComment) {
                return view('frontend.post_page.list_comment', compact('replyComment'));
                // return response()->json($replyComment);
            }
        return response()->json(['error' => $validator->errors()->first()]);
    }





    public function get_comment($post_id)
    {
        $post = UserPost::find($post_id);
        if ($post) {
            return view('frontend/post_page/comment_post', compact('post'));
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to change password'
            ]);
        }
    }
}
