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
							<td class="selected"><a href="#">服务中订单</a></td>
							<td><a href="orderhangaccount.php">结算订单</a></td>
						</tr>
					</table>
					<table class="table table-bordered" style="text-align:center" >
						<tr>
							<td>服务中订单</td>
							<td colspan="6"></td>
						</tr>
						<tr>
							<td>订单号</td>
							<td>订单信息</td>
							<td>业务种类</td>
							<td>下单人电话</td>
							<td>服务人</td>
							<td>状态</td>
							<td></td>
						</tr>

						<?php
						@$userName = $_SESSION['userName'];
						include "../Common/localSQLSettings.php";
						localSettings();

						$query="SELECT * FROM order_employer_state WHERE employer_name='$userName' AND employer_state='服务中'";
						$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
						$temp=mysql_num_rows($result);
						if($temp>0)
						{
							for($i=0;$i<=$temp-1;$i++)
							{
								$row=mysql_fetch_row($result);
								$que="SELECT * FROM orderlist WHERE Id='$row[6]'";
								$res = mysql_query($que) or die("Error in query: $que. ".mysql_error());

								$rocc=mysql_fetch_row($res);

								if($row[7]=="服务开始"){
									$realstate="确认车辆";
									echo"<tr><td>$row[6]</td><td>$rocc[7]</td><td>$rocc[1]</td>
								<td>$rocc[3]</td><td>$row[1]</td><td>$row[7]</td><td><a href='serveorder.php?employer_tel=$row[2]&Id=$row[6]&realstate=$row[7]' class='btn bg-inverse bg-blue'>".$realstate."</button></td></tr>";
									echo"<tr><td>车型</td><td>车牌号</td><td>种类</td>
								<td>$rocc[3]</td><td>$row[1]</td><td>$row[7]</td><td></td></tr>";

								}else if($row[7]=="行程结束"){
								break;
								}else{
									if($row[7]=="待服务"){
										$realstate="开始前往";
									}
									if($row[7]=="前往中") {
										$realstate = "开始服务";
									}
									if($row[7]=="车辆检测完毕"){
										$realstate = "开始行程";
									}
									if($row[7]=="行程中"){
										$realstate = "结束行程";
									}
									echo"<tr><td>$row[6]</td><td>$rocc[7]</td><td>$rocc[1]</td>
								<td>$rocc[3]</td><td>$row[1]</td><td>$row[7]</td><td><a href='serveorder.php?employer_tel=$row[2]&Id=$row[6]&realstate=$row[7]' class='btn bg-inverse bg-blue'>".$realstate."</button></td></tr>";

								}
								}
						}

						?>
					</table>
					<table class="table table-bordered" style="text-align:center" >
						<tr>
							<td class="selected"><a href="#">前往中</a></td>
							<td><a href="orderhangenter.php">车辆确认</a></td>
							<td><a href="#">行程中</a></td>
						</tr>
					</table>
					<table class="table table-bordered" style="text-align:center" id="addNewTable">
						<tr>
							<td>服务中订单</td>
							<td colspan="5"></td>
						</tr>
						<tr>
							<td>订单号</td>
							<td>订单信息</td>
							<td>业务种类</td>
							<td>下单人电话</td>
							<td>派给</td>
							<td>状态</td>
						</tr>
						<!--<tr>
							<td>12</td>
							<td>000</td>
							<td>拖车</td>
							<td>123</td>
							<td>555</td>
							<td>待确认</td>
						</tr>-->
						<?php
						@$userName = $_SESSION['userName'];

						$query="SELECT * FROM order_employer_state WHERE employer_state='服务中'";
						$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
						$temp=mysql_num_rows($result);
						if($temp>0)
						{
							for($i=0;$i<=$temp-1;$i++)
							{
								$row=mysql_fetch_row($result);
								$que="SELECT * FROM orderlist WHERE Id='$row[6]'";
								$res = mysql_query($que) or die("Error in query: $que. ".mysql_error());

								$rocc=mysql_fetch_row($res);

								echo"<tr><td>$row[6]</td><td>$rocc[7]</td><td>$rocc[1]</td>
								<td>$rocc[3]</td><td>$row[1]</td><td>$row[7]</td></tr>";
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
