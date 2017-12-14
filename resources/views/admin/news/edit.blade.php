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
                    <h4 class="widgettitle">Sửa tin tức </h4>
                    <div class="widgetcontent nopadding">
                        @include('errors.message_error')
                        @include('errors.message_success')
                                @if(empty($post->images))
                                    <?php $image_default = url("assets/images/No_image_available.svg"); ?>
                                @else
                                    <?php $image_default = url($post->images); ?>
                                @endif
                                <form class="stdform stdform2" method="post" action="" enctype="multipart/form-data">
                                    <input type="hidden" name="_method" value="PUT">
                                    {{ csrf_field() }}
                                    @if($post->timer > strtotime(time()))
                                    <link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.css') }}">
                                    <script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
                                    <p>
                                        <label for="exampleInputPassword1">
                                            Ngày giờ hiển thị bài viết
                                        </label>
                                        <span class="field">
                                            <input class="form-control" id="datetimepicker3" name="timer" placeholder="Click để nhập thời gian" type="text" value="{!! old('timer') !!}" />
                                        </span>
                                    </p>
                                    <script>
                                        jQuery('#datetimepicker3').datetimepicker({
                                            format:'Y-m-d H:i:s'
                                        });
                                    </script>
                                    @endif
                                    <p>
                                        <label for="exampleInputEmail1">Tên tin tức: </label>
                                        <span class="field">
                                            <input type="text" class="form-control input-xxlarge" placeholder="Nhập tên chuyên mục " name="name" value="{{ old('name', $post->name) }}">
                                        </span>
                                    </p>
                                    
                                    <p>
                                        <label for="exampleInputPassword1">Đường dẫn thân thiện</label>
                                        <span class="field">
                                            <input type="text" class="form-control add_slug_cat input-xxlarge" placeholder="Nhập dường dẫn thân thiện"
                                       name="slug" value="{!! old('slug', $post->slug) !!}">
                                        </span>
                                    </p>
                                    
                                    <p>
                                        <label for="exampleInputPassword1">Mô tả </label>
                                        <span class="field">
                                            <textarea class="textarea_fix_width_form" name="description" id="" cols="30" rows="10">{!! old('description', $post->description) !!}</textarea>
                                        </span>
                                    </p>

                                    <p>
                                        <label for="exampleInputPassword1">Nội dung </label>
                                        <span class="field">
                                            <textarea class="textarea_fix_width_form" name="content" id="">{!! old('content', $post->content) !!}</textarea>
                                            <script>
                                                jQuery(function($) {
                                                    ckeditor('content');
                                                })
                                            </script>
                                        </span>
                                    </p>

                                    <p>
                                        <label for="exampleInputPassword1">Meta title </label>
                                        <span class="field">
                                            <input type="text" class="form-control input-xxlarge" id="exampleInputPassword1" placeholder="Nhập Meta title"
                                       name="meta_title" value="{!! old('meta_title', $post->meta_title) !!}">
                                        </span>
                                    </p>

                                    <p>
                                        <label for="exampleInputPassword1">Meta keyword </label>
                                        <span class="field">
                                            <input type="text" class="form-control input-xxlarge" id="exampleInputPassword1" placeholder="Nhập Meta keyword"
                                       name="meta_keyword" value="{!! old('meta_keyword', $post->meta_keyword) !!}">
                                        </span>
                                    </p>

                                    <p>
                                        <label for="exampleInputPassword1">Meta description </label>
                                        <span class="field">
                                           <textarea class="textarea_fix_width_form" name="meta_description" id="" cols="30" rows="10">{!! old('meta_description', $post->meta_description) !!}</textarea>
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
                                        <label for="exampleInputPassword1">Chuyên mục: </label>
                                        <span class="field">
                                           <select name="category_id">
                                                <option value="">Chọn chuyên mục </option>
                                                @if(isset($categories))
                                                    <?php cate_parent($categories, 0, "", old('category_id', $post->category_id)); ?>
                                                @endif
                                            </select>
                                        </span>
                                    </p>

                                    <p>
                                        <label for="">
                                            Tags
                                        </label>
                                        <br/>
                                        <div class="field">
                                            <ul id="tagDefault">
                                                @foreach($post->tags as $t)
                                                <li>{{ $t->name }}</li>
                                                @endforeach
                                            </ul>
                                            <input type="hidden" id="tags" name="tagsData" class="form-control" value="{{ old('tags', $tagsData ? $tagsData : '[]') }}" />
                                        </div>
                                    </p>
                                    <script>
                                        $(document).ready(function() {
                                            $("#tagDefault").tagit({
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
                                                            $("#tagDefault").tagit("createTag", ui.item.label);
                                                        }
                                                        return false;
                                                    }
                                                },
                                                allowSpaces: true,
                                                singleField: true, 
                                                //singleFieldNode: $("#single"),
                                                afterTagRemoved: function(event, ui){
                                                    var arr = JSON.parse($('#tags').val());
                                                    arr = arr.filter(function(item){
                                                        return item.name.trim() != ui.tagLabel.trim();
                                                    })
                                                    $('#tags').val((JSON.stringify(arr)));
                                                }
                                            });
                                        });
                                    </script>
                                    </script>

                                    <p>
                                        <label for="exampleInputPassword1">Tác giả </label>
                                        <span class="field">
                                            <input type="text" class="form-control input-xxlarge" id="exampleInputPassword1" placeholder="Nhập tên tác giả"
                                       name="author" value="{!! old('author',$post->author) !!}">
                                        </span>
                                    </p>

                                    <p>
                                        <label for="exampleInputPassword1">Nguồn </label>
                                        <span class="field">
                                            <input type="text" class="form-control input-xxlarge" id="exampleInputPassword1" placeholder="Nhập nguồn bài viết"
                                       name="source" value="{!! old('source',$post->source) !!}">
                                        </span>
                                    </p>

                                    <p>
                                        <label for="exampleInputPassword1">Ngày đăng bài </label>
                                        <span class="field">
                                            <input type="text" class="form-control" id="created_at-datepicker" placeholder="Click để nhập thời gian"
                                       name="created_at" value="{!! old('created_at', $post->created_at) !!}">
                                        </span>
                                    </p>
                                    <p>
                                        <label for="">Tin nổi bật</label>
                                        <span class="field">
                                           <input class="js-switch" type="checkbox" @if($post->hot == 1) {{ "checked" }} @endif name="hot">
                                        </span>
                                    </p>
                                    <p>
                                        <label for="">Hiện bên phải slider </label>
                                        <span class="field">
                                           <input class="js-switch" @if($post->is_right == 1) {{ "checked" }} @endif type="checkbox" name="is_right">
                                        </span>
                                    </p>
                                    <p>
                                        <label for="">Hiện slider </label>
                                        <span class="field">
                                           <input class="js-switch" @if($post->post_type == 'slider') {{ "checked" }} @endif type="checkbox" name="show_slider"> 
                                        </span>
                                    </p>

                                    <p>
                                        <label for="">Tin quan tâm </label>
                                        <span class="field">
                                           <input class="js-switch" @if($post->is_care == 1) {{ "checked" }} @endif type="checkbox" name="is_care"> 
                                        </span>
                                    </p>
                                    <p>
                                        <label for="">
                                            Giao diện riêng
                                        </label>
                                        <span class="field">
                                            <input class="js-switch" name="is_landing" type="checkbox" {{ $post->is_landing ? 'checked' : ''}}>
                                            </input>
                                        </span>
                                    </p>
                                    <p>
                                        <label for="">
                                            Cố định tin
                                        </label>
                                        <div class="field">
                                            <select name="fixed_type" class="form-control fixed-type">
                                                <option value="">---Không gim---</option>
                                                @foreach(config('constant.fixed_type') as $k => $v)
                                                <option value="{{ $k }}" {{ $post->fixed_type == $k ? 'selected' : ''}}>{{ $v }}</option>
                                                @endforeach
                                            </select>
                                            <select name="fixed_position" class="form-control fixed-position" style="display: none" disabled="">
                                                <option>---Chọn vị trí---</option>
                                                <option value="1" {{ $post->fixed_position == 1 ? 'selected' : ''}}>Hiển thị trong slider</option>
                                                <option value="2" {{ $post->fixed_position == 2 ? 'selected' : ''}}>1-4 trong danh mục cấp 1</option>
                                            </select>
                                            <script>
                                                $(document).ready(function(){
                                                    $('.fixed-type').on('change', function(){
                                                        selectFixType($(this).val());
                                                    });

                                                    function selectFixType(val){
                                                        switch(parseInt(val)){
                                                            case 1:
                                                            case 2:
                                                                $('.fixed-position').hide().attr('disabled', '');
                                                                break;
                                                            case 3:
                                                            case 4:
                                                                $('.fixed-position').show().removeAttr('disabled');
                                                                break;
                                                            default:
                                                                $('.fixed-position').hide().attr('disabled', '');
                                                                break;
                                                        }
                                                    }

                                                    selectFixType('{{$post->fixed_type}}');
                                                });
                                            </script>
                                        </div>
                                    </p>
                                    <p>
                                        <label for="">
                                            Tin liên quan
                                        </label>
                                        <br/>
                                        <div class="field">
                                            <ul id="tagDefaultConnect">
                                                @foreach($connect as $c)
                                                <li>{{ $c->name }}</li>
                                                @endforeach
                                            </ul>
                                            <input type="hidden" class="form-control" name="connect" value="{{$post->connect}}" id="connect">
                                        </div>
                                    </p>
                                    @if(in_array($admin->role, [1, 2, 3]))
                                    <p>
                                        <label for="">Kích hoạt </label>
                                        <span class="field">
                                           <input class="js-switch" type="checkbox" @if($post->status == 1) {{ "checked" }} @endif name="checkbox">
                                        </span>
                                    </p>
                                    @endif
                                    <script>
                                        $(document).ready(function() {
                                            $("#tagDefaultConnect").tagit({
                                                tagLimit: 8,
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
                                                        var exist = false;
                                                        var id = arrValue[arrValue.length - 1].replace('.html', '');
                                                        for(var i = 0; i < arr.length; i ++){
                                                            if(arr[i].id == id){
                                                                exist = true;
                                                                break;
                                                            }
                                                        }
                                                        if(!exist){
                                                            arr.push({
                                                                name: ui.item.label,
                                                                id: arrValue[arrValue.length - 1].replace('.html', '')
                                                            });
                                                            $('#connect').val((JSON.stringify(arr)));
                                                            $("#tagDefaultConnect").tagit("createTag", ui.item.label);
                                                        }
                                                        
                                                        return false;
                                                    }
                                                },
                                                allowSpaces: true,
                                                singleField: true, 
                                                //singleFieldNode: $("#tagDefault"),
                                                afterTagRemoved: function(event, ui){
                                                    var arr = JSON.parse($('#connect').val());
                                                    arr = arr.filter(function(item){
                                                        return item.name.trim() != ui.tagLabel.trim();
                                                    })
                                                    $('#connect').val((JSON.stringify(arr)));
                                                },
                                                onTagExists: function(){
                                                    console.log(1);
                                                    return false;
                                                }
                                            });
                                        });
                                    </script>
                                    @if(in_array($admin->role, [1, 3]))
                                    <p>
                                        <label for="">Đánh giá </label>
                                        <span class="field">
                                            <select id="rate" name="rate" class="form-control">
                                                <option value="" {{$post->rate == '' ? 'selected=""' : ''}}>---Chọn đánh giá---</option>
                                                <option value="a" {{$post->rate == 'a' ? 'selected=""' : ''}}>A</option>
                                                <option value="b" {{$post->rate == 'b' ? 'selected=""' : ''}}>B</option>
                                                <option value="c" {{$post->rate == 'c' ? 'selected=""' : ''}}>C</option>
                                                <option value="d" {{$post->rate == 'd' ? 'selected=""' : ''}}>D</option>
                                            </select>
                                        </span>
                                    </p>
                                    @endif

                                    <p class="stdformbutton">  
                                        <button class="btn btn-success">Sửa </button>
                                    </p>
                                </form>
                            </div><!--widgetcontent-->
                        </div><!--widget-->
    @include('library.bootstrap_input')
    @include('admin.partials._footer')
@endsection
  
