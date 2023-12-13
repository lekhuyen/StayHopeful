@extends('frontend.comment.comment')

{{-- css --}}
<link rel="stylesheet" href="{{asset("volunteercss/blog_detail.css")}}">
{{-- css --}}

@section('detail-post')
@section('post-title')
    <div class="container-fluid margin-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="display: flex; align-items:center">
                    <marquee>
                        <span style="font-size: 20px; margin-left: 20px; color: black;">
                            Total Donate:
                        </span>
                        <span style="font-size: 20px; margin-left: 6px; color: black; vertical-align: inherit">
                            {{ number_format($project->donateinfo->sum('amount'), 2) }}
                        </span>

                        @foreach ($project->donateinfo as $donation)
                            <span style="font-size: 20px; margin-left: 20px; color: black;">
                                Mr. {{ $donation->name }}:
                            </span>
                            <span style="font-size: 20px; margin-left: 6px; color: black; vertical-align: inherit">
                                {{ $donation->amount }}
                            </span>
                        @endforeach
                    </marquee>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 post-title">
                <h2>{{ $project->title }}</h2>
            </div>
        </div>
    @endsection


    <div class="col-lg-8 post-detail-1">

        <span>{!! $project->description !!}</span>
        @foreach ($project->images as $image)
            <img src="{{ asset($image->image) }}" alt="">
        @endforeach

        @if ($project->donateinfo->sum('amount') >= $project->money)
            <div class="donate_link">
                <button disabled>DONATE</button>
            </div>
        @else
            <div class="donate_link">
                <a href="{{ route('detail.donate') }}">DONATE</a>
                @if ($checkUserProject)
                    <a href="" class= "btn_volunter_disabled">VOLUNTEER</a>
                @else
                    <a href="{{ route('volunteer.create') }}" class="btn_volunter">VOLUNTEER</a>
                @endif
            </div>
        @endif

        {{-- @if (session('userInfo')) --}}
        {{-- @else --}}
        <div class="comment-icon">
            <i class="fa-regular fa-comment"></i>
            <span>2</span>
        </div>
        <div class="comment-access">
            <a href="#">ĐĂNG NHẬP ĐỂ BÌNH LUẬN</a>
        </div>
        {{-- @endif --}}

        <div class="comment-access">
            <a href="#">LOGIN TO LEAVE A COMMENT</a>
        </div>


    </div>
    @include('frontend/login/login')
    @include('frontend/profile/popup_profile')

@endsection
