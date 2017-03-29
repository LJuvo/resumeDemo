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
						<li class="selected">
							<a href="ordercancelexception.php">异常情况</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<!--content-->
		<div class="col9 docs-body" id="main_content">

				<?php

				include "../Common/localSQLSettings.php";
				localSettings();

				$orderId=$_GET["Id"];

				echo"<table class='table table-bordered' style='text-align:center'>
				<tr><td><a href='ordercancelexcepinforevise.php?Id=$orderId'>信息修改</a></td>
					<td class='selected'><a href='#'>订单状态修改</a></td>
					<td><a href='ordercancelexcepcancel.php?Id=$orderId'>取消订单</a></td></tr>
			</table>
			<table class='table table-bordered' style='text-align:center'>
				<tr>
					<td rowspan='6'>
			<table class='table table-bordered' style='text-align:center'>";

				$query = "SELECT * FROM orderaccount WHERE order_for='$orderId'";
				$result = mysql_query($query) or die("error in query:$query.".mysql_error());
				$temp = mysql_num_rows($result);


						$row = mysql_fetch_row($result);
						$showArray=array('0',$row[5]);
						$que="SELECT * FROM orderlist WHERE Id='$orderId'";
						$res=mysql_query($que) or die("error in query:$que.".mysql_error());
						@$rocc=mysql_fetch_row($res);
						$showArray[0]=$rocc[2];
						$showArray[1]=$orderId;
						$showArray[2]=$rocc[1];
						for($j=3;$j<count($rocc);$j++){
							$showArray[$j]=$rocc[$j];
						}
						$showArray[13]=$rocc[7];
						$showArray[14]=$rocc[6];

						$showArray[16]=$rocc[14];

						echo"<tbody>
						<tr><td>订单状态</td><td>$showArray[0]</td></tr>
						<tr><td>订单号</td><td>$showArray[1]</td></tr>
						<tr><td>订单种类</td><td>$showArray[2]</td></tr>
						<tr><td>下单电话</td><td>$showArray[3]</td></tr>
						<tr><td>下单人员</td><td>$showArray[4]</td></tr>
						<tr><td>订单所属</td><td>$showArray[5]</td></tr>
						<tr><td>下单方式</td><td></td></tr>
						<tr><td>客户车型</td><td></td></tr>
						<tr><td>车辆品牌</td><td></td></tr>
						<tr><td>车牌号码</td><td></td></tr>
						<tr><td>车辆识别代号</td><td></td></tr>
						<tr><td>车身颜色</td><td></td></tr>
						<tr><td>位置标识</td><td></td></tr>
						<tr><td>服务地址</td><td>$showArray[13]</td></tr>
						<tr><td>现场电话</td><td>$showArray[14]</td></tr>
						<tr><td>现场人员</td><td></td></tr>
						<tr><td>接单时间</td><td>$showArray[16]</td></tr>
						<tr><td>接单地址</td><td></td></tr>
						<tr><td>接单里程</td><td></td></tr>
						<tr><td>到达现场时间</td><td></td></tr>
						<tr><td>到达现场地址</td><td></td></tr>
						<tr><td>到达现场里程</td><td></td></tr>
						<tr><td>到达目的地时间</td><td></td></tr>
						<tr><td>到达目的地地址</td><td></td></tr>
						<tr><td>到达目的地里程</td><td></td></tr>
						<tr><td>客户是否随车</td><td></td></tr>
						<tr><td>车辆签收人员</td><td></td></tr>
						<tr><td>签收人员电话</td><td></td></tr>
						<tr><td>结算方式</td><td></td></tr>
						<tr><td>付款人员</td><td></td></tr>
						<tr><td>计费方式</td><td></td></tr>
						<tr><td>收费标准</td><td></td></tr>
						<tr><td>支付信息</td><td></td></tr>
						<tr><td>开票信息</td><td></td></tr>
						<tr><td>报销信息</td><td></td></tr>
						<tr><td>服务人员信息</td><td></td></tr>

						</tbody>";


				?>
			</table>
					</td>
					<td>订单状态修改</td>
				</tr>
				<tr>
					<td>待派</td>
				</tr>
				<tr>
					<td>待确定</td>
				</tr>
				<tr>
					<td>服务中</td>
				</tr>
				<tr>
					<td>行程结束</td>
				</tr>
				<tr>
					<td rowspan="2"></td>
				</tr>
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
