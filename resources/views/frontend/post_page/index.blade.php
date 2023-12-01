@extends('frontend.site')
@section('title', 'Post')
@section('main')
    <div class="container" style="margin-top: 100px; padding: 0">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8" style="padding: 0; border-radius: 5px; ">
                @foreach ($posts as $post)
                    <div style="padding: 0; background-color:#f1ebeb; border-radius: 5px; ">
                        <div class="post-uset-body"
                            style="text-align:left; 
                                display: flex; 
                                align-items:center;
                                ">
                            <a href='#' class="avatar-user-post" style="margin: 10px 0 10px 50px;">
                                <img src="{{ asset('img/omg.jpeg') }}" alt="" width="50"
                                    style=" width: 80px;clip-path: circle(30%);">
                            </a>
                            <div class="user-name-post">
                                <p style="margin-bottom: 0; font-size: 20px; font-weight: 500;">{{$post->user->name}}</p>
                                <p style="margin-bottom: 0; font-size: 15px; font-weight: 500;">{{$post->updated_at}}</p>

                            </div>


                        </div>
                        <div style="text-align:left; margin: 0 50px 20px 50px;">
                            <span>{{ $post->title }}</span>
                        </div>
                        @if($post->images->count()>0)
                            @foreach ($post->images as $image)
                                <div style="margin:10px 0 20px 0; text-align: center; padding-bottom: 20px">
                                    <img width="75%" height="400px"
                                        src="{{ asset($image->image) }}"
                                        alt="">
                                </div>
                            @endforeach
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
    @include("frontend/login/login");
@endsection
