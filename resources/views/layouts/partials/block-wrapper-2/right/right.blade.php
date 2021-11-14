<div class="col-lg-3">
    <div class="right-sidebar-1">
        <div class="widgets widgets-item">
            <h3 class="widget-title">
                <span>On social</span>
            </h3>
            <ul class="ts-block-social-list">
                <li class="ts-facebook">
                    <a href="#">
                        <i class="fa fa-facebook"></i>
                        <b>facebook </b>
                        <span>1.5 k</span>
                    </a>

                </li>
                <li class="ts-google-plus">
                    <a href="#">
                        <i class="fa fa-google-plus"></i>
                        <b>Google Plus </b>
                        <span>1.5 k</span>
                    </a>

                </li>
                <li class="ts-twitter">
                    <a href="#">
                        <i class="fa fa-twitter"></i>
                        <b>Twitter </b>
                        <span>1.5 k</span>
                    </a>

                </li>
                <li class="ts-pinterest">
                    <a href="#">
                        <i class="fa fa-pinterest-p"></i>
                        <b>facebook </b>
                        <span>1.5 k</span>
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
                <img class="img-fluid" src="/images/banner/sidebar-banner1.jpg" alt="">
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
                            <img class="img-fluid" src="/images/news/travel/travel8.jpg" alt="">
                        </a>
                    </div>
                    <div class="overlay-post-content">
                        <div class="post-content">
                            <h3 class="post-title">
                                <a href="#">Tourism in Dubai is boom international tourist</a>
                            </h3>
                            <ul class="post-meta-info">
                                <li>
                                    <i class="fa fa-clock-o"></i>
                                    March 21, 2019
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ts-overlay-style  end-->

            <div class="post-content media">
                <img class="d-flex sidebar-img" src="/images/news/health/health8.jpg" alt="">
                <div class="media-body align-self-center">
                    <h4 class="post-title">
                        <a href="">18 month shoots himself by gun </a>
                    </h4>
                </div>
            </div>
            <!-- post content end-->
            <div class="post-content media">
                <img class="d-flex sidebar-img" src="/images/news/health/health3.jpg" alt="">
                <div class="media-body align-self-center">
                    <h4 class="post-title">
                        <a href="">18 month shoots himself by gun </a>
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
