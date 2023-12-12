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
                            <video id="" src="{{ asset($video->video) }}" controls width="200" height="100"></video>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('video-untrash', $video->id) }}">RESTORE</a>
                            <a class="btn btn-danger" href="{{ route('video-forcedelete', $video->id) }}">DELETE</a>
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
