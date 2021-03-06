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
                                            <input type="text" class="form-control" name="name" value="{{ $item -> name}}" class="{{ old('name') }}" placeholder="" />
                                        </div>
                                    </div>



                                    @if ($item -> pid == "0")


                                    <div class="form-group row "  >
                                        <label class="col-lg-3 col-form-label text-right">Tipi</label>
                                        <div class="col-lg-6">
                                            <select class="form-control select2 kt_select2" name="type" >
                                                <option value=""></option>
                                                <option @if($item -> type == "one") selected @endif  value="one">One</option>
                                                <option @if($item -> type == "panel") selected @endif value="panel">Panel</option>
                                                <option @if($item -> type == "tabs") selected @endif value="tabs">Tabs</option>
                                                <option @if($item -> type == "navdown") selected @endif value="navdown">Navdown</option>

                                            </select>
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group row " >
                                        <label class="col-lg-3 col-form-label text-right">Ana Kategorisi</label>
                                        <div class="col-lg-6">
                                            <select class="form-control select2 kt_select2"    name="category_id" >
                                                <option value=""></option>
                                                @foreach ($categories as $category)
                                                <option @if($item -> pid == $category ->id) selected  @endif value="{{$category -> id }}">{{$category -> name}}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    @endif



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
    <script src="/panel/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
    <script src="/panel/assets/js/pages/crud/forms/editors/ckeditor-classic.js"></script>
    <script src="/panel/assets/js/pages/crud/forms/widgets/select2.js"></script>
    <script src="/panel/assets/plugins/custom/loading.js"></script>
@endsection
