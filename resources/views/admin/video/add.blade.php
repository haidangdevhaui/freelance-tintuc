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
        
        <div class="pageheader">
            <form action="results.html" method="post" class="searchbar">
                <input type="text" name="keyword" placeholder="To search type and hit enter..." />
            </form>
            <div class="pageicon"><span class="iconfa-pencil"></span></div>
            <div class="pagetitle">
                <h5>Forms</h5>
                <h1>Form Styles</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <div class="widgetbox box-inverse">
                    <h4 class="widgettitle">Form Bordered</h4>
                    <div class="widgetcontent nopadding">
                        @include('errors.message_error')
                        @include('errors.message_success')
                        <form class="stdform stdform2" method="post" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <p>
                                <label for="exampleInputEmail1">Tên video: </label>
                                <span class="field">
                                    <input type="text" class="form-control name_add_cat input-xxlarge" id="exampleInputEmail1"
                               placeholder="Nhập tiêu đề video" name="name" value="{!! old('name') !!}">
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
                                <label for="exampleInputPassword1">Url</label>
                                <span class="field">
                                    <input type="url" class="form-control input-xxlarge" id="exampleInputPassword1" placeholder="Nhập url"
                               name="url" value="{!! old('url') !!}">
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Mô tả </label>
                                <span class="field">
                                    <textarea class="textarea_fix_width_form" name="description" id="" cols="30" rows="10">{!! old('description') !!}</textarea>
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Nội dung </label>
                                <span class="field">
                                    <textarea class="textarea_fix_width_form" name="content" id="">{!! old('content') !!}</textarea>
                                    <script>
                                        jQuery(function() {
                                            ckeditor('content');
                                        });
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
                                    <textarea class="textarea_fix_width_form" name="meta_description" id="" cols="30" rows="10">{!! old('meta_description') !!}</textarea>
                                </span>
                            </p>

                            <label for="exampleInputPassword1">Hình ảnh</label>
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
                                <label for="">Tags</label><br/>
                                <span class="field">
                                    <input  type="text" data-role="tagsinput" id="tag_news" name="tag_news" class="form-control" placeholder="Điền tên thẻ" value="">
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Kích hoạt: </label>
                                <span class="field">
                                    <input class="js-switch" type="checkbox" checked name="checkbox"> Kích hoạt
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
