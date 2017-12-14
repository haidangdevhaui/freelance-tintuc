@extends('admin') 
@section('content_admin') 
@include('admin.partials._header') 
@include('admin.partials._sidebar')
<!-- page content -->
<div class="rightpanel">
    <ul class="breadcrumbs">
        <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
        <li><a href="table-static.html">Tables</a> <span class="separator"></span></li>
        <li>Table Dynamic</li>
        <li class="right">
            <a href="" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-tint"></i> Color Skins</a>
            <ul class="dropdown-menu pull-right skin-color">
                <li><a href="default">Default</a></li>
                <li><a href="navyblue">Navy Blue</a></li>
                <li><a href="palegreen">Pale Green</a></li>
                <li><a href="red">Red</a></li>
                <li><a href="green">Green</a></li>
                <li><a href="brown">Brown</a></li>
            </ul>
        </li>
    </ul>
    <!--pageheader-->
    <div class="maincontent list_news_admin list_categories_admin">
        <div class="maincontentinner">
        <div class="content_images">
            <div class="contai_site_images">
                    @if(isset($img_post))
                        @foreach($img_post as $img_post_val)
                            <div class="cols_site">
                                <div class="cols_site_content">
                                    @if(!empty($img_post_val->images))
                                        <div class="list_item_images img_admin_avatar" style="background-image: url({{ url('Uploads/News/'.$img_post_val->images) }});">
                                            <a href="{{ URL::route('getNewsDetail', $img_post_val->slug) }}">
                                                <img src="{{ url('assets/images/bg_images.png') }}" alt="">
                                                <h3 class="title">{!! $img_post_val->name !!}</h3>
                                            </a>
                                        </div>
                                    @else
                                        <div class="img_admin_avatar list_item_images" style="background-image: url({{ url('assets/images/no-image.jpg') }})">
                                            <a href="{{ URL::route('getNewsDetail', $img_post_val->slug) }}">
                                                <img src="{{ url('assets/images/bg_images.png') }}" alt="">
                                                <h3 class="title">{!! $img_post_val->name !!}</h3>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
            </div>
        </div>
@include('admin.partials._footer') 
@endsection
