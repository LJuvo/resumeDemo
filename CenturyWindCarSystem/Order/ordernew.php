<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<!--禁止图像工具栏出现的网页标签-->
		<meta content="no" http-equiv="imagetoolbar">
		<!--用于iphone开发-->
		<meta content="width=device-width,initial-scale=1" name="viewport">
		<link type="image/x-icon" href="../assets/ico/favicon.png" rel="shortcut icon">
		<link rel="stylesheet" href="../assets/css/slicy.css">
		<link rel="stylesheet" href="../css/prettify.css">
		<link rel="stylesheet" href="../css/docs.css">
		<style>
			body{

			}
			input{
				width: 100%;;
			}
		</style>
		<title>世纪风</title>
	</head>
	<body>
	<?php
	include '../Common/head.php';
	?>
		<div class="wrapper">
			<div class="row">
				<div class="col3">
					<ul class="sidebar nojs">
						<li>
							<ul>
								<li class="selected">
									<a href="ordernew.php">新建订单</a>
								</li>
								<li>
									<a href="orderhang.php">未完成订单</a>
								</li>
								<li>
									<a href="orderfinish.php">已完成订单</a>
								</li>
                                <li>
									<a href="ordercancel.php">已取消订单</a>
								</li>
								<li>
									<a href="ordercancelexception.php">异常情况</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<!--content-->
				<div class="col9 docs-body" id="main_content">
					<table class="table table-bordered" style="text-align:center" id="addNewTable">
						<tbody>
						<tr>
							<td colspan="4">业务种类</td>
						</tr>
						<tr>
							<td><a href="ordernewtuoche.php">拖车业务</a></td>
							<td><a href="ordernewdian.php">
								搭电业务</a></td>
							<td><a href="ordernewhuantai.php">
								更换备胎</a></td>
							<td><a href="ordernewranyou.php">
								送燃油</a></td>
						</tr>
						<tr>
							<td>开门解锁</td>
							<td>困境救援</td>
							<td>吊装业务</td>
							<td>地下牵引</td>
						</tr>
						</tbody>
					</table>

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
		</script>
	</body>
</html>
