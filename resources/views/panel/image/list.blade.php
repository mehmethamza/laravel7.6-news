@extends('panel.layout.master')

@section('title', 'Resim Listesi')

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Resim Yükleme</h3>
                        </div>
                    </div>
                    <!--begin::Form-->

                    <div class="card-body">
                        
                        <form class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_2" enctype="multipart/form-data">
                            @csrf
                            <div class="m-dropzone__msg dz-message needsclick">
                                <h3 class="m-dropzone_msg-title">Resim Yüklemek İçin Tıklayın veya Resimleri Sürükleyin</h3>
                                <span class="m-dropzone_msg-desc">Aynı Anda Maksimum 10 Resim Yükleyebilirsiniz</span>
                            </div>
                            <input type="hidden" name="name" value="{{ $name }}">
                            <input type="hidden" name="size" value="{{ $size }}">
                            <input type="hidden" name="category" value="{{ $category }}">
                            <input type="hidden" name="cat_id" value="{{ $cat_id }}">
                        </form>
                            
                        <!--end::Form-->
                    </div>
                </div>
                <!--end::Card-->

                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Yüklenen Resimler</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-disabled none">
                            <div class="spinner-border text-dark" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        @if( $items->count() < 1 )
                        <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                            <div class="alert-icon">
                                <i class="flaticon-warning"></i>
                            </div>
                            <div class="alert-text">BU KATEGORİYE AİT RESİM BULUNMAMAKTADIR YÜKLEMEK İÇİN YUKARIDAKİ ALANI KULLANABİLİRSİNİZ</div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">
                                        <i class="ki ki-close"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
                        @else
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Görsel</th>
                                        <th>Resim Adı</th>
                                        <th>Sırala</th>
                                        <th>Sıra</th>
                                        <th>Durumu</th>
                                        <th>Kapak</th>
                                        <th>İşlem</th>
                                    </tr>
                                </thead>
                                <tbody class="m-sortable" data-url="{{ route('image.rank') }}">
                                @foreach ( $items as $item )
                                    <tr id="ord-{{ $item->id }}">
                                        <td>{{ $item->id }}</td>
                                        <td><img width="100" src="/storage/{{ $item->url }}" alt=""></td>
                                        <td>{{ $item->url }}</td>
                                        <td><span class="item-sortable btn btn-primary btn-icon"> <i class="fa fa-arrows-alt-v"></i> </span> </td>
                                        <td>{{ $item->rank }}</td>
                                        <td>
                                            <span class="switch switch-outline switch-icon switch-primary">
                                                <label>
                                                    <input data-url="{{ route('image.status', ['id' => $item->id]) }}" name="status" class="swich" @if($item->status == 1) checked @endif type="checkbox" />
                                                    <span></span>
                                                </label>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="switch switch-outline switch-icon switch-info">
                                                <label>
                                                    <input data-url="{{ route('image.cover', ['id' => $item->id, 'category' => $category, 'cat_id' => $cat_id]) }}" name="cover" class="swich" @if($item->cover == 1) checked @endif type="checkbox" />
                                                    <span></span>
                                                </label>
                                            </span>
                                        </td>
                                        <td>
                                            <a data-url="{{ route('image.destroy', ['id' => $item->id, 'name' => $item->url]) }}" href="javascript:;" class="btn btn-danger btn-icon font-weight-bold mr-2 delete-alert" data-toggle="tooltip" data-theme="dark" title="Sil">	                           
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
                        </div>
                        @endif
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function(){
            $(".m-sortable").sortable({
                connectWith: ".m-sortable",
                placeholder: "sortable-highlight",
                handle: ".item-sortable",
            });
            $( ".m-sortable" ).disableSelection();
            $(".m-sortable").on("sortupdate", function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('.table-disabled').removeClass('none');
                var $data = $(this).sortable("serialize");
                var $dataUrl = $(this).data("url");
                $.post($dataUrl, {data: $data}, function(response){
                    //alert(response);
                    setTimeout(function(){
                        window.location.reload();
                    }, 80);
                });
                
            });
        });
        var myDropzone = new Dropzone( '#kt_dropzone_2', {
            url: "{{ route('image.store') }}", // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks:!0,
            parallelUploads: 1
        });
        myDropzone.on("complete", function(file) {
            setTimeout(function(){
                window.location.reload();
            }, 5000);
        });
        $(".swich").change(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.table-disabled').removeClass('none');
            var $data = $(this).prop("checked");
            var $dataUrl = $(this).data("url");
            
            if( $data != "undefined" && $dataUrl != "undefined" ){
                $.post( $dataUrl, {data : $data}, function(response){
                    setTimeout(function(){
                        window.location.reload();
                    }, 80);
                });
            }
        });
        $(".delete-alert").click(function() {
            var $dataUrl = $(this).data("url");
            Swal.fire({
                title: "Silmek istediğinize emin misiniz?",
                text: "Bu işlemin geri dönüşü yoktur..",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Evet, Sil",
                cancelButtonText: "Vazgeç",
            }).then(function(result){
                if (result.value) {
                    window.location.href = $dataUrl;
                }
            }); 
        });
    </script>
@endsection