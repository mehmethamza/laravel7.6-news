<li>
    <a href="#">{{$category -> name}}</a>
    <div class="megamenu-panel">
        <div class="row">
            @foreach ($category -> contents  as $key => $content)

            @if ($key < 4)


            <div class="col-12 col-lg-3">
                <div class="item">
                    <div class="ts-post-thumb">
                        <a href="">
                            <img class="img-fluid" src="{{$content -> image}}" alt="">
                        </a>
                        {{-- <a href="https://www.youtube.com/watch?v=uZmz6fGRVW4" class="fa fa-play-circle-o ts-video-icon"></a> --}}
                    </div>
                    <div class="post-content">
                        <h3 class="post-title">
                            <a href="#">{{$content -> title}}</a>
                        </h3>
                    </div>
                </div>


            </div>
            @endif
            @endforeach
            {{--  bundan dört tane istersen çağıralıbalir --}}
        </div>
    </div>
</li>
