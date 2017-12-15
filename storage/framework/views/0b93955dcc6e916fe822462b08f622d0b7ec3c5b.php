<?php $__env->startSection('content'); ?>
<?php if(!empty($sub_category)): ?>
<div class="menu-drop">
	<nav class="navbar">
		<ul class="navbar-nav">
			<?php $__currentLoopData = $sub_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<li>
				<a <?php echo e($post->category_id == $sub->id ? 'style=color:red' :''); ?> href="<?php echo e(route('desktop.category', ['slug' => $sub->slug])); ?>">
					<?php echo e($sub->name); ?>

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
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo e(url('/')); ?>">
						Trang chủ
					</a>
				</li>
				<?php if(isset($categorySecend)): ?>
				<li class="breadcrumb-item active">
					<a href="<?php echo e(route('desktop.category', ['slug' => $categorySecend->slug])); ?>">
						<?php echo e($categorySecend->name); ?>

					</a>
				</li>
				<?php endif; ?>
				<?php if(isset($categoryFirst)): ?>
				<li class="breadcrumb-item active">
					<a href="<?php echo e(route('desktop.category', ['slug' => $categoryFirst->slug])); ?>">
						<?php echo e($categoryFirst->name); ?>

					</a>
				</li>
				<?php endif; ?>
			</ol>
			<div class="life-detail-content">
				<h3 class="name-article">
					<?php echo e($post->name); ?>

				</h3>
				<div class="row life-detail-auth">
					<div class="pull-left">
						<span class="name-auth">
							<?php echo e($post->author); ?>

						</span>
						<span class="time-create">
							<i class="fa fa-clock-o"></i>
							<?php echo e(postTimer($post->created_at)); ?>

						</span>
					</div>
					<div class="pull-right print">
						<a href="javascript:window.print()">
							<span>
							</span>
							In bài viết
						</a>
					</div>
				</div>
				<div class="life-like">
					<div class="fb-like" data-href="<?php echo e(url($post->slug.'-'.$post->id).'.html'); ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>

				</div>
				<div class="new-same">
					<ul>
						<?php for($i = 0; $i < count($post->connect); $i ++): ?>
						<li>
							<a href="<?php echo e(url(str_slug($post->connect[$i]->name.'-'.$post->connect[$i]->id).'.html')); ?>">
								<?php echo e($post->connect[$i]->name); ?>

							</a>
						</li>
						<?php if($i == 2) break; ?>
						<?php endfor; ?>
					</ul>
				</div>
				<div class="left-content" style="text-align: justify !important;">
					<h3 class="title-article">
						<?php echo e($post->description); ?>

					</h3>
					<div class="post-detail-content">
						<?php echo $post->content; ?>

						<br/>
						<?php echo $post->author ? '<p style="text-align: right !important;">'.$post->author.'</p>': ''; ?>

						<?php echo $post->source ? '<p style="text-align: right !important;">'.$post->source.'</p>': ''; ?>

					</div>
				</div>
				<div class="tag row">
					<span>
						Từ Khóa :
					</span>
					<?php if(isset($post->tags)): ?>
						<?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<a href="<?php echo e(url('tag/'.$tag->slug)); ?>">
								<?php echo e($tag->name); ?>

							</a>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					<?php endif; ?>
				</div>
				<div class="comment">

					<div class="content-comment-article">
						<div class="row total-comment">
							<div class="fb-comments" data-href="http://songmoi.vn/<?php echo $post->slug . '.html'; ?>" data-numposts="5"></div>
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