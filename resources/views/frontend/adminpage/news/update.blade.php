@extends('frontend.adminpage.index')
@section('admin_content')

    <div class="container mt-3">
        <h2>Update Project</h2>
        <a class="btn btn-primary"href="{{ route('news.index') }}">News List</a>
        <form action="{{route('news.update',$news->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-3">
                <label for="title">Title:</label>
                <input type="tetx" class="form-control" id="title" placeholder="Enter title" name="title"
                    value="{{ $news->title }}">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="description">Description:</label>
                <textarea type="tetx" class="form-control" id="description-project-update" placeholder="Enter description"
                    name="description">{{ $news->description }}</textarea>
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

            <button type="submit" class="btn btn-primary submit-project">Submit</button>
        </form>

        {{-- xoa ảnh con --}}
        <div class="mb-3 mt-3">
            <label>Current Image:</label>
            @if ($news->images->count() > 0)
                @foreach ($news->images as $image)
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
            .create( document.querySelector('#description-project-update'))
            .catch( error => {
                    console.error( error );
            } );
</script>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function(){
        $('.delete-btn').click(function(e){
            e.preventDefault();
            var imageContainer = $(this).closest('.image-container')
            var imageId = imageContainer.data('image-id');

            $.ajax({
                type:'GET',
                url: '{{ route('delete_newsImgChild', ':id') }}'.replace(':id', imageId),
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    imgId:imageId
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
