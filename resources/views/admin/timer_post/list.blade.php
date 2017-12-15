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
    <div class="maincontent list_news_admin">
        <div class="maincontentinner">
            <h4 class="widgettitle">Data Table</h4>
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
                        <th class="head0">Thời gian hẹn </th>
                        <th class="head1 ">Thời gian đăng </th>
                        <th class="head0">Tên tin tức </th>
                        <th class="head0">Tác giả </th>
                        <th class="head0">Bắt đầu </th>
                        <th class="head0">Xem</th>
                        <th class="head0">Sửa</th>
                        <th class="head0">Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($post_collect))
                        <?php $stt = 1; ?>
                        @foreach($post_collect as $post_collect_val)
                        <tr class="gradeX">
                            <td class="aligncenter"><span class="center">
                                <input type="checkbox" />
                              </span></td>
                            <td>{{ $stt }}</td>
                            @foreach($post_collect_val->timer_post as $timer_post)
                            <td>{!! $timer_post->title !!}</td>
                            <td>{!! $timer_post->time_at !!}</td>
                            <td name="{!! $timer_post->timer_post !!}" class=" timer_post_list">{!! $timer_post->timer_post !!}</td>
                            @endforeach
                            <td>{!! $post_collect_val->name !!}</td>
                            @if(isset($post_collect_val->username))
                            <td>{!! $post_collect_val->username->name !!}</td>
                            @else
                            <td>ME</td>
                            @endif
                            <td class="{{ $post_collect_val->id }}"><span class='btn btn-primary start_action_timer_post'>Bắt đầu</span></td>
                            <td class="button_func_admin"><a href="{{ URL::route('getViewNews', $post_collect_val->id) }}" class="btn btn-warning ">Xem </a></td>
                            <td class="button_func_admin"><a href="{{ URL::route('getEditNews', $post_collect_val->id) }}" class="btn btn-info">Sửa </a></td>
                            <td class="button_func_admin">
                                <form onclick="return confirmDelete('Bạn có chắc chắn muốn xoá ')" action="{{ URL::route('deleteNews', $post_collect_val->id) }}" method="post">
                                    <input type='hidden' name="_method" value="delete">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger" >Xoá </button>
                                </form>
                            </td>
                        </tr>
                         <?php $stt++; ?>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <!-- /page content -->
@include('admin.partials._footer') 
@endsection
