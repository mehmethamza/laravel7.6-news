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
        @include('layouts.partials.block-wrapper-1')

		<!-- block wrapper end-->

        @include('layouts.partials.block-wrapper-2')



        @include('layouts.partials.block-wrapper-3')




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
