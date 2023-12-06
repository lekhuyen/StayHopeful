@foreach ($comments as $comment)
    

<div class="comment_post">
    <a href="">
        <img width="60"
            src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNSLvtTEBqZcy2sk3ppPoGeE1gx0FmaiT-1g&usqp=CAU') }}"
            alt="">
    </a>
    <div class="comment_body">
        <a href="">User Name</a>
        <p class="comment_content">{{$comment->content}}</p>
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

        {{-- tra loi bL --}}
        @foreach($comment->replies as $reply)
        <div class="comment_post">
            <a href="">
                <img width="60"
                    src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNSLvtTEBqZcy2sk3ppPoGeE1gx0FmaiT-1g&usqp=CAU') }}"
                    alt="">
            </a>
            <div class="comment_body">
                <a href="">User Name</a>
                <p>{{$reply->content}}</p>
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
    </div>
</div>

@endforeach