@extends('frontend.adminpage.index')
@section('admin_content')
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">

    <div class="container mt-3">
        <a href="{{ route('video-list.index') }}"><i class="fas fa-long-arrow-alt-left"> GO BACK</i></a>

        <h1>Update Video</h1>
        <form action="{{ route('video-list.update', $videos->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-3">
                <label>Video:</label>
                <input type="file" class="form-control" placeholder="Choose image" name="video[]" multiple>
                @error('video')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-flex justify-content-center btn__center">
                <button type="submit" class="btn btn-primary submit-project">Submit</button>
            </div>
        </form>

        {{-- xoa video con --}}
        <div class="mb-3 mt-3">
            <label>Current Video:</label>
            @if ($videos->count() > 0)
                <div class="image-container" data-image-id="{{ $videos->id }}">
                    <video src="{{ asset($videos->video) }}" controls width="200" height="100"></video>
                </div>
            @endif
        </div>
    </div>
@endsection
