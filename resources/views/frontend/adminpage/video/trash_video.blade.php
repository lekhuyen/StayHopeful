@extends('frontend.adminpage.index')
@section('admin_content')
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">

    <div class="container mt-3">
        <div style="margin-bottom: 20px">
            <a href="{{ route('video-list.index') }}"><i class="fas fa-long-arrow-alt-left"> Go Back</i></a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Video</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <h1>Unused</h1>
                @forelse ($videos as $video)
                    <tr>
                        <td>
                            <video id="" src="{{ asset($video->video) }}" controls width="200"
                                height="100"></video>
                        </td>
                        <td>
                            <a class="btn btn-secondary" href="{{ route('video-untrash', $video->id) }}"><i
                                    class="fa-solid fa-clock-rotate-left"></i></a>
                            <a class="btn btn-danger" href="{{ route('video-forcedelete', $video->id) }}"><i
                                    class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" style="text-align:center">Empty</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
