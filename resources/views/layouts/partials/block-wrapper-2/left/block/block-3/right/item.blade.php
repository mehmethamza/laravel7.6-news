<div class="item">
    <div class="post-content">
        <h3 class="post-title">
            <a href="{{ route("content",$content ->slug)}}">{{$content -> title}}</a>
        </h3>
        <span class="post-date-info">
            <i class="fa fa-clock-o"></i>
            @php
            echo  Carbon\Carbon::parse($content -> created_at) ->toDateString();
            @endphp
        </span>
    </div>
</div>
