@extends('frontend.adminpage.index')
@section('admin_content')

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    {{-- css --}}

    <div class="container mt-3">
        <div class="row">

            <div class="btn__back">
                <a href="{{ route('post.index') }}" class="btn__go_back"><i class="fas fa-long-arrow-alt-left"> </i>GO BACK</a>
            </div>

            <h1>User Post Detail</h1>
            <div class="col-lg-12" style="margin-top: 30px;">
                <h4>Content:</h4>
                <span>{{ $post->title }}</span>
            </div>
        </div>

        <div class="row" style="margin-top: 15px; padding-bottom: 30px;">
            <h4>Image:</h4>
            @if ($post->images->count() > 0)
                @foreach ($post->images as $image)
                    <div class="col-lg-4" style="margin-bottom: 15px;">
                        <div>
                            <img width="100%" src="{{ asset($image->image) }}" alt="">
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
@endsection
