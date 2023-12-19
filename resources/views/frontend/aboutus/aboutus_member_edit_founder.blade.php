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
    <form method="POST" enctype="multipart/form-data" action="{{ route('aboutusmember.store_founder', $ourfounderPages) }}">
        @csrf
        @method("PUT")

        <div class="btn__back">
            <a href="{{ route('aboutusmember.index') }}" class="btn__go_back">
                <i class="fa fa-long-arrow-left"></i>GO BACK</a>
        </div>
        <br>

        <div class="mb-3">
            <label for="title" class="form-label">Founder Title:</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
        </div>
    
        <div class="mb-3">
          <label for="description" class="form-label">Founder Description:</label>
          <textarea class="form-control tinymce" id="description" placeholder="Enter description" name="description"></textarea>
        </div>

        <div class="mb-3">
            <label for="leftdescription" class="form-label">Meet Description:</label>
            <textarea class="form-control tinymce" id="leftdescription" placeholder="Enter leftdescription" name="leftdescription"></textarea>
        </div>

        <div class="mb-3">
            <label for="middletitle" class="form-label">Founder Title Info:</label>
            <input type="text" class="form-control" id="middletitle" placeholder="Enter middletitle"
                name="middletitle">
        </div>

        <div class="mb-3">
            <label for="middledescription" class="form-label">Founder Description Info:</label>
            <textarea class="form-control tinymce" id="middledescription" placeholder="Enter middledescription"
                name="middledescription"></textarea>
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Image:</label>
            <input type="file" class="form-control" id="images" multiple name="images[]"/>
        </div>

        <div class="mb-3">
            <label for="video" class="form-label">Video:</label>
            <input type="file" class="form-control" id="video" name="video"/>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    tinymce.init({
        selector: '.tinymce',
        height: 300, // Set the height of the editor
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic underline | forecolor backcolor | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | removeformat | help',
        forced_root_block: false,
    });
</script>

@include('frontend/login/login')
@endsection