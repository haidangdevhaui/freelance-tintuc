<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags always come first -->
		<title>@if(isset($meta)) {{$meta['title']}} @else @yield('title') @endif</title>
		<meta http-equiv="content-language" content="vi" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta property="fb:app_id" content="100004759420301" />
		<link rel="canonical" href="{{Request::fullUrl()}}">
		<meta name="keywords" content="@if(isset($meta)) {!! $meta['meta_keywords'] !!} @else @yield('meta_keywords') @endif ">
		<meta name="robots" content="@if(isset($meta)) {!! $meta['meta_robots'] !!} @else @yield('meta_robots') @endif ">
		<meta name="description" content="@if(isset($meta)) {!! $meta['meta_description'] !!} @else @yield('meta_description') @endif ">
		<meta name="generator" content="BlueSoft.vn">
		<meta name="copyright" content="Tạp chí báo điện tử Songmoi.vn">
		<meta name="author" content="SongMoi.vn">
		<meta property="og:site_name" content="Tạp chí báo điện tử Songmoi.vn" />
		<meta property="og:title" content="@if(isset($meta)) {{$meta['title']}} @else @yield('title') @endif" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="{{Request::fullUrl()}}" />
		<meta property="og:description" content="@if(isset($meta)) {!! $meta['meta_description'] !!} @else @yield('meta_description') @endif">
		<meta property="og:image" content="@if(isset($meta)) {{ @$meta['og_image'] }} @else @yield('og_image') @endif">
		<meta property="og:image:type" content="image/jpeg">
		<meta property="og:image:width" content="764">
		<meta property="og:image:height" content="454">


		<link href="{{asset('images/logo.ico')}}" rel="shortcut icon" type="image/x-icon" />
		<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ url('css/font-awesome.min.css') }}"/>
		<link rel="stylesheet" href="{{ url('css/owl.theme.default.min.css') }}"/>
		<link rel="stylesheet" href="{{ url('css/owl.carousel.min.css') }}"/>
		<link rel="stylesheet" href="{{ url('css/font-awesome.min.css') }}"/>
		<link rel="stylesheet" href="{{ url('css/style.css') }}"/>
		<link rel="stylesheet" href="{{ url('css/fix.css') }}">
		
		<script src="{{ url('js/jquery-2.1.4.min.js') }}"></script>
		<script src="{{ url('js/bootstrap.min.js') }}"></script>
		<script src="{{ url('js/owl.carousel.min.js') }}"></script>
		<script src="{{ url('js/hover.js') }}"></script>
		<script src="{{ url('js/option_site.js') }}"></script>
	</head>
	<body>
		<div class="wapper">
			@include('front_end._partial.header')
			@yield('content')
			@include('front_end._partial.footer')
		</div>
		@include('front_end._partial.popup')
	</body>
</html>