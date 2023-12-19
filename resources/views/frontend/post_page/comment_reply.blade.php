@foreach ($comment as $reply)
<div id="comment_reply-post comment_post" class="reply_comment-post" data-id="{{$reply->id}}" style="margin-left: -19px; margin-top: 10px; display: flex">
    <a href="">
        <img width="60" id="avatar_user"
            src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNSLvtTEBqZcy2sk3ppPoGeE1gx0FmaiT-1g&usqp=CAU') }}"
            alt="">
        
    </a>
    <div class="comment_body">
        <div class="comment_background" data-id="{{$reply->id}}">
            <div style="min-width: 100px">
                <a href="">{{$reply->user->name}}</a>
            </div>
            <div style="width: 100%" id="comment_reply-content-user-post" data-id="{{$reply->id}}">
                <p class="comment_reply-content">{{ $reply->content }}</p>
            </div>

            @if ($reply->user_id == auth()->user()->id)
                <div class="delete_comment-post delete_comment-reply-post">
                    <div class="menu-edit-delete">
                        <i class="fa-solid fa-ellipsis"></i>
                    </div>
                    <div class="edit_delete-post" style="display: none" data-id="{{$reply->id}}">
                        <p class="edit_comment-reply-post-user" data-id="{{$reply->id}}">Edit</p>
                        <p class="delete_comment-reply-post-user" data-id="{{$reply->id}}">Delete</p>
                    </div>
                </div>
            @endif
            
        </div>
        {{-- <p class="reply_comment_post">
            Reply
        </p> --}}
        {{-- !form edit reply --}}
        <form style="display: none; margin-bottom: 10px;" class="form_reply-{{$reply->id}} form_reply btn_reply-submit btn_edit-reply show_form-edit-reply" data-id="{{$reply->id}}">
            <div id="input_reply-comment" style="width: 90%;">
                <textarea style="padding: 10px 50px 10px 20px;" cols="" rows="10" name="content" placeholder="comment.." class="content_reply-{{$reply->id}} content_reply" data-id="{{$reply->id}}"></textarea>
                <button class="btn_icon-submit btn_icon-submit-reply" data-id="{{ $reply->id}}">
                    <i class="fa-solid fa-location-arrow"></i>
                </button>
            </div>
            <p class="cancel_edit-comment-reply" data-id="{{$reply->id}}" style="cursor: pointer">Cancel</p>
        </form>

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
