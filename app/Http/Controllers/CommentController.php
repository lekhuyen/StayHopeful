<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentPost;
use App\Models\ReplyComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function comment(Request $request,$project_id){
        $user_id = session('userInfo')['id'];
        $validator = Validator::make($request->all(), [
            'content'=>'required',
        ],[
            'content.required'=> 'Noi dung khong duoc de trong',
        ]);
        if($validator->passes()){
            $data = [
                'user_id'=> $user_id,
                'content'=> $request->content,
                'project_id'=>$project_id,
            ];
            $comment = Comment::create($data);
            

            if($comment){
                return response()->json(['data'=>$comment]);
            }
        }
        return response()->json(['error'=> $validator->errors()->first()]);
    }

    public function index(){
        $replies = ReplyComment::orderby('status', 'asc')->paginate(10);
        $comments = CommentPost::orderby('status', 'asc')->paginate(10);
        return view("frontend.adminpage.comment.index", compact("comments", "replies"));
    }

}
