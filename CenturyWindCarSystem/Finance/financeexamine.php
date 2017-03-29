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
						<td><a href="financeexpendwipe.php">报销</a></td>
					</tr>
					<tr>
						<td class="selected" colspan="2"><a href="#">审核</a></td>

					</tr>
					</tbody>
				</table>
				<table class="table table-bordered" style="text-align:center" id="addNewTable">
					<tbody>
					<tr>
						<td colspan="6">审核</td>
					</tr>

					<?php

					include "../Common/localSQLSettings.php";
					localSettings();

					$query="SELECT * FROM car_procurement WHERE financialState='待审核' ORDER BY createAt ASC";
					$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
					$temp=mysql_num_rows($result);
					if($temp>0)
					{
						for($i=0;$i<=$temp-1;$i++)
						{
							$row=mysql_fetch_row($result);

							echo"<tr><td colspan='5'></td></tr>
						<tr><td>车辆编号</td><td colspan='4'>$row[1]</td></tr>
						<tr><td>车辆型号</td><td>车辆品牌</td><td>申请金额</td>
						<td>上报时间</td><td>审核状态</td></tr>

						<tr><td>$row[4]</td><td>$row[5]</td>
						<td>$row[12]</td><td>$row[16]</td><td><a href='financeexamineinfo.php?Id=$row[0]'>审核</a></td></tr>
						<tr><td>采购人员</td><td>$row[14]</td><td>采购人员电话</td><td colspan='3'>$row[15]</td></tr>
						<tr style='background: #cccccc'><td colspan='6'></td></tr>";
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
