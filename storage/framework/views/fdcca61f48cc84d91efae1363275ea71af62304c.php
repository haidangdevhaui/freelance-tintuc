<div class="sidebar">
    <div class="new sidebar-top">
        <?php if(isset($rightContent)): ?>
            <?php $__currentLoopData = $rightContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <div class="media right-slider">
                    <a class="media-left" href="<?php echo e(url($p['slug'])); ?>.html">
                        <img class="media-object" src="<?php echo e(asset($p['image'])); ?>" style="width: 142px;height: 86px;" alt="<?php echo e($p['title']); ?>">
                    </a>
                    <div class="media-body">
                        <a href="<?php echo e(url($p['slug'])); ?>.html">
                            <?php echo e(Illuminate\Support\Str::words($p['title'], 10, '...')); ?>

                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php endif; ?>
    </div>

    <div class="video">
        <div class="title">
            <span class="arrow-left">
            </span>
            <h3>
                Video
            </h3>
        </div>
        
        <div class="text">
            <?php if(isset($videos)): ?>
                <?php if(count($videos)): ?>
                    <iframe allowfullscreen="" frameborder="0" height="165" src="https://www.youtube.com/embed/<?php echo e(str_replace('https://www.youtube.com/watch?v=', '', $videos[0]['source'])); ?>" width="100%">
                    </iframe>
                    <a href="<?php echo e(route('desktop.video.detail', $videos[0]['slug'])); ?>">
                        <?php echo e($videos[0]['title']); ?>

                    </a>
                <?php endif; ?>
                <?php if(count($videos) > 1): ?>
                <ul>
                    <?php for($i=1; $i < count($videos); $i++): ?>
                         <li>
                            <a href="<?php echo e(route('desktop.video.detail', $videos[$i]['slug'])); ?>">
                               <?php echo e($videos[$i]['title']); ?>

                            </a>
                        </li>
                   <?php endfor; ?>
                </ul>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="Reporting">
        <div class="title">
            <span class="arrow-left">
            </span>
            <h3>
                Phóng sự ảnh
            </h3>
        </div>
        <div class="text">
            <?php if(isset($images)): ?>
                <?php if(count($images)): ?>
                <img class="img-responsive" src="<?php echo e(asset($images[0]['images'])); ?>" alt="<?php echo e($images[0]['name']); ?>">
                <a href="<?php echo e(url($images[0]['slug'].'-'.$images[0]['id'])); ?>.html">
                    <?php echo e($images[0]['name']); ?>

                </a>
                <?php endif; ?>
                <?php 
                    $posts = $images;
                    array_shift($posts);
                ?>
                <ul>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li>
                        <a href="<?php echo e(url($post['slug'].'-'.$post['id'])); ?>.html">
                            <?php echo e($post['name']); ?>

                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>
