<div class="col-lg-6 pl-0">
    <div class="ts-overlay-style">
        <div class="item height-190" style="background-image:url({{$block_wrapper_1[3] -> image}})">
            <a class="post-cat ts-pink-bg" href="#">
                @foreach ($block_wrapper_1[3] -> category as $category)
                    {{$category -> name}}
                 @endforeach
            </a>
            <div class="overlay-post-content">
                <div class="post-content">
                    <h2 class="post-title">
                        <a href="{{ route("content",$block_wrapper_1[3] ->slug)}}"> {{$block_wrapper_1[3] -> title}}</a>
                    </h2>
                    <span class="post-date-info">
                        <i class="fa fa-clock-o"></i>
                        @php


                             echo Carbon\Carbon::parse($block_wrapper_1[3] ->created_at) ->toDateString();

                        @endphp
                    </span>
                </div>
            </div>
            <!--/ Featured post end -->
        </div>
    </div>
</div>
