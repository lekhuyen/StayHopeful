@extends('frontend.adminpage.index')
@section('admin_content')

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    {{-- css --}}

    <div class="container mt-3 table-responsive">
        <div class="btn__back">
            <a href="{{ route('post.index') }}" class="btn__go_back"><i class="fa fa-long-arrow-left"> </i>GO BACK</a>
        </div>

        <table class="table table-hover">
            <h1>Unused User Post</h1>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr class="project-table">
                        <td>{{ $post->id }}</td>
                        <td>
                            <a style="cursor: pointer; text-decoration: none; color:cornflowerblue"
                                href="{{ route('auth.profile') }}">{{ $post->user->name }}</a>
                        </td>
                        <td>{{ $post->title }}</td>
                        <td>
                            @if ($post->images->count() > 0)
                                @foreach ($post->images as $image)
                                    <img src="{{ asset($image->image) }}" width="100" height="100px">
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if ($post->status == 1)
                                <span data-choduyet="{{ $post->id }}" class="badge rounded-pill bg-warning">Pending
                                </span>
                            @else
                                <span data-duyet="{{ $post->id }}" class="badge rounded-pill bg-success">Approved</span>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-secondary" href="{{ route('post-untrash', $post->id) }}"><i
                                    class="fa-solid fa-clock-rotate-left"></i></a>
                            <a class="btn btn-danger" href="{{ route('post-forcedelete', $post->id) }}"><i
                                    class="fa-solid fa-trash-can"></i></a>
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
