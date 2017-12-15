<div class="menu">
    <div class="logo">
        <a href="<?php echo e(url('/')); ?>">
            <img class="img-responsive" alt="LOGO" src="<?php echo e(asset('/assets/images/logo.png')); ?>"/>
        </a>
    </div>
    <div class="link-menu">
        <ul class="navbar-nav">
            <li <?php echo e(isset($menuActive) && $menuActive == '' ? 'class=active' : ''); ?>>
                <a href="<?php echo e(url('/')); ?>" id="3241aa" class="home">
                    Trang chủ
                </a>
            </li>
            <?php if(isset($menu)): ?>
                <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li <?php echo e(isset($menuActive) && $menuActive == 'desktop-category-' . $category['id'] ? 'class=active' : ''); ?>>
                    <a href="<?php echo e(route('desktop.category', ['slug' => $category['slug']])); ?>" style="font-size: 13px" class="<?php echo e($category['slug']); ?>" id="3241aa">
                        <?php echo e(Illuminate\Support\Str::words($category['name'], 2, '...')); ?>

                        <?php if(count($category['sub'])): ?>
                            <span class="caret">
                            </span>
                        <?php endif; ?>
                    </a>
                    <?php if(count($category['sub'])): ?>
                    <ul class="child-menu">
                        <span class="arrow-top">
                        </span>
                        <?php $__currentLoopData = $category['sub']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li>
                            <span class="arrow-right">
                            </span>
                            <a href="<?php echo e(route('desktop.category', ['slug' => $child['slug']])); ?>">
                                <?php echo e($child['name']); ?>

                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                    <?php endif; ?>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <?php endif; ?>
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