<?php

namespace App\Http\Controllers;

use App\Models\CommentPost;
use App\Models\ReplyComment;
use App\Models\User;
use App\Models\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentPostController extends Controller
{

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
        $user = User::all();
            if ($comments) {
                return view('frontend.post_page.list_comment', compact('comments', 'user'));
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
        $replyComment = ReplyComment::where(['post_id' => $post_id, 'comment_id'=>$request->comment_id])->orderBy('id', 'desc')->get();
            if ($replyComment) {
                return response()->json($replyComment);
            }
        return response()->json(['error' => $validator->errors()->first()]);
    }


    public function get_comment($post_id)
    {
        $post = UserPost::find($post_id);
        $user = User::all();
        if ($post) {
            return view('frontend/post_page/comment_post', compact('post', 'user'));
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Post not found',
            ]);
        }
    }



    //delete-comment
    public function deleteComments($id){
        $comment = CommentPost::find($id);
        if($comment){
            $comment->delete();
            return response()->json([
                'status' => 'success',
            ]);
        }
        return response()->json(['error' =>'Comment not found']);

    }

    public function deleteReply($id){
        $reply = ReplyComment::find($id);
        if($reply){
            $reply->delete();
            return response()->json([
                'status' => 'success',
            ]);
        }
        return response()->json(['error' =>'Comment not found']);

    }
    public function editComments($id){
        $comment = CommentPost::find($id);
        if($comment){
            
            return response()->json([
                'status' => 'success',
                'comment' => $comment,
            ]);
        }
        return response()->json(['error' =>'Comment not found']);

    }


    public function updateComments(Request $request, $post_id)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required',
        ], [
            'content.required' => 'Noi dung khong duoc de trong',
        ]);
        // $user_id = auth()->user()->id;
        if ($validator->passes()) {
            $comment = CommentPost::find($post_id);
            $comment->update([
                'content' => $request->content,
            ]);
            
        }
        $comment = CommentPost::find($post_id);
            if ($comment) {
                // return view('frontend.post_page.list_comment', compact('comments'));
                return response()->json($comment);
            }
        return response()->json(['error' => $validator->errors()->first()]);
    }

    // edit-reply
    public function editReply($id){
        $reply = ReplyComment::find($id);
        if($reply){
            
            return response()->json([
                'status' => 'success',
                'reply' => $reply,
            ]);
        }
        return response()->json(['error' =>'reply not found']);

    }

    public function updateReply(Request $request, $post_id)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required',
        ], [
            'content.required' => 'Noi dung khong duoc de trong',
        ]);
        // $user_id = auth()->user()->id;
        if ($validator->passes()) {
            $reply = ReplyComment::find($post_id);
            $reply->update([
                'content' => $request->content,
            ]);
            
        }
        $reply = ReplyComment::find($post_id);
            if ($reply) {
                return response()->json($reply);
            }
        return response()->json(['error' => $validator->errors()->first()]);
    }

    //xem them reply
    public function moreReply(Request $request, $comment_id){
        $comment = CommentPost::find($comment_id);
        //so reply muon lay
        $soReply = $request->soReply;
        //so reply muon hien
        $reply_count = 3;
        $from = ($soReply-1)*$reply_count;
        $replies = $comment->replies->skip($from)->take($reply_count);
        
        return view('frontend.post_page.them_reply', compact('replies'));
        // return response()->json($replies);
        

    }
}
