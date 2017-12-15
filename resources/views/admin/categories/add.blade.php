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
                        <form class="stdform stdform2" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <p>
                                <label for="exampleInputEmail1">Tên chuyên mục: </label>
                                <span class="field">
                                    <input type="text" class="form-control name_add_cat input-xxlarge" id="exampleInputEmail1" placeholder="Nhập tên chuyên mục " name="name" value="{!! old('name') !!}">
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
                                <label for="exampleInputPassword1">Meta title</label>
                                <span class="field">
                                    <input type="text" class="form-control input-xxlarge" id="exampleInputPassword1" placeholder="Nhập meta title"
                           name="meta_title" value="{!! old('meta_title') !!}">
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Meta keyword</label>
                                <span class="field">
                                    <input type="text" class="form-control input-xxlarge" id="exampleInputPassword1" placeholder="Nhập meta keyword"
                           name="meta_keyword" value="{!! old('meta_keyword') !!}">
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Meta description</label>
                                <span class="field">
                                    <textarea class="textarea_fix_width_form" name="meta_description" id="" cols="30" rows="10">{!! old('meta_description') !!}</textarea>
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Kiểu bài viết: </label>
                                <span class="field">
                                    <select name="type">
                                        @if(isset($typePost))
                                            @foreach($typePost as $typePostVal)
                                                <option value="{!! $typePostVal->type !!}">{!! $typePostVal->type !!}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Vị trí: </label>
                                <span class="field">
                                    <select name="position">
                                        @for($i = 1; $i <= $countCat+1; $i++)
                                            <option value="{!! $i !!}">{!! $i !!}</option>
                                        @endfor
                                    </select>
                                </span>
                            </p>

                            <p>
                                <label for="exampleInputPassword1">Chuyên mục cha: </label>
                                <span class="field">
                                    <select name="parent_category">
                                        <option value="">Chọn chuyên mục </option>
                                        @if(isset($cates))
                                            <?php cate_parent($cates, 0, "", old('parent_category')); ?>
                                        @endif
                                    </select>
                                </span>
                            </p>

                            <label for="exampleInputPassword1">Màu: </label>
                            <span class="field">
                                <div id="cp2" class="input-group colorpicker-component">
                                    <input type="text" value="#00AABB" class="form-control" name="color"/>
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
