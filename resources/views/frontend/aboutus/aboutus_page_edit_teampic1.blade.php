<!DOCTYPE html>
<html lang="en">

@extends('frontend.adminpage.index')
@section('admin_content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<link rel="stylesheet" href="{{ asset('general/general.css') }}">

<div class="container mt-3">
    <h1>Edit Team Form</h1>
    <form method="POST" enctype="multipart/form-data" action="{{ route('aboutuspage.update_teampic1', $teampic1Page) }}">
        @csrf
        @method("PUT")

        <div class="btn__back">
            <a href="{{ route('aboutuspage.index') }}" class="btn__go_back">
                <i class="fa fa-long-arrow-left"></i>GO BACK</a>
        </div>
        <br>

        <div class="form-group mb-3">
            <label for="images">Current Images:</label>
            @if ($teampic1Page->images->count() > 0)
                @foreach ($teampic1Page->images as $item)
                    <img src="{{ asset($item->url_image) }}"
                        class="img-thumbnail"
                        width="100"
                        alt="{{ $teampic1Page->name }}"/>
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


@include('frontend/login/login')
    @include('frontend/profile/popup_profile')@endsection