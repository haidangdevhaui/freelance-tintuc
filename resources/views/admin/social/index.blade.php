@extends('admin')
@section('content_admin')
    @include('admin.partials._header')
    @include('admin.partials._sidebar')
    <?php $image_default = "../assets/images/No_image_available.svg";?>
    <!-- page content -->
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Forms</a> <span class="separator"></span></li>
            <li>Form Styles</li>
            
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
        
        <div class="maincontent">
            <div class="maincontentinner">
                <div class="widgetbox box-inverse">
                    <h4 class="widgettitle">Mạng xã hội</h4>
                    <div class="widgetcontent nopadding">
                        @include('errors.message_error')
                        @include('errors.message_success')
                        <form class="stdform stdform2" method="post" action="" id="tag_form_news">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                            <p>
                                <label for="exampleInputEmail1">Link facebook</label>
                                <span class="field">
                                   <input type="text" class="input-xxlarge form-control name_add_cat" id="exampleInputEmail1" placeholder="Nhập link facebook" name="link_fb" value="{!! old('link_fb', isset($social) ? $social->link_fb : null) !!}">
                                </span>
                            </p>
                            
                            <p>
                                <label for="exampleInputEmail1">Link google</label>
                                <span class="field">
                                    <input type="text" class="form-control name_add_cat input-xxlarge" id="exampleInputEmail1"
                           placeholder="Nhập link google" name="link_google" value="{!! old('link_google', isset($social) ? $social->link_google : null) !!}">
                                </span>
                            </p>
                            
                            <p>
                                <label for="exampleInputEmail1">Link rss</label>
                                <span class="field">
                                    <input type="text" class="form-control name_add_cat input-xxlarge" id="exampleInputEmail1"
                           placeholder="Nhập link rss" name="link_rss" value="{!! old('link_rss', isset($social) ? $social->link_rss : null) !!}">
                                </span>
                            </p>
                            
                            <p class="stdformbutton">
                                <button class="btn btn-primary">Sửa</button>
                            </p>
                        </form>
                    </div><!--widgetcontent-->
                </div><!--widget-->
    <!-- /page content -->
    @include('library.bootstrap_input')
    @include('admin.partials._footer')
@endsection
