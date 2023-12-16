@foreach ($comments as $comment)
    <div class="comment_post">
        <a href="">
            <img width="60"
                src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNSLvtTEBqZcy2sk3ppPoGeE1gx0FmaiT-1g&usqp=CAU') }}"
                alt="">
        </a>
        <div class="comment_body">
            <a href="">User Name</a>
            <p class="comment_content">{{ $comment->content }}</p>
            <p class="reply_comment_post show_reply-form" data-id="{{ $comment->id}}">
                Reply
            </p>

            <form style="display: none" class="form_reply-{{$comment->id}} form_reply btn_reply-submit" data-id="{{$comment->id}}">
                <div id="input_reply-comment">
                    <textarea cols="" rows="10" placeholder="comment.." class="content_reply-{{$comment->id}} content_reply" data-id="{{$comment->id}}"></textarea>
                    <button class="btn_icon-submit" data-id="{{ $comment->id}}">
                        <i class="fa-solid fa-location-arrow"></i>
                    </button>
                </div>
            </form>
            {{-- @foreach ($comment->replies as $reply)
                @php
                    $checkComment = false;
                @endphp

                @if ($reply->comment_id == $comment->id)
                    @php
                        $checkComment = true;
                    @endphp
                @endif
                @if ($checkComment) --}}
                    <div class="comment_post replies-container" data-id="{{$comment->id}}" style="display: block">
                        @include('frontend.post_page.comment_reply', ['comment'=>$comment->replies])
                        {{-- <div>
                            <a href="">
                                <img width="60"
                                    src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNSLvtTEBqZcy2sk3ppPoGeE1gx0FmaiT-1g&usqp=CAU') }}"
                                    alt="">
                            </a>
                            <div class="comment_body">
                                <a href="">User Name</a>
                                <p>{{ $reply->content }}</p>
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
                        </div> --}}
                    </div>
                {{-- @endif
            @endforeach --}}

        </div>
    </div>
@endforeach

{{-- @foreach ($comments as $item1)
<p>{{$item1->posts_content}}</p>
    @foreach ($commentsReply as $item2)
        @php
            $checkComent = false;
        @endphp
        @if ($item2->commentPost_id == $item1->id)
            @php
                $checkComent = true;
            @endphp
        @endif
        @if ($checkComent)
        <p>{{$item2->posts_content}}</p>
        @endif
        
    @endforeach
@endforeach --}}
