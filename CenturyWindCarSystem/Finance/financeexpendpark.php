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
						<td class="selected"><a href="financeexpendwipe.php">报销</a></td>
					</tr>
					</tbody>
				</table>

				<table class="table table-bordered" style="text-align:center">
					<form action="expendwipe.php?numId=3" method="post">
						<tbody>
						<tr><td>费用报销</td><td colspan="3"></td></tr>
						<tr><td rowspan="8">报销基本信息</td><td>报销种类</td><td colspan="3">停车费报销</td></tr>
						<tr><td>报销金额</td><td colspan="3"><input name="expendmoney" value=""/></td></tr>
						<tr><td>产生时间</td><td colspan="3"><input name="expendTime" value=""/></td></tr>
						<tr><td>产生地址</td><td colspan="3"><input name="expendAddress" placeholder=""/></td></tr>
						<tr><td>关联合同</td><td colspan="3"><input name="expendContract" placeholder=""/></td></tr>
						<tr><td>报销人员</td><td colspan="3"><input name="expendName" placeholder=""/></td></tr>
						<tr><td>报销人员号码</td><td colspan="3"><input name="expendTel" placeholder=""/></td></tr>
						<tr><td>报销时间</td><td colspan="3"><input name="createAt" placeholder="当前时间" disabled="disabled"/></td></tr>
						<tr><td colspan="4"><input class="bg-inverse btn bg-blue" type="submit"/></td></tr>
						</tbody>
					</form>
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
	function selectChange(index){
		if(index==0){
			var temp="<table class='table table-bordered' style='text-align:center' id='addNewTable'>
			<tbody>
			<tr>
			<td colspan='4'>支出</td>
			</tr>
			<tr>
			<td class='selected'><a onclick='selectChange(0)'>查询</a></td>
			<td><a onclick='selectChange(1)'>报销</a></td>
			</tr>
			</tbody>
			</table>
			<table class='table table-bordered' style='text-align:center'>
			<tbody>
			<tr>
			<td>订单号</td>
			<td>订单种类</td>
			<td>下单电话</td>
			<td>下单人员</td>
			<td>报销种类</td>
			<td></td>
			</tr>";

			<?php
			@$userName = $_SESSION['userName'];
			include "../Common/localSQLSettings.php";
			localSettings();

			$query="SELECT * FROM orderaccount WHERE orderState='已付款'";
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
					echo"temp+=\"";
					echo"<tr><td>$row[5]</td><td>$rocc[1]</td><td>$rocc[3]</td>
					<td>$rocc[4]</td><td>过路费</td><td><a href='orderfinishinfo.php?Id=$row[5]'>查看详情</a></td></tr>";
					echo"\";";
				}
			}

			?>
			temp+="</tbody></table>";
			document.getElementById("expend").innerHTML=temp;
		}
		if(index==1){
			var temp="<table class='table table-bordered' style='text-align:center' id='addNewTable'>
				<tbody>
				<tr>
				<td colspan='4'>支出</td>
			</tr>
			<tr>
			<td><a onclick='selectChange(0)'>查询</a></td>
			<td class='selected'><a onclick='selectChange(1)'>报销</a></td>
			</tr>
			</tbody>
			</table>
			<table class='table table-bordered' style='text-align:center'>
			<tbody>
			<tr>
			<td>订单号</td>
			<td>订单种类</td>
			<td>下单电话</td>
			<td>下单人员</td>
			<td>报销种类</td>
			<td></td>
			</tr>";

			<?php
			@$userName = $_SESSION['userName'];

			$query="SELECT * FROM orderaccount WHERE orderState='已付款'";
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
					echo"temp+=\"";
					echo"<tr><td>$row[5]</td><td>$rocc[1]</td><td>$rocc[3]</td>
					<td>$rocc[4]</td><td>过路费</td><td><a href='orderfinishinfo.php?Id=$row[5]'>查看详情</a></td></tr>";
					echo"\";";
				}
			}

			?>
			temp+="</tbody></table>";
			document.getElementById("expend").innerHTML=temp;
		}

	}
</script>
</body>
</html>
