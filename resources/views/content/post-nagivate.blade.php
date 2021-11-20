<div class="post-navigation clearfix">
    <div class="post-previous float-left">
        <a href="{{route("content",$content_sliders[0] -> slug)}}">
            <img src="{{$content_sliders[0] -> image}}" alt="">
            <span>Read Previous</span>
            <p>
                {{$content_sliders[0] -> title}}
            </p>
        </a>
    </div>
    <div class="post-next float-right">
        <a href="{{route("content",$content_sliders[1] -> slug)}}">
            <img src="{{$content_sliders[1] -> image}}" alt="">
            <span>Read Next</span>
            <p>
                {{$content_sliders[1] -> title}}
            </p>
        </a>
    </div>
</div>
