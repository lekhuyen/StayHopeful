@extends('frontend.adminpage.index')
@section('admin_content')
    <div class="container mt-3">
        <div style="margin-bottom: 20px"> <a href="{{ route('category.index') }}"> <i class="fa fa-arrow-left"> Go Back</i></a>
        </div>
        <h1 style="color:cornflowerblue; text-align:center">Edit Category</h1>
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-3">
                <label for="category">Category:</label>
                <input type="tetx" class="form-control" id="category" placeholder="Enter category" name="name"
                    value="{{ $category->name }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
