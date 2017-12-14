@extends('admin')
@section('content_admin')
    @include('admin.partials._sidebar')
    @include('admin.partials._header')
    
    <!-- page content -->
    <div class="right_col" role="main" id="news_add_admin">
        <h4 class="form_center_limit_width"><a href="{{ URL::route('getListSlider') }}"><span class="btn btn-success">Danh sách slider</span></a></h4>
        <div class="panel panel-info form_center_limit_width">
            <div class="panel-heading"><h4>Sửa slider </h4></div>
            <div class="panel-body">
                @include('errors.message_error')
                @include('errors.message_success')
                @if(isset($slider_collect))
                    @foreach($slider_collect as $slider_collect_val)
                        @if(!empty($slider_collect_val->images))
                           <?php $image_default = url('Uploads/News/'. $slider_collect_val->images);?>
                        @else
                           <?php $image_default = url("assets/images/No_image_available.svg");?>
                        @endif
                        <form action="" method="post" class="form" enctype="multipart/form-data" id="tag_form_news">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề slider</label>
                                <input type="text" class="form-control name_add_cat" id="exampleInputEmail1"
                                       placeholder="Nhập tiêu đề slider" name="name" value="{!! old('name', $slider_collect_val->name) !!}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Đường dẫn thân thiện</label>
                                <input type="slug" class="form-control add_slug_cat" id="exampleInputPassword1" placeholder="Nhập slug"
                                       name="slug" value="{!! old('slug', $slider_collect_val->slug) !!}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả </label>
                                <textarea name="description" id="" cols="30" rows="10">{!! old('description', $slider_collect_val->description) !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung </label>
                                <textarea name="content" id="">{!! old('content', $slider_collect_val->content) !!}</textarea>
                                <script>
                                    $(document).ready(function () {
                                        ckeditor('content');
                                    })
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Meta title </label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập Meta title"
                                       name="meta_title" value="{!! old('meta_title', $slider_collect_val->meta_title) !!}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Meta keyword </label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập Meta keyword"
                                       name="meta_keyword" value="{!! old('meta_keyword', $slider_collect_val->meta_keyword) !!}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Meta description </label>
                                <textarea name="meta_description" id="" cols="30" rows="10">{!! old('meta_description', $slider_collect_val->meta_description) !!}</textarea>
                            </div>
                            <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
                            <div class="text-center" action="/avatar_upload.php" method="post"
                                 enctype="multipart/form-data">
                                <div class="kv-avatar center-block" style="width:200px;margin-left:0;">
                                    <input id="avatar-1" name="images" type="file" class="file-loading">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Thẻ</label><br/>
                                <input  type="text" data-role="tagsinput" id="tag_news" name="tag_news" class="form-control" placeholder="Điền tên thẻ" value="{!! $slider_collect_val->tags !!}">
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <div class="checkbox">
                                    <input type="checkbox" class="js-switch" @if($slider_collect_val->status == 1) {{ "checked" }} @endif name="checkbox"> Kích hoạt
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- /page content -->
    @include('library.bootstrap_input')
    @include('admin.partials._footer')
@endsection
