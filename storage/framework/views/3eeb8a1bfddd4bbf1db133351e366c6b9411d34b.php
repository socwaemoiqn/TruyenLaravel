<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8"/>
    <title><?php echo $__env->yieldContent('title'); ?></title> 
    <link rel="stylesheet" href="assets/icon/css/all.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/path.css">
    <link rel="stylesheet" href="assets/css/tool.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body id="body">
    <?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   <!-- Phần TopNavigation -->
    <?php echo $__env->yieldContent('main'); ?>               
    <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>; <!-- Phần Footer -->
    <?php echo $__env->make('layout.tool', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;    <!-- Thanh công cụ góc dưới bên phải -->
    <?php echo $__env->make('layout.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;   <!-- Trang login -->
    <?php echo $__env->make('layout.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;  <!-- Trang logup -->

    <!-- JS phần login -->
<script src="assets/js/login.js">
</script>
<!-- JS phần login -->
<!-- JS phần menu và responsive -->
<script src="assets/js/menu-responsive.js"></script>
<!-- JS phần menu và responsive -->
<!-- JS phần index -->
<script src="assets/js/index.js"></script>
<script src="assets/js/tool.js"></script>
<!-- JS phần index -->
</body>
</html><?php /**PATH D:\HocTap\xampp\htdocs\NhomTruyen\resources\views/layout/master.blade.php ENDPATH**/ ?>