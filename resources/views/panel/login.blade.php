
<!DOCTYPE html>
<html lang="tr">
	<!--begin::Head-->
	<head>
		<meta charset="utf-8" />
		<title>Giriş Yap - Sirius</title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="/panel/assets/css/pages/login/login-4.css" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="/panel/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/panel/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/panel/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="/panel/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="/panel/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="/panel/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
		<link href="/panel/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="/panel/assets/media/logos/favicon.png" />
		<style>
			.spinner-border { display: none; }
		</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Content-->
				<div class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
					<!--begin::Wrapper-->
					<div class="login-content d-flex flex-column pt-lg-0 pt-12">

						<!--begin::Signin-->
						<div class="login-form">

							<!--begin::Form-->
							<form class="form" action="{{ route('login.auth') }}">
								<!--begin::Title-->
								<div class="pb-5 pb-lg-15">
									<h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Giriş Bilgileri</h3>
									<div class="text-muted font-weight-bold font-size-h4">Lütfen kullanıcı adı ve şifre giriniz</div>
								</div>
								<!--begin::Title-->
								<!--begin::Form group-->
								<div class="form-group">
									<label class="font-size-h6 font-weight-bolder text-dark">E-Posta Adresi</label>
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" value="{{ old('email') }}" type="email" name="email"  />
									<div class="invalid-feedback">
										Bu alan zorunludur
									</div>
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<div class="d-flex justify-content-between mt-n5">
										<label class="font-size-h6 font-weight-bolder text-dark pt-5">Şifre</label>
									</div>
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" type="password" name="password"  />
									<div class="invalid-feedback">
										Bu alan zorunludur
									</div>
								</div>
								<!--end::Form group-->
								@if ($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
								<!--begin::Action-->
								<div class="pb-lg-0 pb-5">
									<button type="submit" class="btn btnSubmit btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
										<span>Giriş Yap</span>
										<div class="spinner-border text-light" role="status">
											<span class="sr-only">Loading...</span>
										</div>
									</button>
								</div>
								<!--end::Action-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signin-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--begin::Content-->
				<!--begin::Aside-->
				<div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right pt-lg-40">
					<div class="login-conteiner bgi-no-repeat bgi-position-x-right bgi-position-y-bottom" style="background-image: url(/panel/assets/media/svg/illustrations/bg-2-yeni.png); background-position: right bottom; background-size: 720px">

						<a href="http://www.sirius.com.tr" target="_blank" class="text-center mb-10" style="display: block;">
							<img src="/panel/assets/media/logos/logo_2020.png" class="max-h-70px" alt="">
						</a>
						<h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #fff;">İçerik Yönetim Sistemi</h3>

					</div>
				</div>
				<!--end::Aside-->
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="/panel/assets/plugins/global/plugins.bundle.js"></script>
		<script src="/panel/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="/panel/assets/js/scripts.bundle.js"></script>
        <script>
			@if( session('error') )
				Swal.fire({
                    title: "{{ session('error') }}",
                    text: "Bilgileri kontrol ederek yeniden giriş yapınız!",
					icon: "error",
					confirmButtonText: "Tamam!",
					customClass: {
						confirmButton: "btn font-weight-bold btn-success"
					}
                });
			@endif
			$( "form" ).submit(function () {
				$('.btnSubmit').find('span').hide();
				$('.btnSubmit').find('.spinner-border').show();
			});
        </script>
	</body>
	<!--end::Body-->
</html>
