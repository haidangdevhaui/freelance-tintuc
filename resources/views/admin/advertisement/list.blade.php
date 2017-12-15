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
            <h4 class="widgettitle">Danh sách quảng cáo </h4>
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
                        <th class="head0">STT</th>
                        <th class="head1">Tên</th>
                        <th class="head1">Màn hình </th>
                        <th class="head0">Hiển thị ở</th>
                        <th class="head0">Vị trí</th>
                        <th class="head1 ">Hình ảnh</th>
                        <th class="head0">Trạng thái</th>
                        <th class="head0">Số click</th>
                        <th class="head0">Chi tiết</th>
                        <th class="head0">Sửa</th>
                        <th class="head0">Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($advers))
                        <?php $stt = 1; ?>
                        @foreach($advers as $advert_collect_val)
                        <tr class="gradeX">
                            <td class="aligncenter"><span class="center">
                                <input type="checkbox" />
                              </span></td>
                            <td>{{ $stt }}</td>
                            <td>{!! $advert_collect_val->name !!}</td>
                            <td>{{ $advert_collect_val->screen == 0 ? 'Desktop' : 'Mobile' }}</td>
                            <td>
                                @if($advert_collect_val->category_name)
                                    {{ $advert_collect_val->category_name }}<br/>
                                @endif
                                @if($advert_collect_val->post == 1)
                                    Chi tiết bài viết<br/>
                                @endif
                                @if($advert_collect_val->home == 1)
                                    Trang chủ<br/>
                                @endif
                            </td>
                            <td>
                                {{ positionName($advert_collect_val->position) }}
                            </td>
                            @if($advert_collect_val->type == 1)
                            <td class="img_news_fix list_news_admin_img img_admin_avatar" style="background-image: url(@if(empty($advert_collect_val->images)) {{ url('assets/images/no-image.jpg') }} @else {!! url($advert_collect_val->images) !!} @endif)">
                                <img src="{{ url('assets/images/transparent.png') }}" alt="">
                            </td>
                            @elseif($advert_collect_val->type == 3)
                            <td>
                                <embed src="{{ asset($advert_collect_val->images) }}" style="width:100%"></embed>
                            </td>
                            @endif
                            <td class="button_active_admin">
                                @if($advert_collect_val->status == 1)
                                    <span class="btn btn-success">{!! "Kích hoạt" !!}</span>
                                @else
                                    <span class="btn btn-danger">{!! "Không kích hoạt" !!}</span>
                                @endif
                            </td>
                            <td>{{ $advert_collect_val->click }}</td>
                            <td>
                                <a href="{{ url('admin/advertisement/statist/'.$advert_collect_val->id) }}">chi tiết</a>
                            </td>
                            <td class="button_func_admin"><a href="{{ URL::route('getEditAdvertisement', $advert_collect_val->id) }}" class="btn btn-info">Sửa</a></td>
                            <td class="button_func_admin">
                                <form onclick="return confirmDelete('Bạn thực sự muốn xoá ')" action="{{ URL::route('deleteAdvertisement', $advert_collect_val->id) }}" method="post">
                                    <input type='hidden' name="_method" value="delete">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">Xoá</button>
                                </form>
                            </td>
                            </tr>
                         <?php $stt++; ?>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {!! $advers->render() !!}
            <!-- /page content -->
@include('admin.partials._footer') 
@endsection
