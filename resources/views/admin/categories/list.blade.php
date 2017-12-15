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
    <div class="maincontent list_news_admin list_categories_admin">
        <div class="maincontentinner">
            <h4 class="widgettitle">Danh sách chuyên mục</h4>
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
                        <th class="head1">Kiểu</th>
                        <th class="head1">Đường dẫn thân thiện</th>
                        <th class="head0">Chuyên mục</th>
                        <th class="head1 ">Màn hình</th>
                        <th class="head1 ">Vị trí</th>
                        <th class="head1 ">Màu</th>
                        <th class="head0 button_active_admin">Trạng thái</th>
                        <th class="head0 button_func_admin">Xem</th>
                        <th class="head0 button_func_admin">Sửa</th>
                        <th class="head0 button_func_admin">Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($cate_collect))
                        <?php $stt = 1; ?>
                        @foreach($cate_collect as $cate_collect_val)
                            <tr class="gradeX">
                                 <td class="aligncenter">
                                    <span class="center">
                                        <input type="checkbox" />
                                    </span>
                                </td>
                                <td>{{ $stt }}</td>
                                <td>{!! $cate_collect_val->name !!}</td>
                                <td>{!! $cate_collect_val->type !!}</td>
                                <td>{!! $cate_collect_val->slug !!}</td>
                                <td>
                                    @if($cate_collect_val->parent_id == 0)
                                        {!! "Cha" !!}
                                    @else
                                        @foreach($cate_collect_val->cate_parent as $val_cat_parent)
                                            {!! $val_cat_parent->name !!}
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if(empty($cate_collect_val->screen)) 
                                       {{ 'tất cả' }}
                                    @else
                                       {!! $cate_collect_val->screen !!}
                                    @endif
                                </td>
                                <td>{!! $cate_collect_val->position !!}</td>
                                <td style="width:100px;">
                                    <div class="form-group">
                                        <div id="cp2" style="width:100px;" class="input-group colorpicker-component color_input">
                                            <input  type="text" value="{!! $cate_collect_val->color !!}" class="form-control" name="color"/>
                                            <span class="input-group-addon"><i></i></span>
                                        </div>
                                        <script>
                                            jQuery(function($) {
                                                $('.color_input').colorpicker();
                                            });
                                        </script>
                                    </div>
                                </td>
                                <td>
                                    @if($cate_collect_val->status == 1)
                                        <span class="btn btn-success">{!! "Kích hoạt " !!}</span>
                                    @else
                                        <span class="btn btn-danger">{!! "Không kích hoạt " !!}</span>
                                    @endif
                                </td>
                                <td><a href="{{ URL::route('getViewCategory', $cate_collect_val->id) }}" class='btn btn-warning'>Xem </a></td>
                                <td><a href="{{ URL::route('getEditCategory', $cate_collect_val->id) }}" class="btn btn-info">Sửa </a></td>
                                <td>
                                    <form onclick="return confirmDelete('Bạn có chắc chắn muốn xoá ')" action="{{ URL::route('deleteCategory', $cate_collect_val->id) }}" method="post">
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
