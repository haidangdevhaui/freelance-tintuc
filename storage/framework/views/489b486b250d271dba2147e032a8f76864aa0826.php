<div class="care">
    <h3>
        Có thể bạn quan tâm
    </h3>
    <?php if(isset($postCare)): ?>
        <?php $__currentLoopData = $postCare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="media">
            <a class="media-left" href="<?php echo e(url($care->slug.'-'.$care->id).'.html'); ?>">
                <img class="media-object" src="<?php echo e(asset($care->images)); ?>" alt="<?php echo e($care->name); ?>">
            </a>
            <div class="media-body">
                 <a class="media-left" href="<?php echo e(url($care->slug.'-'.$care->id).'.html'); ?>">
                    <?php echo e($care->name); ?>

                </a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <?php endif; ?>
</div>