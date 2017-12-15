@extends('admin')
@section('content_admin') 
    @include('admin.partials._header')
    @include('admin.partials._sidebar') 
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
                    <h4 class="widgettitle">Sửa tin tức </h4>
                    <div class="widgetcontent nopadding">
                        @include('errors.message_error')
                        @include('errors.message_success')
                        @if(isset($post_collect))
                            @foreach($post_collect as $post_collect_val)
                                @if(empty($post_collect_val->images))
                                    <?php $image_default = url("assets/images/No_image_available.svg"); ?>
                                @else
                                    <?php $image_default = url($post_collect_val->images); ?>
                                @endif
                                <form class="stdform stdform2">
                                    <p>
                                        <label for="exampleInputEmail1">Tên tin tức: </label>
                                        <span class="field">
                                            <input disabled type="text" class="form-control input-xxlarge" id="exampleInputEmail1" placeholder="Nhập tên chuyên mục " name="name" value="{{ old('name', $post_collect_val->name) }}">
                                        </span>
                                    </p>
                                    
                                    <p>
                                        <label for="exampleInputPassword1">Đường dẫn thân thiện</label>
                                        <span class="field">
                                            <input disabled type="slug" class="form-control input-xxlarge" id="exampleInputPassword1" placeholder="Nhập slug" name="slug" value="{!! old('slug', $post_collect_val->slug) !!}">
                                        </span>
                                    </p>
                                    
                                    <p>
                                        <label for="exampleInputPassword1">Mô tả </label>
                                        <span class="field">
                                            <textarea disabled class="textarea_fix_width_form" name="description" id="" cols="30" rows="10">{!! old('description', $post_collect_val->description) !!}</textarea>
                                        </span>
                                    </p>

                                    <p>
                                        <label for="exampleInputPassword1">Nội dung </label>
                                        <span class="field">
                                            <textarea disabled class="textarea_fix_width_form" name="content" id="">{!! old('content', $post_collect_val->content) !!}</textarea>
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
                                            <input disabled type="text" class="form-control input-xxlarge" id="exampleInputPassword1" placeholder="Nhập Meta title"
                                       name="meta_title" value="{!! old('meta_title', $post_collect_val->meta_title) !!}">
                                        </span>
                                    </p>

                                    <p>
                                        <label for="exampleInputPassword1">Meta keyword </label>
                                        <span class="field">
                                            <input disabled type="text" class="form-control input-xxlarge" id="exampleInputPassword1" placeholder="Nhập Meta keyword"
                                       name="meta_keyword" value="{!! old('meta_keyword', $post_collect_val->meta_keyword) !!}">
                                        </span>
                                    </p>

                                    <p>
                                        <label for="exampleInputPassword1">Meta description </label>
                                        <span class="field">
                                           <textarea disabled class="textarea_fix_width_form" name="meta_description" id="" cols="30" rows="10">{!! old('meta_description', $post_collect_val->meta_description) !!}</textarea>
                                        </span>
                                    </p>
                                    
                                    <label for="exampleInputPassword1">Hình ảnh </label>
                                    <span class="field">
                                        <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
                                        <div class="text-center" action="/avatar_upload.php" method="post"
                                             enctype="multipart/form-data">
                                            <div class="kv-avatar center-block" style="width:200px;margin-left:0;">
                                                <input disabled id="avatar-1" name="images" type="file" class="file-loading">
                                            </div>
                                        </div>
                                    </span>

                                    <p> 
                                        <label for="exampleInputPassword1">Chuyên mục cha: </label>
                                        <span class="field">
                                            <select name="parent_category" disabled>
                                                <option value="">Chọn chuyên mục</option>
                                                @if(isset($cates))
                                                    @foreach($cates as $cate)
                                                        @if($cate->type == 'news')
                                                            <option @if(isset($post_collect_val->cates->id) && ($cate->id == $post_collect_val->cates->id)) {{
                                                            "selected='selected'"
                                                            }}  @endif
                                                                    value="{!!
                                                            $cate->id
                                                             !!}">{!!
                                                            $cate->name
                                                            !!}</option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                        </span>
                                    </p>

                                    <p>
                                        <label for="">Thẻ </label><br/>
                                        <span class="field">
                                           <input disabled  type="text" data-role="tagsinput" id="tag_news" name="tag_news" class="form-control" placeholder="Điền tên thẻ" value="{!! old('tag_news', isset($post_collect_val->tags) ? $post_collect_val->tags : null) !!}">
                                        </span>
                                    </p>

                                    <p>
                                        <label for="">Tin nổi bật</label>
                                        <span class="field">
                                           <input disabled class="js-switch" type="checkbox" @if($post_collect_val->hightlights == 1) {{ "checked" }} @endif name="hightlights">
                                        </span>
                                    </p>

                                    <p>
                                        <label for="">Tin hay </label>
                                        <span class="field">
                                           <input disabled class="js-switch" type="checkbox" @if($post_collect_val->hot == 1) {{ "checked" }} @endif name="hot">
                                        </span>
                                    </p>

                                    <p>
                                        <label for="">Hiện slider </label>
                                        <span class="field">
                                           <input disabled class="js-switch" @if($post_collect_val->post_type == 'slider') {{ "checked" }} @endif type="checkbox" name="show_slider"> 
                                        </span>
                                    </p>

                                    <p>
                                        <label for="">Kích hoạt </label>
                                        <span class="field">
                                           <input disabled class="js-switch" type="checkbox" @if($post_collect_val->status == 1) {{ "checked" }} @endif name="checkbox">
                                        </span>
                                    </p>

                                </form>
                                @endforeach
                             @endif
                            </div><!--widgetcontent-->
                        </div><!--widget-->
    @include('library.bootstrap_input')
    @include('admin.partials._footer')
@endsection
  
