<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\feedback_message;
use App\Models\feedbackTable;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = Feedback::all();
        return view("frontend.feedback.index",compact('feedback'));
    }
    public function create()
    {
        return view("frontend.feedback.feedback");
    }
    public function store(Request $request) {
        $request->validate([
            'email'=>'bail|required|email',
            'content'=>'required',
            'star'=>'required',
        ]);
        Feedback::create($request->all());
        return redirect()->back()->with('success','Thanks for your feedback.');
    }
}
