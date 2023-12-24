    <div class="modal_inner-comment-post">
        <div class="post-header">
            <div class="comment_close-header-title">
                <div class="post_comment-header-title">
                    <h1>Post of {{ $post->user->name }}</h1>
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
                        <a href=""
                            style="margin-bottom: 0; font-size: 20px; font-weight: 500; text-decoration: none; color: black">{{ $post->user->name }}</a>
                        <p style="margin-bottom: 0; font-size: 15px; font-weight: 500;">{{ $post->updated_at }}</p>

                    </div>

                </div>

                @if ($post->images->count() == 0)
                    <div style="text-align:left; margin: 20px 50px 20px 50px; padding-bottom: 20px; height: 100%; display: flex; align-items: center; justify-content: center; transform: translateY(-10%);">
                        <span style="font-size:20px">{{ $post->title }}</span>
                    </div>
                @else
                    <div style="text-align:left; margin: 20px 50px 20px 50px; padding-bottom: 20px">
                        <span>{{ $post->title }}</span>
                    </div>
                    @if ($post->images->count() > 0)
                        @foreach ($post->images as $image)
                            <div style="margin:10px 0 20px 0; text-align: center; padding-bottom: 20px">
                                <img width="75%" height="400px" src="{{ asset($image->image) }}" alt="">
                            </div>
                        @endforeach
                    @endif
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
                <textarea class="content_comment" name="content" id="" cols="" rows="10" placeholder="comment.."></textarea>
                <button class="submit_comment-post btn_icon-submit">
                    <i class="fa-solid fa-location-arrow"></i>
                </button>
            </div>
        </form>

    </div>

    <script>
        //xem them reply
        // $(document).ready(function() {
        //     var soReply = 0;
        //     $('.xem_them').on('click',function(e){
        //         e.stopPropagation();
        //         var comment_id = $(this).data('id');
        //         soReply+=1;
        //         var _loginUrl = '{{ route('more-reply', ':id') }}'.replace(':id', comment_id);
        //         $.ajax({
        //         type: 'GET',
        //         url: _loginUrl,
        //         data: {
        //             soReply:soReply,
        //             comment_id:comment_id
        //         },
        //         success: function(data) {
        //             // $('.replies-container[data-id="' + comment_id + '"]').append(html);
        //             // console.log(data);
        //             $('.more_reply[data-id="'+comment_id+'"]').append(data);

        //         },
        //         error: function(error) {
        //             alert(error);
        //         }
        //     });
        //     })
        // });


        //report-commet
        $('.report__comment').click(function() {
            var comment_id = $(this).data('id')
            var _csrf = '{{ csrf_token() }}';
            var _loginUrl = '{{ route('report-comment', ':id') }}'.replace(':id', comment_id);
            $.ajax({
                type: 'POST',
                url: _loginUrl,
                data: {
                    _token: _csrf
                },
                success: function(data) {
                    if(data.status == 'success'){
                        alert('Report was successfully')
                    }
                    
                },
                error: function(error) {
                    alert(error);
                }
            });
        })

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
                    if (data.status == 'success') {
                        $('#comment_parent-post[data-id="' + comment_id + '"]').remove();
                    }
                },
                error: function(error) {
                    alert(error);
                }
            });
        })

        //delete-comment-reply
        $('.delete_comment-reply-post-user').click(function() {
            var reply_id = $(this).data('id')
            var _csrf = '{{ csrf_token() }}';
            var _loginUrl = '{{ route('delete-reply', ':id') }}'.replace(':id', reply_id);

            $.ajax({
                type: 'DELETE',
                url: _loginUrl,
                data: {
                    _token: _csrf
                },
                success: function(data) {
                    // console.log(data);
                    if (data.status == 'success') {
                        $('.reply_comment-post[data-id="' + reply_id + '"]').remove();
                    }
                },
                error: function(error) {
                    alert(error);
                }
            });
        })

        //cancel
        $('.cancel_edit-comment').click(function() {
            var comment_id = $(this).data('id')
            $('.edit_form-comment[data-id="' + comment_id + '"]').hide();
            $('.comment_background[data-id="' + comment_id + '"]').show();
            $('.edit_delete-post[data-id="' + comment_id + '"]').hide();

        })
        //cancel-reply
        $('.cancel_edit-comment-reply').click(function() {
            var reply_id = $(this).data('id')
            $('.show_form-edit-reply[data-id="' + reply_id + '"]').hide();
            $('.comment_background[data-id="' + reply_id + '"]').show();
            $('.edit_delete-post[data-id="' + reply_id + '"]').hide();

        })

        //edit comment-reply
        $('.edit_comment-reply-post-user').click(function(e) {
            e.stopPropagation();
            var reply_id = $(this).data('id')
            $('.show_form-edit-reply[data-id="' + reply_id + '"]').show();
            $('.comment_background[data-id="' + reply_id + '"]').hide();
            var _csrf = '{{ csrf_token() }}';
            var elementComment = $('.comment_post')
            var _loginUrl = '{{ route('edit-reply', ':id') }}'.replace(':id', reply_id);

            $.ajax({
                type: 'POST',
                url: _loginUrl,
                data: {
                    _token: _csrf
                },
                success: function(data) {
                    if (data.status == 'success') {
                        $('.content_reply').val(data.reply.content);
                    }
                },
                error: function(error) {
                    alert(error);
                }
            });
        })

        $(document).ready(function() {

            $('.btn_edit-reply').submit(function(e) {
                e.preventDefault();
                reply_id = $(this).data('id');


                var content = $('.content_reply[data-id="' + reply_id + '"]').val();
                var _loginUrl = '{{ route('update-comment-reply-post', ':id') }}'.replace(':id', reply_id);

                if (content.trim() !== '') {
                    $.ajax({
                        type: 'POST',
                        url: _loginUrl,
                        data: {
                            content: content,
                            _token: _csrf
                        },
                        success: function(data) {
                            var html = `<p class="comment_reply-content">${data.content}</p>`
                            $('#comment_reply-content-user-post[data-id="' + reply_id + '"]')
                                .html(html)


                            $('.show_form-edit-reply[data-id="' + reply_id + '"]').hide();
                            $('.comment_background[data-id="' + reply_id + '"]').show();
                            $('.edit_delete-post').hide();


                        },
                        error: function(error) {
                            alert(error);
                        }
                    });
                } else {
                    alert('Please enter some content before submitting.');
                }

            });

            $('.content_reply').on('keydown', function(e) {
                reply_id = $(this).data('id');
                if (e.keyCode == 13 && !e.shiftKey) {

                    e.preventDefault();

                    $('.btn_edit-reply[data-id="' + reply_id + '"]').submit();
                }
            });
        });



        //edit comment ----------
        $('.edit_comment-post-user').click(function(e) {
            e.stopPropagation();
            var comment_id = $(this).data('id')
            $('.edit_form-comment[data-id="' + comment_id + '"]').show();
            $('.comment_background[data-id="' + comment_id + '"]').hide();
            var _csrf = '{{ csrf_token() }}';
            var elementComment = $('.comment_post')
            var _loginUrl = '{{ route('edit-comment', ':id') }}'.replace(':id', comment_id);

            $.ajax({
                type: 'POST',
                url: _loginUrl,
                data: {
                    _token: _csrf
                },
                success: function(data) {
                    if (data.status == 'success') {
                        $('.content_edit-comment').val(data.comment.content);
                    }
                },
                error: function(error) {
                    alert(error);
                }
            });
        })

        $(document).ready(function() {

            $('.edit_form-comment').submit(function(e) {
                e.preventDefault();
                comment_id = $(this).data('id');


                var content = $('.content-edit-comment[data-id="' + comment_id + '"]').val();
                var _loginUrl = '{{ route('update-comment-post', ':id') }}'.replace(':id', comment_id);

                if (content.trim() !== '') {
                    $.ajax({
                        type: 'POST',
                        url: _loginUrl,
                        data: {
                            content: content,
                            _token: _csrf
                        },
                        success: function(data) {
                            var html = `<p class="comment_content">${data.content}</p>`
                            $('#comment_content-user-post[data-id="' + comment_id + '"]').html(
                                html)

                            $('.edit_form-comment[data-id="' + comment_id + '"]').hide();
                            $('.comment_background[data-id="' + comment_id + '"]').show();

                            $('.edit_delete-post').hide();


                        },
                        error: function(error) {
                            alert(error);
                        }
                    });
                } else {
                    alert('Please enter some content before submitting.');
                }

            });

            $('.content-edit-comment').on('keydown', function(e) {
                comment_id = $(this).data('id');
                if (e.keyCode == 13 && !e.shiftKey) {

                    e.preventDefault();

                    $('.edit_form-comment[data-id="' + comment_id + '"]').submit();
                }
            });
        });
        // ----------------------

        //show edit comment
        $('.menu-edit-delete').click(function(e) {
            e.stopPropagation();
        })
        $(document).ready(function() {
            $('.menu-edit-delete').each(function(index, element) {
                $(element).click(function() {
                    $('.edit_delete-post').eq(index).toggle('show')
                });
            })
        })

        //comment
        var _csrf = '{{ csrf_token() }}';
        $(document).ready(function() {
            $('#form_comment-texarena').submit(function(e) {
                e.preventDefault();
                post_id = $(this).data('id');

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

        // reply
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
                            var html = `<div id="comment_reply-post comment_post" class="reply_comment-post" data-id="${ data[0].id }" style="margin-left: -19px; margin-top: 10px; display: flex">
                                        <a href="">
                                            <img width="60" id="avatar_user"
                                                src="{{ asset(auth()->user()->avatar) }}"
                                                alt="">
                                            
                                        </a>
                                        <div class="comment_body">
                                            <div class="comment_background"  data-id="${ data[0].id }">
                                                <div style="min-width: 100px">
                                                    <a href="">{{ auth()->user()->name }}</a>
                                                </div>
                                                <div style="width: 100%" id="comment_reply-content-user-post"  data-id="${ data[0].id }">
                                                    <p class="comment_reply-content">${data[0].content}</p>
                                                </div>

                                                
                                                <div class="delete_comment-post delete_comment-reply-post">
                                                    <div class="menu-edit-delete">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </div>
                                                    <div class="edit_delete-post" style="display: none"  data-id="${ data[0].id }">
                                                        <p class="edit_comment-reply-post-user"  data-id="${ data[0].id }">Edit</p>
                                                        <p class="delete_comment-reply-post-user"  data-id="${ data[0].id }">Delete</p>
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                            
                                            <form style="display: none; margin-bottom: 10px;" class="form_reply-${ data[0].id } form_reply btn_reply-submit btn_edit-reply show_form-edit-reply"  data-id="${ data[0].id }">
                                                <div id="input_reply-comment" style="width: 90%;">
                                                    <textarea style="padding: 10px 50px 10px 20px;" cols="" rows="10" name="content" placeholder="comment.." class="content_reply-${ data[0].id } content_reply"  data-id="${ data[0].id }"></textarea>
                                                    <button class="btn_icon-submit btn_icon-submit-reply" data-id="${ data[0].id }">
                                                        <i class="fa-solid fa-location-arrow"></i>
                                                    </button>
                                                </div>
                                                <p class="cancel_edit-comment-reply"  data-id="${ data[0].id }" style="cursor: pointer">Cancel</p>
                                            </form>

                                            
                                        </div>
                                    </div>`


                            $('.replies-container[data-id="' + comment_id + '"]').append(html);
                            $('.content_reply-' + comment_id).val('');
                            $('.form_reply').slideUp();

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
                                var html = `<div id="comment_reply-post comment_post" class="reply_comment-post" data-id="${ data[0].id }" style="margin-left: -19px; margin-top: 10px; display: flex">
                                        <a href="">
                                            <img width="60" id="avatar_user"
                                                src="{{ asset(auth()->user()->avatar) }}"
                                                alt="">
                                            
                                        </a>
                                        <div class="comment_body">
                                            <div class="comment_background"  data-id="${ data[0].id }">
                                                <div style="min-width: 100px">
                                                    <a href="">{{ auth()->user()->name }}</a>
                                                </div>
                                                <div style="width: 100%" id="comment_reply-content-user-post"  data-id="${ data[0].id }">
                                                    <p class="comment_reply-content">${data[0].content}</p>
                                                </div>

                                                
                                                <div class="delete_comment-post delete_comment-reply-post">
                                                    <div class="menu-edit-delete">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </div>
                                                    <div class="edit_delete-post" style="display: none"  data-id="${ data[0].id }">
                                                        <p class="edit_comment-reply-post-user"  data-id="${ data[0].id }">Edit</p>
                                                        <p class="delete_comment-reply-post-user"  data-id="${ data[0].id }">Delete</p>
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                            
                                            <form style="display: none; margin-bottom: 10px;" class="form_reply-${ data[0].id } form_reply btn_reply-submit btn_edit-reply show_form-edit-reply"  data-id="${ data[0].id }">
                                                <div id="input_reply-comment" style="width: 90%;">
                                                    <textarea style="padding: 10px 50px 10px 20px;" cols="" rows="10" name="content" placeholder="comment.." class="content_reply-${ data[0].id } content_reply"  data-id="${ data[0].id }"></textarea>
                                                    <button class="btn_icon-submit btn_icon-submit-reply" data-id="${ data[0].id }">
                                                        <i class="fa-solid fa-location-arrow"></i>
                                                    </button>
                                                </div>
                                                <p class="cancel_edit-comment-reply"  data-id="${ data[0].id }" style="cursor: pointer">Cancel</p>
                                            </form>

                                            
                                        </div>
                                    </div>`


                                $('.replies-container[data-id="' + comment_id + '"]').append(
                                    html);
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

                }


            });
        });



        $('.modal_inner-comment-post').click(function() {
            $('.form_reply').slideUp();
            $('.content_reply').val('');
            $('.edit_delete-post').hide();
        });

        $('.content_reply').click(function(e) {
            e.stopPropagation();
        })
        $('.btn_icon-submit').click(function(e) {
            e.stopPropagation();
        })

        $('.show_reply-form').click(function(e) {
            e.stopPropagation();
            var comment_id = $(this).data('id');
            var formReply = '.form_reply-' + comment_id;
            $('.form_reply').slideUp();
            $(formReply).slideDown();
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
