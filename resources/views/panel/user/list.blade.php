@extends('panel.layout.master')

@section('title', 'Kullanıcı Listesi')

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
                            <h3 class="card-label">Kullanıcı Listesi</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            {{-- <a href="{{ route('user.create') }}" class="btn btnLoading btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md"> --}}
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                                        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span>Yeni Ekle</span> --}}
                            <div class="spinner-border text-light" role="status">
                                <span class="sr-only">Loading...</span>
                            </div></a>
                            <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-disabled none">
                            <div class="spinner-border text-dark" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>İsim</th>
                                    <th>E-Posta </th>
                                    <th>Ip</th>
                                    <th>Kıta</th>
                                    <th>Ülke</th>

                                    <th> Şehir</th>
                                    <th>Zıp</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($items as $item)
                                <tr>

                                   <td>{{$item -> id}}</td>
                                   <td>{{$item -> name}}</td>
                                   <td>{{$item -> email}}</td>
                                   <td>{{$item -> ip}}</td>
                                   <td>{{$item -> continent}}</td>
                                   <td>{{$item -> country}}</td>
                                   <td>{{$item -> region}}</td>
                                   <td>{{$item -> zip}}</td>
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
    <script src="/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Page Vendors-->
    <script src="/assets/js/custom.js"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    @if( session('success') )
        <script>
            Swal.fire({
                title: "{{ session('success') }}",
                icon: "success",
                timer: 3000,
                showConfirmButton: false,
            })
        </script>
    @endif
@endsection
