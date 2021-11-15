@extends('panel.layout.master')

@section('title', 'Haber Listesi')

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
                            <h3 class="card-label">Haber Listesi</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{ route('news.create') }}" class="btn btnLoading btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                                        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span>Yeni Ekle</span>
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
                                    <th>Resim</th>
                                    <th>Kategori Adı</th>
                                    <th>Haber Adı</th>


                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                @php $item->title != '' ? $imgName = Str::slug($item->title) : $imgName = 'news-img'; @endphp
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td> <a><img src="{{$item -> image}}" width="100" style="width: 800 px" style="height: 600 px" alt=""></a></td>
                                    <td>
                                         @foreach ($item ->category as $category)
                                        {{$category -> name}}
                                    @endforeach </td>
                                    <td>{{ $item->title }}</td>


                                    <td nowrap="nowrap">
                                        <a href="{{ route('news.edit', ['id' => $item->id]) }}" class="btn btn-light-primary btn-icon font-weight-bold mr-2" data-toggle="tooltip" data-theme="dark" title="Düzenle">
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
                                        <a data-url=" {{ route('news.destroy', ['id' => $item->id]) }} " href="javascript:;" class="btn btn-light-danger btn-icon font-weight-bold mr-2 delete-alert" data-toggle="tooltip" data-theme="dark" title="Sil">
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
    <script src="/panel/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Page Vendors-->
    <script src="/panel/assets/js/custom.js"></script>
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
