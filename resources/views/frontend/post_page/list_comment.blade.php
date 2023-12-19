@foreach ($comments as $comment)
    <div class="comment_post" id="comment_parent-post" data-id="{{ $comment->id }}">
        <a href="">
            <img id="avatar_user" width="60"
                src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNSLvtTEBqZcy2sk3ppPoGeE1gx0FmaiT-1g&usqp=CAU') }}"
                alt="">
        </a>
        
        <div class="comment_body">
            <div class="comment_background" data-id="{{ $comment->id }}">
                <div style="min-width: 100px">
                    <a href="">{{ $comment->user->name }}</a>
                </div>
                
                <div style="width: 100%" id="comment_content-user-post" data-id="{{$comment->id}}">
                    <p class="comment_content">{{ $comment->content }}</p>
                </div>
                @if ($comment->user->id == auth()->user()->id)
                    <div class="delete_comment-post">
                        <div class="menu-edit-delete">
                            <i class="fa-solid fa-ellipsis"></i>
                        </div>
                        <div class="edit_delete-post" style="display: none" data-id="{{ $comment->id }}">
                            <p class="edit_comment-post-user" data-id="{{ $comment->id }}">Edit</p>
                            <p class="delete_comment-post-user" data-id="{{ $comment->id }}">Delete</p>
                        </div>
                    </div>
                @endif

            </div>
            {{-- !form edit comment --}}
            <form style="margin-bottom: 10px; display: none" class="edit_form-comment"
                data-id="{{ $comment->id }}">
                <div id="input_reply-comment" style="width: 90%;">
                    <textarea style="padding: 10px 50px 10px 20px;" cols="" rows="10" name="content" placeholder="comment.."
                        class="content_edit-comment content-edit-comment" data-id="{{ $comment->id }}"></textarea>
                    <button class="btn_icon-submit btn_icon-submit-reply" data-id="{{ $comment->id }}">
                        <i class="fa-solid fa-location-arrow"></i>
                    </button>
                </div>
                <p class="cancel_edit-comment" data-id="{{ $comment->id }}" style="cursor: pointer">Cancel</p>
            </form>

            <p class="reply_comment_post show_reply-form" data-id="{{ $comment->id }}">
                Reply
            </p>
            {{-- !form submit comment --}}
            <form style="display: none; margin-bottom: 10px;"
                class="form_reply-{{ $comment->id }} form_reply btn_reply-submit" data-id="{{ $comment->id }}">
                <div id="input_reply-comment" style="width: 90%;">
                    <textarea style="padding: 10px 50px 10px 20px;" cols="" rows="10" name="content" placeholder="comment.."
                        class="content_reply-{{ $comment->id }} content_reply" data-id="{{ $comment->id }}"></textarea>
                    <button class="btn_icon-submit btn_icon-submit-reply" data-id="{{ $comment->id }}">
                        <i class="fa-solid fa-location-arrow"></i>
                    </button>
                </div>
            </form>

            {{-- !reply --}}
            
            <div class="comment_post replies-container" data-id="{{ $comment->id }}" style="display: block">
                {{-- <div class="more_reply"  data-id="{{ $comment->id }}" style="{{ $comment->replies->count() < 3 ? 'display: none' : '' }}"> --}}
                    @include('frontend.post_page.comment_reply', ['comment' => $comment->replies])
                {{-- </div> --}}
            </div>
            
            {{-- <div class="xem_them" style="cursor: pointer" data-id="{{$comment->id}}">{{$comment->replies->count() == 0 ? '' : 'Xem them'}}</div> --}}
            

        </div>
    </div>
@endforeach
