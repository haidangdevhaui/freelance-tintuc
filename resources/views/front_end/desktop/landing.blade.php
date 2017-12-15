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
		<link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ url('assets/font-awesome/css/font-awesome.min.css') }}"/>
		<link rel="stylesheet" href="{{ url('assets/css/owl.theme.default.min.css') }}"/>
		<link rel="stylesheet" href="{{ url('assets/css/owl.carousel.min.css') }}"/>
		<link rel="stylesheet" href="{{ url('assets/bower_components/font-awesome/css/font-awesome.min.css') }}"/>
		
		<script src="{{ url('assets/js/jquery-2.1.4.min.js') }}"></script>
		<script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>

		<script>
(function (i, s, o, g, r, a, m) {
	i['GoogleAnalyticsObject'] = r;
	i[r] = i[r] || function () {
		(i[r].q = i[r].q || []).push(arguments)
	}, i[r].l = 1 * new Date();
	a = s.createElement(o),
			m = s.getElementsByTagName(o)[0];
	a.async = 1;
	a.src = g;
	m.parentNode.insertBefore(a, m)
})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

ga('create', 'UA-75508376-1', 'auto');
ga('send', 'pageview');

		</script>
	</head>
	<body>
		{!! $content !!}
	</body>
</html>