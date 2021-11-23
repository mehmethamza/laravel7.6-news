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


  <!-- top bar start -->
  <!-- block post area start-->
  <section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <div class="ts-grid-box">
                    <div class="login-page">
                        <h3 class="log-sign-title text-center mb-25">Please Log In, or <a href="{{route("kullanici.register")}}">Sign Up</a></h3>


                        <div class="login-or">
                            <hr class="hr-or">
                            <span class="span-or">or</span>
                        </div>

                        <form role="form" action="{{route("kullanici.sign")}}" method="POST">
                            @csrf
                            <div class="form-group">
                            <label for="inputUsernameEmail"> email</label>
                            <input type="text" class="form-control"name="email"  id="inputUsernameEmail">
                            </div>
                            <div class="form-group">

                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control" name="password" id="inputPassword">
                            </div>
                            <div class="checkbox pull-right">
                            <label>
                                <input type="checkbox" name="check">
                                Remember me </label>
                            </div>
                            <button type="submit" class="btn btn btn-primary">
                            Log In
                            </button>
                        </form>
                    </div>
                </div><!-- grid box end -->
            </div>
            <!-- col end-->

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
