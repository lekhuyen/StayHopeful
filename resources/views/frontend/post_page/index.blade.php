@extends('frontend.site')
@section('title', 'Post')
<link rel="stylesheet" href="{{asset('profilecss/profile.css')}}">
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
                        <div id="comment_post" data-id="{{ $post->id }}" style="margin-bottom:20px; cursor:pointer">
                            <i class="fa-regular fa-comment"></i>
                            <span>Comment</span>
                        </div>
                    </div>
                    
                @endforeach
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>


    {{-- comment --}}
    <div class="modal-user-Comment-post" style="display:none">
        <div class="modal_inner-comment-post">
            <div class="post-header">
    
                <div class="comment_close-header-title">
                    <div class="post_comment-header-title">
                        <h1>Bai cua</h1>
                    </div>
                    <div class="close-icon-comment">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>
    
            </div>
            <div class="comment_post">
                <a href="">
                    <img width="60" src="{{asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNSLvtTEBqZcy2sk3ppPoGeE1gx0FmaiT-1g&usqp=CAU')}}" alt="">
                </a>
                <div class="comment_body">
                    <a href="">User Name</a>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, nesciunt. Beatae facilis, ipsa animi dolorem at soluta corporis atque 
                        expedita repudiandae voluptates pariatur, odit laborum. Quos voluptatum possimus sed vitae!
                    </p>
                    <p class="reply_comment_post">
                        Reply
                    </p>

                    <form action="" style="display: none">
                        {{-- <input type="text"> --}}
                        <div id="input_reply-comment">
                            <textarea name="" id="" cols="" rows="10" placeholder="comment.."></textarea>
                            <div id="btn_icon-submit">
                                <i class="fa-solid fa-location-arrow"></i>
                            </div>
                        </div>
                    </form>

                    {{-- tra loi bL --}}
                    <div class="comment_post">
                        <a href="">
                            <img width="60" src="{{asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNSLvtTEBqZcy2sk3ppPoGeE1gx0FmaiT-1g&usqp=CAU')}}" alt="">
                        </a>
                        <div class="comment_body">
                            <a href="">User Name</a>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, nesciunt. Beatae facilis, ipsa animi dolorem at soluta corporis atque 
                                expedita repudiandae voluptates pariatur, odit laborum. Quos voluptatum possimus sed vitae!
                            </p>
                            <p class="reply_comment_post">
                                Reply
                            </p>
        
                            <form action="" style="display: none">
                                {{-- <input type="text"> --}}
                                <div id="input_reply-comment">
                                    <textarea name="" id="" cols="" rows="10" placeholder="comment.."></textarea>
                                    <div id="btn_icon-submit">
                                        <i class="fa-solid fa-location-arrow"></i>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <form action="">
                {{-- <input type="text"> --}}
                <div id="input_comment-post">
                    <textarea name="" id="" cols="" rows="10" placeholder="comment.."></textarea>
                    <div class="submit_comment-post" id="btn_icon-submit">
                        <i class="fa-solid fa-location-arrow"></i>
                    </div>
                </div>
            </form>
        
            
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        ('#comment_post').click(function(){
        // $('.modal-user-Comment-post').addClass('show')
        // var post_id = $(this).data('id');
        alert('post_id');
    })
    })
</script>