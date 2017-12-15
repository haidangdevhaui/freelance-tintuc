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
            <a href="{{ url('admin/info-box') }}"></a>
        </div>
        <div class="maincontentinner">
            <form class="form-inline filter-question" role="form">
                <select name="style" class="form-control">
                    <option value="">---Tất cả loại---</option>
                    <option value="1" @if(isset($filter['style'])) {{$filter['style'] == 1 ? 'selected=""' : ''}} @endif>Loại 1</option>
                    <option value="2" @if(isset($filter['style'])) {{$filter['style'] == 2 ? 'selected=""' : ''}} @endif>Loại 1</option>
                    <option value="3" @if(isset($filter['style'])) {{$filter['style'] == 3 ? 'selected=""' : ''}} @endif>Loại 1</option>
                </select>
                <select name="category_id" class="form-control">
                    <option value="">---Tất cả chuyên mục---</option>
                    @if(isset($categories))
                        <?php cate_parent($categories, 0, "", isset($filter['category_id']) ? $filter['category_id'] : 0); ?>
                    @endif
                </select>
                <button class="btn btn-success" type="submit" id="filter">Lọc</button>
            </form>
        </div>
        <div class="maincontentinner">
            
            <h4 class="widgettitle">Danh sách box info</h4>
            <table class="table responsive">
                <thead>
                    <tr>
                        <th></th>
                        <!-- <th>Banner Title</th> -->
                        <th>Banner img</th>
                        <th>Hiển thị ở</th>
                        <th>Vị trí</th>
                        <th>Loại</th>
                        <th>Trạng thái</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($boxs as $box)
                    <tr>
                        <td></td>
                        <!-- <td>{{ $box->banner_title }}</td> -->
                        <td><img src="{{ asset($box->banner_img) }}" alt="" style="width: 300px;height: 50px;"></td>
                        <td>
                            {!! $box->home == 1 ? 'Trang chủ<br/>' : '' !!}
                            {!! $box->all_category == 1 ? 'Tất cả danh mục<br/>' : '' !!}
                            {!! $box->all_post == 1 ? 'Tất cả chi tiết bài viết<br/>' : '' !!}
                            {{ $box->category_id != 0 ? $box->category->name : '' }}
                        </td>
                        <td>
                            @if($box->position == 1)
                            Trên danh mục Video
                            @elseif($box->position == 2)
                            Dưới danh phục Phóng sự ảnh
                            @endif
                        </td>
                        <td>Loại {{ $box->style }}</td>
                        <td>
                            {{ $box->status == 1 ? 'Hoạt động' : 'Không hoạt động'}}
                        </td>
                        <td><a href="{{ url('admin/info-box/'.$box->id) }}" class="btn btn-warning btn-xs">Sửa</a></td>
                        <td><a href="{{ url('admin/info-box/delete/'.$box->id) }}" class="btn btn-danger btn-xs">Xóa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {!! $boxs->render() !!}
        </div>
    </div><!--maincontent-->
</div>
<!-- /page content -->
@include('admin.partials._footer') 
@endsection
