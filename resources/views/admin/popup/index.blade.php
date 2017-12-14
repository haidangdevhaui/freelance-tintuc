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
            <h4 class="widgettitle">Danh sách popup</h4>
            <table id="dyntable" class="table table-bordered responsive">
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
                        <th class="head0">STT</th>
                        <th class="head1">Tên</th>
                        <th class="head1">Hiển thị</th>
                        <th class="head0">Thời gian tự động đóng</th>
                        <th class="head1 ">Trạng thái</th>
                        <th class="head0">Sửa</th>
                        <th class="head0">Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($popups))
                        <?php $stt = 1; ?>
                        @foreach($popups as $popup)
                        <tr class="gradeX">
                            <td class="aligncenter"><span class="center">
                                <input type="checkbox" />
                              </span></td>
                            <td>{{ $stt }}</td>
                            <td>{!! $popup->name !!}</td>
                            <td>
                                @if($popup->in_home) Trang chủ<br/> @endif
                                @if($popup->in_cate) Danh mục cấp 1<br/> @endif
                                @if($popup->in_sub_cate) Danh mục cấp 2<br/> @endif
                                @if($popup->in_detail) Chi tiết<br/> @endif
                            </td>
                            <td>{!! $popup->hidden_time !!} giây</td>
                            <td class="button_active_admin">
                                @if($popup->status == 1)
                                    <span class="btn btn-success">{!! "Kích hoạt " !!}</span>
                                @else
                                    <span class="btn btn-danger">{!! "Không kích hoạt" !!}</span>
                                @endif
                            </td>
                            <td><a href="{{ url('admin/popup/update/'.$popup->id) }}" class="btn btn-info">Sửa </a></td>
                            <td><a href="{{ url('admin/popup/delete/'.$popup->id) }}" class="btn btn-info">Xóa </a></td>
                        </tr>
                         <?php $stt++; ?>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <!-- /page content -->
@include('admin.partials._footer') 
@endsection
