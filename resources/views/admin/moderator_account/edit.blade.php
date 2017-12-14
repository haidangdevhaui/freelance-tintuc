@extends('admin')
@section('content_admin')
    @include('admin.partials._header')
    @include('admin.partials._sidebar')
    @if(isset($admin_info))
        @if(!empty($admin_info->images))
           <?php $image_default = url('Uploads/admin/'. $admin_info->images);?>
        @else
           <?php $image_default = url("assets/images/No_image_available.svg");?>
        @endif
    @endif
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
                    <h4 class="widgettitle">Form Bordered</h4>
                    <div class="widgetcontent nopadding">
                        @include('errors.message_error')
                        @include('errors.message_success')
                        <form class="stdform stdform2" method="post" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <p>
                                <label for="exampleInputEmail1">Tên: </label>
                                <span class="field">
                                   <input type="text" class="form-control input-xxlarge" id="exampleInputEmail1" placeholder="Nhập tên" name="name" value="{!! old('name', isset($admin_info) ? $admin_info->name : null) !!}">
                                </span>
                            </p>
                            
                            <p>
                                <label for="exampleInputEmail1">Email: </label>
                                <span class="field">
                                    <input type="email" class="form-control input-xxlarge" id="exampleInputEmail1"
                               placeholder="Nhập email" name="email" value="{!! old('email', isset($admin_info) ? $admin_info->email : null) !!}">
                                </span>
                            </p>
                            
                            <label for="exampleInputEmail1">Ảnh đại diện: </label>
                            <span class="field">
                                <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
                                <div class="text-center" action="/avatar_upload.php" method="post"
                                     enctype="multipart/form-data">
                                    <div class="kv-avatar center-block" style="width:200px;margin-left:0;">
                                        <input id="avatar-1" name="images" type="file" class="file-loading">
                                    </div>
                                </div>
                            </span>

                            <div class="form-group category_parent_add_news">
                                <label for="exampleInputPassword1">Vai trò</label>
                                <span class="field">
                                    <select name="role_user">
                                        <option value="">Chọn vai trò </option> 
                                        @if(isset($roles_all))
                                            @foreach($roles_all as $roles_all_val)
                                               <option @if($roles_all_val->name == $roles->name) {{ "selected='selected'" }} @endif value="{{ $roles_all_val->id }}">{{ $roles_all_val->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </span>
                            </div>

                            <p>
                                <label for="exampleInputEmail1">Kích hoạt: </label>
                                <span class="field">
                                    <input class="js-switch" @if($admin_info->status == 1) {{ 'checked' }} @endif type="checkbox" name="checkbox"> Kích hoạt
                                </span>
                            </p>
                            
                            <p class="stdformbutton">
                                <button class="btn btn-success">Sửa </button>
                            </p>
                        </form>
                    </div><!--widgetcontent-->
                </div><!--widget-->
           
    <!-- /page content -->
    @include('library.bootstrap_input')
    @include('admin.partials._footer')
@endsection
