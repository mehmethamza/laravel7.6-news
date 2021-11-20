<div class="col-lg-7 pr-0">
    <div class="ts-overlay-style featured-post">
        <div class="item" style="background-image:url({{$block_wrapper_1[0] -> image}})">
            <a class="post-cat ts-orange-bg" href="#">
                @foreach ($block_wrapper_1[0] -> category as $category)
                    {{$category -> name}}
                @endforeach
            </a>
            <div class="overlay-post-content">
                <div class="post-content">
                    <h2 class="post-title large">
                        <a href="{{ route("content",$block_wrapper_1[0] ->slug)}}">{{$block_wrapper_1[0] -> title}}</a>
                    </h2>
                    <ul class="post-meta-info">
                        @if ( !empty($block_wrapper_1[0]  -> author))
                        <li class="author">
                            <a href="#">
                                <img src="{{$block_wrapper_1[0] -> author -> image}}" alt=""> {{$block_wrapper_1[0] -> author -> name}}
                            </a>
                        </li>
                        @endif
                        <li>
                            <i class="fa fa-clock-o"></i>
                            @php


                             echo Carbon\Carbon::parse($block_wrapper_1[0] ->created_at) ->toDateString();

                            @endphp

                        </li>

                    </ul>
                </div>
            </div>
            <!--/ Featured post end -->
        </div>
    </div>
</div>
