@foreach ($comment as $reply)
<div id="comment_reply-post" id="comment_post" style="margin-left: -19px; margin-top: 10px;">
    <a href="">
        <img width="60" id="avatar_user"
            src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNSLvtTEBqZcy2sk3ppPoGeE1gx0FmaiT-1g&usqp=CAU') }}"
            alt="">
    </a>
    <div class="comment_body">
        <div class="comment_background">
            <a href="">User Name</a>
            <p>{{ $reply->content }}</p>
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
</div>
@endforeach
