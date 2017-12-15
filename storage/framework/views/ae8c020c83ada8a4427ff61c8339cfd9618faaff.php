<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags always come first -->
		<title><?php if(isset($meta)): ?> <?php echo e($meta['title']); ?> <?php else: ?> <?php echo $__env->yieldContent('title'); ?> <?php endif; ?></title>
		<meta http-equiv="content-language" content="vi" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta property="fb:app_id" content="100004759420301" />
		<link rel="canonical" href="<?php echo e(Request::fullUrl()); ?>">
		<meta name="keywords" content="<?php if(isset($meta)): ?> <?php echo $meta['meta_keywords']; ?> <?php else: ?> <?php echo $__env->yieldContent('meta_keywords'); ?> <?php endif; ?> ">
		<meta name="robots" content="<?php if(isset($meta)): ?> <?php echo $meta['meta_robots']; ?> <?php else: ?> <?php echo $__env->yieldContent('meta_robots'); ?> <?php endif; ?> ">
		<meta name="description" content="<?php if(isset($meta)): ?> <?php echo $meta['meta_description']; ?> <?php else: ?> <?php echo $__env->yieldContent('meta_description'); ?> <?php endif; ?> ">
		<meta name="generator" content="BlueSoft.vn">
		<meta name="copyright" content="Tạp chí báo điện tử Songmoi.vn">
		<meta name="author" content="SongMoi.vn">
		<meta property="og:site_name" content="Tạp chí báo điện tử Songmoi.vn" />
		<meta property="og:title" content="<?php if(isset($meta)): ?> <?php echo e($meta['title']); ?> <?php else: ?> <?php echo $__env->yieldContent('title'); ?> <?php endif; ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?php echo e(Request::fullUrl()); ?>" />
		<meta property="og:description" content="<?php if(isset($meta)): ?> <?php echo $meta['meta_description']; ?> <?php else: ?> <?php echo $__env->yieldContent('meta_description'); ?> <?php endif; ?>">
		<meta property="og:image" content="<?php if(isset($meta)): ?> <?php echo e(@$meta['og_image']); ?> <?php else: ?> <?php echo $__env->yieldContent('og_image'); ?> <?php endif; ?>">
		<meta property="og:image:type" content="image/jpeg">
		<meta property="og:image:width" content="764">
		<meta property="og:image:height" content="454">


		<link href="<?php echo e(asset('images/logo.ico')); ?>" rel="shortcut icon" type="image/x-icon" />
		<link rel="stylesheet" href="<?php echo e(url('assets/css/bootstrap.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(url('assets/font-awesome/css/font-awesome.min.css')); ?>"/>
		<link rel="stylesheet" href="<?php echo e(url('assets/css/owl.theme.default.min.css')); ?>"/>
		<link rel="stylesheet" href="<?php echo e(url('assets/css/owl.carousel.min.css')); ?>"/>
		<link rel="stylesheet" href="<?php echo e(url('assets/bower_components/font-awesome/css/font-awesome.min.css')); ?>"/>
		<link rel="stylesheet" href="<?php echo e(url('assets/css/style.css')); ?>"/>
		<link rel="stylesheet" href="<?php echo e(url('assets/css/songmoi.css')); ?>"/>
		<link rel="stylesheet" href="<?php echo e(url('assets/css/front_end.css')); ?>"/>
		
		<script src="<?php echo e(url('assets/js/jquery-2.1.4.min.js')); ?>"></script>
		<script src="<?php echo e(url('assets/js/bootstrap.min.js')); ?>"></script>
		<script src="<?php echo e(url('assets/js/owl.carousel.min.js')); ?>"></script>
		<script src="<?php echo e(url('assets/js/hover.js')); ?>"></script>
		<script src="<?php echo e(url('assets/js/option_site.js')); ?>"></script>

		<script>
(function (i, s, o, g, r, a, m) {
	i['GoogleAnalyticsObject'] = r;
	i[r] = i[r] || function () {
		(i[r].q = i[r].q || []).push(arguments)
	}, i[r].l = 1 * new Date();
	a = s.createElement(o),
			m = s.getElementsByTagName(o)[0];
	a.async = 1;
	a.src = g;
	m.parentNode.insertBefore(a, m)
})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

ga('create', 'UA-75508376-1', 'auto');
ga('send', 'pageview');

		</script>
	</head>
	<body>
		<div class="wapper">
			<?php echo $__env->make('front_end._partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php echo $__env->yieldContent('content'); ?>
			<?php echo $__env->make('front_end._partial.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
		<?php echo $__env->make('front_end._partial.popup', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</body>
</html>