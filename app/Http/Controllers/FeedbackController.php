<?php

namespace App\Http\Controllers;

use App\Models\feedback_message;
use App\Models\feedbackTable;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        // $feedback = feedback_message::all();
        return view("frontend.feedback.index",compact('feedback'));
    }
    public function create()
    {
        return view("frontend.feedback.feedback");
    }

}
