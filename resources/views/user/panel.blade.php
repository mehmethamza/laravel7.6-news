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
        @include('user.navbar-standerd')

		<!-- header nav end-->


  <!-- top bar start -->
  <!-- block post area start-->



  <section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mx-auto">

                <div class="ts-grid-box">
                    <div class="reg-page">
                        <h3 class="log-sign-title mb-25"> Your information</h3>
                        <form action="{{route("kullanici.edit")}}" method="POST" >
                            @csrf
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>First name </label>
                                        <input type="text" class="form-control" name="name" value="{{$user -> name}}" placeholder="">
                                </div> <!-- form-group end.// -->
                                <div class="col form-group">
                                    <label>Surname</label>
                                        <input type="text" class="form-control" name="surname" value="{{$user -> surname}}" placeholder=" ">
                                </div> <!-- form-group end.// -->
                            </div> <!-- form-row end.// -->
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" name="email" value="{{$user -> email}}" placeholder="">
                                <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div> <!-- form-group end.// -->

                            <div class="form-group">
                                <label>Last Password</label>
                                <input class="form-control" name="lastpassword"  type="password">
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <label> New Password</label>
                                <input class="form-control" name="password"  type="password">
                            </div> <!-- form-group end.// -->

                                <button type="submit" class="btn btn-primary btn-block"> Update  </button>
                            </div> <!-- form-group// -->

                        </form>

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
