<a  class="nav-item nav-link active" id="nav-home-tab" href="{{ route("content",$content ->slug)}}" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home"
    aria-selected="true" >
    <div class="post-content media">
        <img class="d-flex" src="{{$content -> image}}" alt="">
        <div class="media-body align-self-center">
            <h4 class="post-title">
                {{$content -> title}}
            </h4>
            <span class="post-date-info">
                <i class="fa fa-clock-o"></i>
                @php
                    echo Carbon\Carbon::parse($content -> created_at) ->toDateString();
                @endphp
            </span>
        </div>
    </div>

</a>
