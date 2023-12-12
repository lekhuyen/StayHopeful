@extends('frontend.adminpage.index')
@section('admin_content')

{{-- css --}}
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
{{-- css --}}

    <div class="container mt-3">
        <a href="{{ route('news.index') }}"><i class="fas fa-long-arrow-alt-left"> GO BACK</i></a>
        <h1>Create News</h1>
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-3">
                <label for="title">Title:</label>
                <input type="tetx" class="form-control" id="title" placeholder="Enter title" name="title">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="description">Description:</label>
                <textarea type="tetx" class="form-control" id="description-project-create" placeholder="Enter description"
                    name="description"></textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label>Image:</label>
                <input type="file" class="form-control" id="image" placeholder="Choose image" name="image[]"
                    multiple>
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-flex justify-content-center btn__center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection

@section('ckeditor')
    <script>
        ClassicEditor
            .create(document.querySelector('#description-project-create'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
