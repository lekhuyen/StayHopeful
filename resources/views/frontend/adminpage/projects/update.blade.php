@extends('frontend.adminpage.index')
@section('admin_content')

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    {{-- css --}}

    <div class="container mt-3">
        <div class="btn__back">
            <a href="{{ route('projectAd.index') }}" class="btn__go_back"><i class="fa fa-long-arrow-left"> </i>GO BACK</a>
        </div>

        <h1>Update Project</h1>
        <form action="{{ route('projectAd.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-3">
                <label for="title">Title:</label>
                <input type="tetx" class="form-control" id="title" placeholder="Enter title" name="title"
                    value="{{ $project->title }}">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="description">Description:</label>
                <textarea type="tetx" class="form-control" id="description-project-update" placeholder="Enter description"
                    name="description">{{ $project->description }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="money">Goals:</label>
                <input type="number" class="form-control" id="money" placeholder="Enter money" name="money"
                    value="{{ $project->money }}">
                @error('money')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="money2">Received:</label>
                <input type="number" class="form-control" id="money2" placeholder="Enter money2" name="money2"
                    value="{{ $project->money2 }}">
                @error('money2')
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

            <div class="mb-3 mt-3">
                <label>Category:</label>
                <select name="category_id">
                    <option>Choose Category</option>
                    @foreach ($categories as $category)
                        @if ($category->id == $project->category_id)
                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-flex justify-content-center btn__center">
                <button type="submit" class="btn btn-primary submit-project">Submit</button>
            </div>
        </form>

        {{-- xoa ảnh con --}}
        <div class="mb-3 mt-3">
            <label>Current Image:</label>
            @if ($project->images->count() > 0)
                @foreach ($project->images as $image)
                    <div class="image-container" data-image-id="{{ $image->id }}">
                        <img src="{{ asset($image->image) }}" width="100" class="imageChild">
                        <button class="btn btn-danger delete-btn"
                            data-delete-url="{{ route('delete_ImgChild', $image->id) }}">x</button>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
@section('ckeditor')
    <script>
        ClassicEditor
            .create(document.querySelector('#description-project-update'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        $('.delete-btn').click(function(e) {
            e.preventDefault();
            var imageContainer = $(this).closest('.image-container')
            var imageId = imageContainer.data('image-id');

            $.ajax({
                type: 'GET',
                url: '{{ route('delete_ImgChild', ':id') }}'.replace(':id', imageId),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    imgId: imageId
                },
                success: function(data) {
                    imageContainer.remove();

                },
                error: function(error) {
                    alert(error);
                }
            })
        })
    })
</script>
