<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Trang thành viên nhóm dịch</title>
<base href="{{asset('')}}">
<!-- //custom-theme -->
<link
	href="assets/translator/css/bootstrap.css"
	rel="stylesheet" type="text/css" media="all" />
<link
	href="assets/translator/css/component.css"
	rel="stylesheet" type="text/css" media="all" />
<link
	href="assets/translator/css/export.css"
	rel="stylesheet" type="text/css" media="all" />
<link
	href="assets/translator/css/flipclock.css"
	rel="stylesheet" type="text/css" media="all" />
<link
	href="assets/translator/css/circles.css"
	rel="stylesheet" type="text/css" media="all" />
<link
	href="assets/translator/css/style_grid.css"
	rel="stylesheet" type="text/css" media="all" />
<link
	href="assets/translator/css/style.css"
	rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" type="text/css"
	href="assets/translator/css/table-style.css" />
<link rel="stylesheet" type="text/css"
	href="assets/translator/css/basictable.css" />

<!-- font-awesome-icons -->
<link
	href="assets/translator/css/font-awesome.css"
	rel="stylesheet">
<!-- //font-awesome-icons -->
<link
	href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800"
	rel="stylesheet">

</head>
<body>
	<div class="wthree_agile_admin_info">
		@include('layout.translator.member.header')

		@yield('main')
	</div>
	@include('layout.translator.member.footer')


	<!-- js -->

	<script type="text/javascript"
		src="assets/translator/js/jquery-2.1.4.min.js"></script>
	<script
		src="assets/translator/js/modernizr.custom.js"></script>

	<script
		src="assets/translator/js/classie.js"></script>
	<script
		src="assets/translator/js/gnmenu.js"></script>
	<script>
		new gnMenu(document.getElementById('gn-menu'));
	</script>
	<!-- tables -->

	<script type="text/javascript"
		src="assets/translator/js/jquery.basictable.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#table').basictable();

			$('#table-breakpoint').basictable({
				breakpoint : 768
			});

			$('#table-swap-axis').basictable({
				swapAxis : true
			});

			$('#table-force-off').basictable({
				forceResponsive : false
			});

			$('#table-no-resize').basictable({
				noResize : true
			});

			$('#table-two-axis').basictable();

			$('#table-max-height').basictable({
				tableWrapper : true
			});
		});
	</script>
	<!-- //js -->
	<script src="assets/translator/js/screenfull.js"></script>
	<script
		src="assets/translator/js/jquery.nicescroll.js"></script>
	<script
		src="assets/translator/js/scripts.js"></script>

	<script type="text/javascript"
		src="assets/translator/js/bootstrap-3.1.1.min.js"></script>
</body>
</html>