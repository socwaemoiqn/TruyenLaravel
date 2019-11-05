<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Trang Nhóm Dịch</title>

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
		<?php echo $__env->make('layout.translator.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<?php echo $__env->yieldContent('main'); ?>
	</div>
	<?php echo $__env->make('layout.translator.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


	<!-- js -->

	<script type="text/javascript"
		src="assets/translator/js/jquery-2.1.4.min.js"></script>

	<!-- /amcharts -->
	<script
		src="assets/translator/js/amcharts.js"></script>
	<script
		src="assets/translator/js/serial.js"></script>
	<script
		src="assets/translator/js/export.js"></script>
	<script
		src="assets/translator/js/light.js"></script>
	<!-- Chart code -->


	<!-- //amcharts -->
	<script src="assets/translator/js/chart1.js"></script>
	<script src="assets/translator/js/Chart.min.js"></script>
	<script src="assets/translator/js/modernizr.custom.js"></script>

	<script src="assets/translator/js/classie.js"></script>
	<script src="assets/translator/js/gnmenu.js"></script>
	<script>
		new gnMenu(document.getElementById('gn-menu'));
	</script>
	<!-- script-for-menu -->




	<!-- /circle-->
	<script type="text/javascript" src="assets/translator/js/circles.js"></script>
	<script>
		var colors = [ [ '#ffffff', '#fd9426' ], [ '#ffffff', '#fc3158' ],
				[ '#ffffff', '#53d769' ], [ '#ffffff', '#147efb' ] ];
		for (var i = 1; i <= 7; i++) {
			var child = document.getElementById('circles-' + i), percentage = 30 + (i * 10);

			Circles.create({
				id : child.id,
				percentage : percentage,
				radius : 80,
				width : 10,
				number : percentage / 1,
				text : '%',
				colors : colors[i - 1]
			});
		}
	</script>
	<!-- //circle -->
	<!--skycons-icons-->
	<script src="assets/translator/js/skycons.js"></script>
	<script>
		var icons = new Skycons({
			"color" : "#fcb216"
		}), list = [ "partly-cloudy-day" ], i;

		for (i = list.length; i--;)
			icons.set(list[i], list[i]);
		icons.play();
	</script>
	<script>
		var icons = new Skycons({
			"color" : "#fff"
		}), list = [ "clear-night", "partly-cloudy-night", "cloudy",
				"clear-day", "sleet", "snow", "wind", "fog" ], i;

		for (i = list.length; i--;)
			icons.set(list[i], list[i]);
		icons.play();
	</script>
	<!--//skycons-icons-->
	<!-- //js -->
	<script src="assets/translator/js/screenfull.js"></script>
	<script>
		$(function() {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			$('#toggle').click(function() {
				screenfull.toggle($('#container')[0]);
			});
		});
	</script>
	<script src="assets/translator/js/flipclock.js"></script>

	<script type="text/javascript">
		var clock;

		$(document).ready(function() {

			clock = $('.clock').FlipClock({
				clockFace : 'HourlyCounter'
			});
		});
	</script>
	<script src="assets/translator/js/bars.js"></script>
	<script src="assets/translator/js/jquery.nicescroll.js"></script>
	<script src="assets/translator/js/scripts.js"></script>

	<script type="text/javascript" src="assets/translator/js/bootstrap-3.1.1.min.js"></script>
</body>
</html><?php /**PATH D:\HocTap\xampp\htdocs\NhomTruyenLaravel\resources\views/layout/translator/master.blade.php ENDPATH**/ ?>