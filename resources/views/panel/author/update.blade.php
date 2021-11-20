@extends('panel.layout.master')

@section('title', 'Yazar Güncelle')

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
                            <h3 class="card-label">Yazar Güncelle</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{ route('author.update',["id" => $item -> id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="mb-15">

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Adı Soyadı</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="name" value="{{$item -> name}}" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Sözü</label>
                                        <div class="col-lg-6">
                                            {{-- <input type="text" class="form-control" name="statement" value="" placeholder="" /> --}}
                                            <textarea name="statement"  class="form-control" id="" cols="30" rows="10">{{$item -> statement}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Facebook</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="facebook" value="{{$item -> facebook}}" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Twitter</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="twitter" value="{{$item -> twitter}}" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Linkedin</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="linkedin" value="{{$item -> linkedin}}" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Gooogle</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="google" value="{{$item -> google}}" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Cinsiyet</label>
                                        <div class="col-lg-6">
                                            <select class="form-control select2 kt_select2" name="cinsiyet" >
                                                <option value=""></option>
                                                <option @if($item -> cinsiyet == "erkek")  selected  @endif value="erkek">Erkek</option>
                                                <option @if($item -> cinsiyet == "kadin")  selected  @endif value="kadin">Kadın</option>


                                            </select>
                                        </div>
                                    </div>






                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn font-weight-bold btn-primary mr-2">
                                            <span>Güncelle</span>
                                            <div class="spinner-border text-light" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </button>
                                        <a href="{{ route('author.index') }}" class="btn font-weight-bold btn-secondary">İPTAL</a>
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
