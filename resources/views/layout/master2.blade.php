<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title> 
    <link rel="stylesheet" href="assets/icon/css/all.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/path.css">
    <link rel="stylesheet" href="assets/css/tool.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/read.css">
    @yield('css')
</head>
<body id="body">
    @include('layout.header')   <!-- Phần TopNavigation -->
    @yield('main-tool')               
    @include('layout.footer'); <!-- Phần Footer -->
    @include('layout.login');   <!-- Trang login -->
    @include('layout.logup');  <!-- Trang logup -->

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
@yield('js')
</body>
</html>