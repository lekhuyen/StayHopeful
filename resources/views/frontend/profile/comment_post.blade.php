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
                @include('frontend.profile.list_comment', [
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
        $('.cancel_edit-comment').click(function(){
            var comment_id = $(this).data('id')
            $('.edit_form-comment[data-id="' + comment_id + '"]').hide();
            $('.comment_background[data-id="' + comment_id + '"]').show();
        })

        //edit comment
        $('.edit_comment-post-user').click(function(e) {
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
                    if(data.status == 'success'){
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
                            $('#comment_content-user-post[data-id="' + comment_id + '"]').html(html)

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

                    $('.edit_form-comment[data-id="'+comment_id+'"]').submit();
                }
            });
        });


        //show edit comment
        $(document).ready(function() {
            $('.menu-edit-delete').each(function(index, element) {
                $(element).click(function() {
                    $('.edit_delete-post').eq(index).toggle('show')
                });
            })
        })

        //comment
        


        

    

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
