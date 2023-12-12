@extends('frontend.adminpage.index')
@section('admin_content')
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">

    <div class="container mt-3">
        <a href="{{ route('video-list.index') }}"><i class="fas fa-long-arrow-alt-left"> GO BACK</i></a>

        <h1>New Video</h1>
        <form action="{{ route('video-list.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-3">
                <label>Video:</label>
                <input type="file" class="form-control" placeholder="Choose video" name="video[]" multiple>
                @error('video')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-flex justify-content-center btn__center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
