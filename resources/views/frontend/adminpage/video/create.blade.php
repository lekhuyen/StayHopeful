@extends('frontend.adminpage.index')
@section('admin_content')

    <div class="container mt-3">
        <h2>Add Video</h2>
        <a class="btn btn-primary"href="{{route('video-list.index')}}">Video Gallery</a>
        <form action="{{route('video-list.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-3">
                <label>Video:</label>
                <input type="file" class="form-control" placeholder="Choose video" name="video[]" multiple>
                @error('video')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
