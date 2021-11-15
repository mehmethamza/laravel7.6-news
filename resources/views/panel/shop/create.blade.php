@extends('layout.master')

@section('title', 'Mağaza ekle')

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
                            <h3 class="card-label">Mağaza Ekle</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form needs-validation" action="{{ route('shop.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="mb-15">
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right">Logo</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="image-input image-input-outline" id="kt_image_1">
                                                <div class="image-input-wrapper" style="background-image: url(https://dummyimage.com/600x600/eee/666&amp;text=logo)"></div>
                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Logo Ekle">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="profile_image" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="profile_image_remove" />
                                                </label>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Sil">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Dil</label>
                                        <div class="col-lg-6">
                                            <select class="form-control select2 kt_select2" name="lang_id" required>
                                                <option value=""></option>
                                                @foreach( $langs as $lang )
                                                <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Üyelik Tipi</label>
                                        <div class="col-lg-6">
                                            <select class="form-control select2 kt_select2" name="shop_type_id" required>
                                                <option value=""></option>
                                                @foreach( $types as $type )
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Kategori</label>
                                        <div class="col-lg-6">
                                            <select class="form-control select2 kt_select2" name="category_id[]" multiple required>
                                                <option value=""></option>
                                                @foreach( $categories as $category )
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Marka Ünvanı</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="brand_name" placeholder="" />
                                            <div class="invalid-feedback">
                                                Bu alan zorunludur
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Mağaza Adı</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="shop_title" placeholder="" required />
                                            <div class="invalid-feedback">
                                                Bu alan zorunludur
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Hakkımızda</label>
                                        <div class="col-lg-9">
                                            <textarea name="kt-ckeditor-1" name="about_us" class="kt-ckeditor"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Telefon</label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" name="phone" placeholder=""   />
                                            <div class="invalid-feedback">
                                                Bu alan zorunludur
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">WhatsApp Telefon</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="whatsapp_phone" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">E-Posta</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="email" placeholder="" />
                                            <div class="invalid-feedback">
                                                Bu alan zorunludur
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Şifre</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="password" placeholder="" />
                                            <div class="invalid-feedback">
                                                Bu alan zorunludur
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Faks</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="fax" placeholder=""/>
                                        </div>
                                    </div>
                                    {{--
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Mağaza URL</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary btn-icon" type="button"><i class="fas fa-check"></i></button>
                                                    <button class="btn btn-success btn-icon" type="button"><i class="fas fa-check"></i></button>
                                                </div>
                                                <input type="text" class="form-control" placeholder=""/>
                                                <div class="input-group-append"><span class="input-group-text">.turkishleather.com</span></div>
                                            </div>
                                       </div>
                                    </div>
                                    --}}
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Web Site URL</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="web_site" placeholder=""/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Yetkili Kişi</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="manager" placeholder="" />
                                            <div class="invalid-feedback">
                                                Bu alan zorunludur
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Çalışan Sayısı</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="employees_count" placeholder=""/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Adres</label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control" name="address" rows="2"></textarea>
                                            <div class="invalid-feedback">
                                                Bu alan zorunludur
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">İl</label>
                                        <div class="col-lg-6">
                                            <select class="form-control select2 kt_select2" name="city_id">
                                                <option value="1" selected>Adana</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">İlçe</label>
                                        <div class="col-lg-6">
                                            <select class="form-control select2 kt_select2" name="district_id">
                                                <option value="2" selected>Seyhan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Google Map</label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control" name="google_map_code" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Teslimat Tipleri</label>
                                        <div class="col-lg-6">
                                            <select class="form-control select2 kt_select2" name="delivery_type_id[]" multiple>
                                                <option value=""></option>
                                                @foreach( $deliveries as $delivery )
                                                <option value="{{ $delivery->id }}">{{ $delivery->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label text-right">Durum</label>
                                        <div class="col-3">
                                            <span class="switch switch-outline switch-icon switch-primary">
                                                <label>
                                                    <input type="checkbox" checked="checked" name="status" />
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
                                        <button type="submit" class="btn font-weight-bold btn-primary mr-2">KAYDET</button>
                                        <a href="{{ route('shop.list') }}" class="btn font-weight-bold btn-secondary">İPTAL</a>
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
    <script src="assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
    <script src="assets/js/pages/crud/forms/editors/ckeditor-classic.js"></script>
    <script src="assets/js/pages/crud/forms/widgets/bootstrap-datepicker-tr.js"></script>
    <script src="assets/js/pages/crud/forms/widgets/select2.js"></script>
    <script src="assets/js/pages/crud/forms/widgets/bootstrap-timepicker.js"></script>
    <script src="assets/js/pages/crud/file-upload/image-input.js"></script>
    <script>
        $(function(){
            $('.b-datepicker').datepicker({
                language: "tr",
                format: "dd/mm/yyyy",
            });
        });
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
                });
            }, false);
        })();
    </script>
@endsection