@foreach ($comment as $reply)
<div id="comment_reply-post comment_post" class="reply_comment-post" data-id="{{$reply->id}}" style="margin-left: -19px; margin-top: 10px; display: flex">
    <a href="">
        <img width="60" id="avatar_user"
            src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNSLvtTEBqZcy2sk3ppPoGeE1gx0FmaiT-1g&usqp=CAU') }}"
            alt="">
    </a>
    <div class="comment_body">
        <div class="comment_background">
            <div style="min-width: 100px">
                <a href="">{{$reply->user->name}}</a>
            </div>
            <div style="width: 100%">
                <p>{{ $reply->content }}</p>
            </div>

            @if ($reply->user_id == auth()->user()->id)
                <div class="delete_comment-post delete_comment-reply-post">
                    <div class="menu-edit-delete">
                        <i class="fa-solid fa-ellipsis"></i>
                    </div>
                    <div class="edit_delete-post" style="display: none">
                        <p class="edit_comment-reply-post-user" data-id="{{$reply->id}}">Edit</p>
                        <p class="delete_comment-reply-post-user" data-id="{{$reply->id}}">Delete</p>
                    </div>
                </div>
            @endif
            
        </div>
        {{-- <p class="reply_comment_post">
            Reply
        </p> --}}

        {{-- <form action="" style="display: none">
            <div id="input_reply-comment">
                <textarea name="" id="" cols="" rows="10" placeholder="comment.."></textarea>
                <div class="btn_icon-submit">
                    <i class="fa-solid fa-location-arrow"></i>
                </div>
            </div>
        </form> --}}
    </div>
</div>
@endforeach
