 
<?php $__env->startSection('content_admin'); ?>
<?php echo $__env->make('admin.partials._header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<?php echo $__env->make('admin.partials._sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                <?php if(isset($creators)): ?>
                <select name="created_by" id="user_id-val" class="form-control">
                    <option value="">---Tất cả người đăng---</option>
                    <?php $__currentLoopData = $creators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $creator): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($creator->id); ?>"
                        <?php echo e(isset($filter['user_id']) && $filter['user_id'] == $creator->id ? 'selected=""' : ''); ?>

                        ><?php echo e($creator->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </select>
                <?php endif; ?>
                <select name="category_id" class="form-control" id="category-val">
                    <option value="">---Tất cả chuyên mục---</option>
                    <?php if(isset($categories)): ?>
                        <?php cate_parent($categories, 0, "", isset($filter['category_id']) ? $filter['category_id'] : 0); ?>
                    <?php endif; ?>
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
        url: "<?php echo e(url('admin/news')); ?>",
        type: 'POST',
        data: function(d){
            var filter = {
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
            return '<a href="'+baseURL_editor+'/admin/edit-post/'+data+'" class="btn btn-warning">Sửa </a>'
        }
    });

    cfDt.columns.push({
        data: 'id',
        render: function(data, type, row){
            var html = '<td class="center button_func_admin">';
            html += '<form onsubmit="return confirm(\'Bạn có chắc chắn muốn xoá\')" action="'+baseURL_editor+'/admin/delete-post/'+data+'" method="post">';
            html += '<input type="hidden" name="_method" value="delete">';
            html += '<?php echo e(csrf_field()); ?>';
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
<?php echo $__env->make('admin.partials._footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>