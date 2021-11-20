<div class="ts-grid-box mb-30">
    <h2 class="ts-title">Most Popular</h2>

    <div class="most-populers owl-carousel">

        @foreach ($content_sliders as $key => $content_slider)

        @if ( $key == 0 && $key == 1)

        @else

        <div class="item">
            <a class="post-cat ts-yellow-bg">
                @foreach ($content_slider -> category as $category)
                    {{ $category -> name }}
                @endforeach
            </a>
            <div class="ts-post-thumb">
                <a href="#">
                    <img class="img-fluid" src="{{$content_slider -> image}}" alt="">
                </a>
            </div>
            <div class="post-content">
                <h3 class="post-title">
                    <a href="#">{{$content_slider -> title}}</a>
                </h3>
                <span class="post-date-info">

                </span>
            </div>
        </div>
        @endif
        <!-- ts-grid-box end-->
        @endforeach


    </div>
    <!-- most-populers end-->
</div>
