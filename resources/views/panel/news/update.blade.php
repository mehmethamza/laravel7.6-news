@extends('panel.layout.master')

@section('title', 'Haber Güncelle')

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
                            <h3 class="card-label">Haber Güncelle</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{ route('news.update', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="mb-15">

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Kategori</label>
                                        <div class="col-lg-6">
                                            <select class="form-control select2 kt_select2" name="category_id" required>
                                                <option value=""></option>
                                                @if (!empty($item -> category[0]))


                                                    @foreach ($item -> category as $itemc)
                                                        @php
                                                            $itemca = $itemc -> name;

                                                        @endphp

                                                    @endforeach
                                                    @foreach( $categories as $cat )

                                                    <option @if($cat-> name == $itemca ) selected @endif value="{{ $cat->id }}">{{ $cat->name }} </option>
                                                    @endforeach



                                                @endif
                                                    @foreach( $categories as $cat )

                                                    <option  value="{{ $cat->id }}">{{ $cat->name }} </option>
                                                    @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Görme Yetkisi</label>
                                        <div class="col-lg-6">
                                            <select class="form-control select2 kt_select2" name="payment_type" required>
                                                <option value=""></option>

                                                <option @if($item -> payment_type == 0)  selected   @endif value="0">Kayıtsız Kullanıcı + Ödeme Yapmamış Kullanıcı + Diğer Üyelikler</option>
                                                <option  @if($item -> payment_type == 1)  selected   @endif value="1">Silver + Gold</option>
                                                <option @if($item -> payment_type == 2)  selected   @endif value="2">Gold</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Başlık</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="title" value="{{ $item->title }}" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Resim</label>
                                        <div class="col-lg-6">
                                            <input type="file" class="form-file"  name="image" id="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Açıklama</label>
                                        <div class="col-lg-9">
                                            <textarea name="content" class="kt-ckeditor">{{ $item->content }}</textarea>
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
                                        <a href="{{ route('news.index') }}" class="btn font-weight-bold btn-secondary">İPTAL</a>
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
