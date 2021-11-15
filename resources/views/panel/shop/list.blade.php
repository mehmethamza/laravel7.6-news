@extends('layout.master')

@section('title', 'Mağaza Listesi')

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">Mağaza Listesi</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{ route('shop.create') }}" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" cx="9" cy="15" r="6" />
                                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>Yeni Ekle</a>
                            <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Logo</th>
                                    <th>Mağaza Adı</th>
                                    <th>Yetkili Kişi</th>
                                    <th>Telefon</th>
                                    <th>E-Posta</th>
                                    <th>Web Site</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><img src="https://dummyimage.com/600x400/eee/666&amp;text=logo" width="100" alt=""></td>
                                    <td>{{ $item->shop_title }}</td>
                                    <td>{{ $item->manager }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td><a href="{{ $item->web_site }}">{{ $item->web_site }}</a></td>
                                    <td>
                                        @if( $item->status == 1 )
                                        <span class="label label-lg font-weight-bold label-success label-inline">Aktif</span>
                                        @else
                                        <span class="label label-lg font-weight-bold label-inline">Pasif</span>
                                        @endif
                                    </td>
                                    <td nowrap="nowrap">
                                        <div class="dropdown dropdown-inline" data-toggle="tooltip" data-theme="dark" title="İşlemler">
                                            <a href="javascript:;" class="btn btn-light-info btn-icon font-weight-bold mr-2" data-toggle="dropdown">
                                                <span class="svg-icon svg-icon-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                                <ul class="navi flex-column navi-hover py-2">
                                                    <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                                                        İşlemler
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="{{ route('image.list') }}" class="navi-link">
                                                            <span class="navi-icon"><i class="la la-arrow-right"></i></span>
                                                            <span class="navi-text">Mağaza Resimleri</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-icon"><i class="la la-arrow-right"></i></span>
                                                            <span class="navi-text">Ürünler</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-icon"><i class="la la-arrow-right"></i></span>
                                                            <span class="navi-text">Sosyal Medya</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-icon"><i class="la la-arrow-right"></i></span>
                                                            <span class="navi-text">Sertifikalar</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-icon"><i class="la la-arrow-right"></i></span>
                                                            <span class="navi-text">Kargo Yöntemleri</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-icon"><i class="la la-arrow-right"></i></span>
                                                            <span class="navi-text">Videolar</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link delete-alert">
                                                            <span class="navi-icon"><i class="la la-arrow-right"></i></span>
                                                            <span class="navi-text">Delete</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <a href="javascript:;" class="btn btn-light-primary btn-icon font-weight-bold mr-2" data-toggle="tooltip" data-theme="dark" title="Düzenle">	                           
                                            <span class="svg-icon svg-icon-md">	                                
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">	                                    
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">	                                        
                                                        <rect x="0" y="0" width="24" height="24"></rect>	                                        
                                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>	                                        
                                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>	                                    
                                                    </g>	                                
                                                </svg>	                            
                                            </span>	                        
                                        </a>
                                        <a href="javascript:;" class="btn btn-light-danger btn-icon font-weight-bold mr-2 delete-alert" data-toggle="tooltip" data-theme="dark" title="Sil">	                           
                                            <span class="svg-icon svg-icon-md">	                                
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">	                                    
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">	                                        
                                                        <rect x="0" y="0" width="24" height="24"></rect>	                                        
                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>	                                        
                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>	                                    
                                                    </g>	                                
                                                </svg>                         
											</span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection

@section('pageJs')
    <!--begin::Page Vendors(used by this page)-->
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script>
        "use strict";
        var KTDatatablesBasicPaginations = function() {
            var initTable1 = function() {
                var table = $('#kt_datatable');
                // begin first table
                table.DataTable({
                    responsive: true,
                    pagingType: 'full_numbers',
                    order: [[ 0, "desc" ]]
                });
            };
            return {
                //main function to initiate the module
                init: function() {
                    initTable1();
                },
            };
        }();
        jQuery(document).ready(function() {
            KTDatatablesBasicPaginations.init();
            $('.tooltips').tooltip();
            @if( session('success') )
                Swal.fire({
                    title: "{{ session('success') }}",
                    text: "İşleminiz başarıyla gerçekleştirildi.",
                    icon: "success",
                    timer: 2000,
                    confirmButtonText: "Kapat"
                })
            @endif
            @if( session('error') )
                swal({
                    title:"{{ session('error') }}",
                    icon: "error",
                    timer:2000,
                    showConfirmButton:!1
                });
            @endif
			$(".delete-alert").click(function() {
                Swal.fire({
                    title: "Silmek istediğinize emin misiniz?",
                    text: "Bu işlemin geri dönüşü yoktur..",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Evet, Sil",
                    cancelButtonText: "Çıkış Yap",
                }).then(function(result){
                    if (result.value) {
                        Swal.fire(
                            "Silindi!",
                            "Silme işlemi gerçekleştirildi.",
                            "success"
                        )
                    }
                }); 
            });
        });
		$( "#kt_datatable").on( "click", "tr.odd, tr.even", function(){
			$(".delete-alert").click(function(){
                Swal.fire({
                    title: "Silmek istediğinize emin misiniz?",
                    text: "Bu işlemin geri dönüşü yoktur..",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Evet, Sil",
                    cancelButtonText: "Çıkış Yap",
                }).then(function(result){
                    if (result.value) {
                        Swal.fire(
                            "Silindi!",
                            "Silme işlemi gerçekleştirildi.",
                            "success"
                        )
                    }
                }); 
            });
		});
    </script>
@endsection