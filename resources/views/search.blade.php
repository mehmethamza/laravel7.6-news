@extends('layouts.master')

@section('title')
    Aranan değer {{$search}}
@endsection

@section('content')

<div class="body-inner-content category-layout-5">
		<!-- top bar start -->
        @include('layouts.partials.top-bar')
		<!-- end top bar-->


		<!-- header nav start-->
        @include('layouts.partials.navbar-standerd')

		<!-- header nav end-->


  <!-- top bar start -->
  <!-- block post area start-->
  <section class="block-wrapper mt-15">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="ts-grid-box entry-header">

            <div class="clearfix entry-cat-header">
              <h2 class="ts-title float-left">Aranan Değer : {{$search}} </h2>

            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-9">
          <div class="row">
            @if ( count($contents) == 0)
                Üzgünüz herhangi bir kayıt bulunamadı
            @else
            @foreach ($contents  as $content)
                <div class="col-lg-6 mb-10">
                    <div class="ts-overlay-style">
                        <div class="item">
                        <div class="ts-post-thumb">
                            <a class="post-cat ts-{{$color[array_rand($color)]}}-bg" href="#">
                                @foreach ($content -> category as $category)
                                    {{$category -> name}}
                                @endforeach
                            </a>
                            <a href="#">
                            <img class="img-fluid" src="{{$content -> image}}" alt="">
                            </a>
                        </div>
                        <div class="overlay-post-content">
                            <div class="post-content">
                            <h3 class="post-title md">
                                <a href="{{route("content",$content -> slug)}}">{{$content -> title}}</a>
                            </h3>
                            <ul class="post-meta-info">
                                <li>
                                <i class="fa fa-clock-o"></i> March 21, 2019
                                </li>
                            </ul>
                            </div>
                        </div>
                        </div>
                        <!-- end item-->
                    </div>
                    </div>
            @endforeach
            @endif


          </div>

        </div>
        @include('layouts.partials.block-wrapper-2.right.right')

      </div>
      <!-- row end-->
    </div>
    <!-- container end-->
  </section>
  <!-- block area end-->




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
