<?php

namespace App\Http\Controllers;

use App\Models\Sensitive;
use Illuminate\Http\Request;

class SensitiveController extends Controller
{
    public function index() {
        // $sensitives = Sensitive::all();
        $sensitives = Sensitive::orderBy('id','desc')->paginate(6);
        return view ('frontend.sensitive.index', compact('sensitives'));
    }

    public function create() {
        return view ('frontend.sensitive.create');
    }

    public function store(Request $request) {
        $request->validate([
            'word'=>'bail|required|min:3|max:255',
            'status'=>'required',
        ]);
        Sensitive::create($request->all());
        return redirect()->back()->with('success','Add sensitive word successfully.');
    }
}
