<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id', 'desc')->paginate(4);
        return view('frontend.adminpage.category.index', compact('categories'));
    }
    public function create(){
        return view('frontend.adminpage.category.create');
    }

    public function store(Request $request){
        $request->validate([
            "name"=> "required"
        ]);
        Category::create($request->all());

        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete($id);

        return redirect()->back();
    }

    public function edit($id){
        $category = Category::find($id);
        return view('frontend.adminpage.category.update', compact('category'));
    }

    public function update(Request $request,$id){
        $request->validate([
            "name"=> "required"
        ]);
        $category = Category::find($id);
        $category->update($request->all());

        return redirect()->route('category.index')->with('success', 'Updated Successfully');
    }
}
