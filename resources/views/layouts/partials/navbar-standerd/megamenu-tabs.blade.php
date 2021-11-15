<li>
    <a href="{{route("category",$category -> slug)}}">{{$category -> name}}</a>
    <div class="megamenu-panel">
        <div class="megamenu-tabs">
            <ul class="megamenu-tabs-nav">



                @foreach ($category -> child as $key => $child_category)
                    @if ($key == 0)
                        <li class="active">
                            <a href="{{ route("category",$child_category -> slug) }}">{{$child_category -> name}} </a>
                        </li>
                    @else
                    <li >
                        <a href="{{ route("category",$child_category -> slug) }}">{{$child_category -> name}} </a>
                    </li>
                    @endif

                @endforeach


            </ul>

            @foreach ($category -> child as $key => $child_category)
                @if ($key == 0)
                <div class="megamenu-tabs-pane  active ">
                    <div class="row">
                        @foreach ( $child_category -> contents as $key => $content)
                        @if ($key < 3)
                            <div class="col-12 col-lg-4">
                                <div class="item">

                                    <div class="ts-post-thumb">
                                        <a class="post-cat ts-purple-bg" href="{{ route("content",$content->slug)}}">
                                        @foreach ($content -> category as $category)
                                            {{$category -> name}}
                                        @endforeach
                                        </a>
                                        <a href="{{ route("content",$content->slug)}}" >
                                            <img class="img-fluid" src="{{ $content -> image}}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h3 class="post-title">
                                            <a href="{{ route("content",$content->slug)}}">{{ $content -> title}}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @else

                        @endif

                        @endforeach



                    </div>

                </div>
                @else
                    <div class="megamenu-tabs-pane ">
                        <div class="row">
                            @foreach ( $child_category -> contents as $key => $content)
                            @if ($key < 3)
                                <div class="col-12 col-lg-4">
                                    <div class="item">

                                        <div class="ts-post-thumb">
                                            <a class="post-cat ts-purple-bg" href="#">
                                            @foreach ($content -> category as $category)
                                                {{$category -> name}}
                                            @endforeach
                                            </a>
                                            <a href="{{ route("content",$content->slug)}}">
                                                <img class="img-fluid" src="{{$content -> image}}" alt="">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <h3 class="post-title">
                                                <a href="#">{{ $content -> title}}</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            @else

                            @endif

                            @endforeach



                        </div>

                    </div>

                @endif

            @endforeach


        </div>
    </div>
</li>
