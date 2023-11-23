@extends('frontend.adminpage.index')
@section('admin_content')

    <div class="container mt-3">
        <h2>Add Category</h2>
        <a class="btn btn-primary"href="{{route('project.index')}}">Category List</a>
        <form action="{{route('project.store')}}" method="POST">
            @csrf
            <div class="mb-3 mt-3">
                <label for="title">Title:</label>
                <input type="tetx" class="form-control" id="title" placeholder="Enter title" name="title">
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="description">Description:</label>
                <textarea type="tetx" class="form-control" id="description-project" placeholder="Enter description" name="description"></textarea>
                @error('description')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="money"> Cần huy động:</label>
                <input type="number" class="form-control" id="money" placeholder="Enter money" name="money">
                @error('money')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="money2"> Đã góp được :</label>
                <input type="number" class="form-control" id="money2" placeholder="Enter money2" name="money2">
                @error('money2')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label>Status :</label>
                <select name="status">
                    <option>Choose Status</option>
                    <option value="1">Finish</option>
                    <option value="2">Unfinished</option>
                </select>
                @error('status')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label>Image:</label>
                <input type="file" class="form-control" id="image" placeholder="Choose image" name="image[]" multiple>
                @error('image')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label>Category:</label>
                <select name="category_id">
                    <option>Choose Category</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>                 
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        CKEDITOR.replace('description-project')
    </script>
@endsection
    
