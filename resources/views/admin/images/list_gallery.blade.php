@extends('admin')
@section('content_admin')
    @include('admin.partials._sidebar')
    @include('admin.partials._header')
    <!-- page content -->
    <div class="right_col" role="main" id='list_multiple_images'>
        <h3>Danh sách tin tức: </h3>
        <h4>
            <a href="{{ URL::route('getAddImagesAdmin') }}"><span class="btn btn-success">Thêm hình ảnh </span></a>
            <a href="{{ URL::route('getListGalleryAdmin') }}"><span class="btn btn-success">Thư viện ảnh gallery đã tải nên</span></a>
        </h4>
        <div class="list_multiple_images">
            <div class="col-md-12">
                <div class="row">
                    @if(isset($img_gallery))
                        @foreach($img_gallery as $img_gallery_val)
                            <div class="col-md-2">
                                <div class="list_item_images" style="background-image: url({{ url('Uploads/Gallery/'.$img_gallery_val->images) }})">
                                    <a href="javascript:void(0)">
                                        <img src="{{ url('assets/images/bg_images.png') }}" alt="">
                                        <h3 class="title">{!! $img_gallery_val->name !!}</h3>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
    @include('admin.partials._footer')
@endsection
