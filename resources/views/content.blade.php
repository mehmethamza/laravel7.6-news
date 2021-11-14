@extends('layouts.master')

@section('title')
    Anasayfa
@endsection

@section('content')

<div class="body-inner-content">
		<!-- top bar start -->
        @include('layouts.partials.top-bar')
		<!-- end top bar-->


		<!-- header nav start-->
        @include('layouts.partials.navbar-standerd')

		<!-- header nav end-->

		<!-- block wrapper start-->
        <section class="single-post-wrapper post-layout-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">

                        <!-- breadcump end-->
                        <div class="ts-grid-box content-wrapper single-post">

                            <!-- single post header end-->
                            <div class="post-content-area">
                                <div class="post-media post-featured-image">
                                    <a href="/images/news/travel/travel2.jpg" class="gallery-popup">
                                        <img src="{{$content -> image}}" class="img-fluid" alt="">
                                    </a>
                                </div>

                                <div class="entry-header mt-4">
                                    <h2 class="post-title lg">{{$content -> title}}</h2>
                                    <ul class="post-meta-info">
                                        <li>
                                            <a href="#" class="post-cat ts-orange-bg">
                                                @foreach ($content -> category as $category)
                                                    {{$category -> name}}
                                                @endforeach
                                            </a>
                                        </li>
                                        <li class="author">
                                            <a href="#">
                                                <img src="/images/avater/author.png" alt=""> Donald Ramos
                                            </a>
                                        </li>
                                        <li>
                                            <i class="fa fa-clock-o"></i>
                                            @php
                                                echo Carbon\Carbon::parse($content -> created_at) ->toDateString();
                                            @endphp
                                        </li>

                                    </ul>
                                </div>
                                <div class="entry-content">
                                    {!!  $content -> content !!}
                                </div>
                                <!-- entry content end-->
                            </div>
                            <!-- post content area-->
                            <div class="author-box">
                                <img class="author-img" src="/images/avater/author.png" alt="">
                                <div class="author-info">
                                    <h4 class="author-name">Elina Themen</h4>
                                    <div class="authors-social">
                                        <a href="#" class="ts-twitter">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#" class="ts-facebook">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="#" class="ts-google-plus">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                        <a href="#" class="ts-linkedin">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>
                                    <p>Black farmers in the US’s South—faced with continued failure in their efforts to run for the successful farms their
                                        launched </p>

                                </div>
                            </div>
                            <!-- author box end-->
                            <div class="post-navigation clearfix">
                                <div class="post-previous float-left">
                                    <a href="#">
                                        <img src="/images/news/travel/travel6.jpg" alt="">
                                        <span>Read Previous</span>
                                        <p>
                                            Samsung goes big in India factory ever created
                                        </p>
                                    </a>
                                </div>
                                <div class="post-next float-right">
                                    <a href="#">
                                        <img src="/images/news/tech/tech5.jpg" alt="">
                                        <span>Read Next</span>
                                        <p>
                                            Samsung goes big in India factory ever created
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <!-- post navigation end-->
                        </div>
                        <!--single post end -->
                        <div class="comments-form ts-grid-box">

                            <h3 class="comments-counter">03 Comments</h3>
                            <ul class="comments-list">
                                <li>
                                    <div class="comment">
                                        <img class="comment-avatar float-left" alt="" src="/images/avater/author.png">
                                        <div class="comment-body">
                                            <div class="meta-data"><span class="float-right"><a class="comment-reply" href="#"><i 	class="fa fa-mail-reply-all"></i> Reply</a></span>
                                                <span class="comment-author">Demon Lion</span><span class="comment-date">October 31, 2018</span>
                                            </div>
                                            <div class="comment-content">
                                                <p>There’s such a thing as “too much information”, especially for the companies scaling out their sales operations. That’s why Attentive was help sales teams </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Comments end-->
                                    <ul class="comments-reply">
                                        <li>
                                            <div class="comment">
                                                <img class="comment-avatar float-left" alt="" src="/images/avater/author2.png">
                                                <div class="comment-body reply-bg">
                                                    <div class="meta-data"><span class="float-right"><a class="comment-reply" href="#"><i class="fa fa-mail-reply-all"></i> Reply</a></span>
                                                        <span class="comment-author">Henry kendel</span><span class="comment-date">October 31, 2018</span>
                                                    </div>
                                                    <div class="comment-content">
                                                        <p>There’s such a thing as “too much information”, especially for the companies scaling out their sales operations. That’s why Attentive was born</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Comments end-->
                                        </li>
                                    </ul>
                                    <!-- comments-reply end-->
                                </li>
                                <!-- Comments-list li end-->
                                <li>
                                    <div class="comment last">
                                        <img class="comment-avatar float-left" alt="" src="/images/avater/author.png">
                                        <div class="comment-body">
                                            <div class="meta-data"><span class="float-right"><a class="comment-reply" href="#"><i 	class="fa fa-mail-reply-all"></i> Reply</a></span>
                                                <span class="comment-author">Demon Lion</span><span class="comment-date">October 31, 2018</span>
                                            </div>
                                            <div class="comment-content">
                                                <p>Cras lectus sed arcus volutpat tincidun met diam placerat.Vis solum numquam. That’s why Attentive help sales teams </p>
                                            </div>
                                        </div>
                                    </div><!-- Comments last end-->
                                </li>
                            </ul>
                            <!-- Comments-list ul end-->

                            <h3 class="comment-reply-title">Add Comment</h3>
                            <form role="form" class="ts-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" name="name" id="name" placeholder="Your Name" type="text" required="">
                                        </div>
                                        <!-- form group end-->
                                        <div class="form-group">
                                            <input class="form-control" name="email" id="email" placeholder="Your Email" type="email" required="">
                                        </div>
                                        <!-- form group end-->
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Your Website" type="text" required="">
                                        </div>
                                        <!-- form group end-->
                                    </div>
                                    <!-- Col end -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea class="form-control msg-box" id="message" placeholder="Your Comment" rows="10" required=""></textarea>
                                        </div>
                                    </div>
                                    <!-- Col end -->
                                    <div class="col-md-12">
                                        <p class="comment-form-cookies-consent">
                                            <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes">
                                            <label for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label>
                                        </p>
                                    </div>
                                </div>
                                <!-- Form row end -->
                                <div class="clearfix">
                                    <button class="comments-btn btn btn-primary" type="submit">Post Comment</button>
                                </div>
                            </form>
                            <!-- Form end -->
                        </div>
                        <!-- comment form end-->
                        <div class="ts-grid-box mb-30">
                            <h2 class="ts-title">Most Popular</h2>

                            <div class="most-populers owl-carousel">
                                <div class="item">
                                    <a class="post-cat ts-yellow-bg" href="#">Travel</a>
                                    <div class="ts-post-thumb">
                                        <a href="#">
                                            <img class="img-fluid" src="/images/news/travel/travel2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h3 class="post-title">
                                            <a href="#">Tourism in Dubai is booming by international tourist</a>
                                        </h3>
                                        <span class="post-date-info">
                                            <i class="fa fa-clock-o"></i>
                                            March 21, 2019
                                        </span>
                                    </div>
                                </div>
                                <!-- ts-grid-box end-->

                                <div class="item">
                                    <a class="post-cat ts-blue-light-bg" href="#">Technology</a>
                                    <div class="ts-post-thumb">
                                        <a href="#">
                                            <img class="img-fluid" src="/images/news/tech/tech1.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h3 class="post-title">
                                            <a href="#">Tourism in Dubai is booming by international tourist</a>
                                        </h3>
                                        <span class="post-date-info">
                                            <i class="fa fa-clock-o"></i>
                                            March 21, 2019
                                        </span>
                                    </div>
                                </div>
                                <!-- ts-grid-box end-->
                                <div class="item">
                                    <a class="post-cat ts-pink-bg" href="#">Fashion</a>
                                    <div class="ts-post-thumb">
                                        <a href="#">
                                            <img class="img-fluid" src="/images/news/fashion/fashion1.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h3 class="post-title">
                                            <a href="#">Tourism in Dubai is booming by international tourist</a>
                                        </h3>
                                        <span class="post-date-info">
                                            <i class="fa fa-clock-o"></i>
                                            March 21, 2019
                                        </span>
                                    </div>
                                </div>
                                <!-- ts-grid-box end-->
                                <div class="item">
                                    <a class="post-cat ts-green-bg" href="#">Music</a>
                                    <div class="ts-post-thumb">
                                        <a href="#">
                                            <img class="img-fluid" src="/images/news/music/music2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h3 class="post-title">
                                            <a href="#">Tourism in Dubai is booming by international tourist</a>
                                        </h3>
                                        <span class="post-date-info">
                                            <i class="fa fa-clock-o"></i>
                                            March 21, 2019
                                        </span>
                                    </div>
                                </div>
                                <!-- ts-grid-box end-->
                                <div class="item">
                                    <a class="post-cat ts-pink-bg" href="#">Fashion</a>
                                    <div class="ts-post-thumb">
                                        <a href="#">
                                            <img class="img-fluid" src="/images/news/fashion/fashion2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h3 class="post-title">
                                            <a href="#">Tourism in Dubai is booming by international tourist</a>
                                        </h3>
                                        <span class="post-date-info">
                                            <i class="fa fa-clock-o"></i>
                                            March 21, 2019
                                        </span>
                                    </div>
                                </div>
                                <!-- ts-grid-box end-->
                            </div>
                            <!-- most-populers end-->
                        </div>

                    </div>
                    <!-- col end -->
                    @include('layouts.partials.block-wrapper-2.right.right')
                    <!-- right sidebar end-->
                    <!-- col end-->
                </div>
                <!-- row end-->
            </div>
            <!-- container-->
        </section>




		<!-- footer social list start-->
        @include('layouts.partials.footer-social')

		<!-- footer social list end-->

		<!-- newslater start -->
        @include('layouts.partials.newslatter')

		<!-- newslater end -->

		<!-- footer start -->
        @include('layouts.partials.footer')

		<!-- footer end -->


	</div>
@endsection
