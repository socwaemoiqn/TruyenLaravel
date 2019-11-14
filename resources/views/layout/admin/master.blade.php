<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Quản Trị</title>
<base href="{{asset('')}}">
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
<script src="assets/admin/ckeditorBasic/ckeditor.js"></script> <!-- Đang ở phiên bản basic-->
</head>
<body>
	<div id="wrapper">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			@include('layout.admin.header')
			@include('layout.admin.menu')
		</nav>
		<div id="page-wrapper">
			<div class="container-fluid">
				@yield('main')
			</div>
		</div>
		@include('layout.admin.footer')
	</div>
	<!-- jQuery -->
	
	<!-- Bootstrap Core JavaScript -->
	<script src="assets/admin/js/bootstrap.min.js"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="assets/admin/js/metisMenu.min.js"></script>

	<!-- Morris Charts JavaScript -->

	<!-- Custom Theme JavaScript -->
	<script src="assets/admin/js/startmin.js"></script>
</body>
	@yield('js')
</html>