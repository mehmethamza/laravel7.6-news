<!doctype html>
<html lang="en">

<head>
	<!-- Basic Page Needs =====================================-->
	<meta charset="utf-8">

	<!-- Mobile Specific Metas ================================-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

	<!-- Site Title- -->
	<title>@yield('title')</title>

	<!-- CSS
   ==================================================== -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="/css/font-awesome.min.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="/css/animate.css">

	<!-- IcoFonts -->
	<link rel="stylesheet" href="/css/icofonts.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="/css/owlcarousel.min.css">

	<!-- slick -->
	<link rel="stylesheet" href="/css/slick.css">



	<!-- navigation -->
	<link rel="stylesheet" href="/css/navigation.css">

	<!-- magnific popup -->
	<link rel="stylesheet" href="/css/magnific-popup.css">




	<!-- Style -->
	<link rel="stylesheet" href="/css/style.css">

	<link rel="stylesheet" href="/css/colors/color-3.css">

	<!-- Responsive -->
	<link rel="stylesheet" href="/css/responsive.css">


	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	@yield('content')


	<!-- javaScript Files
	=============================================================================-->

	<!-- initialize jQuery Library -->
	<script src="/js/jquery.min.js"></script>
	<!-- navigation JS -->
	<script src="/js/navigation.js"></script>
	<!-- Popper JS -->
	<script src="/js/popper.min.js"></script>

	<!-- magnific popup JS -->
	<script src="/js/jquery.magnific-popup.min.js"></script>



	<!-- Bootstrap jQuery -->
	<script src="/js/bootstrap.min.js"></script>
	<!-- Owl Carousel -->
	<script src="/js/owl-carousel.2.3.0.min.js"></script>
	<!-- slick -->
	<script src="/js/slick.min.js"></script>

	<!-- smooth scroling -->
	<script src="/js/smoothscroll.js"></script>

	<script src="/js/main.js"></script>
</body>

</html>
