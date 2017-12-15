@extends('admin') 
@section('content_admin') 
@include('admin.partials._header') 
@include('admin.partials._sidebar')
<!-- page content -->
<div class="rightpanel">
    <ul class="breadcrumbs">
        <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
        <li><a href="table-static.html">Tables</a> <span class="separator"></span></li>
        <li>Table Dynamic</li>
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
    <!--pageheader-->
    <div class="maincontent list_news_admin">
        <div class="maincontentinner">
            <h4 class="widgettitle">Danh sách video</h4>
            <table id="dyntable1" class="table table-bordered responsive">
                <colgroup>
                    <col class="con0" style="align: center; width: 4%" />
                    <col class="con1" />
                    <col class="con0" />
                    <col class="con1" />
                    <col class="con0" />
                    <col class="con1" />
                </colgroup>
                <thead>
                    <tr>
                        <th class="head0 nosort">
                            <input type="checkbox" class="checkall" />
                        </th>
                        <th class="head0">ID</th>
                        <th class="head1">Tên</th>
                        <th class="head1">Hình ảnh</th>
                        <th class="head0">Sửa</th>
                        <th class="head0">Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($videos))
                        @foreach($videos as $video)
                        <tr class="gradeX">
                            <td class="aligncenter"><span class="center">
                                <input type="checkbox" />
                              </span></td>
                            <td>{{ $video->id }}</td>
                            <td>{!! $video->title !!}</td>
                            <td class="img_news_fix list_news_admin_img img_admin_avatar">
                                <img src="{{ asset($video->image) }}" alt="" style="width: 100px;height: 70px;">
                            </td>
                            <td class="button_func_admin"><a href="{{ route('video_edit', $video->id) }}" class="btn btn-info">Sửa </a>
                            </td>
                            <td class="button_func_admin">
                                <form onclick="return confirmDelete('Bạn có chắc chắn muốn xoá ')" action="{{ route('video_delete', $video->id) }}" method="post">
                                    <input type='hidden' name="_method" value="delete">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">Xoá </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {!! $videos->render() !!}
            <!-- /page content -->
@include('admin.partials._footer') 
@endsection
