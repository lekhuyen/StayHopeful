@extends('frontend.adminpage.index')
@section('admin_content')
    <div class="container mt-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <h1>Trash</h1>
                @foreach ($images as $image)
                    <tr>
                        <td>
                            <img src="{{ asset($image->image) }}" alt="" width="100">
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('news-image-untrash', $image->id) }}">RESTORE</a>
                            <a class="btn btn-danger" href="{{ route('news-image-forcedelete', $image->id) }}">DELETE</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
