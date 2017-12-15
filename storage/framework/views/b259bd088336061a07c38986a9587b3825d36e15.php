<?php $__env->startSection('content'); ?>
<div class="w-content">
    <div class="content">
        <div class="primary">
            <?php echo $__env->make('front_end._partial.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php if(isset($content)): ?>
				<?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	            <div class="block-live">
	                <div class="title">
	                    <h3 onclick="window.location.href = '<?php echo e(route('desktop.category', $category['slug'])); ?>'">
	                        <?php echo e($category['name']); ?>

	                    </h3>
	                </div>
	                <!-- <div class="link-live">
                        <ul class="sub-category-list">
                        	<?php $__currentLoopData = $category['sub']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li class="active">
                                <a href="<?php echo e(route('desktop.category', ['slug' => $sub['slug']])); ?>">
                                    <?php echo e($sub['name']); ?>

                                </a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </ul>
	                </div> -->
	                <?php if(count($category['posts'])): ?>
					<div class="live-primary">
						<a href="<?php echo e(url($category['posts'][0]['slug'])); ?>.html">
							<img class="img-responsive img-main" src="<?php echo e(asset($category['posts'][0]['image'])); ?>" alt="<?php echo e($category['posts'][0]['title']); ?>" />
						</a>
						<a href="<?php echo e(url($category['posts'][0]['slug'])); ?>.html" class="live-primary-title">
							<?php echo e($category['posts'][0]['title']); ?>

						</a>
						<p class="live-primary-multi-line">
							<?php echo e(Illuminate\Support\Str::words($category['posts'][0]['description'], 40, '...')); ?>

						</p>
					</div>
					<?php endif; ?>
					<?php if(count($category['posts']) > 1): ?>
					<div class="live-extra">
						<?php for($i = 1; $i < count($category['posts']); $i ++): ?>
						<div class="item-live">
							<a href="<?php echo e(url($category['posts'][$i]['slug'])); ?>.html">
								<img class="img-responsive" src="<?php echo e(asset($category['posts'][$i]['image'])); ?>" alt="<?php echo e($category['posts'][$i]['title']); ?>" />
							</a>
							<div style="overflow: hidden; height: 60px;">
								<a href="<?php echo e(url($category['posts'][$i]['slug'])); ?>.html">
									<?php echo e(Illuminate\Support\Str::words($category['posts'][$i]['title'], 20, '...')); ?>

								</a>
							</div>
						</div>
						<?php endfor; ?>
					</div>
	                <?php endif; ?>
	            </div>
	            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <?php endif; ?>
        </div>
        <?php echo $__env->make('front_end._partial.right_content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <?php $__env->stopSection(); ?>
</div>
<?php echo $__env->make('layouts.desktop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>