@extends('frontend.adminpage.index')
@section('admin_content')
<div class="container mt-3">
    <table class="table table-hover">
        <thead>'
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>User</th>
                <th>Status</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr class="project-table">
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>
                        <a class="btn btn-primary" href="">{{ $post->user->name }}</a>
                    </td>
                    <td>
                        @if ($post->status == 1)
                            <span data-choduyet="{{ $post->id }}" class="btn btn-warning post-choduyet">Chờ
                                Duyệt</span>
                        @else
                            <span data-duyet="{{ $post->id }}" class="btn btn-primary post-daduyet">Đã Duyệt</span>
                        @endif
                    </td>
                    <td>
                        @if ($post->images->count() > 0)
                            @foreach ($post->images as $image)
                                <img src="{{ asset($image->image) }}" width="100" height="100px">
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('post-untrash',$post->id) }}">RESTORE</a>
                        <a class="btn btn-danger" href="{{ route('post-forcedelete', $post->id) }}">DELETE</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="text-align:center">Empty</td>
                </tr>

            @endforelse
        </tbody>
    </table>
</div>
@endsection
