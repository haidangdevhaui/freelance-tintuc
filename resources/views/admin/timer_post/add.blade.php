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
                <form class="stdform stdform2" method="post" action="" enctype="multipart/form-data">
                    <div class="widgetbox box-inverse">
                        <h4 class="widgettitle">Form Bordered</h4>
                        <div class="widgetcontent nopadding">
                            @include('errors.message_error')
                            @include('errors.message_success')
                            {{ csrf_field() }}
                            <p>
                                <label for="exampleInputEmail1">Tiêu đề hẹn giờ đăng bài</label>
                                <span class="field">
                                    <input type="text" class="form-control input-xxlarge" id="exampleInputEmail1"
                               placeholder="Nhập tiêu đề hẹn giờ đăng bài" name="name" value="{!! old('name') !!}">
                                </span>
                            </p>
                            
                            <label for="exampleInputEmail1">Đặt giờ đăng bài</label>
                            <span class="field">
                                <div class="form-group">
                                    <div class='input-group date' id='timer_post_time'>
                                        <input type='text' class="form-control " name="timer_post"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    jQuery(function ($) {
                                        $('#timer_post_time').datetimepicker();
                                    });
                                </script>
                            </span>

                        </div><!--widgetcontent-->
                    </div><!--widget-->

                    <div class="widgetbox box-inverse">
                        <h4 class="widgettitle">Thêm tin tức </h4>
                        <div class="widgetcontent nopadding">
                            <p>
                                <label for="exampleInputEmail1">Tên tin tức: </label>
                                <span class="field">
                                    <input type="text" class="form-control name_add_cat input-xxlarge" id="exampleInputEmail1"
                                   placeholder="Nhập tiêu đề tin tức" name="title" value="{!! old('title') !!}">
                                </span>
                            </p>
                            
                            <p>
                                <label for="exampleInputPassword1">Đường dẫn thân thiện</label>
                                <span class="field">
                                   <input type="slug" class="form-control add_slug_cat input-xxlarge" id="exampleInputPassword1" placeholder="Nhập slug"
                                   name="slug" value="{!! old('slug') !!}">
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Mô tả </label>
                                <span class="field">
                                   <textarea style="width:100%" name="description" id="" cols="30" rows="10">{!! old('description') !!}</textarea>
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Nội dung </label>
                                <span class="field">
                                    <textarea name="content" id="">{!! old('content') !!}</textarea>
                                    <script>
                                        jQuery(function() {
                                            ckeditor('content');
                                        })
                                    </script>
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Meta title </label>
                                <span class="field">
                                    <input type="text" class="form-control input-xxlarge" id="exampleInputPassword1" placeholder="Nhập Meta title"
                                   name="meta_title" value="{!! old('meta_title') !!}">
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Meta keyword </label>
                                <span class="field">
                                    <input type="text" class="form-control input-xxlarge" id="exampleInputPassword1" placeholder="Nhập Meta keyword"
                                   name="meta_keyword" value="{!! old('meta_keyword') !!}">
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Meta description </label>
                                <span class="field">
                                    <textarea style="width:100%" name="meta_description" id="" cols="30" rows="10">{!! old('meta_description') !!}</textarea>
                                </span>
                            </p>

                            <label for="exampleInputPassword1">Hình ảnh </label>
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
                                <label for="exampleInputPassword1">Chuyên mục </label>
                                <span class="field">
                                    <select name="parent_category">
                                        <option value="">Chọn chuyên mục </option>
                                        @if(isset($cates))
                                            <?php cate_parent($cates, 0, "", old('parent_category')); ?>
                                        @endif
                                    </select>
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Tin nổi bật</label>
                                <span class="field">
                                    <input class="js-switch" type="checkbox" name="news_highlights"> Tin nổi bật
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Tin hay</label>
                                <span class="field">
                                    <input class="js-switch" type="checkbox" name="news_juicy"> Tin hay
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Kích hoạt </label>
                                <span class="field">
                                    <input class="js-switch" type="checkbox" checked name="checkbox"> Active
                                </span>
                            </p>

                            <p class="stdformbutton">
                                <button class="btn btn-primary">Thêm </button>
                            </p>
                        </div><!--widgetcontent-->
                    </div><!--widget-->
                </form>
    @include('library.bootstrap_input')
    @include('admin.partials._footer')

@endsection

