@extends('admin')
@section('content_admin')
@include('admin.partials._header')
@include('admin.partials._sidebar')
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
    <div class="maincontent list_news_admin">
        <div class="maincontentinner">
            <form class="form-inline filter-question" role="form">
            </form>
        </div>
        <div class="maincontentinner">
            <h4 class="widgettitle">
                Danh sách tin tức
            </h4>
            <table class="table table-bordered responsive" id="dyntable1">
                <thead>
                    <tr>
                        <th class="head0">
                            x
                        </th>
                        <th class="head0">
                            Tag
                        </th>
                        <th class="head0">
                            Trạng thái
                        </th>
                        <th class="head0">
                            Sửa
                        </th>
                        @if(in_array($admin->role, [1, 3]))
                        <th class="head0">
                            Xoá
                        </th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if(count($tags) != 0)
                        @foreach($tags as $item)
                    <tr class="gradeX">
                    	<td></td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td class="">
                            @if($item->status == 1)
                            <span class="btn btn-success">
                                Kích hoạt
                            </span>
                            @else
                            <span class="btn btn-danger">
                                Không kích hoạt
                            </span>
                            @endif
                        </td>
                        <!-- <td class="button_func_admin"><a href="{{ URL::route('getViewNews', $item->id) }}" class="btn btn-warning">Xem </a></td> -->
                        <td class="button_func_admin">
                            <a class="btn btn-info" href="{{ url('admin/tag/edit/'.$item->id) }}">
                                Sửa
                            </a>
                        </td>
                        @if(in_array($admin->role, [1, 3]))
                        <td class="center button_func_admin">
                            <a class="btn btn-danger" href="{{ url('admin/tag/delete/'.$item->id) }}">
                                Xóa
                            </a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    @else
                    <tr class="gradeX">
                        <td align="center" colspan="11">
                            Không có dữ liệu
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
            {!! $tags->render() !!}
        </div>
    </div>
</div>
@include('admin.partials._footer')
@endsection
