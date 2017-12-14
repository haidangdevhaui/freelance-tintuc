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
                    <h4 class="widgettitle">Cấu hình hệ thống desktop </h4>
                    <div class="widgetcontent nopadding">
                        @include('errors.message_error')
                        @include('errors.message_success')
                        <form class="stdform stdform2" method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}

                            <label for="exampleInputEmail1">Logo: </label>
                            <span class="field">
                                <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
                                <div class="text-center" action="/avatar_upload.php" method="post"
                                     enctype="multipart/form-data">
                                    <div class="kv-avatar center-block" style="width:200px;margin-left:0;">
                                        <input id="avatar-1" name="images" type="file" class="file-loading">
                                    </div>
                                </div>
                            </span>
                            
                            <p>
                                <label for="exampleInputPassword1">Liên hệ footer</label>
                                <span class="field">
                                    <textarea name="content" id="">{!! old('content', $setting->content) !!}</textarea>
                                    <script>
                                        jQuery(function() {
                                            ckeditor('content');
                                        })
                                    </script>
                                </span>
                            </p>
                            
                            <p>
                                <label for="exampleInputEmail1">Số điện thoại footer: </label>
                                <span class="field">
                                    <input type="text" class="form-control input-xxlarge" id="exampleInputEmail1"
                                               placeholder="Vui lòng nhập số điện thoại " name="phone" value="{!! old('phone', $setting->phone) !!}">
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputEmail1">Email footer: </label>
                                <span class="field">
                                    <input type="email" class="form-control input-xxlarge" id="exampleInputEmail1"
                                               placeholder="Vui lòng nhập email " name="email" value="{!! old('email', $setting->email) !!}">
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
