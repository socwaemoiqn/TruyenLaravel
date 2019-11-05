<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title> 
    <link rel="stylesheet" href="assets/icon/css/all.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/path.css">
    <link rel="stylesheet" href="assets/css/tool.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/read.css">
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body id="body">
    <?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   <!-- Phần TopNavigation -->
    <?php echo $__env->yieldContent('main-tool'); ?>               
    <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>; <!-- Phần Footer -->
    <?php echo $__env->make('layout.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;   <!-- Trang login -->
    <?php echo $__env->make('layout.logup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;  <!-- Trang logup -->

    <!-- JS phần login -->
<script src="assets/js/login.js">
</script>
<!-- JS phần login -->
<!-- JS phần menu và responsive -->
<script src="assets/js/menu-responsive.js"></script>
<!-- JS phần menu và responsive -->
<!-- JS phần tool -->
<script src="assets/js/read.js"></script>
<script src="assets/js/tool-read.js"></script>
<!-- JS phần tool -->
<?php echo $__env->yieldContent('js'); ?>
</body>
</html><?php /**PATH D:\HocTap\xampp\htdocs\NhomTruyenLaravel\resources\views/layout/master2.blade.php ENDPATH**/ ?>