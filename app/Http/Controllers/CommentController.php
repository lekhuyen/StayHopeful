<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
                // 'rely_id'=>$request->rely_id ? $request->rely_id:0
            ];
            $comment = Comment::create($data);
            // return response()->json([$data]);
            

            if($comment){
                return response()->json(['data'=>$comment]);
                // $comments = Comment::where(['project_id'=>$project_id, 'rely_id'=>0])->orderBy('id', 'desc')->get();

            }
        }
        return response()->json(['error'=> $validator->errors()->first()]);
    }
}
