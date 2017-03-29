<?php
	session_start();
?>
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
								<li class="selected">
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
					<table class="table table-bordered" style="text-align:center" >
						<tr>
							<td><a href="orderhangsend.php">待派订单</a></td>
							<td><a href="orderhangenter.php">待确认订单</a></td>
							<td><a href="orderhangserve.php">服务中订单</a></td>
							<td class="selected"><a href="#">结算订单</a></td>
						</tr>
					</table>
					<table class="table table-bordered" style="text-align:center" >
						<?php
						@$userName = $_SESSION['userName'];
						include "../Common/localSQLSettings.php";
						localSettings();

						$query="SELECT * FROM orderaccount WHERE orderState='未付款' AND employer_name='$userName'";
						$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
						$temp=mysql_num_rows($result);
						if($temp>0)
						{
							for($i=0;$i<=$temp-1;$i++)
							{
								$row=mysql_fetch_row($result);

								$que="SELECT * FROM orderlist WHERE Id='$row[5]'";
								$res = mysql_query($que) or die("Error in query: $que. ".mysql_error());

								$rocc=mysql_fetch_row($res);

//								echo"<tr><td>$row[5]</td><td>$rocc[7]</td><td>$rocc[1]</td>
//								<td>$rocc[3]</td><td>$row[1]</td></tr>";
								echo"<form action='accountorder.php?Id=$row[5]' method='post'><tbody><tr><td>订单号</td><td>$row[5]</td><td>状态</td></tr>
						<tr><td>业务种类</td><td>$rocc[1]</td><td rowspan='7'>未收款</td></tr>
						<tr><td>下单人名</td><td>$rocc[4]</td></tr>
						<tr><td>下单人电话</td><td>$rocc[3]</td></tr>
						<tr><td>现场地址</td><td>$rocc[7]</td></tr>
						<tr><td>现场电话</td><td>$rocc[6]</td></tr>
						<tr><td>目的地址</td><td>$rocc[10]</td></tr>
						<tr><td>目的电话</td><td>$rocc[11]</td></tr>
						<tr><td>收款金额</td><td><input placeholder='' name='money'/></td><td rowspan='1'><input type='submit' class='btn bg-inverse bg-blue'/></td></tr></tr>
						<tr bgcolor='#f5f5f5'><td colspan='3'></td></tr></tbody>";
							}
						}

						?>
					</table>
					<table class="table table-bordered" style="text-align:center" >
						<tbody>
						<tr>
							<td>结算订单</td>
							<td colspan="4"></td>
						</tr>
						<!--<tr>
							<td>订单号</td><td>44</td><td>状态</td>


						</tr>
						<tr>
							<td>订单信息</td>
							<td>服务地址</td>
							<td rowspan="7">未收款</td>
						</tr>
						<tr>
							<td>业务种类</td>
							<td>拖车</td>
						</tr>
						<tr>
							<td>下单人名</td>
							<td>123</td>
						</tr>
						<tr>
							<td>下单人电话</td>
							<td>123</td>
						</tr>
						<tr>
							<td>目的地址</td>
							<td>123</td>
						</tr>
						<tr>
							<td>目的电话</td>
							<td>123</td>
						</tr>
						<tr>
							<td>现场电话</td>
							<td>123</td>
						</tr>
						<tr bgcolor="f5f5f5"><td colspan='3'></td></tr>-->
						</tbody>
						<?php
						@$userName = $_SESSION['userName'];
						$query="SELECT * FROM orderaccount WHERE orderState='未付款'";
						$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
						$temp=mysql_num_rows($result);
						if($temp>0)
						{
							for($i=0;$i<=$temp-1;$i++)
							{
								$row=mysql_fetch_row($result);

								$que="SELECT * FROM orderlist WHERE Id='$row[5]'";
								$res = mysql_query($que) or die("Error in query: $que. ".mysql_error());

								$rocc=mysql_fetch_row($res);

//								echo"<tr><td>$row[5]</td><td>$rocc[7]</td><td>$rocc[1]</td>
//								<td>$rocc[3]</td><td>$row[1]</td></tr>";
						echo"<tbody><tr><td>订单号</td><td>$row[5]</td><td>状态</td></tr>
						<tr><td>业务种类</td><td>$rocc[1]</td><td rowspan='7'>未收款</td></tr>
						<tr><td>下单人名</td><td>$rocc[4]</td></tr>
						<tr><td>下单人电话</td><td>$rocc[3]</td></tr>
						<tr><td>现场地址</td><td>$rocc[7]</td></tr>
						<tr><td>现场电话</td><td>$rocc[6]</td></tr>
						<tr><td>目的地址</td><td>$rocc[10]</td></tr>
						<tr><td>目的电话</td><td>$rocc[11]</td></tr>
						<tr bgcolor='f5f5f5'><td colspan='3'></td></tr></tbody>";
							}
						}

						?>
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
