<?php
/**
 * Created by PhpStorm.
 * User: Juvo
 * Date: 2016/7/12
 * Time: 9:39
 */
include "../Common/localSQLSettings.php";
session_start();

if (empty($_SESSION['userName'])) {
	$url = "UserManger/login.php";
	echo '<script language=javascript>window.location.href="' . $url . '"</script>';
} else {

	@$userName = $_SESSION['userName'];
	localSettings();
	$query = "SELECT * FROM user WHERE user.name='$userName'";
//	$query= "SELECT * FROM user";
	$result = mysql_query($query);

	if (mysql_num_rows($result) > 0) {
		while ($row = mysql_fetch_row($result)) {
			if (strcmp($userName, $row[1]) == 0) {
				switch ($row[3]) {
					case "606":
						echo '<script language=javascript>window.location.href="index_admin.php"</script>';
						break;
					case "909":
						echo '<script language=javascript>window.location.href="index_superadmin.php"</script>';
						break;
					default:
//						echo '<script language=javascript>window.location.href="index_user.php"</script>';
						break;
				}
			}
		}
	}
	mysql_close($connection);
	mysql_free_result($result);
}


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
		<table class="table table-bordered" style="text-align:center" id="addNewTable">
			<tbody>
			<tr>
				<td colspan="8">员工列表</td>
			</tr>
			</tbody>
			<tbody>
			<tr>
				<td>编号</td>
				<td>姓名</td>
				<td>性别</td>
				<td>联系电话</td>
				<td>分配车辆</td>
				<td colspan="2">操作</td>
				<td><a href="../employee/addemployee.php">添加</a></td>
			</tr>
			</tbody>
			<tfoot>
			</tfoot>
		</table>
	</div>
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
			newRow.insertCell(0).innerHTML = cellTable[i].id;
			newRow.insertCell(1).innerHTML = cellTable[i].name;
			newRow.insertCell(2).innerHTML = cellTable[i].sex;
			newRow.insertCell(3).innerHTML = cellTable[i].tel;
			newRow.insertCell(4).innerHTML = cellTable[i].carId;
			newRow.insertCell(5).innerHTML = '<a href="../employee/employee_info.php">查看</a>';
			newRow.insertCell(6).innerHTML = '<a href="../employee/employee_revise.php">修改</a>';
			newRow.insertCell(7).innerHTML = '<a onclick="delRow(' + i + ');">删除</a>';
			return {tableObj: tableObj, rowNums: rowNums, newRow: newRow};
		}
		/*
		 *初始化界面
		 * */
		function initView() {
//			var username=document.cookie.split(";")[0].split("=")[1];
//				alert(username);
			<?php
		$host = "localhost";
		$user = "root";
		$pass = "root";
		$db = "sjf";
		$connection = mysql_connect($host, $user, $pass) or die("Unable to connect!");
		mysql_select_db($db) or die("Unable to select database!");
		mysql_query("set names utf8");
		$query="SELECT * FROM employers";
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
					echo "{id:\"$row[1]\" , name:\"$row[2]\"  , sex:\"$row[3]\" , tel:\"$row[4]\"  , carId:\"$row[5]\" }";
				}
				else
				{
					echo "{id:\"$row[1]\"  , name:\"$row[2]\"  , sex:\"$row[3]\"  , tel:\"$row[4]\"  , carId: \"$row[5]\" },";
				}
			}
			echo "];";
		}
		?>
			for (var i = 0; i < cellTable.length; i++) {
//					alert(i);
				var __ret = addTableCell(cellTable, i);
				var tableObj = __ret.tableObj;
				var rowNums = __ret.rowNums;
				var newRow = __ret.newRow;
			}
		}
		/*
		 *删除rowNum行数的行
		 * */
		function delRow(num) {
			//删除第二行，初始2为第一条数据
			var rowNum = num + 3;
			document.getElementById('addNewTable').deleteRow(rowNum);
		}
	</script>
	</body>
	</html>
<?php

?>