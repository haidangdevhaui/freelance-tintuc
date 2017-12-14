<div class="header">
    <div class="top">
        <div class="social">
            <i>
                <img src="<?php echo e(asset('/assets/images/rss.png')); ?>" onclick="window.location.href=''" />
            </i>
            <i>
                <img src="<?php echo e(asset('/assets/images/g+.png')); ?>" onclick="window.location.href='https://plus.google.com/+SongmoiNews'" />
            </i>
            <i aria-hidden="true" class="fa fa-facebook" onclick="window.location.href='https://www.facebook.com/Songmoi.vn/'" >
            </i>
            <style>
                /*[name="q"]{
                    color: #000 !important;
                }*/
            </style>
            <form action="<?php echo e(url('/')); ?>" method="get" class="navbar-form navbar-left pull-right">
                <div class="input-group">
                    <input type="text" class="form-control search-name" placeholder="Tìm kiếm..." name="q" value="<?php echo e(isset($q) ? $q : ''); ?>" required="">
                    <span class="input-group-btn">
                        <input class="glyphicon glyphicon-search" value="" type="submit">
                      </span>
                </div>
            </form>
        </div>
    </div>
    <?php echo $__env->make('front_end._partial.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>