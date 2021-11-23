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
                            <h3 class="card-label">Site Ayarları</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="mb-15">

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Kayan Yazı</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="braking" value="{{ $item -> braking}}" class="{{ old('name') }}" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Facebook</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="facebook" value="{{ $item -> facebook}}" class="{{ old('name') }}" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Twitter</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="twitter" value="{{ $item -> twitter}}" class="{{ old('name') }}" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right"> Pinterest</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="pinterest" value="{{ $item -> pinterest}}" class="{{ old('name') }}" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Google</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="google" value="{{ $item -> google}}" class="{{ old('name') }}" placeholder="" />
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <button  class="btn font-weight-bold btn-primary mr-2" type="submit" >
                                            <span>KAYDET</span>
                                            <div class="spinner-border text-light" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </button>
                                        <a href="{{ route('setting.index') }}" class="btn font-weight-bold btn-secondary">İPTAL</a>
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
    <script src="/panel/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
    <script src="/panel/assets/js/pages/crud/forms/editors/ckeditor-classic.js"></script>
    <script src="/panel/assets/js/pages/crud/forms/widgets/select2.js"></script>
    <script src="/panel/assets/plugins/custom/loading.js"></script>
@endsection
