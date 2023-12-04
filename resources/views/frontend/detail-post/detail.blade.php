@extends('frontend.comment.comment')
@section('detail-post')
@section('post-title')


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

        @if ($project->donateinfo->sum('amount')>= $project->money)

        <div class="donate_link">
            <button disabled >DONATE</button>
        </div>
        @else
        <div class="donate_link">
            <a href="{{route('detail.donate')}}">DONATE</a>
            <a href="#">VOLUNTEER</a>
        </div>

        <div>
        </div>
        @endif

        {{-- @if(session('userInfo')) --}}
            <div class="comment-icon">
                <i class="fa-regular fa-comment"></i>
                <span>2</span>
            </div>
        {{-- @else --}}
            <div class="comment-access">
                <a href="#">ĐĂNG NHẬP ĐỂ BÌNH LUẬN</a>
            </div>
        {{-- @endif --}}

        <div class="comment-access">
            <a href="#">LOGIN TO LEAVE A COMMENT</a>
        </div>
        <div class="comment-icon">
            <i class="fa-regular fa-comment"></i>
            <span>2</span>
        </div>

    </div>
    @include('frontend/login/login')
    <script src="{{ asset('js/countdonate.js') }}"></script>

@endsection
