@extends('frontend.adminpage.index')
@section('admin_content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="{{ asset('general/general.css') }}">

<div class="container mt-3">
    <h1>About Us Page</h1>
    <br>
    <br>
    <h4>Main Page</h4>
    <a href="{{ route('aboutuspage.create_main') }}" class="btn btn-primary">Add Main sector</a>

    <table class="table table-dark mt-3" id="mainTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>View Description</th> <!-- Modified here -->
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mainPages as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>
                  <a href="{{ route('aboutuspage.detail', $item->id) }}" class="btn btn-primary">View Description</a>
                </td>
                <td>
                    @if ($item->images->count() > 0)
                        <img src="{{ asset($item->images[0]->url_image) }}" width="100" class="img-thumbnail" alt="Image"/>
                    @endif
                </td>
                <td>
                    <a href="{{ route('aboutuspage.edit_main', $item->id) }}" class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <form action="{{ route('aboutuspage.delete_main', $item->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this sector?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>

    <h4>About us Page</h4>
    <a href="{{ route('aboutuspage.create_aboutus') }}" class="btn btn-primary">Add About us sector</a>
    <table class="table table-dark mt-3" id="aboutUsTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>View Description</th> 
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aboutUsPages as $items)
                <tr>
                    <td>{{ $items->id }}</td>
                    <td>{{ $items->title }}</td>
                    <td>
                        <a href="{{ route('aboutuspage.detail', $items->id) }}" class="btn btn-primary">View Description</a>
                    </td>
                    <td>
                        @if ($items->images->count() > 0)
                            <img src="{{ asset($items->images[0]->url_image) }}" width="100" class="img-thumbnail" alt="Image"/>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('aboutuspage.edit_aboutus', $items->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('aboutuspage.delete_aboutus', $items->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this sector?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('frontend/login/login')
@endsection