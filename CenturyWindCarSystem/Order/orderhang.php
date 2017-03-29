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
<body onload="initView();">
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
			<table class="table table-bordered" style="text-align:center">
				<tr>
					<td class="selected"><a href="#">待派订单</a></td>
					<td><a href="orderhangenter.php">待确认订单</a></td>
					<td><a href="orderhangserve.php">服务中订单</a></td>
					<td><a href="orderhangaccount.php">结算订单</a></td>
				</tr>
			</table>
			<table class="table table-bordered" style="text-align:center" id="addNewTable">
				<tr>
					<td>待派订单</td>
					<td colspan="4"></td>
				</tr>
				<tr>
					<td>订单号</td>
					<td>业务种类</td>
					<td>下单人电话</td>
					<td>订单信息</td>
					<td>状态</td>
				</tr>
				<!--<tr>
					<td>12</td>
					<td>拖车</td>
					<td>000</td>
					<td>123</td>
					<td>正在派送</td>
				</tr>-->

			</table>
			<?php
			@$userName = $_SESSION['userName'];
			include "../Common/localSQLSettings.php";
			localSettings();

			$que = "SELECT * FROM user WHERE user.name='$userName'";
			//	$query= "SELECT * FROM user";
			$res = mysql_query($que);
			mysql_query("set names utf8");

			if (mysql_num_rows($res) > 0) {
				while ($row = mysql_fetch_row($res)) {
					if (strcmp($userName, $row[1]) == 0) {
						if($row[3]=="606"||$row[3]=="909"){
							echo"<div><table class='table'><tbody>";
							echo"<tr><td><a href='orderhangdispatch.php'>
<button class='btn bg-blue bg-inverse' style='width: 100%;'>派单</button>
</a></td></tr></tbody></table></div>";
						}
					}
				}
			}
			?>
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
	/*
	 *增加行
	 * */
	function addTableCell(cellTable, i) {
		var tableObj = document.getElementById('addNewTable');
		var rowNums = tableObj.rows.length;
		var newRow = tableObj.insertRow(rowNums);
		newRow.insertCell(0).innerHTML = cellTable[i].orderId;
		newRow.insertCell(1).innerHTML = cellTable[i].type;
		newRow.insertCell(2).innerHTML = cellTable[i].telnum;
		newRow.insertCell(3).innerHTML = cellTable[i].address;
		newRow.insertCell(4).innerHTML = cellTable[i].state;
		return {tableObj: tableObj, rowNums: rowNums, newRow: newRow};
	}
	/*
	 *初始化界面
	 * */
	function initView() {

		<?php

		$query="SELECT * FROM orderlist WHERE orderState='待派'";
		$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
		$temp=mysql_num_rows($result);
		if($temp>0)
		{
			echo"var cellTable = [";
			for($i=0;$i<$temp;$i++)
			{
				$row=mysql_fetch_row($result);
				if($i==$temp-1)
				{
					echo "{orderId:\"$row[0]\" , type:\"$row[1]\"  , telnum:\"$row[3]\" , address:\"$row[7]\"  , state:\"$row[2]\" }";
				}
				else
				{
					echo "{orderId:\"$row[0]\" , type:\"$row[1]\"  , telnum:\"$row[3]\" , address:\"$row[7]\"  , state:\"$row[2]\" },";
				}
			}
			echo "];";
		}


		?>
		for (var i = 0; i < cellTable.length; i++) {
			var __ret = addTableCell(cellTable, i);

			var tableObj = __ret.tableObj;
			var rowNums = __ret.rowNums;
			var newRow = __ret.newRow;
		}

	}

</script>
</body>
</html>

