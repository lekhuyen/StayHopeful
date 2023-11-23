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

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         "message" => "required",
    //         "rating" => "required"
    //     ]);
    //     $feedback = new feedback_message();
    //     $feedback->message = $request->message;
    //     $feedback->rating = $request->rating;
    //     $feedback->save();
    //     return redirect()->route("frontend.feedback.create")->with("success", "Feedback is sent successfully.");     
    // }

    public function passes($attribute, $value)
    {
        $words = array('f***', 's***', 'a****', 'b***');

        foreach ($words as $word) {
            if (stripos($value, $word) !== false) {
                return false;
            }
        }

        return true;
    }
}
