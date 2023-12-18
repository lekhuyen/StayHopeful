@extends('frontend.adminpage.index')
@section('admin_content')
@section('title','Edit Category')
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    {{-- css --}}

    <div class="btn__back">
        <a href="{{ route('category.index') }}" class="btn__go_back"><i class="fa fa-long-arrow-left"> </i>GO BACK</a>
    </div>

    <div class="container mt-3">
        <h1>Edit Category</h1>
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-3">
                <label for="category">Category Name:</label>
                <input type="text" class="form-control" id="category" placeholder="Enter category" name="name"
                    value="{{ $category->name }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-flex justify-content-center btn__center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
