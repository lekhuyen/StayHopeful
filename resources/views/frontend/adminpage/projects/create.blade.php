@extends('frontend.adminpage.index')
@section('admin_content')

{{-- css --}}
<link rel="stylesheet" href="{{ asset('general/general.css') }}">
{{-- css --}}

    <div class="container mt-3">
        <a href="{{ route('projectAd.index') }}"><i class="fas fa-long-arrow-alt-left"> GO BACK</i></a>
        <h1>New Project</h1>
        <form action="{{ route('projectAd.store') }}" method="POST" enctype="multipart/form-data">
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
                <label for="money"> Goals:</label>
                <input type="number" class="form-control" id="money" placeholder="Enter goals" name="money">
                @error('money')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="money2"> Received:</label>
                <input type="number" class="form-control" id="money2" placeholder="Enter received amount"
                    name="money2">
                @error('money2')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label>Status :</label>
                <select name="status">
                    <option>Choose</option>
                    <option value="1">Finish</option>
                    <option value="0">Unfinished</option>
                </select>
                @error('status')
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
                    <option>Choose</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
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
