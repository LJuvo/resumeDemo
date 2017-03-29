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
							<a href="finance.php">收入</a>
						</li>
						<li>
							<a href="financeexpend.php">支出</a>
						</li>
						<li>
							<a href="financedetain.php">暂扣</a>
						</li>
						<li>
							<a href="financefund.php">基金</a>
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
					<td>订单号</td>
					<td>业务种类</td>
					<td>收入金额</td>
					<td>入账时间</td>
				</tr>
				<?php

				include "../Common/localSQLSettings.php";
				localSettings();

				$query="SELECT * FROM finance";
				$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
				$temp=mysql_num_rows($result);
				if($temp>0)
				{
					for($i=0;$i<=$temp-1;$i++)
					{
						$row=mysql_fetch_row($result);

						$que="SELECT * FROM orderlist WHERE Id='$row[1]'";
						$res = mysql_query($que) or die("Error in query: $que. ".mysql_error());

						$rocc=mysql_fetch_row($res);

						echo"<tr><td>$row[1]</td><td>$rocc[2]</td><td>$row[3]</td>
							<td>$row[4]</td></tr>
							<tr><td colspan='4'></td></tr>
				<tr><td colspan='2'>下单电话</td><td colspan='2'>$rocc[3]</td></tr>
				<tr><td colspan='2'>下单人名</td><td colspan='2'>$rocc[4]</td></tr>
				<tr><td colspan='2'>所属单位</td><td colspan='2'>$rocc[5]</td></tr>
				<tr><td colspan='2'>现场电话</td><td colspan='2'>$rocc[6]</td></tr>
				<tr><td colspan='2'>服务地址</td><td colspan='2'>$rocc[7]</td></tr>
				<tr><td colspan='2'>客户车型</td><td colspan='2'></td></tr>
				<tr><td colspan='2'>计费方式</td><td colspan='2'></td></tr>
				<tr><td colspan='2'>收费标准</td><td colspan='2'></td></tr>
				<tr><td colspan='2'>结算标准</td><td colspan='2'></td></tr>
				<tr><td colspan='2'>付款人</td><td colspan='2'></td></tr>";
					}
				}
				?>

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
