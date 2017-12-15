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
                    <h4 class="widgettitle">Form Bordered</h4>
                    <div class="widgetcontent nopadding">
                        @include('errors.message_error')
                        @include('errors.message_success')
                        <form class="stdform stdform2">
                            <p>
                                <label for="exampleInputEmail1">Tên chuyên mục: </label>
                                <span class="field">
                                    <input disabled @if(isset($cat_find) && $cat_find->type !== 'news') {{ "disabled" }} @endif type="text" class="form-control name_add_cat" id="exampleInputEmail1"
                               placeholder="Nhập tên chuyên mục " name="name" value="{!! old('name', isset($cat_find)
                                ? $cat_find->name :
                                null) !!}">
                                </span>
                            </p>    
                            
                            <p>
                                <label for="exampleInputPassword1">Đường dẫn thân thiện</label>
                                <span class="field">
                                    <input disabled @if(isset($cat_find) && $cat_find->type !== 'news') {{ "disabled" }} @endif type="slug" class="form-control add_slug_cat" id="exampleInputPassword1" placeholder="Nhập slug"
                               name="slug" value="{!! old('slug', isset($cat_find)
                                ? $cat_find->slug :
                                null) !!}">
                                </span>
                            </p>
                            
                            <p>
                                <label for="exampleInputPassword1">Meta title</label>
                                <span class="field">
                                    <input disabled @if(isset($cat_find) && $cat_find->type !== 'news') {{ "disabled" }} @endif type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập meta title" name="meta_title" value="{!! old('meta_title', isset($cat_find) ? $cat_find->meta_title : null) !!}">
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Meta keyword</label>
                                <span class="field">
                                    <input disabled @if(isset($cat_find) && $cat_find->type !== 'news') {{ "disabled" }} @endif type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập meta keyword" name="meta_keyword" value="{!! old('meta_keyword', isset($cat_find) ? $cat_find->meta_keyword : null) !!}">
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Meta description</label>
                                <span class="field">
                                    <textarea disabled @if(isset($cat_find) && $cat_find->type !== 'news') {{ "disabled" }} @endif class="textarea_fix_width_form" name="meta_description" id="" cols="30" rows="10">{!! old('meta_description', isset($cat_find) ? $cat_find->meta_description : null) !!}</textarea>
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Kiểu bài viết: </label>
                                <span class="field">
                                    <select disabled name="type" @if(isset($cat_find) && $cat_find->type !== 'news') {{ "disabled" }} @endif>
                                        @if(isset($typePost))
                                            @foreach($typePost as $typePostVal)
                                                <option  @if($typePostVal->type == $cat_find->type) {{ "selected='selected'" }} @endif value="{!! $typePostVal->type !!}">{!! $typePostVal->type !!}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Vị trí: </label>
                                <span class="field">
                                    <select disabled name="position" @if(isset($cat_find) && $cat_find->type !== 'news') {{ "disabled" }} @endif>
                                        @for($i = 1; $i <= $countCat+1; $i++)
                                            <option @if($i == $cat_find->position) {{ "selected='selected'" }} @endif value="{!! $i !!}">{!! $i !!}</option>
                                        @endfor
                                    </select>
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Chuyên mục cha: </label>
                                <span class="field">
                                    <select disabled name="parent_category" @if(isset($cat_find) && $cat_find->type !== 'news') {{ "disabled" }} @endif>
                                        <option value="0">Chọn chuyên mục</option>
                                        @if(isset($cates))
                                            @foreach($cates as $cate)
                                                <option @if($cat_find->parent_id == $cate->id) {{ "selected='selected'" }} @endif value="{!! $cate->id !!}">{!! $cate->name !!}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </span>
                            </p>

                            <label for="exampleInputPassword1">Màu: </label>
                            <span class="field">
                                <div id="cp2" class="input-group colorpicker-component">
                                    <input disabled @if(isset($cat_find) && $cat_find->type !== 'news') {{ "disabled" }} @endif type="text" value="{!! old('color', isset($cat_find) ? $cat_find->color : null) !!}" class="form-control" name="color"/>
                                    <span class="input-group-addon"><i></i></span>
                                </div>
                                <script>
                                    jQuery(function($) {
                                        $('#cp2').colorpicker();
                                    });
                                </script>
                            </span>

                            <p>
                                <label for="exampleInputPassword1">Kích hoạt: </label>
                                <span class="field">
                                    <input disabled class="js-switch" @if(isset($cat_find) && $cat_find->type !== 'news') {{ "disabled" }} @endif type="checkbox" @if($cat_find->status == 1) {{ "checked" }} @endif name="checkbox"> Kích hoạt
                                </span>
                            </p>
                        </form>
                    </div><!--widgetcontent-->
                </div><!--widget-->
    @include('library.bootstrap_input')
    @include('admin.partials._footer')
@endsection
