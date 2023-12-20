@extends('frontend.site')
@section('title', 'Post')
{{-- css --}}
<link rel="stylesheet" href="{{ asset('profilecss/profile.css') }}">
{{-- css --}}
@section('main')
    <div class="container" style="margin-top: 80px; padding: 0">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8" style="padding: 0; border-radius: 5px; ">
                {{-- * create new post(user) --}}
                <div class="input_new-post">
                    <div type="text">Create new post</div>
                </div>
                {{-- * new post(user) --}}
                @foreach ($posts as $post)
                    <div class="user__post">
                        <div class="post-uset-body"
                            style="text-align:left;
                                display: flex;
                                align-items:center;
                                ">
                            <a href="{{ route('user.profile', $post->user_id) }}" class="avatar-user-post"
                                style="margin: 10px 0 10px 50px; text-decoration: none;">
                                {{-- <img src="{{ asset('img/omg.jpeg') }}" alt="" width="50"
                                    style=" width: 80px;clip-path: circle(30%);"> --}}
                                @php
                                    $check = false;
                                @endphp
                                @foreach ($user as $item)
                                    @if (!$check)
                                        @if ($post->user_id == $item->id && $item->avatar != null)
                                            <img src="{{ asset($post->user->avatar) }}" alt="" width="50"
                                                style=" width: 80px;clip-path: circle(30%);">
                                                @php
                                                $check = true;
                                            @endphp
                                        @elseif ($post->user_id == $item->id && $item->avatar == null)
                                            <img src="{{ asset('img/humanicon.png') }}" alt="" width="50"
                                            style=" width: 80px;clip-path: circle(30%);">
                                            @php
                                                $check = true;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                            </a>
                            <div class="user-name-post">
                                <a href="{{ route('user.profile', $post->user_id) }}"
                                    class="user__name">{{ $post->user->name }}</a>
                                <p style="margin-bottom: 0; font-size: 15px; font-weight: 500;">{{ $post->updated_at }}</p>
                            </div>

                            {{-- !edit-delete-post --}}
                            @if($post->user->id == auth()->user()->id)
                                <div class="edit__post-user">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </div>
                            

                            <div class="edit-post-user-1" id="edit-post-user" style="top: 60px; ">
                                <a class="edit_form-post-1 edit_form-post-user"data-id="{{ $post->id }} ">Edit</a>
                                <a class="delete_form-post-1"data-id="{{ $post->id }} ">Delete</a>
                            </div>
                            @endif
                            {{-- !edit-delete-post --}}
                        </div>
                        
                        <div class="post__title">
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

                                {{-- ! differentiate user already liked the post --}}
                                @if (auth()->user())
                                    @if ($post->likes->where('id_user', '=', auth()->user()->id)->first() != null)
                                        <div>
                                            <i class="fa-solid fa-heart like_icon" data-post-id="{{ $post->id }}"
                                                style="margin-right: 3px"></i>
                                        </div>
                                    @else
                                        <div>
                                            <i class="fa-solid fa-heart" data-post-id="{{ $post->id }}"
                                                style="margin-right: 3px"></i>
                                        </div>
                                    @endif
                                @endif
                                <div class="like_count" style="">
                                    <span class="count_like"
                                        data-post-id="{{ $post->id }}">{{ $post->likes->count() == 0 ? '' : $post->likes->count() }}</span>
                                </div>
                            </div>

                            <div id="comment_post" data-id="{{ $post->id }}">
                                {{-- <i class="fa-regular fa-comment"></i> --}}
                                <span>
                                    {{ $post->comments->count() + $post->replies->count() == 0 ? '' : $post->comments->count() + $post->replies->count() }}
                                    Comment
                                </span>
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

{{-- !edit form --}}
    @include('frontend.post_page.form_post')

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
        var _loginUrl = '{{ route('show_comment-post', ':id') }}'.replace(':id', post_id);

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
