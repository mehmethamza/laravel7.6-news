<div class="item">
    <div class="ts-post-thumb">
        <a href="#">
            <img class="img-fluid" src="{{$content -> image}}" alt="">
        </a>
    </div>
    <div class="post-content">
        <h3 class="post-title">
            <a href="#">{{$content -> title}}</a>
        </h3>
        <span class="post-date-info">
            <i class="fa fa-clock-o"></i>
            @php
            echo  Carbon\Carbon::parse($content -> created_at) ->toDateString();
            @endphp
        </span>
    </div>
</div>
