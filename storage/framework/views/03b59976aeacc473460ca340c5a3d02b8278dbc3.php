<?php if(isset($rightContent)): ?>
<div class="new sidebar-top" style="margin-bottom: 20px">
    
    <?php $__currentLoopData = $rightContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="media right-slider">
            <a class="media-left" href="<?php echo e(url($p->slug.'-'.$p->id)); ?>.html">
                <img class="media-object" src="<?php echo e(asset($p->images)); ?>" style="width: 142px;height: 86px;" alt="<?php echo e($p->name); ?>">
            </a>
            <div class="media-body">
                <a href="<?php echo e(url($p->slug.'-'.$p->id)); ?>.html"><?php echo e($p->name); ?></a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    
</div>
<?php endif; ?>
<div class="new-more-view sidebar-top">
    <ul class="nav nav-tabs">
        <li class="active">
            <a data-toggle="tab" href="#new" class="text-center">
                Mới Nhất
            </a>
        </li>
        <li>
            <a data-toggle="tab" href="#view" class="text-center">
                Đọc Nhiều
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="new">
            <?php if(isset($postSideBar['newest'])): ?>
                <?php $__currentLoopData = $postSideBar['newest']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <div class="media">
                    <a class="media-left" href="<?php echo e(route('desktop.post', $post['slug'])); ?>">
                        <img alt="<?php echo e($post['title']); ?>" class="media-object" src="<?php echo e(asset($post['image'])); ?>">
                    </a>
                    <div class="media-body">
                      <a href="<?php echo e(route('desktop.post', $post['slug'])); ?>">
    					  <?php echo e(Illuminate\Support\Str::words($post['title'], 10, '...')); ?>

                    </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="tab-pane fade" id="view">
            <?php if(isset($postSideBar['views'])): ?>
                <?php $__currentLoopData = $postSideBar['views']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <div class="media">
                    <a class="media-left" href="<?php echo e(route('desktop.post', $post['slug'])); ?>">
                        <img alt="<?php echo e($post['title']); ?>" class="media-object" src="<?php echo e(asset($post['image'])); ?>">
                    </a>
                    <div class="media-body">
                      <a href="<?php echo e(route('desktop.post', $post['slug'])); ?>">
                          <?php echo e(Illuminate\Support\Str::words($post['title'], 10, '...')); ?>

                    </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<style>
    .media-body a{
        color: #464646;
        text-decoration: none;
        font-family: SourceSansPro-Regular;
        font-size: 14px;
    }
    .media{
        height: 73px;
    }
</style>
