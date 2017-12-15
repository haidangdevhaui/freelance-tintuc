<div class="slide">
    <div class="owl-carousel owl-theme" id="owl-demo">
        <?php if(isset($slider)): ?>
			<?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<div class="item">
					<div class="title">
						<a href="<?php echo e(url($s['slug'])); ?>.html">
							<h3>
								<?php echo e($s['title']); ?>

							</h3>
						</a>
						<p>
							<?php echo e(Illuminate\Support\Str::words($s['description'], 50, '...')); ?>

						</p>
					</div>
					<div class="shaw">
					</div>
					<img data-u="image" src="<?php echo e(asset($s['image'])); ?>"/>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php endif; ?>
    </div>
</div>
