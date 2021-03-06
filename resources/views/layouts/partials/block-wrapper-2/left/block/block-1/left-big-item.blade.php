<div class="col-lg-7">
    <div class="tab-content featured-post" id="nav-tabContent">
        <div class="tab-pane ts-overlay-style fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="item" style="background-image: url({{$block_wrapper_2_1[0] -> image}})">

                <a class="post-cat ts-orange-bg" href="#">
                    @foreach ($block_wrapper_2_1[0] -> category as $category)
                    {{$category -> name}}
                    @endforeach
                </a>

                <div class="overlay-post-content">
                    <div class="post-content">
                        <h3 class="post-title md">
                            <a href="{{ route("content",$block_wrapper_2_1[0] ->slug)}}">{{$block_wrapper_2_1[0] -> title}}</a>
                        </h3>
                        <ul class="post-meta-info">
                            @if ( !empty($block_wrapper_2_1[0]   -> author))

                            <li class="author">
                                <a href="#">
                                    <img src="{{$block_wrapper_2_1[0] -> author -> image}}" alt=""> {{$block_wrapper_2_1[0] -> author -> name}}
                                </a>
                            </li>
                            @endif
                            <li>
                                <i class="fa fa-clock-o"></i>
                                @php
                                echo Carbon\Carbon::parse($block_wrapper_2_1[0] -> created_at) ->toDateString();
                            @endphp
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- overlay post content-->
            </div>
            <!-- item end-->
        </div>
        <!--tab-pane ts-overlay-style end-->
        {{-- <div class="tab-pane ts-overlay-style fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="item" style="background-image: url(images/news/health/health2.jpg)">

                <a class="post-cat ts-purple-bg" href="#">Health</a>
                <a href="https://www.youtube.com/watch?v=_0UO1NcheAE" class="ts-video-btn">
                    <i class="fa fa-play-circle-o"></i>
                </a>
                <div class="overlay-post-content">
                    <div class="post-content">
                        <h3 class="post-title md">
                            <a href="#">retro prawn cocktail ??? straight from the 80???s!</a>
                        </h3>
                        <ul class="post-meta-info">
                            <li class="author">
                                <a href="#">
                                    <img src="images/avater/author1.jpg" alt=""> Donald Ramos
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-clock-o"></i>
                                March 21, 2019
                            </li>
                            <li class="active">
                                <i class="icon-fire"></i>
                                3,005
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- overlay post content-->
            </div>
            <!-- item end-->
        </div>
        <!--tab-pane ts-overlay-style end-->
        <div class="tab-pane ts-overlay-style fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="item" style="background-image: url(images/news/fashion/fashion1.jpg)">
                <a class="post-cat ts-pink-bg" href="#">Fashion</a>
                <a href="https://www.youtube.com/watch?v=_0UO1NcheAE" class="ts-video-btn">
                    <i class="fa fa-play-circle-o"></i>
                </a>
                <div class="overlay-post-content">
                    <div class="post-content">
                        <h3 class="post-title md">
                            <a href="#">10 critical points from Zuckerberg???s epic security manifesto</a>
                        </h3>
                        <ul class="post-meta-info">
                            <li class="author">
                                <a href="#">
                                    <img src="images/avater/author1.jpg" alt=""> Donald Ramos
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-clock-o"></i>
                                March 21, 2019
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- overlay post content-->
            </div>
            <!-- item end-->
        </div> --}}
        <!--tab-pane ts-overlay-style end-->
    </div>

</div>
