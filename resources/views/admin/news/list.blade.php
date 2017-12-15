@extends('admin') 
@section('content_admin')
@include('admin.partials._header') 
@include('admin.partials._sidebar')
<!-- page content -->
<style>
    #dyntable1_paginate{
        bottom: -50px !important;
        margin-bottom: 10px
    }
</style>
<script>var isAdmin = false;</script>
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
            <form class="form-inline filter-post" role="form" method="post">
                <input class="form-control" name="title" placeholder="Tìm kiếm theo tên" type="text" id="name-val">
                @if(isset($creators))
                <select name="created_by" id="user_id-val" class="form-control">
                    <option value="">---Tất cả người đăng---</option>
                    @foreach($creators as $creator)
                        <option value="{{$creator->id}}"
                        {{ isset($filter['user_id']) && $filter['user_id'] == $creator->id ? 'selected=""' : '' }}
                        >{{$creator->name}}</option>
                    @endforeach
                </select>
                @endif
                <select name="category_id" class="form-control" id="category-val">
                    <option value="">---Tất cả chuyên mục---</option>
                    @if(isset($categories))
                        <?php cate_parent($categories, 0, "", isset($filter['category_id']) ? $filter['category_id'] : 0); ?>
                    @endif
                </select>
                <button class="btn btn-success" type="submit" id="filter">Lọc</button>
            </form>
        </div>
        <div class="maincontentinner">
            <h4 class="widgettitle">Danh sách tin tức </h4>
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
                        <th class="head0 nosort"></th>
                        <th class="head0">STT</th>
                        <th class="head1">Tên</th>
                        <th class="head0">Ngày đăng bài</th>
                        <th class="head0">Chuyên mục</th>
                        <th class="head1 ">Hình ảnh</th>
                        <th class="head1">Người đăng</th>
                        <th class="head0">Trạng thái</th>
                        <th class="head0">Sửa</th>
                        <th class="head0">Xoá</th>
                    </tr>
                </thead>
            </table>
            <!-- /page content -->
<script type="text/javascript">
    cfDt.serverSide = true;
    var stt = 0, first = 0;
    cfDt.ajax = {
        url: "{{ route('post_fetch') }}",
        type: 'POST',
        data: function(d){
            var filter = {
                _token: '{{ csrf_token() }}',
                title: $('#name-val').val(),
                category_id: $('#category-val').val(),
                created_by: $('#user_id-val').val()
            };
            return $.extend( {}, d, filter);
        }
    };
    cfDt.fnDrawCallback = function (oSettings) {
        first ++;
        if(first > 1) $('body').scrollTop(100);
    };
    cfDt.columns = [
        {
            data: null
        },
        {
            data: null,
            render: function(data, type, row){
                stt ++;
                return stt;
            }
        },
        {
            data: 'title'
        },
        {
            data: 'created_at'
        },
        {
            data: 'category_name'
        },
        {
            data: 'image',
            render: function(data, type, row){
                return '<img src="'+baseURL_editor+'/'+data+'" style="width: 120px;height: 90px"/>'
            }
        },
    ];
    cfDt.columns.push({
        data: 'creator_name'
    });
    cfDt.columns.push({
        data: 'deleted_at',
        render: function(data, type, row){
            if(data){
                return 'Ko hiển thị'
            }
            return 'hiển thị'
        }
    });
    cfDt.columns.push({
        data: 'id',
        render: function(data, type, row){
            return '<a href="'+baseURL_editor+'/admin/post/edit/'+data+'" class="btn btn-warning">Sửa </a>'
        }
    });

    cfDt.columns.push({
        data: 'id',
        render: function(data, type, row){
            var html = '<td class="center button_func_admin">';
            html += '<form onsubmit="return confirm(\'Bạn có chắc chắn muốn xoá\')" action="'+baseURL_editor+'/admin/post/delete/'+data+'" method="post">';
            html += '<input type="hidden" name="_method" value="delete">';
            html += '{{ csrf_field() }}';
            html += '<button type="submit" class="btn btn-danger" >Xoá </button></form></td>';
            return html;
        }
    });
    
    var table = $('#dyntable1').DataTable(cfDt);
    $('.filter-post').on('submit', function(e){
        e.preventDefault();
        table.ajax.reload();
    });
</script>
@include('admin.partials._footer') 
@endsection