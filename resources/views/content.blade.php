@extends('layouts.master')

@section('title')
    {{$content -> title}}
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
                                    <a href="{{$content->image}}" class="gallery-popup">
                                        <img  src="{{$content -> image}}" class="img-fluid img-thumbnail" alt="">
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

                                        @if ( !empty($content -> author)) @include('content.content-author')@endif

                                        <li>
                                            <i class="fa fa-clock-o"></i>
                                            @php
                                                echo Carbon\Carbon::parse($content -> created_at) ->toDateString();
                                            @endphp
                                        </li>


                                        @if (Auth::guard("user") -> check())


                                            <span class="fav">
                                            @include('content.render_fav')
                                            </span>

                                        @endif

                                    </ul>
                                </div>
                                <div class="entry-content">
                                    {!!  $content -> content !!}
                                </div>
                                <!-- entry content end-->
                            </div>
                            <!-- post content area-->

                            @if ( !empty($content -> author))@include('content.author')@endif








                            <!-- author box end-->
                            @include('content.post-nagivate')

                            <!-- post navigation end-->
                        </div>
                        <!--single post end -->
                        @include('content.comment')

                        <!-- comment form end-->
                        @include('content.populer')


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



        <script>
            var pid = document.querySelector(".pid");
            var iptal = document.querySelector(".iptal");
            var iptalicerik = document.querySelector(".iptalicerik");


            function yaz(num,name) {

                  pid.value = num;
                  iptal.style.display = "";

                  iptalicerik.textContent = name +"'dan alıntı ";
            }
            function kaldir(num) {

                  pid.value = num;
                  iptal.style.display = "none";

            }
       </script>
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
