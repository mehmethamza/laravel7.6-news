<div class="item">

    <div class="ts-post-thumb">
        <a href="{{ route("content",$content ->slug)}}">
            <img class="img-fluid" src="{{$content -> image}}" alt="">
        </a>
    </div>
    <div class="post-content">
        <a class="post-cat ts-blue-dark-bg" href="#">
            @php
                foreach ($content -> category as $key => $category) {
                    echo $category-> name;
                }
            @endphp
        </a>
        <h3 class="post-title">
            <a href="{{ route("content",$content ->slug)}}">{{$content -> title}}</a>
        </h3>
        <span class="post-date-info">
            <i class="fa fa-clock-o"></i>
            @php
                echo Carbon\Carbon::parse($content -> created_at) ->toDateString();
            @endphp
        </span>
    </div>
</div>
