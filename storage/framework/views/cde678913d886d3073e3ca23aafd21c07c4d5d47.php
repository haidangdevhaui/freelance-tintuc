<?php $__env->startSection('content'); ?>
<?php if(isset($subCategories)): ?>
<div class="menu-drop" style="height: 40px;">
	<nav class="navbar">
		<ul class="navbar-nav">
			<?php $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<li <?php echo e($sub['id'] == $category->id ? 'class=active' : ''); ?>>
					<a href="<?php echo e(route('desktop.category', $sub['slug'])); ?>">
						<?php echo e($sub['name']); ?>

					</a>
				</li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</ul>
	</nav>
</div>
<?php endif; ?>
<div class="w-content">
	<div class="content">
		<div class="primary">
			<?php echo $__env->make('front_end._partial.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

			<div class="page-live">
				<div class="row">
					<?php if(isset($posts)): ?>
						<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<div class="item-article">
							<a href="<?php echo e(route('desktop.post', $post['slug'])); ?>">
								<img class="img-responsive" src="<?php echo e(asset($post['image'])); ?>" alt="<?php echo e($post['title']); ?>"/>
							</a>
							<span class="time">
								<i aria-hidden="true" class="fa fa-clock-o">
								</i>
								<?php echo e(\App\Http\Controllers\FrontEnd\LivingSubstanceController::timeago(date($post['created_at']))); ?>

							</span>
							<a href="<?php echo e(route('desktop.post', $post['slug'])); ?>">
								<?php echo e($post['title']); ?>

							</a>
							<p>
								<?php echo e(Illuminate\Support\Str::words($post['description'], 20, '...')); ?>

							</p>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					<?php endif; ?>
				</div>

				<div class="row">
					<div class="pagination phantrang">
						<?php echo $__env->make('vendor.pagination', ['data' => $posts], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="sidebar">
			<?php echo $__env->make('front_end._partial.side_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
			<?php echo $__env->make('front_end._partial.care', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.desktop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>