@extends('admin')
@section('content_admin')
    @include('admin.partials._header')
    @include('admin.partials._sidebar')
    @if(isset($setting->images))
        <?php $image_default = url("Uploads/Setting/".$setting->images);?>
    @else
        <?php $image_default = "../assets/images/No_image_available.svg";?>
    @endif
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
                    <h4 class="widgettitle">Cấu hình hệ thống chung</h4>
                    <div class="widgetcontent nopadding">
                        @include('errors.message_error')
                        @include('errors.message_success')
                        <form class="stdform stdform2" method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                            <p>
                                <label for="exampleInputEmail1">Bảo trì website</label>
                                <span class="field">
                                   <input class="js-switch" type="checkbox" @if(isset($configs) && $configs->maintenance == 1) {{ 'checked' }} @endif name="maintenance"> bảo trì
                                </span>
                            </p>
                            
                            <p>
                                <label for="exampleInputEmail1">Meta title: </label>
                                <span class="field">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Vui lòng nhập meta title" name="meta_title" value="{!! old('meta_title', isset($setting) ? $setting->meta_title : null) !!}">
                                </span>
                            </p>
                            
                            <p>
                                <label for="exampleInputPassword1">Meta keyword</label>
                                <span class="field">
                                    <textarea class="width_full" name="meta_keyword" id="" cols="30" rows="5">{!! old('meta_keyword', isset($setting) ? $setting->meta_keyword : null) !!}</textarea>
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Meta description </label>
                                <span class="field">
                                    <textarea class="width_full" name="meta_description" id="" cols="30" rows="5">{!! old('meta_description', isset($setting) ? $setting->meta_description : null) !!}</textarea>
                                </span>
                            </p>

                            <p class="stdformbutton">
                                <button class="btn btn-primary">Thêm </button>
                            </p>
                        </form>
                    </div><!--widgetcontent-->
                </div><!--widget-->
    @include('library.bootstrap_input')
    @include('admin.partials._footer')
@endsection
