@extends('frontend.adminpage.index')
@section('admin_content')
    <div class="container mt-3">
        <h2>Add Category</h2>
        <a class="btn btn-primary"href="{{ route('category.index')}}">Category List</a>
        <form action="{{route('category.store')}}" method="POST">
            @csrf
            <div class="mb-3 mt-3">
                <label for="category">Category:</label>
                <input type="tetx" class="form-control" id="category" placeholder="Enter category" name="name">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
