<!DOCTYPE html>
<html lang="en">

@extends('frontend.adminpage.index')
@section('admin_content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<link rel="stylesheet" href="{{ asset('general/general.css') }}">


<div class="container mt-3">

  <h1>Call to Action Left Form</h1>
  <form method="POST" enctype="multipart/form-data" action="{{ route('aboutuspage.store_leftcall') }}">
    @csrf
    
    <div class="btn__back">
      <a href="{{ route('aboutuspage.index') }}" class="btn__go_back">
          <i class="fa fa-long-arrow-left"></i>GO BACK</a>
    </div>
    <br>

    <div class="mb-3">
        <label for="lefttitle" class="form-label">Left Title:</label>
        <input type="text" class="form-control" id="lefttitle" placeholder="Enter lefttitle" name="lefttitle">
    </div>

    <div class="mb-3">
      <label for="leftdescription" class="form-label">Left Description:</label>
      <textarea class="form-control tinymce" id="leftdescription" placeholder="Enter leftdescription" name="leftdescription"></textarea>
    </div>

    <div class="mb-3">
      <label for="middletitle" class="form-label">Middle Title:</label>
      <input type="text" class="form-control" id="middletitle" placeholder="Enter middletitle" name="middletitle">
  </div>

  <div class="mb-3">
    <label for="middledescription" class="form-label">Middle Description:</label>
    <textarea class="form-control tinymce" id="middledescription" placeholder="Enter middledescription" name="middledescription"></textarea>
  </div>

  <div class="mb-3">
    <label for="righttitle" class="form-label">Right Title:</label>
    <input type="text" class="form-control" id="righttitle" placeholder="Enter righttitle" name="righttitle">
  </div>

  <div class="mb-3">
    <label for="rightdescription" class="form-label">Right Description:</label>
    <textarea class="form-control tinymce" id="rightdescription" placeholder="Enter rightdescription" name="rightdescription"></textarea>
  </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


@include('frontend/login/login')
@endsection