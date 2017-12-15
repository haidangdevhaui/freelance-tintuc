<?php $__env->startSection('content'); ?>
<div class="w-content">
	<div class="content">
		<div class="primary">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo e(url('/')); ?>">
						Trang chủ
					</a>
				</li>
				<li class="breadcrumb-item active">
					<a href="<?php echo e(route('desktop.video')); ?>">
						Video
					</a>
				</li>
			</ol>
			<div class="life-detail-content">
				<h3 class="name-article">
					<?php echo e($video->title); ?>

				</h3>
				<div class="row life-detail-auth">
					<div class="pull-left">
						<span class="time-create">
							<i class="fa fa-clock-o"></i>
							<?php echo e(postTimer($video->created_at)); ?>

						</span>
					</div>
				</div>
				<div class="left-content" style="text-align: justify !important;">
					<h3 class="title-article">
						<?php echo e($video->description); ?>

					</h3>
					<div class="post-detail-content">
						<iframe allowfullscreen="" frameborder="0" height="400" src="https://www.youtube.com/embed/<?php echo e(str_replace('https://www.youtube.com/watch?v=', '', $video->source)); ?>" width="100%">
                    	</iframe>
					</div>
					<br>
					<div class="post-detail-content">
						<?php echo $video->content; ?>

						<br/>
					</div>
				</div>
				<div class="tag row">
					<span>
						Từ Khóa :
					</span>
					<?php if(isset($video->tags)): ?>
						<?php $__currentLoopData = $video->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<a href="<?php echo e(url('tag/'.$tag->slug)); ?>">
								<?php echo e($tag->name); ?>

							</a>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					<?php endif; ?>
				</div>
				<div class="comment">
					<div class="content-comment-article">
						<div class="row total-comment">
							<div class="fb-comments" data-href="http://songmoi.vn/<?php echo $video->slug . '.html'; ?>" data-numposts="5"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="sidebar">
            <?php echo $__env->make('front_end._partial.side_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo $__env->make('front_end._partial.care', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- Care -->
        </div>
		<div class="news-good">
			<div class="title">
				<h3>
					Tin hay
				</h3>
			</div>
			<?php if(isset($postHigh)): ?>
				<?php $__currentLoopData = $postHigh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<div class="new-good">
					<a href="<?php echo e(route('desktop.post', $post['slug'])); ?>">
						<img class="img-responsive" src="<?php echo e(url($post['image'])); ?>" alt="<?php echo e($post['title']); ?>" />
					</a>
					<div  style="height: 50px">
						<a href="<?php echo e(route('desktop.post', $post['slug'])); ?>">
							<h3><?php echo e(Illuminate\Support\Str::words($post['title'], 15, '...')); ?></h3>
						</a>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<!-- cmt fb -->
<div id="fb-root"></div>
<script>(function (d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id))
			return;
		js = d.createElement(s);
		js.id = id;
		js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=272807766472266";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>

<!-- like and share fb -->

<?php echo $__env->make('layouts.desktop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>