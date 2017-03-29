<?php
//$a = $_POST;
//
//include "../Common/localSQLSettings.php";
//localSettings();
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!--禁止图像工具栏出现的网页标签-->
	<meta content="no" http-equiv="imagetoolbar">
	<!--用于iphone开发-->
	<meta content="width=device-width,initial-scale=1" name="viewport">
	<meta name="save" content="history">
	<link type="image/x-icon" href="../assets/ico/favicon.ico" rel="shortcut icon">
	<link rel="stylesheet" href="../assets/css/slicy.css">
	<link rel="stylesheet" href="../css/prettify.css">
	<link rel="stylesheet" href="../css/docs.css">
	<title>世纪风</title>
</head>
<body onload="initView();">
<?php
include '../Common/head.php';
?>
<div class="wrapper">
	<div class="row">
		<div class="col12">
			<div class="col4"></div>
			<div class="col4" style="text-align: center">
				<a href="addcompanycar.php" class="btn bg-blue bg-inverse">公司车辆采购</a>
				<p></p>
				<a href="addcustomercar.php" class="btn bg-blue bg-inverse">客户车辆录入</a>
			</div>
			<div class="col4"></div>
		</div>

	</div>
</div>

<?php
include '../Common/footer.php';
?>
<script src="../assets/js/jquery-1.7.1.min.js"></script>
<script src="../assets/js/slicy.js"></script>
<script src="../js/prettify.js"></script>
<script src="../js/docs.js"></script>
<script type="text/javascript">
	function nonShow() {
		document.getElementById("noneShow").style.display = "none";
	}
</script>

</body>
</html>
