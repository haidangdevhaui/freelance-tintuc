<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta property="fb:app_id" content="100004759420301" />
    <meta name="keywords" content="@if(isset($tag_meta)) {!! $tag_meta->meta_keyword !!} @else @yield('meta_keyword') @endif ">
    <meta name="description" content="@if(isset($tag_meta)) {!! $tag_meta->meta_description !!} @else @yield('meta_description') @endif ">
    <title>@if(isset($tag_meta)) {!! $tag_meta->meta_title !!} @else @yield('meta_title') @endif </title>
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/font-awesome/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ url('assets/css/owl.theme.default.min.css') }}"/>
    <link rel="stylesheet" href="{{ url('assets/css/owl.carousel.min.css') }}"/>
    <link rel="stylesheet" href="{{ url('assets/bower_components/font-awesome/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ url('assets/css/songmoi.css') }}"/>
    <link rel="stylesheet" href="{{ url('assets/css/front_end.css') }}"/>
    
    <script src="{{ url('assets/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('assets/js/hover.js') }}"></script>
    <script>
        var urlredirect = "{{ url('mb') }}";
        var urlredirectDesktop = "{{ url('/') }}";
    </script>
    <script src="{{ url('assets/js/option_site.js') }}"></script>
</head>
<body>
<div class="wapper">
    @yield('content_home')
</div>
</body>
</html>