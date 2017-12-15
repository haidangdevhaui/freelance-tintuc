@extends('admin')
@section('content_admin')
    @include('admin.partials._header')
    @include('admin.partials._sidebar')

<!-- page content -->
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">
<script src="{{ asset('js/tag-it.min.js') }}"></script>
<div class="rightpanel">
    <ul class="breadcrumbs">
        <li>
            <a href="dashboard.html">
                <i class="iconfa-home">
                </i>
            </a>
            <span class="separator">
            </span>
        </li>
        <li>
            <a href="forms.html">
                Forms
            </a>
            <span class="separator">
            </span>
        </li>
        <li>
            Form Styles
        </li>
        <li class="right">
            <a class="dropdown-toggle" data-toggle="dropdown" href="">
                <i class="icon-tint">
                </i>
                Color Skins
            </a>
            <ul class="dropdown-menu pull-right skin-color">
                <li>
                    <a href="default">
                        Default
                    </a>
                </li>
                <li>
                    <a href="navyblue">
                        Navy Blue
                    </a>
                </li>
                <li>
                    <a href="palegreen">
                        Pale Green
                    </a>
                </li>
                <li>
                    <a href="red">
                        Red
                    </a>
                </li>
                <li>
                    <a href="green">
                        Green
                    </a>
                </li>
                <li>
                    <a href="brown">
                        Brown
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="maincontent">
        <div class="maincontentinner">
            <div class="widgetbox box-inverse">
                <h4 class="widgettitle">
                    Form Bordered
                </h4>
                <div class="widgetcontent nopadding">
                    @include('errors.message_error')
                        @include('errors.message_success')
                    <form action="" class="stdform stdform2" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <p>
                            <label for="exampleInputEmail1">
                                Tên
                            </label>
                            <span class="field">
                                <input class="form-control name_add_cat input-xxlarge" id="exampleInputEmail1" name="name" placeholder="Nhập tên" type="text" value="{!! old('name', isset($popup) ? $popup->name : '') !!}" required="">
                                </input>
                            </span>
                        </p>
                        <p>
                            <label for="exampleInputEmail1">
                                Thời gian tự động ẩn
                            </label>
                            <span class="field">
                                <input class="form-control name_add_cat input-xxlarge" id="exampleInputEmail1" name="hidden_time" placeholder="giây" type="number" value="{!! old('hidden_time', isset($popup) ? $popup->hidden_time : '') !!}">
                                </input>
                            </span>
                        </p>
                        <p>
                            <label for="exampleInputEmail1">
                                Loại
                            </label>
                            <?php 
                                $options = [
                                    1 => 'Code',
                                    2 => 'Nội dung',
                                    3 => 'Flash'
                                ];
                             ?>
                            <span class="field">
                                <select name="type" id="type-select" class="form-control" required="">
                                    <option>---Chọn loại popup---</option>
                                    @foreach($options as $v => $t)
                                        <option value="{{ $v }}" {{ @$popup->type == $v ? 'selected' : '' }}>{{ $t }}</option>
                                    @endforeach
                                </select>
                            </span>
                        </p>
                        <p>
                            <label for="exampleInputPassword1">
                                Nội dung
                            </label>
                            <span class="field content-html" style="display: none;">
                                <textarea name="content_html">{!! old('content', @$popup->type == 2 ? $popup->content : '') !!}</textarea>
                                <script>
                                    jQuery(function($) {
                                            ckeditor('content_html');
                                        })
                                </script>
                            </span>
                            <span class="field content-code" style="display: none;">
                                <textarea id="" name="content_code" class="input-xxlarge form-control">{!! old('content', @$popup->type == 1 ? $popup->content : '') !!}</textarea>
                            </span>
                            <div class="field content-flash" style="display: none;">
                                <div class="center-block" id="kv-avatar-errors-1" style="width:800px;display:none">
                                </div>
                                <div action="/avatar_upload.php" class="text-center" enctype="multipart/form-data" method="post">
                                    <div class="kv-avatar center-block" style="width:200px;margin-left:0;">
                                        <input class="file-loading" id="avatar-1" name="content_flash" type="file">
                                        </input>
                                    </div>
                                </div>
                            </div>
                        </p>
                        <script>
                            $('#type-select').change(function(){
                                var type = $(this).val();
                                selectType(type);
                            })

                            function selectType(type){
                                switch(parseInt(type)){
                                    case 1:
                                        $('.content-code').show();
                                        $('.content-flash').hide();
                                        $('.content-html').hide();
                                        break;
                                    case 2:
                                        $('.content-code').hide();
                                        $('.content-flash').hide();
                                        $('.content-html').show();
                                        break;
                                    case 3:
                                        $('.content-code').hide();
                                        $('.content-flash').show();
                                        $('.content-html').hide();
                                        break;
                                    default:
                                        $('.content-code').hide();
                                        $('.content-flash').hide();
                                        $('.content-html').hide();
                                        break;
                                }
                            }
                            @if(isset($popup))
                            <?php $preview = '<embed src="'.asset($popup->content).'" style="width:160px"></embed>';?>
                            selectType('{{$popup->type}}');
                            @endif
                        </script>
                        <p>
                            <label for="">
                                Hiện ở trang chủ
                            </label>
                            <span class="field">
                                <input class="js-switch" name="in_home" type="checkbox" @if(isset($popup)) {{ $popup->in_home == 1 ? 'checked' : '' }} @else checked @endif>
                            </span>
                        </p>
                        <p>
                            <label for="">
                                Hiện ở tất cả trang danh mục cấp 1
                            </label>
                            <span class="field">
                                <input class="js-switch" name="in_cate" type="checkbox" @if(isset($popup)) {{ $popup->in_cate == 1 ? 'checked' : '' }} @else checked @endif>
                            </span>
                        </p>
                        <p>
                            <label for="">
                                Hiện ở tất cả trang danh mục cấp 2
                            </label>
                            <span class="field">
                                <input class="js-switch" name="in_sub_cate" type="checkbox" @if(isset($popup)) {{ $popup->in_sub_cate == 1 ? 'checked' : '' }} @else checked @endif>
                            </span>
                        </p>
                        <p>
                            <label for="exampleInputPassword1">
                                Chuyên mục:
                            </label>
                            <span class="field">
                                <select name="category_id[]" multiple="" id="category-select" @if(@$popup->in_cate || @$popup->in_cate_sub) disabled @endif>
                                    <option value="">
                                        ---Chọn chuyên mục---
                                    </option>
                                    @if(isset($categories))
                                    <?php cate_parent($categories, 0, "", isset($mapper) ? $mapper : 0); ?>
                                    @endif
                                </select>
                            </span>
                        </p>
                        <script>
                        $(document).ready(function(){
                            $('[name=in_sub_cate]').change(function(){
                                if($(this).is(':checked')){
                                    $('#category-select').attr('disabled', '');
                                }else
                                if(!$('[name=in_cate]').is(':checked')){
                                    $('#category-select').removeAttr('disabled');
                                }
                            });
                            $('[name=in_cate]').change(function(){
                                if($(this).is(':checked')){
                                    $('#category-select').attr('disabled', '');
                                }else
                                if(!$('[name=in_sub_cate]').is(':checked')){
                                    $('#category-select').removeAttr('disabled');
                                }
                            });
                        });
                        </script>
                        <p>
                            <label for="">
                                Hiện pử trang chi tiết
                            </label>
                            <span class="field">
                                <input class="js-switch" name="in_detail" type="checkbox" @if(isset($popup)) {{ $popup->in_detail == 1 ? 'checked' : '' }} @else checked @endif>
                            </span>
                        </p>
                        <p>
                            <label for="">
                                Kích hoạt
                            </label>
                            <span class="field">
                                <input class="js-switch" name="status" type="checkbox" @if(isset($popup)) {{ $popup->status == 1 ? 'checked' : '' }} @else checked @endif>
                            </span>
                        </p>
                        <p class="stdformbutton">
                            <button class="btn btn-primary">
                                {{ $action }}
                            </button>
                        </p>
                    </form>
                </div>
                <!--widgetcontent-->
            </div>
            <!--widget-->
        </div>
    </div>
    <script>
        jQuery(function($){
            var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' +
                    'onclick="alert(\'Call your custom code here.\')">' +
                    '<i class="glyphicon glyphicon-tag">Thẻ</i>' +
                    '</button>';
            $("#avatar-1").fileinput({
                overwriteInitial: true,
                maxFileSize: 1500,
                showClose: false,
                showCaption: false,
                browseLabel: '',
                removeLabel: '',
                browseIcon: '<i class="glyphicon glyphicon-folder-open">Mở </i>',
                removeIcon: '<i class="glyphicon glyphicon-remove">Xoá</i>',
                removeTitle: 'Cancel or reset changes',
                elErrorContainer: '#kv-avatar-errors-1',
                msgErrorClass: 'alert alert-block alert-danger',
                defaultPreviewContent: '{!! @$preview !!}',
                layoutTemplates: {main2: '{preview} ' + btnCust + ' {remove} {browse}'},
                allowedFileExtensions: ["swf"]
            });
        });
    </script>
    @include('admin.partials._footer')
@endsection
</div>