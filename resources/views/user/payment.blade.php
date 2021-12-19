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

       {{-- <div class="card">
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
       </div> --}}

       <div class="container">
        <table class="table m-3 table-dark">
            <thead>
              <tr>

                <th scope="col">Özellikler</th>
                <th scope="col">Üye Olmayan</th>
                <th scope="col">Üye Olan</th>
                <th scope="col">Silver</th>
                <th scope="col">Gold</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Onaysız Yorum Yazma</td>
                    <td>Hayır</td>
                    <td>Evet</td>
                    <td>Evet</td>
                    <td>Evet</td>
                </tr>
                <tr>
                    <td>Favorilere Ekleme</td>
                    <td>Hayır</td>
                    <td>Hayır</td>
                    <td>Evet</td>
                    <td>Evet</td>
                </tr>
                <tr>
                    <td>Silver İçerikleri Görme</td>
                    <td>Hayır</td>
                    <td>Hayır</td>
                    <td>Evet</td>
                    <td>Evet</td>
                </tr>
                <tr>
                    <td>Gold İçerikleri Görme</td>
                    <td>Hayır</td>
                    <td>Hayır</td>
                    <td>Hayır</td>
                    <td>Evet</td>
                </tr>
                <tr>
                    <td>Fiyat</td>
                    <td>0Tl</td>
                    <td>0Tl</td>
                    <td>50Tl</td>
                    <td>100Tl</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form action="{{route("payshow")}}" method="post">
                            @csrf
                            <input type="hidden" name="type" value="silver">
                            <Button type="submit" class=" btn btn-danger btn-sm">Silver Üyelik Al</Button>
                        </form>

                    </td>
                    <td>
                        <form action="{{route("payshow")}}" method="post">
                            @csrf
                            <input type="hidden" name="type" value="gold">
                            <Button type="submit" class=" btn btn-danger btn-sm">Gold Üyelik Al</Button>
                        </form>
                    </td>
                </tr>


            </tbody>
          </table>
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
