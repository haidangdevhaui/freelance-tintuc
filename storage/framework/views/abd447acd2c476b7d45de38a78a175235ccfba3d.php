<?php $__env->startSection('content'); ?>
<div class="w-content">
    <div class="content">
        <div class="error">
            <img src="<?php echo e(asset('images/404.jpg')); ?>"/>
            <h3>Trang bạn tìm kiếm không tồn tại.</h3>
            <p>Có thể URL bị hỏng hoặc đã bị quản trị viên xóa bỏ.</p>
            <a href="<?php echo e(url('/')); ?>">Quay về trang chủ</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.desktop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>