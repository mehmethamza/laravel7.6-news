<div class="ts-overlay-style">
    <div class="item height-310" style="background-image:url({{$block_wrapper_1[1] -> image}})">
        <a class="post-cat ts-orange-bg" href="#">
            @foreach ($block_wrapper_1[1] -> category as $category)
                    {{$category -> name}}
            @endforeach
        </a>
        <div class="overlay-post-content">
            <div class="post-content">
                <h2 class="post-title md">
                    <a href="#">{{$block_wrapper_1[1] -> title}}</a>
                </h2>
                <span class="post-date-info">
                    <i class="fa fa-clock-o"> </i>
                    @php


                        echo Carbon\Carbon::parse($block_wrapper_1[1] ->created_at) ->toDateString();

                    @endphp
                </span>
            </div>
        </div>
        <!--/ Featured post end -->
    </div>
</div>
