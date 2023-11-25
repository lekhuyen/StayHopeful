@extends('frontend.adminpage.index')
@section('admin_content')
    <div class="container mt-3">
        <h2>Add Category</h2>
        <form action="{{route('category.update', $category->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-3">
                <label for="category">Category:</label>
                <input type="tetx" class="form-control" id="category" placeholder="Enter category" name="name" value="{{$category->name}}">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
