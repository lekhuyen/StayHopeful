<?php

namespace App\Http\Controllers;

use App\Models\CommentPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentPostController extends Controller
{
    public function post_comment(Request $request,$post_id){
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
                'post_id'=>$post_id,
                // 'rely_id'=>$request->rely_id ? $request->rely_id:0
            ];
            $comment = CommentPost::create($data);            
            if($comment){
                $comments = CommentPost::where(['post_id'=>$post_id, 'reply_id'=>0])->orderBy('id', 'desc')->get();
                return view('frontend.post_page.list_comment', compact('comments'));
                // return response()->json(['comment'=>$comment]);


            }
        }
        return response()->json(['error'=> $validator->errors()->first()]);
    }


    
}
