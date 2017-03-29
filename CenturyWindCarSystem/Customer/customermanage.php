<?php
//session_start();
//if (empty($_SESSION['userName'])) {
//    $url = "../UserManger/login.php";
//    echo '<script language=javascript>window.location.href="' . $url . '"</script>';
//} else {
//    @$userName = $_SESSION['userName'];
//	include "../Common/localSQLSettings.php";
//	localSettings();
//
//    $query = "SELECT * FROM user WHERE user.name='$userName'";
//    $result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
//    if (@$_GET['cust_ID']) {
//        $a = $_GET['cust_ID'];
//        echo $a;
//        $query1 = "delete from cutomers where cust_ID='$a'";
//        $result1 = mysql_query($query1) or die("Error in query: $query1. " . mysql_error());
//    }
//}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="author" content="developer@qietu.com">
		<!--禁止图像工具栏出现的网页标签-->
		<meta content="no" http-equiv="imagetoolbar">
		<!--用于iphone开发-->
		<meta content="width=device-width,initial-scale=1" name="viewport">
		<link type="image/x-icon" href="../assets/ico/favicon.png" rel="shortcut icon">
		<link rel="stylesheet" href="../assets/css/slicy.css">
		<link rel="stylesheet" href="../css/prettify.css" >
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
						<td  colspan="8">客户列表</td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td></td>
                        <td>客户识别码</td>
						<td>姓名</td>
                        <td>性别</td>
						<td>客户种类</td>
						<td>联系电话</td>
						<td>分配车辆</td>
						<td colspan="2">操作</td>
                        <td><a href="addcustomer.php">添加</a></td>
					</tr>

				</tbody>
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
                newRow.insertCell(0).innerHTML = cellTable[i].number;
				newRow.insertCell(1).innerHTML = cellTable[i].id;
				newRow.insertCell(2).innerHTML = cellTable[i].name;
				newRow.insertCell(3).innerHTML = cellTable[i].sex;
                newRow.insertCell(4).innerHTML = cellTable[i].type;
				newRow.insertCell(5).innerHTML = cellTable[i].tel;
				newRow.insertCell(6).innerHTML = cellTable[i].carId;
				newRow.insertCell(7).innerHTML = '<a href="customerbasicinfo.php?cust_ID='+cellTable[i].id+'">查看</a>';
				newRow.insertCell(8).innerHTML = '<a href="customer_revise.php?cust_ID='+cellTable[i].id+'">修改</a>';
			    newRow.insertCell(8).innerHTML = '<a href="?cust_ID='+cellTable[i].id+'">删除</a>';
				return {tableObj: tableObj, rowNums: rowNums, newRow: newRow};
			}
			/*
			 *初始化界面
			 * */
			function initView() {
//			var username=document.cookie.split(";")[0].split("=")[1];
//				alert(username);
                <?php
//                   $host = "localhost";
//                   $user = "root";
//                   $pass = "root";
//                   $db = "sjf";
//                   $connection = mysql_connect($host, $user, $pass) or die("Unable to connect!");
//                   mysql_select_db($db) or die("Unable to select database!");
//                   mysql_query("set names utf8");
//                   $query="SELECT * FROM cutomers";
//                   $result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
//                   $temp=mysql_num_rows($result)+1;
//                   if($temp>0)
//                   {
//                       echo"var cellTable = [";
//                       for($i=1;$i<$temp;$i++)
//                       {
//                           $row=mysql_fetch_row($result);
//                           if($i==$temp-1)
//                           {
//                               echo "{number:\"$i\" ,id:\"$row[1]\" ,name:\"$row[2]\",sex:\"$row[3]\" , type:\"$row[4]\",tel:\"$row[5]\" ,carId:\"$row[6]\" }";
//                           }
//                           else
//                           {
//                               echo "{number:\"$i\" ,id:\"$row[1]\" ,name:\"$row[2]\",sex:\"$row[3]\" , type:\"$row[4]\",tel:\"$row[5]\" ,carId:\"$row[6]\" },";
//                           }
//                       }
//                       echo "];";
//                   }
                ?>
				for(var i=0;i<cellTable.length;i++) {
					var __ret = addTableCell(cellTable, i);
					var tableObj = __ret.tableObj;
					var rowNums = __ret.rowNums;
					var newRow = __ret.newRow;
				}
			}
		</script>
	</body>
</html>
