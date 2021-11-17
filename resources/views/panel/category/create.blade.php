
@extends('panel.layout.master')

@section('title', 'Kategori Ekle')

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
                            <h3 class="card-label">Kategori Ekle</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="mb-15">

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Kategori Adı</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="name" class="{{ old('name') }}" placeholder="" />
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label  text-right">Türü</label>
                                        <div class="col-lg-6">
                                            <select class="form-control select2 kt_select2 turu " onchange="getir()" name="turu" required>
                                                <option value=""></option>
                                                <option value="ana">Ana Kategori</option>
                                                <option value="alt">Alt Kategori</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row tipi"  style="display: none">
                                        <label class="col-lg-3 col-form-label text-right">Tipi</label>
                                        <div class="col-lg-6">
                                            <select class="form-control select2 kt_select2" name="type" >
                                                <option value=""></option>
                                                <option value="one">One</option>
                                                <option value="panel">Panel</option>
                                                <option value="tabs">Tabs</option>
                                                <option value="navdown">Navdown</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row ana" style="display: none">
                                        <label class="col-lg-3 col-form-label text-right">Ana Kategorisi</label>
                                        <div class="col-lg-6">
                                            <select class="form-control select2 kt_select2"    name="category_id" >
                                                <option value=""></option>
                                                @foreach ($categories as $item)
                                                <option value="{{$item -> id }}">{{$item -> name}}</option>

                                                @endforeach

                                            </select>
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
<script>

    var tipi = document.querySelector(".tipi");
    var turu = document.querySelector(".turu");
    var ana = document.querySelector(".ana");

    function getir() {
        switch (turu.value) {
            case "ana":
                tipi.style.display = "none";
                ana.style.display = "none";
                tipi.style.display = '';

                break;

            case "alt":
                tipi.style.display = "none";
                ana.style.display = "none";
                ana.style.display = '';


                break;
            default:
                break;
        }
    }









</script>
    <script src="/panel/assets/js/pages/crud/forms/widgets/select2.js"></script>
    <script src="/panel/assets/plugins/custom/loading.js"></script>
@endsection
