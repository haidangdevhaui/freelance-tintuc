@extends('admin') 
@section('content_admin')
@include('admin.partials._header') 
@include('admin.partials._sidebar')
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
            <a href="table-static.html">
                Tables
            </a>
            <span class="separator">
            </span>
        </li>
        <li>
            Table Dynamic
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
            <div class="widget">
                <h4 class="widgettitle">{{ isset($box) ? 'Chỉnh sửa' : 'Thêm mới'}} Info Box</h4>
                <div class="widgetcontent">
                    <form class="stdform" method="post" action="{{ url('admin/info-box') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="boxID" value="{{isset($box) ? $box->id : ''}}">
                        <p>
                            <label>Banner Image</label>
                            <span class="field">
                                <input type="file" name="banner_img" onchange="document.getElementById('preview_banner_img').src = window.URL.createObjectURL(this.files[0])"/><br/>
                                <img id="preview_banner_img" src="{{ isset($box) ? asset($box->banner_img) : '' }}" alt="300x50" style="width: 300px;height: 50px;margin-top: 10px;">
                            </span>
                        </p>
                        <!-- <p>
                            <label>Banner title</label>
                            <span class="field">
                                <input type="text" name="banner_title" class="input-xxlarge" value="{{ isset($box) ? $box->banner_title : '' }}" />
                            </span>
                        </p> -->
                        <p>
                            <label for="">
                                Chọn bài viết
                            </label>
                            <div class="field">
                                <ul id="tagDefault">
                                    @if(isset($connects))
                                        @foreach($connects as $c)
                                            <li>{{ $c->name }}</li>
                                        @endforeach
                                    @endif
                                </ul>
                                <input type="hidden" class="form-control" name="posts" value="{{isset($box) ? $box->posts : '[]'}}" id="connect">
                                <span style="color: red;" id="error-tag"></span>
                            </div>
                        </p>
                        <p>
                            <label for="exampleInputPassword1">Loại: </label>
                            <span class="field">
                               <select name="style">
                                    <option value="1" @if(isset($box)) {{$box->style == 1 ? 'selected=""' : ''}} @endif>Loại 1</option>
                                    <option value="2" @if(isset($box)) {{$box->style == 2 ? 'selected=""' : ''}} @endif>Loại 2</option>
                                    <option value="3" @if(isset($box)) {{$box->style == 3 ? 'selected=""' : ''}} @endif>Loại 3</option>
                                </select>
                            </span>
                        </p>
                        <p>
                            <label for="exampleInputPassword1">Vị trí: </label>
                            <span class="field">
                               <select name="position">
                                    <option value="1" @if(isset($box)) {{$box->position == 1 ? 'selected=""' : ''}} @endif>Trên danh mục video</option>
                                    <option value="2" @if(isset($box)) {{$box->position == 2 ? 'selected=""' : ''}} @endif>Dưới danh mục Phóng sự ảnh</option>
                                </select>
                            </span>
                        </p>
                        <p>
                            <label for="exampleInputPassword1">Chuyên mục: </label>
                            <span class="field">
                               <select name="category_id" @if(isset($box)) {{$box->all_category == 1 ? 'disabled=""' : ''}} @endif>
                                    <option value="">---Chọn danh mục---</option>
                                    <?php cate_parent($categories, 0, "", old('category_id', isset($box) ? $box->category_id : '')); ?>
                                </select>
                            </span>
                        </p>
                        <p>
                            <label for="">
                                Hiện ở trang chủ
                            </label>
                            <span class="field">
                                <input class="js-switch" name="home" type="checkbox" @if(isset($box)) {{$box->home == 1 ? 'checked=""' : ''}} @endif>
                                </input>
                            </span>
                        </p>
                        <p>
                            <label for="">
                                Hiện tất cả các danh mục
                            </label>
                            <span class="field">
                                <input class="js-switch" name="all_category" type="checkbox" @if(isset($box)) {{$box->all_category == 1 ? 'checked=""' : ''}} @endif>
                                </input>
                            </span>
                        </p>
                        <p>
                            <label for="">
                                Hiện tất cả các chi tiết bài viết
                            </label>
                            <span class="field">
                                <input class="js-switch" name="all_post" type="checkbox" @if(isset($box)) {{$box->all_post == 1 ? 'checked=""' : ''}} @endif>
                                </input>
                            </span>
                        </p>

                        <p>
                            <label for="">
                                Trạng thái
                            </label>
                            <span class="field">
                                <input class="js-switch" name="status" type="checkbox" @if(isset($box)) {{$box->status == 1 ? 'checked=""' : ''}} @endif>
                                </input>
                            </span>
                        </p>

                        

                        <p class="stdformbutton">
                            <button class="btn btn-primary">{{ isset($box) ? 'Cập nhật' : 'Thêm' }}</button>
                            <!-- <button class="btn btn-default btn-reset-form" type="button">Xóa tất cả</button> -->
                        </p>
                    </form>
                </div><!--widgetcontent-->
            </div>
        </div>
    </div><!--maincontent-->
</div>
<script>
    $(document).ready(function() {

        $("#tagDefault").tagit({
            autocomplete: {
                minLength: 2,
                source: function(req, res){
                    $.ajax({
                        url: '{{url("admin/tag/connect")}}',
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
                    var arr = $('#connect').val() == '' ? [] : JSON.parse($('#connect').val());
                    var arrValue = ui.item.value.split('-');
                    var id = arrValue[arrValue.length - 1].replace('.html', '');
                    if(!checkExistTag(arr, id)){
                        arr.push({
                            name: ui.item.label.trim(),
                            id: id
                        });
                    }
                    $('#connect').val((JSON.stringify(arr)));
                    $("#tagDefault").tagit("createTag", ui.item.label);
                    return false;
                }
            },
            allowSpaces: true,
            singleField: true,
            afterTagRemoved: function(event, ui){
                var arr = JSON.parse($('#connect').val());
                arr = arr.filter(function(item){
                    return item.name.trim() != ui.tagLabel.trim();
                })
                $('#connect').val((JSON.stringify(arr)));
            }
        });

        $('.btn-reset-form').click(function(){
            resetTag();
        });
        
        $('[name=all_category]').change(function(){
            if($('[name=all_category]').is(':checked')){
                $('[name=category_id]').attr('disabled', '');
            }
            if(!$('[name=all_category]').is(':checked')){
                $('[name=category_id]').removeAttr('disabled');
            }
        });

        function resetTag(){
            var arr = $('#connect').val() == '' ? [] : JSON.parse($('#connect').val());
            for(var i = 0; i < arr.length; i ++){
                $("#tagDefault").tagit("removeTagByLabel", arr[i].name);
            }
            $('input').not('[name=_token]').val('');
        }

        function checkExistTag(arr, id){
            for(var i = 0; i < arr.length; i ++){
                if(arr[i].id == id){
                    return true;
                }
            }
        }
    });
</script>
<!-- /page content -->
@include('admin.partials._footer') 
@endsection
