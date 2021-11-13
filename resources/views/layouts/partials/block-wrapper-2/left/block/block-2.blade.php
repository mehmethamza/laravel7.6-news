<div class="ts-heading-item">
    <h2 class="ts-title">
        <span>{{$block_wrapper_2_2 -> name}}</span>
    </h2>
</div>
<div class="row mb-10">

    @foreach ($block_wrapper_2_2 -> contents as $key => $content)

    @if ($key < 2)
        <div class="col-lg-6">
            <div class="ts-overlay-style">
                <div class="item">
                    <div class="ts-post-thumb">
                        <a class="post-cat ts-blue-bg" href="#">{{$block_wrapper_2_2 -> name}}</a>
                        <a href="#">
                            <img class="img-fluid" src="{{$content -> image}}" alt="">
                        </a>

                    </div>
                    <div class="overlay-post-content">
                        <div class="post-content">
                            <h3 class="post-title md">
                                <a href="#">{{$content -> title}}</a>
                            </h3>
                            <span class="post-date-info">
                                <i class="fa fa-clock-o"></i>
                                @php
                                echo Carbon\Carbon::parse($content ->created_at) ->toDateString();
                                @endphp
                            </span>
                        </div>
                    </div>
                </div>
                <!-- end item-->
            </div>
            <!-- ts overlay end-->
        </div>
    @else

    @endif

    @endforeach
    {{-- bundan ikitane olacak --}}
    <!-- col end-->

    <!-- col end-->
</div>
