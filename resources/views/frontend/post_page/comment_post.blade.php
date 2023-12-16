    <div class="modal_inner-comment-post">
        <div class="post-header">

            <div class="comment_close-header-title">
                <div class="post_comment-header-title">
                    <h1>Bai cua {{ $post->user->name }}</h1>
                </div>
                <div class="close-icon-comment">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>

        </div>
        <div id="commnent_post_body" style="overflow-y: scroll">
            {{-- ! user-post --}}
            <div style="padding: 0; background-color:#f1ebeb; border-radius: 5px; ">
                <div class="post-uset-body"
                    style="text-align:left;
                            display: flex;
                            align-items:center;
                            ">
                    <a href="" class="avatar-user-post" style="margin: 10px 0 10px 50px; text-decoration: none;">
                        <img src="{{ asset('img/omg.jpeg') }}" alt="" width="50"
                            style=" width: 80px;clip-path: circle(30%);">
                    </a>
                    <div class="user-name-post">
                        <a href=""
                            style="margin-bottom: 0; font-size: 20px; font-weight: 500; text-decoration: none; color: black">{{ $post->user->name }}</a>
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

            </div>

            {{-- !comment --}}
            <div class="commnent_post_body" style="padding-top: 15px">
                @include('frontend.post_page.list_comment', [
                    'comments' => $post->comments,
                    'post' => $post,
                ])
            </div>
        </div>

        <form method="post" id="form_comment-texarena" data-id="{{ $post->id }}">
            @csrf
            <div id="input_comment-post-1">
                {{-- <input type="text" class="input_id-comment">
                <input type="text" class="input_post-id" value="{{ $post->id }}"> --}}
                <textarea class="content_comment" name="content" id="" cols="" rows="10" placeholder="comment.."></textarea>
                <button class="submit_comment-post btn_icon-submit">
                    <i class="fa-solid fa-location-arrow"></i>
                </button>
            </div>
        </form>

    </div>

    <script>
        //delete-comment
        $('.delete_comment-post-user').click(function() {
            var comment_id = $(this).data('id')
            var _csrf = '{{ csrf_token() }}';
            var elementComment = $('.comment_post')
            var _loginUrl = '{{ route('delete-comment', ':id') }}'.replace(':id', comment_id);
            
            $.ajax({
                type: 'DELETE',
                url: _loginUrl,
                data: {
                    _token: _csrf
                },
                success: function(data) {
                    // console.log(data);
                    if(data.status == 'success'){
                        $('#comment_parent-post[data-id="' + comment_id + '"]').remove();
                    }
                },
                error: function(error) {
                    alert(error);
                }
            });
        })
//edit comment
        // $('.edit_comment-post-user').click(function() {
        //     var comment_id = $(this).data('id')
        //     var _csrf = '{{ csrf_token() }}';
        //     var elementComment = $('.comment_post')
        //     var _loginUrl = '{{ route('edit-comment', ':id') }}'.replace(':id', comment_id);
            
        //     $.ajax({
        //         type: 'POST',
        //         url: _loginUrl,
        //         data: {
        //             _token: _csrf
        //         },
        //         success: function(data) {
        //             // console.log(data.comment.content);
        //             if(data.status == 'success'){
        //                 $('.content_comment').val(data.comment.content);
        //                 $('.input_id-comment').val(data.comment.id);
        //                 // $('.input_post-id').val(data.comment.post_id);
        //                 // $('.input_user-id').val(data.comment.user_id);
        //             }
        //         },
        //         error: function(error) {
        //             alert(error);
        //         }
        //     });
        // })


        //show edit comment
        $(document).ready(function() {
            $('.menu-edit-delete').each(function(index, element) {
                $(element).click(function() {
                    $('.edit_delete-post').eq(index).toggle('show')
                });
            })
        })


        // $('.modal_inner-comment-post').click(function(){

        //     $('.edit_delete-post').removeClass('show')
        // })


        //comment
        var _csrf = '{{ csrf_token() }}';
        $(document).ready(function() {
            $('#form_comment-texarena').submit(function(e) {
                e.preventDefault();
                post_id = $(this).data('id');
                // var comment_id = $('.input_id-comment').val();
                // var post_id = $('.input_post-id').val();

                var content = $('.content_comment').val();
                var _loginUrl = '{{ route('store-comment', ':id') }}'.replace(':id', post_id);

                if (content.trim() !== '') {
                    $.ajax({
                        type: 'POST',
                        url: _loginUrl,
                        data: {
                            content: content,
                            _token: _csrf
                        },
                        success: function(data) {
                            $('.commnent_post_body').html(data);
                            $('.content_comment').val('');
                        },
                        error: function(error) {
                            alert(error);
                        }
                    });
                } else {
                    alert('Please enter some content before submitting.');
                }

            });

            $('.content_comment').on('keydown', function(e) {
                if (e.keyCode == 13 && !e.shiftKey) {

                    e.preventDefault();

                    $('#form_comment-texarena').submit();
                }
            });
        });


        $(document).ready(function() {
            $('.btn_reply-submit').on('submit', function(e) {
                // $('.btn_reply-submit').submit(function(e) {
                e.preventDefault();
                // post_id = $(this).data('post-id');

                comment_id = $(this).data('id');

                var commentContent_id = '.content_reply-' + comment_id;

                var content = $(commentContent_id).val();

                var _loginUrl = '{{ route('store-comment_reply', $post->id) }}';
                if (content.trim() !== '') {
                    $.ajax({
                        type: 'POST',
                        url: _loginUrl,
                        data: {
                            content: content,
                            comment_id: comment_id,
                            _token: _csrf
                        },
                        success: function(data) {
                            var html = `<div id="comment_reply-post" id="comment_post" style="margin-left: -19px; margin-top: 10px;">
                                <a href="">
                                    <img width="60" id="avatar_user"
                                        src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNSLvtTEBqZcy2sk3ppPoGeE1gx0FmaiT-1g&usqp=CAU') }}"
                                        alt="">
                                </a>
                                <div class="comment_body">
                                    <div class="comment_background">
                                        <a href="">{{ auth()->user()->name }}</a>
                                        <p>${data[0].content}</p>
                                    </div>
                                    <p class="reply_comment_post">
                                        Reply
                                    </p>

                                    <form action="" style="display: none">
                                        <div id="input_reply-comment">
                                            <textarea name="" id="" cols="" rows="10" placeholder="comment.."></textarea>
                                            <div class="btn_icon-submit">
                                                <i class="fa-solid fa-location-arrow"></i>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>`


                            $('.replies-container[data-id="' + comment_id + '"]').append(html);
                            $('.content_reply-' + comment_id).val('');
                            $('.form_reply').slideUp();
                            // console.log(data[0].content);
                        },
                        error: function(error) {
                            alert(error);
                        }
                    });
                } else {
                    alert('Please enter some content before submitting.');
                }


            });


            // $('.content_reply').on('keydown', function(e) {
            //     if (e.keyCode === 13 && !e.shiftKey) {
            //         e.preventDefault();
            //         $('.btn_reply-submit').submit();
            //     }
            // })
        });

        //keycode
        $(document).ready(function() {
            $('.content_reply').on('keydown', function(e) {

                if (e.key === "Enter" && !e.shiftKey) {
                    e.preventDefault();
                    // post_id = $(this).data('post-id');

                    comment_id = $(this).data('id');

                    var commentContent_id = '.content_reply-' + comment_id;

                    var content = $(commentContent_id).val();

                    // var _loginUrl = '{{ route('store-comment_reply', ':id') }}'.replace(':id', post_id);
                    var _loginUrl = '{{ route('store-comment_reply', $post->id) }}';


                    $.ajax({
                        type: 'POST',
                        url: _loginUrl,
                        data: {
                            content: content,
                            comment_id: comment_id,
                            _token: _csrf
                        },
                        success: function(data) {
                            var html = `<div id="comment_reply-post" id="comment_post" style="margin-left: -19px; margin-top: 10px;">
                                <a href="">
                                    <img width="60" id="avatar_user"
                                        src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNSLvtTEBqZcy2sk3ppPoGeE1gx0FmaiT-1g&usqp=CAU') }}"
                                        alt="">
                                </a>
                                <div class="comment_body">
                                    <div class="comment_background">
                                        <a href="">{{ auth()->user()->name }}</a>
                                        <p>${data[0].content}</p>
                                    </div>
                                    <p class="reply_comment_post">
                                        Reply
                                    </p>

                                    <form action="" style="display: none">
                                        <div id="input_reply-comment">
                                            <textarea name="" id="" cols="" rows="10" placeholder="comment.."></textarea>
                                            <div class="btn_icon-submit">
                                                <i class="fa-solid fa-location-arrow"></i>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>`


                            $('.replies-container[data-id="' + comment_id + '"]').append(html);
                            $('.content_reply-' + comment_id).val('');
                            $('.form_reply').slideUp();
                            // console.log(data[0].content);
                        },
                        error: function(error) {
                            alert(error);
                        }
                    });
                }
                // $('.btn_reply-submit').submit(function(e) {

            });
        });





        $('.show_reply-form').click(function() {
            var comment_id = $(this).data('id');
            var formReply = '.form_reply-' + comment_id;
            $('.form_reply').slideUp();
            $(formReply).slideDown();
        })


        $('.content_reply').blur(function() {
            $('.form_reply').slideUp();
            // $(this).val('');
        })


        $(document).ready(function() {
            $('.modal_inner-comment-post').click(function(e) {
                e.stopPropagation();
            })
        })

        $(document).ready(function() {
            $('.close-icon-comment').click(function() {
                $('.modal-user-Comment-post').removeClass('show-comment');

            })
        })
        $(document).ready(function() {
            $('.modal-user-Comment-post').click(function() {
                $(this).removeClass('show-comment');
            })
        })
    </script>
