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
						<td><a href="financeexpend.php">查询</a></td>
						<td class="selected"><a href="#">报销</a></td>
					</tr>
					<tr>
						<td colspan="2"><a href="financeexamine.php">审核</a></td>

					</tr>
					</tbody>
				</table>

				<table class="table table-bordered" style="text-align:center">
					<tbody>
					<tr>
						<td colspan="4">业务种类</td>
					</tr>
					<tr>
						<td><a href="financeexpendroad.php">过路费</a></td>
						<td><a href="financeexpendoil.php">燃油费</a></td>
						<td><a href="financeexpendcar.php">洗车费</a></td>
						<td><a href="financeexpendpark.php">停车费</a></td>
					</tr>
					<tr>
						<td><a href="financeexpendkeep.php">保养费</a></td>
						<td><a href="financeexpendentertain.php">招待费</a></td>
						<td><a href="financeexpendothers.php">其他费用</a></td>
						<td></td>
					</tr>
					</tbody>
				</table>
				<table class="table table-bordered" style="text-align:center" id="addNewTable">
					<tbody>
					<tr>
						<td colspan="6">报销单</td>
					</tr>
					<tr>
						<td>报销单号</td>
						<td>报销种类</td>
						<td>报销金额</td>
						<td>上报时间</td>
						<td>报销状态</td>
						<td>详情</td>
					</tr>
					<?php

					include "../Common/localSQLSettings.php";
					localSettings();

					$query="SELECT * FROM financeexpend";
					$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
					$temp=mysql_num_rows($result);
					if($temp>0)
					{
						for($i=0;$i<=$temp-1;$i++)
						{
							$row=mysql_fetch_row($result);

							echo"<tr><td>$row[0]</td><td>$row[2]</td><td>$row[3]</td>
							<td>$row[10]</td><td>$row[1]</td><td><a href='financewipeinfo.php?Id=$row[0]'>查看详情</a></td></tr>";
						}
					}
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
