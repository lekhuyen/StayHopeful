@extends('frontend.adminpage.index')
@section('admin_content')

    <div class="container mt-3">
        <h2>Update Project</h2>
        <a class="btn btn-primary"href="{{ route('video-list.index') }}">List Video</a>
        <form action="{{route('video-list.update',$videos->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-3">
                <label>Video:</label>
                <input type="file" class="form-control" placeholder="Choose image" name="video[]"
                    multiple>
                @error('video')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary submit-project">Submit</button>
        </form>

        {{-- xoa video con --}}
        <div class="mb-3 mt-3">
            <label>Current Image:</label>
            @if ($videos->count() > 0)
                <div class="image-container" data-image-id="{{$videos->id}}">
                    <video src="{{ asset($videos->video) }}" controls width="200" height="100"></video>
                </div>
            @endif
        </div>
    </div>
@endsection

