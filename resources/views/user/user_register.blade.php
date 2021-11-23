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
                    <div class="reg-page">
                        <h3 class="log-sign-title mb-25">Please Signup</h3>
                        <form action="{{route("kullanici.add")}}" method="POST" >
                            @csrf
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>First name </label>
                                        <input type="text" class="form-control" name="name" placeholder="">
                                </div> <!-- form-group end.// -->
                                <div class="col form-group">
                                    <label>Surname</label>
                                        <input type="text" class="form-control" name="surname" placeholder=" ">
                                </div> <!-- form-group end.// -->
                            </div> <!-- form-row end.// -->
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="">
                                <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div> <!-- form-group end.// -->


                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" name="password" type="password">
                            </div> <!-- form-group end.// -->

                                <button type="submit" class="btn btn-primary btn-block"> Register  </button>
                            </div> <!-- form-group// -->
                            <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our Terms of use and Privacy Policy.</small>
                        </form>
                            <div class="border-top card-body text-center">Have an account? <a href="login.html">Log In</a></div>
                    </div> <!-- card.// -->

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
