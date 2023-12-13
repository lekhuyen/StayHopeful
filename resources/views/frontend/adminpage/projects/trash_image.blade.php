@extends('frontend.adminpage.index')
@section('admin_content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    {{-- css --}}

    <div class="container mt-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Project Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <div style="margin-bottom: 20px">
                    <a href="{{ route('projectAd.index') }}"><i class="fas fa-long-arrow-alt-left"> </i>GO BACK</a>
                </div>
                <h1>Unused</h1>
                @foreach ($images as $image)
                    <tr>
                        <td>
                            <img src="{{ asset($image->image) }}" alt="" width="100">
                        </td>
                        <td>
                            <a class="btn btn-secondary" href="{{ route('projectAd-untrash', $image->id) }}"><i
                                    class="fa-solid fa-clock-rotate-left"></i></a>
                            <a class="btn btn-danger" href="{{ route('projectAd-forcedelete', $image->id) }}"><i
                                    class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
