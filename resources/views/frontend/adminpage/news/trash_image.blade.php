@extends('frontend.adminpage.index')
@section('admin_content')

{{-- css --}}
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
{{-- css --}}

    <div class="container mt-3">

        <div class="btn__back">
            <a href="{{ route('news.index') }}" class="btn__go_back"><i class="fas fa-long-arrow-left"> </i>GO BACK</a>
        </div>

        <h1>Unused News Image</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Image Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($images as $image)
                    <tr>
                        <td>
                            <img src="{{ asset($image->image) }}" alt="" width="100">
                        </td>
                        <td>
                            <a class="btn btn-secondary" href="{{ route('news-image-untrash', $image->id) }}"><i
                                    class="fa-solid fa-clock-rotate-left"></i></a>
                            <a class="btn btn-danger" href="{{ route('news-image-forcedelete', $image->id) }}"><i
                                    class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
