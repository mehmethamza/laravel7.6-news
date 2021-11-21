<div class="comments-form ts-grid-box">

    <h3 class="comments-counter">{{ $comments -> count() }} Comments</h3>
    <ul class="comments-list">
        @foreach ($comments as $comment)


        <li>
            <div class="comment">
                <img class="comment-avatar float-left" alt="" src="{{$comment -> image}}">
                <div class="comment-body">
                    <div class="meta-data"><span class="float-right"><a onclick="yaz('{{  encrypt($comment -> id) }}' , '{{$comment -> name}}' )" class="comment-reply reply" href="javascript:;"><i class="fa fa-mail-reply-all"></i> Reply</a></span>
                        <span class="comment-author">{{$comment -> name}}</span><span class="comment-date">October 31, 2018</span>
                    </div>
                    <div class="comment-content">
                        <p>{{$comment -> comment}}</p>
                    </div>
                </div>
            </div>
            @if (!empty($comment -> child[0]))
                @include('content.comment_child')
            @endif

            <!-- comments-reply end-->
        </li>
        @endforeach


    </ul>
    <!-- Comments-list ul end-->
    <style>
        .kirmizi:hover{
            color: red;
        }
    </style>
    <h3 class="comment-reply-title">Add Comment   </h3> <div style="display: none"  class="iptal" > <span class="iptalicerik"></span>  <span  class="kirmizi"  onclick=" kaldir( '{{encrypt(0)}}' ) "><i  class="fas fa-times"></i></span></div>
    <form role="form" method="POST" action="{{route("comment.add")}}" class="ts-form">
        @csrf
        <input type="hidden" name="content_id" value="{{encrypt($content -> id) }}">
        <input type="hidden" class="pid" name="pid" value="{{encrypt(0)}}">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" name="name" id="name" placeholder="Your Name" type="text" required="">
                </div>
                <!-- form group end-->
                <div class="form-group">
                    <input class="form-control" name="mail" id="email" placeholder="Your Email" type="email" required="">
                </div>
                <!-- form group end-->
                <div class="form-group">
                    {{-- <input class="form-control" name="cinsiyet" id="email" placeholder="Your Gender" type="email" required=""> --}}
                    <select class="form-control" name="cinsiyet" id="" placeholder="Your Gender">
                        <option value="erkek">Erkek</option>
                        <option value="kadin">Kadın</option>
                    </select>
                </div>
                <!-- form group end-->

                <!-- form group end-->
            </div>
            <!-- Col end -->
            <div class="col-md-6">
                <div class="form-group">
                    <textarea class="form-control msg-box" name="comment" id="message" placeholder="Your Comment" cols="30" rows="30" required=""></textarea>

                </div>
            </div>
            <!-- Col end -->
            <div class="col-md-12">


            </div>
        </div>
        <!-- Form row end -->
        <div class="clearfix">
            <button class="comments-btn btn btn-primary" type="submit">Post Comment</button>
        </div>

    </form>


    <!-- Form end -->
</div>



