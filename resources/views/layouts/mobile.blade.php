<!DOCTYPE html>
<html lang="vi">
    <head>
        <title>@if(isset($meta)) {{$meta['title']}} @else @yield('title') @endif</title>
        <meta charset="utf-8">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="fb:app_id" content="100004759420301" />
        <meta name="keywords" content="@if(isset($meta)) {!! $meta['meta_keywords'] !!} @else @yield('meta_keywords') @endif ">
        <meta name="robots" content="@if(isset($meta)) {!! $meta['meta_robots'] !!} @else @yield('meta_robots') @endif ">
        <meta name="description" content="@if(isset($meta)) {!! $meta['meta_description'] !!} @else @yield('meta_description') @endif ">
        <meta http-equiv="content-language" content="vi" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta name="generator" content="BlueSoft.vn">
        <meta name="copyright" content="Tạp chí báo điện tử Songmoi.vn">
        <meta name="author" content="SongMoi.vn">
        <meta property="og:site_name" content="Tạp chí báo điện tử Songmoi.vn" />
        <meta property="og:title" content="@if(isset($meta)) {{$meta['title']}} @else @yield('title') @endif" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="{{Request::fullUrl()}}" />
        <meta property="og:description" content="@if(isset($meta)) {!! $meta['meta_description'] !!} @else @yield('meta_description') @endif">
        <meta property="og:image" content="@if(isset($meta)) {{ @$meta['og_image'] }} @else @yield('og_image') @endif">
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="764">
        <meta property="og:image:height" content="454">
        <!-- Bootstrap CSS -->
        <!-- <link rel="stylesheet" href="{{asset('assets/mobile/css/bootstrap.min.css')}}" > -->
        <link href="{{asset('assets/mobile/css/font-awesome.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('images/logo.ico')}}" rel="shortcut icon" type="image/x-icon" />
        <!-- <link href="{{asset('assets/mobile/css/owl.carousel.css')}}" rel="stylesheet"> -->
        <link href="{{asset('assets/mobile/css/reset.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/mobile/css/owl.custom.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/mobile/css/owl.carousel.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/mobile/css/style.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/mobile/css/responsive.css')}}" rel="stylesheet"/>
        <script src="{{asset('assets/mobile/js/jquery-2.1.4.min.js')}}"></script>
    </head>
    <body>
        @include('front_end.mobile._partial.header')
        @yield('content')
        <button class="onTop">
            <i class="fa fa-arrow-up"></i>
        </button>
        @include('front_end.mobile._partial.footer')
        <!-- jQuery-->
        
        <script src="{{asset('assets/mobile/js/script.js')}}" type="text/javascript">
        </script>
        <script src="{{asset('assets/mobile/js/owl.carousel.min.js')}}">
        </script>
        <script src="{{ asset('assets/mobile/js/ad.js') }}"></script>
        <script>
            var baseURL = '{{url("/")}}';
            jQuery(document).ready(function($) {
    	      	$('.item img').css({
    	      		height: 300+'px'
    	      	});
    	        $('.loop').owlCarousel({
    	          itemsDesktop : [1199,10],
    	          center: false,
    	          items: 1.5,
    	          loop: true,
    	          margin: 10
    	        });
    	      });
        </script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-75508376-1', 'auto');
          ga('send', 'pageview');

        </script>
    </body>
</html>
