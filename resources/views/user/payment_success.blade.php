@extends('layouts.master')

@section('title')
   User
@endsection

@section('content')

		<!-- top bar start -->
        @include('layouts.partials.top-bar')
		<!-- end top bar-->


		<!-- header nav start-->
        @include('layouts.partials.navbar-standerd')

		<!-- header nav end-->
        @include('user.navbar-standerd')

        <div class="container mt-2 mb-2">
            <style>
                 body {
                  text-align: center;
                  /* padding: 40px 0; */
                  background: #EBF0F5;
                }
                  h1 {
                    color: #88B04B;
                    font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
                    font-weight: 900;
                    font-size: 40px;
                    margin-bottom: 10px;
                  }
                  p {
                    color: #404F5E;
                    font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
                    font-size:20px;
                    margin: 0;
                  }
               .d  i {
                  color: #9ABC66;
                  font-size: 100px;
                  line-height: 200px;
                  margin-left:-15px;
                }
                .card {
                  background: white;
                  padding: 60px;
                  border-radius: 4px;
                  box-shadow: 0 2px 3px #C8D0D8;
                  display: inline-block;
                  margin: 0 auto;
                }
              </style>

            <div class="card d">
            <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                <i class="checkmark">✓</i>
            </div>
                <h1>Success</h1>
                <p> @switch(Auth::guard("user") -> user() -> payment_type)
                    @case(1)
                        Silver
                        @break
                    @case(2)
                        Gold
                        @break
                    @default

                @endswitch
                 Aboneliğiniz Başarıyla Gerçekleştirilmiştir <br/> İyi Okumalar</p>
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
