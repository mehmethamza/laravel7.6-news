<div class="col-lg-3">
    <div class="right-sidebar-1">
        <div class="widgets widgets-item">
            <h3 class="widget-title">
                <span>On social</span>
            </h3>
            <ul class="ts-block-social-list">
                <li class="ts-facebook">
                    <a href="{{$setting -> facebook}}">
                        <i class="fa fa-facebook"></i>
                        <b>facebook </b>

                    </a>

                </li>
                <li class="ts-google-plus">
                    <a href="{{$setting -> google}}">
                        <i class="fa fa-google-plus"></i>
                        <b>Google Plus </b>

                    </a>

                </li>
                <li class="ts-twitter">
                    <a href="{{$setting -> twitter}}">
                        <i class="fa fa-twitter"></i>
                        <b>Twitter </b>

                    </a>

                </li>
                <li class="ts-pinterest">
                    <a href="{{$setting -> pinterest}}">
                        <i class="fa fa-pinterest-p"></i>
                        <b>Pinterest </b>

                    </a>

                </li>
                <!-- <li class="ts-linkedin">
                        <a href="#">
                            <i class="fa fa-linkedin"></i>
                            <b>12.5 k </b>
                            <span>Follwers</span>
                        </a>

                    </li>
                    <li class="ts-youtube">
                        <a href="#">
                            <i class="fa fa-youtube"></i>
                            <b>12.5 k </b>
                            <span>Follwers</span>
                        </a>

                    </li> -->
            </ul>
        </div>
        <!-- end-->
        <div class="widgets widgets-item widget-banner">
            <a href="#">
                <img class="img-fluid" src="{{$setting -> ad1}}" alt="">
            </a>
        </div>
        <!-- widgets end-->
        <div class="widgets widgets-item ts-grid-item  widgets-populer-post">
            <h3 class="widget-title">
                <span>Populer Post</span>
            </h3>
            <div class="ts-overlay-style">
                <div class="item">
                    <div class="ts-post-thumb">
                        <a href="#">
                            <img class="img-fluid" src="{{$block_wrapper_2_right[0] -> image}}" alt="">
                        </a>
                    </div>
                    <div class="overlay-post-content">
                        <div class="post-content">
                            <h3 class="post-title">
                                <a href="{{route("content",$block_wrapper_2_right[0] -> slug)}}">{{$block_wrapper_2_right[0] -> title}}</a>
                            </h3>
                            <ul class="post-meta-info">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ts-overlay-style  end-->

            <div class="post-content media">
                <img class="d-flex sidebar-img" src="{{$block_wrapper_2_right[1] -> image}}" alt="">
                <div class="media-body align-self-center">
                    <h4 class="post-title">
                        <a href="{{route("content",$block_wrapper_2_right[1] -> slug)}}">{{$block_wrapper_2_right[1] -> title}}</a>
                    </h4>
                </div>
            </div>
            <!-- post content end-->
            <div class="post-content media">
                <img class="d-flex sidebar-img" src="{{$block_wrapper_2_right[2] -> image}}" alt="">
                <div class="media-body align-self-center">
                    <h4 class="post-title">
                        <a href="{{route("content",$block_wrapper_2_right[2] -> slug)}}">{{$block_wrapper_2_right[2] -> title}}</a>

                    </h4>
                </div>
            </div>
            <!-- post content end-->
        </div>
        <!-- widgets end-->
        <div class="widgets widgets-item">
            <h3 class="widget-title">
                <span>Kategoriler</span>
            </h3>
            <ul class="category-list">

                @foreach ($categories as $category)


                <li>
                    <a href="#">{{$category -> name}}
                        <span class="ts-green-bg">@php
                            echo count($category -> contents) + count($category -> child);
                        @endphp</span>
                    </a>
                </li>
                @endforeach


            </ul>
        </div>
    </div>

</div>
