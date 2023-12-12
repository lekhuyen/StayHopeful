<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Sensitive;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = Feedback::paginate(4);
        $feedbacks = Feedback::all();
        $sensitives_word = Sensitive::all();
        $words = $sensitives_word->pluck('word');
        $count = 0;
        foreach ($feedbacks as $key => $text) {
            foreach ($words as $word) {
                if (str_contains($text, $word)) {
                    $count++;
                    break;
                }
            }
        }
        return view("frontend.feedback.index", compact('feedback', 'words', 'count','feedbacks'));
    }
    public function create()
    {
        return view("frontend.feedback.feedback");
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'bail|required|email',
            'content' => 'bail|required|min:3|max:255',
            'star' => 'required',
        ]);
        Feedback::create($request->all());
        return redirect()->back()->with('success', 'Thanks for your feedback.');
    }
    public function detail($id)
    {
        $feedback = Feedback::find($id);
        $sensitives_word = Sensitive::all();
        $words = $sensitives_word->pluck('word');
        return view('frontend.feedback.detail', compact('feedback', 'words'));
    }
}
