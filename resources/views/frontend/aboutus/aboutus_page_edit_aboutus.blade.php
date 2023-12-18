<!DOCTYPE html>
<html lang="en">

@extends('frontend.adminpage.index')
@section('admin_content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<link rel="stylesheet" href="{{ asset('general/general.css') }}">

<div class="container mt-3">
  <h1>Edit About Us Form</h1>
  <form method="POST" enctype="multipart/form-data" action="{{ route('aboutuspage.update_aboutus', $aboutUsPages) }}">
    @csrf
    @method("PUT")

    <div class="btn__back">
      <a href="{{ route('aboutuspage.index') }}" class="btn__go_back">
          <i class="fa fa-long-arrow-left"></i>GO BACK</a>
    </div>
    <br>


    <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <textarea class="form-control tinymce" id="description" placeholder="Enter description" name="description">{{ $aboutUsPages->description }}</textarea>
    </div>

    <div class="form-group mb-3">
      <label for="images">Current Images:</label>
      @if ($aboutUsPages->images->count() > 0)
          @foreach ($aboutUsPages->images as $item)
              <img src="{{ asset($item->url_image) }}"
                   class="img-thumbnail"
                   width="100"
                   alt="{{ $aboutUsPages->name }}"/>
          @endforeach
      @else
          <p>No image available</p>
      @endif
    </div>

    <div class="mb-3">
        <label for="new_images" class="form-label">New Image:</label>
        <input type="file" class="form-control" id="new_images" multiple name="images[]"/>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<script>
  tinymce.init({
      selector: '.tinymce',
      height: 300,  // Set the height of the editor
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