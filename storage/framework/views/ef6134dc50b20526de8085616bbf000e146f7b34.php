<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<title>Quản Trị</title>
<base href="<?php echo e(asset('')); ?>">
<script src="assets/admin/js/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!-- Bootstrap Core CSS -->
<link href="assets/admin/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="assets/admin/css/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="assets/admin/css/startmin.css" rel="stylesheet">

<!-- Custom Fonts -->

<link href="assets/admin/css/font-awesome.min.css" rel="stylesheet"
	type="text/css">
	<script src="assets/admin/ckeditor/ckeditor.js"></script>
</head>
<body>
	<div id="wrapper">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<?php echo $__env->make('layout.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php echo $__env->make('layout.admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</nav>
		<div id="page-wrapper">
			<div class="container-fluid">
				<?php echo $__env->yieldContent('main'); ?>
			</div>
		</div>
		<?php echo $__env->make('layout.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
	<!-- jQuery -->
	
	<script src="ckeditor/ckeditor.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="assets/admin/js/bootstrap.min.js"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="assets/admin/js/metisMenu.min.js"></script>

	<!-- Morris Charts JavaScript -->

	<!-- Custom Theme JavaScript -->
	<script src="assets/admin/js/startmin.js"></script>
</body>
	<?php echo $__env->yieldContent('js'); ?>
</html><?php /**PATH D:\HocTap\xampp\htdocs\NhomTruyenLaravel\resources\views/layout/admin/master.blade.php ENDPATH**/ ?>