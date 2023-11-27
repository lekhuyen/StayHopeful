@extends('frontend.adminpage.index')
@section('admin_content')
    <div class="container mt-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Video</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <h1>Trash</h1>
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
                        <td colspan="2" style="text-align:center">Trash emtry</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
