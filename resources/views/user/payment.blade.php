@extends('layouts.master')

@section('title')
   User
@endsection

@section('content')

<div class="body-inner-content category-layout-5">
		<!-- top bar start -->
        @include('layouts.partials.top-bar')
		<!-- end top bar-->


		<!-- header nav start-->
        @include('layouts.partials.navbar-standerd')

		<!-- header nav end-->
        @include('user.navbar-standerd')



  <!-- top bar start -->
  <!-- block post area start-->

  <!-- block area end-->

       <div class="card">
           <div class="card-header bg-white">
               <style>
                   .display-3{
                       color: rgb(0, 0, 0);
                   }
               </style>
                <center><h6 class="display-3">Üyelik İçin Ödeme İşlemi</h6></center>
           </div>
           <div class="card-body">
                <div id="iyzipay-checkout-form" class="responsive">{!! $checkoutFormInitialize !!}</div>

           </div>
       </div>







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
