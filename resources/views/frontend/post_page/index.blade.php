@extends('frontend.site')
@section('title', 'Post')
<link rel="stylesheet" href="{{ asset('profilecss/profile.css') }}">
@section('main')
    <div class="container" style="margin-top: 100px; padding: 0">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8" style="padding: 0; border-radius: 5px; ">
                {{-- * new post(user) --}}
                <div class="input_new-post">
                    <div type="text">New post..</div>
                </div>
                {{-- * new post(user) --}}
                @foreach ($posts as $post)
                    <div style="padding: 0; background-color:#f1ebeb; border-radius: 5px; ">
                        <div class="post-uset-body"
                            style="text-align:left;
                                display: flex;
                                align-items:center;
                                ">
                            <a href="{{route('user.profile', $post->user_id)}}" class="avatar-user-post" style="margin: 10px 0 10px 50px; text-decoration: none;">
                                <img src="{{ asset('img/omg.jpeg') }}" alt="" width="50"
                                    style=" width: 80px;clip-path: circle(30%);">
                            </a>
                            <div class="user-name-post">
                                <a href="{{route('user.profile', $post->user_id)}}" style="margin-bottom: 0; font-size: 20px; font-weight: 500; text-decoration: none; color: black">{{ $post->user->name }}</a>
                                <p style="margin-bottom: 0; font-size: 15px; font-weight: 500;">{{ $post->updated_at }}</p>

                            </div>


                        </div>
                        <div style="text-align:left; margin: 0 50px 20px 50px;">
                            <span>{{ $post->title }}</span>
                        </div>
                        @if ($post->images->count() > 0)
                            @foreach ($post->images as $image)
                                <div style="margin:10px 0 20px 0; text-align: center; padding-bottom: 20px">
                                    <img width="75%" height="400px" src="{{ asset($image->image) }}" alt="">
                                </div>
                            @endforeach
                        @endif
                        <div class="post_like-comment-post" style="margin-bottom:20px; cursor:pointer">

                            <div class="like_post-1" data-post-id="{{ $post->id }}" style="cursor: pointer">

                                {{-- ! phân biệt user đã like --}}
                                @if(auth()->user())
                                    @if ($post->likes->where('id_user', '=', auth()->user()->id)->first() != null)
                                        <div>
                                            <i class="fa-solid fa-heart like_icon" data-post-id="{{ $post->id }}"></i>
                                        </div>
                                    @else
                                        <div>
                                            <i class="fa-solid fa-heart" data-post-id="{{ $post->id }}"></i>
                                        </div>
                                    @endif
                                @endif
                                <div class="like_count">
                                    <span class="count_like" data-post-id="{{ $post->id }}">{{ $post->likes->count() == 0 ? '' : $post->likes->count()}}</span>
                                </div>
                            </div>

                            <div id="comment_post" data-id="{{ $post->id }}">
                                <i class="fa-regular fa-comment"></i>
                                <span>Comment</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>

    @include('frontend/login/login')
    @include('frontend/profile/post_form')
    @include('frontend/profile/popup_profile')



    {{-- comment --}}
    <div class="modal-user-Comment-post">
        {{-- <div class="modal_inner-comment-post"></div> --}}
    </div>

@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    var post_id;


//get- post
    $(document).on('click', '#comment_post', function() {
        post_id = $(this).data('id');
        $('.modal-user-Comment-post').addClass('show-comment');
        var _loginUrl = '{{ route('show_comment-post',':id') }}'.replace(':id', post_id);
        
        $.ajax({
            url: _loginUrl,
            type: 'GET',
            data: {
                post_id: post_id,
            },
            success: function(data) {
                if (data.status == 'error') {
                    alert(data.message);
                } else {
                    $('.modal-user-Comment-post').html(data);
                }
                
            }

        })

    })

//like
    $(document).ready(function() {
        $('.like_post-1').each(function() {
            var postId = $(this).data('post-id');
            var likeButton = $('.like_post-1[data-post-id="' + postId + '"]');
            var countElement = $('.count_like[data-post-id="' + postId + '"]');
            var like_icons = $('.like_icon[data-post-id="' + postId + '"]');
            var iconContainer = $('.icon_container[data-post-id="' + postId + '"]');

            $(document).on('click', '.like_post-1[data-post-id="' + postId + '"]', function(e) {
                e.preventDefault();
                var post_id = $(this).data('post-id');
                var _csrf = '{{ csrf_token() }}';
                var _loginUrl = '{{ route('post.like') }}';

                $.ajax({
                    url: _loginUrl,
                    type: 'POST',
                    data: {
                        post_id: post_id,
                        _token: _csrf
                    },
                    success: function(data) {
                        if (data.like_user === 1) {
                            // like_icons.addClass('show');
                            likeButton.addClass('active');
                        } else {
                            // like_icons.addClass('show');
                            like_icons.addClass('dislike_icon_color');
                            likeButton.removeClass('active');
                        }
                        if (data.count == 0) {
                            countElement.text('');
                        } else {
                            countElement.text(data.count);
                        }
                    }
                });
            });
        });
    });
</script>
