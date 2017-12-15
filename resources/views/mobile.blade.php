<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="fb:app_id" content="1208298642526398" />
    <meta name="keywords" content="@if(isset($tag_meta)) {!! $tag_meta->meta_keyword !!} @else @yield('meta_keyword') @endif ">
    <meta name="description" content="@if(isset($tag_meta)) {!! $tag_meta->meta_description !!} @else @yield('meta_description') @endif ">
    <title>@if(isset($tag_meta)) {!! $tag_meta->meta_title !!} @else @yield('meta_title') @endif </title>
    <link rel="stylesheet" href="{{ url('assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/bower_components/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ url('assets/mobile/css/reset.css') }}">
    <link rel="stylesheet" href="{{ url('assets/mobile/css/owl.custom.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/mobile/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/mobile/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/mobile/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/mobile.css') }}">
    <script src="{{ asset('assets/mobile/js/jquery-2.1.4.min.js') }}"></script>
    <script>
        var baseURL = "{!! url('/') !!}";
    </script>
    <script src="{{ url('assets/js/option_site.js') }}"></script>
</head>

<body>
@yield('content_home_mobile')
<!-- jQuery-->

<script type="text/javascript" src="{{ url('assets/mobile/js/script.js') }}"></script>
<script src="{{ url('assets/mobile/js/owl.carousel.min.js') }}"></script>
<script>
    $(document).ready(function ($) {
        $('.loop').owlCarousel({
            itemsDesktop: [1199, 10],
            center: false,
            items: 1.5,
            loop: true,
            margin: 10
        });

        $('.detail-content').find('img').each(function(){
            console.log($(this).attr('src'));
            $(this).css({
                'width': '100%',
                'height': '100%'
            });
        });
    });
</script>
</body>

</html>
