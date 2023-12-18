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
  <form method="POST" enctype="multipart/form-data" action="{{ route('aboutuspage.update_leftcall', $leftcallPages)}}">
    @csrf
    @method("PUT")

    <div class="btn__back">
      <a href="{{ route('aboutuspage.index') }}" class="btn__go_back">
          <i class="fa fa-long-arrow-left"></i>GO BACK</a>
    </div>
    <br>

    <div class="mb-3">
      <label for="title" class="form-label">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ $leftcallPages->title }}">
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Description:</label>
      <textarea class="form-control tinymce" id="description" placeholder="Enter description" name="description">{{ $leftcallPages->description }}</textarea>
    </div>

    <div class="mb-3">
        <label for="lefttitle" class="form-label">Left Title:</label>
        <input type="text" class="form-control" id="lefttitle" placeholder="Enter lefttitle" name="lefttitle" value="{{ $leftcallPages->lefttitle }}">
    </div>

    <div class="mb-3">
      <label for="leftdescription" class="form-label">Left Description:</label>
      <textarea class="form-control tinymce" id="leftdescription" placeholder="Enter leftdescription" name="leftdescription">{{ $leftcallPages->leftdescription }}</textarea>
    </div>

    <div class="mb-3">
      <label for="middletitle" class="form-label">Middle Title:</label>
      <input type="text" class="form-control" id="middletitle" placeholder="Enter middletitle" name="middletitle" value="{{ $leftcallPages->middletitle }}">
  </div>

  <div class="mb-3">
    <label for="middledescription" class="form-label">Middle Description:</label>
    <textarea class="form-control tinymce" id="middledescription" placeholder="Enter middledescription" name="middledescription">{{ $leftcallPages->middledescription }}</textarea>
  </div>

  <div class="mb-3">
    <label for="righttitle" class="form-label">Right Title:</label>
    <input type="text" class="form-control" id="righttitle" placeholder="Enter righttitle" name="righttitle" value="{{ $leftcallPages->righttitle }}">
  </div>

  <div class="mb-3">
    <label for="rightdescription" class="form-label">Right Description:</label>
    <textarea class="form-control tinymce" id="rightdescription" placeholder="Enter rightdescription" name="rightdescription">{{ $leftcallPages->rightdescription }}</textarea>
  </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<script defer>
  tinymce.init({
      selector: '.tinymce', // Specify the class of the textarea you want to enhance
      height: 300,
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