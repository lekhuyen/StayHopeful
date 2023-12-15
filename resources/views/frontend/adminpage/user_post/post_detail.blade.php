@extends('frontend.adminpage.index')
@section('admin_content')

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    {{-- css --}}

    <div class="btn__back">
        <a href="{{ route('post.index') }}" class="btn__go_back"><i class="fa fa-long-arrow-left"> </i>GO BACK</a>
    </div>

    <div class="container">
        <div class="table-responsive">
            <h1>User Post Detail</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            @if ($post->images->count() > 0)
                                @foreach ($post->images as $image)
                                    <div class="col-lg-4" style="margin-bottom: 15px;">
                                        <div>
                                            <img width="100%" src="{{ asset($image->image) }}" alt="">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if ($post->status == 1)
                                <span data-choduyet="{{ $post->id }}" class="post-choduyet"
                                    style="cursor: pointer"><span
                                        class="badge bg-warning rounded-pill">Pending</span></span>
                            @else
                                <span data-duyet="{{ $post->id }}" class="post-daduyet"><span
                                        class="badge bg-success rounded-pill">Approved</span></span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
