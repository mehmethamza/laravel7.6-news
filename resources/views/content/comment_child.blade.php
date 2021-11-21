
<ul class="comments-reply">
    @foreach ($comment -> child as $comment)


    <li>
        <div class="comment">
            <img class="comment-avatar float-left" alt="" src="{{$comment -> image}}">
            <div class="comment-body reply-bg">
                <div class="meta-data"><span class="float-right"><a  onclick="yaz('{{  encrypt($comment -> id) }}' , '{{$comment -> name}}' )" class="comment-reply reply" href="javascript:;"><i class="fa fa-mail-reply-all"></i> Reply</a></span>
                    <span class="comment-author">{{$comment -> name}}</span><span class="comment-date">October 31, 2018</span>
                </div>
                <div class="comment-content">
                    <p>{{$comment -> comment}}</p>
                </div>
            </div>
        </div>
        <!-- Comments end-->

    </li>
        @if (!empty($comment -> child[0]))
        @include('content.comment_child')
        @endif
    @endforeach
</ul>
