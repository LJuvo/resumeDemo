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
						<li>
							<a href="finance.php">收入</a>
						</li>
						<li class="selected">
							<a href="#">支出</a>
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
			<div id="expend">
				<table class="table table-bordered" style="text-align:center" id="addNewTable">
					<tbody>
					<tr>
						<td colspan="4">支出</td>
					</tr>
					<tr>
						<td class="selected"><a href="financeexpend.php">查询</a></td>
						<td><a href="financeexpendwipe.php">报销</a></td>
					</tr>
					</tbody>
				</table>
				<table class="table table-bordered" style="text-align:center">
					<tbody>
					<tr>
						<td>支出订单详情</td>
						<td>订单种类</td>
						<td>下单电话</td>
						<td>下单人员</td>
						<td>报销种类</td>
					</tr>
					<?php
					@$userName = $_SESSION['userName'];
					include "../Common/localSQLSettings.php";
					localSettings();

					$orderId=$_GET["Id"];
					$query="SELECT * FROM orderaccount WHERE orderState='已付款' AND order_for='$orderId'";
					$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
					$temp=mysql_num_rows($result);
					if($temp>0)
					{
						for($i=0;$i<=$temp-1;$i++)
						{
							$row=mysql_fetch_row($result);

							$que="SELECT * FROM orderlist WHERE Id='$orderId'";
							$res = mysql_query($que) or die("Error in query: $que. ".mysql_error());

							$rocc=mysql_fetch_row($res);

							echo"<tr><td>$row[5]</td><td>$rocc[1]</td><td>$rocc[3]</td>
							<td>$rocc[4]</td><td>过路费</td></tr>";

							echo"
							<tr><td colspan='5'></td></tr>
				<tr><td colspan='2'>下单电话</td><td colspan='3'>$rocc[3]</td></tr>
				<tr><td colspan='2'>下单人名</td><td colspan='3'>$rocc[4]</td></tr>
				<tr><td colspan='2'>所属单位</td><td colspan='3'>$rocc[5]</td></tr>
				<tr><td colspan='2'>现场电话</td><td colspan='3'>$rocc[6]</td></tr>
				<tr><td colspan='2'>服务地址</td><td colspan='3'>$rocc[7]</td></tr>
				<tr><td colspan='2'>客户车型</td><td colspan='3'></td></tr>
				<tr><td colspan='2'>计费方式</td><td colspan='3'></td></tr>
				<tr><td colspan='2'>收费标准</td><td colspan='3'></td></tr>
				<tr><td colspan='2'>结算标准</td><td colspan='3'></td></tr>
				<tr><td colspan='2'>付款人</td><td colspan='3'></td></tr>";
						}
					}

					mysql_close($connection);
					mysql_free_result($result);

					?>
					</tbody>
				</table>
			</div>

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
