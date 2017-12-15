<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php echo $__env->yieldContent('title_admin'); ?></title>
<link rel="stylesheet" href="<?php echo e(url('css/style.default.css')); ?>" type="text/css" />

<link rel="stylesheet" href="<?php echo e(url('css/admin/responsive-tables.css')); ?>">
<link href="<?php echo e(url('css/admin/fileinput.min.css')); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(url('css/admin/select2.min.css')); ?>">
<link href="<?php echo e(url('css/admin/daterangepicker.css')); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(url('css/admin/bootstrap-colorpicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('css/admin/bootstrap-tagsinput.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('css/admin/switchery.min.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('css/pagination.css')); ?>">
<style type="text/css">
	body{
		overflow-y: scroll;
	}
</style>


<link href="<?php echo e(url('css/admin/hanoienglishtest.css')); ?>" rel="stylesheet">
<link href="<?php echo e(url('css/admin/backEnd.css')); ?>" rel="stylesheet">
<script src="<?php echo e(url('js/jquery-2.1.4.min.js')); ?>"></script>
<script src="<?php echo e(url('js/moment.js')); ?>"></script>
<script src="<?php echo e(url('js/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(url('js/modernizr.min.js')); ?>"></script>
<script src="<?php echo e(url('js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(url('js/moment-with-locales.min.js')); ?>"></script>
<script src="<?php echo e(url('js/jquery.uniform.js')); ?>"></script>
<script src="<?php echo e(url('js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(url('js/jquery.flot.js')); ?>"></script>
<script src="<?php echo e(url('js/jquery.flot.resize.js')); ?>"></script>
<script src="<?php echo e(url('js/responsive-tables.js')); ?>"></script>
<script src="<?php echo e(url('js/custom.js')); ?>"></script>
<script src="<?php echo e(url('js/bootstrap-colorpicker.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/ckeditor/ckeditor.js')); ?>"></script>
<script src="<?php echo e(url('js/fileinput.min.js')); ?>"></script>
<script>
	var $ = jQuery;
    var baseURL_editor = "<?php echo url('/'); ?>";
</script>

<script src="<?php echo e(url('plugins/func_ckfinder.js')); ?>"></script>
<script src="<?php echo e(url('js/select2.min.js')); ?>"></script>
<script src="<?php echo e(url('js/bootstrap-tagsinput.min.js')); ?>"></script>
<script src="<?php echo e(url('js/switchery.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/bootstrap-timepicker.min.js')); ?>"></script>
<script src="<?php echo e(url('js/option_admin.js')); ?>"></script>
<script src="<?php echo e(url('js/admin_add_js.js')); ?>"></script>
</head>

<body>
	<?php echo $__env->yieldContent('content_admin'); ?>
	<script>
		var elems = document.querySelectorAll('.js-switch');
		for (var i = 0; i < elems.length; i++) {
		  var switchery = new Switchery(elems[i]);
		}
	</script>
</body>
</html>
