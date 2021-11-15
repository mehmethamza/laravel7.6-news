@extends('panel.layout.master')

@section('title', 'Kategori Güncelle')

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
                            <h3 class="card-label">Kategori Güncelle</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{ route('category.update', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="mb-15">
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Kategori Adı</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="name" value="{{ $item->name }}" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Sıra</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="rank" value="{{ $item->rank }}" placeholder="" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label text-right">Durum</label>
                                        <div class="col-3">
                                            <span class="switch switch-outline switch-icon switch-primary">
                                                <label>
                                                    <input type="checkbox" @if($item->status == 1) checked @endif name="status" />
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn font-weight-bold btn-primary mr-2">
                                            <span>KAYDET</span>
                                            <div class="spinner-border text-light" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </button>
                                        <a href="{{ route('category.index') }}" class="btn font-weight-bold btn-secondary">İPTAL</a>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    <script src="/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
    <script src="/assets/js/pages/crud/forms/editors/ckeditor-classic.js"></script>
    <script src="/assets/js/pages/crud/forms/widgets/select2.js"></script>
    <script src="/assets/plugins/custom/loading.js"></script>
@endsection