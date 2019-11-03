<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8"/>
    <title>@yield('title')</title> 
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
    @include('layout.header')   <!-- Phần TopNavigation -->
    @yield('main')               
    @include('layout.footer'); <!-- Phần Footer -->
    @include('layout.tool');    <!-- Thanh công cụ góc dưới bên phải -->
    @include('layout.login');   <!-- Trang login -->
    @include('layout.logout');  <!-- Trang logup -->

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
</html>