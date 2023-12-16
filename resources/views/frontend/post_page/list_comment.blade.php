@foreach ($comments as $comment)
    <div class="comment_post">
        <a href="">
            <img id="avatar_user" width="60"
                src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNSLvtTEBqZcy2sk3ppPoGeE1gx0FmaiT-1g&usqp=CAU') }}"
                alt="">
        </a>
        <div class="comment_body">
            <div class="comment_background">
                <a href="">User Name</a>
                <p class="comment_content">{{ $comment->content }}</p>
            </div>
            <p class="reply_comment_post show_reply-form" data-id="{{ $comment->id}}">
                Reply
            </p>

            <form style="display: none; margin-bottom: 10px;" class="form_reply-{{$comment->id}} form_reply btn_reply-submit" data-id="{{$comment->id}}">
                <div id="input_reply-comment" style="width: 90%;">
                    <textarea style="padding: 10px 50px 10px 20px;" cols="" rows="10" name="content" placeholder="comment.." class="content_reply-{{$comment->id}} content_reply" data-id="{{$comment->id}}"></textarea>
                    <button class="btn_icon-submit btn_icon-submit-reply" data-id="{{ $comment->id}}">
                        <i class="fa-solid fa-location-arrow"></i>
                    </button>
                </div>
            </form>
            
                    <div class="comment_post replies-container" data-id="{{$comment->id}}" style="display: block">
                        @include('frontend.post_page.comment_reply', ['comment'=>$comment->replies])
                    </div>
            

        </div>
    </div>
@endforeach


