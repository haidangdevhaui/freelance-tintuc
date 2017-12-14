<?php $__env->startSection('content_admin'); ?>
    <?php echo $__env->make('admin.partials._header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('admin.partials._sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('admin.partials._content_dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('admin.partials._footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>