 
<?php $__env->startSection('content_admin'); ?> 
<?php echo $__env->make('admin.partials._header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<?php echo $__env->make('admin.partials._sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                    <?php if(isset($videos)): ?>
                        <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr class="gradeX">
                            <td class="aligncenter"><span class="center">
                                <input type="checkbox" />
                              </span></td>
                            <td><?php echo e($video->id); ?></td>
                            <td><?php echo $video->title; ?></td>
                            <td class="img_news_fix list_news_admin_img img_admin_avatar">
                                <img src="<?php echo e(asset($video->image)); ?>" alt="" style="width: 100px;height: 70px;">
                            </td>
                            <td class="button_func_admin"><a href="<?php echo e(route('video_edit', $video->id)); ?>" class="btn btn-info">Sửa </a>
                            </td>
                            <td class="button_func_admin">
                                <form onclick="return confirmDelete('Bạn có chắc chắn muốn xoá ')" action="<?php echo e(route('video_delete', $video->id)); ?>" method="post">
                                    <input type='hidden' name="_method" value="delete">
                                    <?php echo e(csrf_field()); ?>

                                    <button type="submit" class="btn btn-danger">Xoá </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <?php echo $videos->render(); ?>

            <!-- /page content -->
<?php echo $__env->make('admin.partials._footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>