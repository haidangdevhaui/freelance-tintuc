<div class="menu">
    <div class="logo">
        <a href="<?php echo e(url('/')); ?>">
            <img class="img-responsive" src="<?php echo e(asset('/assets/images/logo.png')); ?>"/>
        </a>
    </div>
    <div class="link-menu">
        <ul class="navbar-nav">
            <li class="active">
                <a href="<?php echo e(url('/')); ?>" id="3241aa" class="home">
                    Trang chủ
                </a>
            </li>
            <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <li>
                <a href="<?php echo e(route('d_getPageCategory', ['slug' => $m['slug']])); ?>" style="font-size: 13px" id="<?php echo e($m['color']); ?>" class="<?php echo e($m['slug']); ?>">
                    <?php echo e($m['name']); ?>

                    <?php if(count($m['sub']) > 0): ?>
                        <span class="caret">
                        </span>
                    <?php endif; ?>
                </a>
                <?php if(count($m['sub']) > 0): ?>
                <ul class="child-menu">
                    <span class="arrow-top">
                    </span>
                    <?php $__currentLoopData = $m['sub']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li>
                        <span class="arrow-right">
                        </span>
                        <a href="<?php echo e(route('d_getPageCategory', ['slug' => $c['slug']])); ?>">
                            <?php echo e($c['name']); ?>

                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
                <?php endif; ?>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>
    </div>
</div>
<?php if(isset($active)): ?>
<script>
    $(document).ready(function(){
        var color = $('.<?php echo e($active); ?>').attr('id');
        $('.<?php echo e($active); ?>').css({
            'border-bottom': '4px solid #'+ color, 
            'color': '#'+color
        }).addClass('fixed');

        $('.top').css({
            'background': '#' + color
        }).attr('defaultColor', color);
    });
</script>
<?php endif; ?>