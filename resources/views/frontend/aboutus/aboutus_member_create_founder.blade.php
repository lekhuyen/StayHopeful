<!DOCTYPE html>
<html lang="en">

@extends('frontend.adminpage.index')
@section('admin_content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<link rel="stylesheet" href="{{ asset('general/general.css') }}">

<div class="container mt-3">
    <h1>Member Form</h1>
    <form method="POST" enctype="multipart/form-data" action="{{ route('aboutusmember.store_founder') }}">
        @csrf

        <div class="btn__back">
            <a href="{{ route('aboutusmember.index') }}" class="btn__go_back">
                <i class="fa fa-long-arrow-left"></i>GO BACK</a>
        </div>
        <br>

        <div class="mb-3">
            <label for="title" class="form-label">Member Title Name:</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
        @error('title')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
    
        <div class="mb-3">
          <label for="description" class="form-label">Member Description:</label>
          <textarea class="form-control tinymce" id="description" placeholder="Enter description" name="description"></textarea>
        @error('description')
          <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="mb-3">
            <label for="leftdescription" class="form-label">Meet Description:</label>
            <textarea class="form-control tinymce" id="leftdescription" placeholder="Enter leftdescription" name="leftdescription"></textarea>
        @error('leftdescription')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="mb-3">
            <label for="middletitle" class="form-label">Member Title Info:</label>
            <input type="text" class="form-control" id="middletitle" placeholder="Enter middletitle"
                name="middletitle">
        @error('middletitle')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="mb-3">
            <label for="middledescription" class="form-label">Member Description Info:</label>
            <textarea class="form-control tinymce" id="middledescription" placeholder="Enter middledescription"
                name="middledescription"></textarea>
            @error('middledescription')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="section" class="form-label">Section:</label>
            <select class="form-control" id="section" name="section">
                <option value="Founder" @selected(old('section') == 'Founder')>Founder</option>
                <option value="Financial Team" @selected(old('section') == 'Financial Team')>Financial Team</option>
                <option value="Marketing Team" @selected(old('section') == 'Marketing Team')>Marketing Team</option>
                <option value="Lead Developer Team" @selected(old('section') == 'Lead Developer Team')>Lead Developer Team</option>
                <option value="Creative Team" @selected(old('section') == 'Creative Team')>Creative Team</option>
                <option value="Volunteer Member" @selected(old('section') == 'Volunteer Member')>Volunteer Member</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Image:</label>
            <input type="file" class="form-control" id="images" multiple name="images[]"/>
        @error('images')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="mb-3">
            <label for="video" class="form-label">Video:</label>
            <input type="file" class="form-control" id="video" name="video"/>
        @error('video')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


    @include('frontend/login/login')
@endsection