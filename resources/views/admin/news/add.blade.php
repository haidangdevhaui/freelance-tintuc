@extends('admin')
@section('content_admin')
    @include('admin.partials._header')
    @include('admin.partials._sidebar')
<?php $image_default = "../assets/images/No_image_available.svg";?>
<!-- page content -->
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">
<link rel="stylesheet" href="{{ asset('js/jquery.tagit.css') }}">
<style>
    ul.tagit{
        margin-left: 0;
    }
</style>
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
                    @if($errors->first('error'))
                    <div class="alert alert-danger">{{ $errors->first('error') }}</div>
                    @endif
                    <form action="{{ route('post_create') }}" class="stdform stdform2" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <p>
                            <label for="exampleInputEmail1">
                                Tên tin tức:
                            </label>
                            <span class="field">
                                <input class="form-control name_add_cat input-xxlarge" id="exampleInputEmail1" name="title" placeholder="Nhập tiêu đề tin tức" type="text" value="{{ isset($post) ? (old('title') ? old('title') : $post->title) : '' }}">
                                </input>
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            </span>
                        </p>
                        <p>
                            <label for="exampleInputPassword1">
                                Đường dẫn thân thiện
                            </label>
                            <span class="field">
                                <input class="form-control add_slug_cat input-xxlarge" id="exampleInputPassword1" name="slug" placeholder="Nhập dường dẫn thân thiện" type="slug" value="{{ isset($post) ? (old('slug') ? old('slug') : $post->slug) : '' }}">
                                </input>
                                <span class="text-danger">{{ $errors->first('slug') }}</span>
                            </span>
                        </p>
                        <p>
                            <label for="exampleInputPassword1">
                                Mô tả
                            </label>
                            <span class="field">
                                <textarea class="textarea_fix_width_form" cols="30" id="" name="description" rows="10">{{ isset($post) ? (old('description') ? old('description') : $post->description) : '' }}</textarea>
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            </span>
                        </p>
                        <p>
                            <label for="exampleInputPassword1">
                                Nội dung
                            </label>
                            <span class="field">
                                <textarea id="" name="content">
                                    {{ isset($post) ? (old('content') ? old('content') : $post->content) : '' }}
                                </textarea>
                                <span class="text-danger">{{ $errors->first('content') }}</span>
                                <script>
                                    jQuery(function($) {
                                            ckeditor('content');
                                        })
                                </script>
                            </span>
                        </p>
                        <p>
                            <label for="exampleInputPassword1">
                                Meta title
                            </label>
                            <span class="field">
                                <input class="form-control input-xxlarge" id="exampleInputPassword1" name="meta_title" placeholder="Nhập Meta title" type="text" value="{{ isset($post) ? (old('meta_title') ? old('meta_title') : $post->meta_title) : '' }}">
                                </input>
                                <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                            </span>
                        </p>
                        <p>
                            <label for="exampleInputPassword1">
                                Meta keyword
                            </label>
                            <span class="field">
                                <input class="form-control input-xxlarge" id="exampleInputPassword1" name="meta_keyword" placeholder="Nhập Meta keyword" type="text" value="{{ isset($post) ? (old('meta_keyword') ? old('meta_keyword') : $post->meta_keyword) : '' }}">
                                </input>
                                <span class="text-danger">{{ $errors->first('meta_keyword') }}</span>
                            </span>
                        </p>
                        <p>
                            <label for="exampleInputPassword1">
                                Meta description
                            </label>
                            <span class="field">
                                <textarea class="textarea_fix_width_form" cols="30" id="" name="meta_description" rows="10">{{ isset($post) ? (old('meta_description') ? old('meta_description') : $post->meta_description) : '' }}</textarea>
                                <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                            </span>
                        </p>
                        <label for="exampleInputPassword1">
                            Hình ảnh
                        </label>
                        <span class="field">
                            <div class="center-block" id="kv-avatar-errors-1" style="width:800px;display:none">
                            </div>
                            <div action="/avatar_upload.php" class="text-center" enctype="multipart/form-data" method="post">
                                <div class="kv-avatar center-block" style="width:200px;margin-left:0;">
                                    <input class="file-loading" id="avatar-1" name="image" type="file">
                                    </input>
                                </div>
                            </div>
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        </span>
                        <p>
                            <label for="exampleInputPassword1">
                                Chuyên mục:
                            </label>
                            <span class="field">
                                <select name="category_id">
                                    <option value="">
                                        Chọn chuyên mục
                                    </option>
                                    @if(isset($categories))
                                    <?php cate_parent($categories, 0, "", isset($post) ? (old('category_id') ? old('category_id') : $post->category_id) : ''); ?>
                                    @endif
                                </select>
                                <span class="text-danger">{{ $errors->first('category_id') }}</span>
                            </span>
                        </p>
                        <p>
                            <label for="">
                                Tags
                            </label>
                            <br/>
                            <span class="field">
                                <input class="form-control" id="tag_news" name="tag_news" placeholder="Điền tên thẻ" type="text">
                                </input>
                                <input type="hidden" id="tags" name="tagsData" class="form-control" value="[]" />
                            </span>
                        </p>
                        <script>
                            $(document).ready(function() {
                                var availableTags = '{{$availableTags}}'.split(',');
                                $("#tag_news").tagit({
                                    availableTags: availableTags,
                                    autocomplete: {
                                        source: function(req, res){
                                            $.ajax({
                                                url: '{{url("admin/tag/search")}}',
                                                type: 'post',
                                                data: {
                                                    term: req.term,
                                                    _token: '{{ csrf_token() }}'
                                                },
                                                success: function(data){
                                                    res(data);
                                                }
                                            });
                                        },
                                        delay: 500,
                                        select: function(event, ui) {
                                            var arr = $('#tags').val() == '' ? [] : JSON.parse($('#tags').val());
                                            var exist = false;
                                            for(var i = 0; i < arr.length; i ++){
                                                if(arr[i].id == ui.item.value){
                                                    exist = true;
                                                    break;
                                                }
                                            }
                                            if(!exist){
                                                arr.push({
                                                    name: ui.item.label,
                                                    id: ui.item.value
                                                });
                                                $('#tags').val((JSON.stringify(arr)));
                                                $("#tag_news").tagit("createTag", ui.item.label);
                                            }
                                            return false;
                                        }
                                    },
                                    allowSpaces: true,
                                    singleField: true, 
                                    singleFieldNode: $("#single"),
                                    afterTagRemoved: function(event, ui){
                                        var arr = JSON.parse($('#tags').val());
                                        arr = arr.filter(function(item){
                                            return item.name.trim() != ui.tagLabel.trim();
                                        })
                                        $('#tags').val((JSON.stringify(arr)));
                                    },
                                    beforeTagAdded: function(event, ui) {
                                        if ($.inArray(ui.tagLabel, availableTags) == -1) {
                                            return false;
                                        }
                                    }
                                });
                            });
                        </script>
                        <p>
                            <label for="">
                                Tin nổi bật
                            </label>
                            <span class="field">
                                <input class="js-switch" name="is_hot" type="checkbox" {{ isset($post) && $post->is_hot ? 'checked' : '' }}>
                                </input>
                            </span>
                        </p>
                        <p>
                            <label for="">
                                Hiện trên slider
                            </label>
                            <span class="field">
                                <input class="js-switch" name="is_slider" type="checkbox" {{ isset($post) && $post->type == 2 ? 'checked' : '' }}>
                                </input>
                            </span>
                        </p>
                        <p>
                            <label for="">
                                Hiện bên phải slider
                            </label>
                            <span class="field">
                                <input class="js-switch" name="is_right" type="checkbox" {{ isset($post) && $post->is_right ? 'checked' : '' }}>
                                </input>
                            </span>
                        </p>

                        <p>
                            <label for="">
                                Nổi bật
                            </label>
                            <span class="field">
                                <input class="js-switch" name="is_high" type="checkbox" {{ isset($post) && $post->is_high ? 'checked' : '' }}>
                                </input>
                            </span>
                        </p>
                        <p class="stdformbutton">
                            <button class="btn btn-primary">
                                Thêm
                            </button>
                        </p>
                    </form>
                </div>
                <!--widgetcontent-->
            </div>
            <!--widget-->
        </div>
    </div>
    @include('library.bootstrap_input')
    @include('admin.partials._footer')
@endsection
</div>