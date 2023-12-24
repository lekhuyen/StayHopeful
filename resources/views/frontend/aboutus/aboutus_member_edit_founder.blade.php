<!DOCTYPE html>
<html lang="en">

@extends('frontend.adminpage.index')
@section('admin_content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<link rel="stylesheet" href="{{ asset('general/general.css') }}">

<div class="container mt-3">
    <h1>Founder Form</h1>
    <form method="POST" enctype="multipart/form-data" action="{{ route('aboutusmember.edit_founder', $ourfounderPages) }}">
        @csrf
        @method("PUT")

        <div class="btn__back">
            <a href="{{ route('aboutusmember.index') }}" class="btn__go_back">
                <i class="fa fa-long-arrow-left"></i>GO BACK</a>
        </div>
        <br>

        <div class="mb-3">
            <label for="title" class="form-label">Founder Title:</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ $ourfounderPages->title }}">
        @error('title')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
    
        <div class="mb-3">
            <label for="description" class="form-label">Founder Description:</label>
            <textarea class="form-control tinymce" id="description" placeholder="Enter description" name="description">{{ $ourfounderPages->description }}</textarea>
        @error('description')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="mb-3">
            <label for="leftdescription" class="form-label">Meet Description:</label>
            <textarea class="form-control tinymce" id="leftdescription" placeholder="Enter leftdescription" name="leftdescription">{{ $ourfounderPages->leftdescription }}</textarea>
        @error('leftdescription')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="mb-3">
            <label for="middletitle" class="form-label">Founder Title Info:</label>
            <input type="text" class="form-control" id="middletitle" placeholder="Enter middletitle" name="middletitle" value="{{ $ourfounderPages->middletitle }}">
            @error('middletitle')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="mb-3">
            <label for="middledescription" class="form-label">Founder Description Info:</label>
            <textarea class="form-control tinymce" id="middledescription" placeholder="Enter middledescription" name="middledescription">{{ $ourfounderPages->middledescription }}</textarea>
            @error('middledescription')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="mb-3">
            <label for="section" class="form-label">Section:</label>
            <select class="form-control" id="section" name="section">
                <option value="Founder" @if ($ourfounderPages->section == 'Founder') selected @endif>Founder</option>
                <option value="Financial Team" @if ($ourfounderPages->section == 'Financial Team') selected @endif>Financial Team</option>
                <option value="Marketing Team" @if ($ourfounderPages->section == 'Marketing Team') selected @endif>Marketing Team</option>
                <option value="Lead Developer Team" @if ($ourfounderPages->section == 'Lead Developer Team') selected @endif>Lead Developer Team</option>
                <option value="Creative Team" @if ($ourfounderPages->section == 'Creative Team') selected @endif>Creative Team</option>
                <option value="Volunteer Member" @if ($ourfounderPages->section == 'Volunteer Member') selected @endif>Volunteer Member</option>
            </select>
        </div>

        <br>
        <div class="form-group mb-3">
            <label for="images">Current Images:</label>
            @if ($ourfounderPages->images->count() > 0)
                @foreach ($ourfounderPages->images as $item)
                    <img src="{{ asset($item->url_image) }}"
                        class="img-thumbnail"
                        width="100"
                        alt="{{ $ourfounderPages->name }}"/>
                @endforeach
            @else
                <p>No image available</p>
            @endif
        </div>
      
        <div class="mb-3">
            <label for="new_images" class="form-label">New Image:</label>
            <input type="file" class="form-control" id="new_images" multiple name="images[]"/>
            @error('new_images')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>


        <div class="form-group mb-3">
            @if ($ourfounderPages->video)
                <p>Current Video:</p>
                <video width="320" height="240" controls>
                    <source src="{{ asset('storage/' . $ourfounderPages->video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @else
                <p>No video available</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="new_video" class="form-label">New Video:</label>
            <input type="file" class="form-control" id="new_video" name="video"/>
            @error('new_video')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


@include('frontend/login/login')
    @include('frontend/profile/popup_profile')
@endsection