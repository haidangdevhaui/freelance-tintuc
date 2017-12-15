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
            <h4 class="widgettitle">Danh sách admin </h4>
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
                        <th class="head0">Email</th>
                        <th class="head0">Vai trò</th>
                        <th class="head0">Trạng thái</th>
                        <th class="head0">Xem</th>
                        <th class="head0">Sửa</th>
                        <th class="head0">Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($admins))
                        <?php $stt = 1; ?>
                        @foreach($admins as $listAdmin_val)
                        <tr class="gradeX">
                            <td class="aligncenter"><span class="center">
                                <input type="checkbox" />
                              </span></td>
                            <td>{{ $stt }}</td>
                            <td>{!! $listAdmin_val->name !!}</td>
                            <td>{!! $listAdmin_val->email !!}</td>
                            <td>
                                <?php 
                                $role = [
                                    'Cộng tác viên',
                                    'Admin Master',
                                    'Phóng viên',
                                    'Biên tập'
                                ];
                                echo $role[$listAdmin_val->role];
                                 ?>
                            </td>
                            <td class="button_active_admin">
                                @if($listAdmin_val->status == 1)
                                    <span class="btn btn-success">{!! "Kích hoạt " !!}</span>
                                @else
                                    <span class="btn btn-danger">{!! "Không kích hoạt " !!}</span>
                                @endif
                            </td>
                            <td class="button_func_admin"><a href="{{ URL::route('getViewAdminAccount', $listAdmin_val->id) }}" class="btn btn-warning">Xem </a></td>
                            <td class="button_func_admin"><a href="{{ URL::route('getEditAdminAccount', $listAdmin_val->id) }}" class="btn btn-info">Sửa </a></td>
                            <td class="button_func_admin">
                                <form onclick="return confirmDelete('Bạn có chắc chắn muốn xoá không ')" action="{{ URL::route('deleteAdminAccount', $listAdmin_val->id) }}" method="post">
                                    <input type='hidden' name="_method" value="delete">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">Xoá </button>
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
