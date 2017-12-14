@extends('admin') 
@section('content_admin') 
@include('admin.partials._header') 
@include('admin.partials._sidebar')
<!-- page content -->
<div class="rightpanel">
    <ul class="breadcrumbs">
        <li><a href="javscript:void(0)"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
        <li><a href="javscript:void(0)">Quảng cáo </a> <span class="separator"></span></li>
        <li>Danh sách </li>
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
            <h4 class="widgettitle">Thống kê chi tiết cho quảng cáo </h4>
            <table id="dyntable1" class="table table-bordered responsive">
                <thead>
                    <tr>
                        <th class="head1">STT</th>
                        <th class="head0">Thiết bị</th>
                        <th class="head0">Trình duyệt</th>
                        <th class="head0">IP</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($statist as $item)
                    <tr>
                        <td></td>
                        <td>{{ $item->device }}</td>
                        <td>{{ $item->browser }}</td>
                        <td>{{ $item->ip }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $statist->render() !!}
            <!-- /page content -->
@include('admin.partials._footer') 
@endsection
