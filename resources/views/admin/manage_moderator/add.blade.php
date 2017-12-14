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
                    <h4 class="widgettitle">Thêm quyền moderator</h4>
                    <div class="widgetcontent nopadding">
                        @include('errors.message_error')
                        @include('errors.message_success')
                        <form class="stdform stdform2" method="post" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <p>
                                <label for="exampleInputEmail1" class="label_select2">Người dùng </label>
                                <span class="field">
                                    <select name="select_moderator" class="js-example-basic-single">
                                        <option value="">Chọn user </option>
                                         @if(isset($userModerator))
                                            @foreach($userModerator as $userModerator_val)
                                                <option value="{!! $userModerator_val->id !!}">{!! $userModerator_val->name !!}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </span>
                            </p>
                            
                            <p>
                                <label for="exampleInputEmail1" class="label_select2">Chuyên mục </label>
                                <span class="field">
                                    <select name="select_category[]" class="js-example-basic-multiple" multiple="">>
                                        <option value="">Chọn chuyên mục </option>
                                        @if(isset($cat_users))
                                            @foreach($cat_users as $cat_users_val)
                                                <option value="{!! $cat_users_val->id !!}">{!! $cat_users_val->name !!}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </span>
                            </p>

                            <p class="stdformbutton">
                                <button class="btn btn-primary">Thêm </button>
                            </p>
                        </form>
                    </div><!--widgetcontent-->
                </div><!--widget-->
           
    <!-- /page content -->
    @include('library.bootstrap_input')
    @include('admin.partials._footer')
@endsection
