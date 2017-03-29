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
									<a href="#">异常情况</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<!--content-->
				<div class="col9 docs-body" id="main_content">

					<table class="table table-bordered" style="text-align:center">
						<tbody>
						<tr>
							<td>订单种类</td>
							<td>下单电话</td>
							<td>下单人员</td>
							<td>状态</td>
							<td>服务人员</td>
							<td>下单时间</td>
							<td></td>
						</tr>
						<!--<tr>
							<td>拖车业务</td>
							<td>1546513216</td>
							<td>钟敏</td>
							<td>已取消</td>
							<td>Juvo</td>
							<td>2016 05 30 </td>
							<td><a href="ordercancelexcepinfo.php">查看详情</a></td>
						</tr>-->
						<?php
						include "../Common/localSQLSettings.php";
						localSettings();

						$query="SELECT * FROM orderlist order by createAt DESC";
						$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
						$temp=mysql_num_rows($result);
						if($temp>0)
						{
							for($i=0;$i<=$temp-1;$i++)
							{
								$row=mysql_fetch_row($result);

								$que="SELECT * FROM orderaccount WHERE order_for='$row[0]'";
								$resu = mysql_query($que) or die("Error in query: $que. ".mysql_error());
								$te=mysql_num_rows($resu);
								$rocc = mysql_fetch_row($resu);

								echo"<tr><td>$row[1]</td><td>$row[3]</td>
							<td>$row[4]</td><td>$row[2]</td><td>$rocc[2]</td><td>$row[14]</td>
							<td><a href='ordercancelexcepinforevise.php?Id=$row[0]'>查看详情</a></td></tr>";

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
