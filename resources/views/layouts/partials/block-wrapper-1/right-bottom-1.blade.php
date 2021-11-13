<div class="col-lg-6 pr-1">
    <div class="ts-overlay-style">
        <div class="item height-190" style="background-image:url({{$block_wrapper_1[2] -> image}})">
            <a class="post-cat ts-green-bg" href="#">
                @foreach ($block_wrapper_1[2] -> category as $category)
                    {{$category -> name}}
                 @endforeach
            </a>
            <div class="overlay-post-content">
                <div class="post-content">
                    <h2 class="post-title">
                        <a href="#">{{$block_wrapper_1[2] -> title}}</a>
                    </h2>
                    <span class="post-date-info">
                        <i class="fa fa-clock-o"> </i>
                        @php


                             echo Carbon\Carbon::parse($block_wrapper_1[2] ->created_at) ->toDateString();

                        @endphp
                    </span>
                </div>
            </div>
            <!--/ Featured post end -->
        </div>
    </div>
</div>
