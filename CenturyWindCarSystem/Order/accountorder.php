<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/26
 * Time: 14:07
 */
include "../Common/localSQLSettings.php";
localSettings();

$orderNum=$_GET["Id"];

$nowTime=date("Y-m-d G:i:s");

if($_POST['money']!=null){
	echo"$_POST[money]";

$query="UPDATE orderaccount SET orderState='已付款' WHERE order_for=".$orderNum.";";
mysql_query($query) or die("Error in query: $query. ".mysql_error());

$query="UPDATE orderlist SET orderState='已完成' WHERE Id=".$orderNum.";";
mysql_query($query) or die("Error in query: $query. ".mysql_error());

$query="INSERT INTO finance(orderId,orderState,incomeAmount,createAt) VALUES ('$orderNum','已付款','$_POST[money]','$nowTime');";
mysql_query($query) or die("Error in query: $query. ".mysql_error());
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
	<meta http-equiv="refresh" content="1.5;URL=orderfinish.php">
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
<div>
	<p>确认订单成功,请等待……</p>
</div>
</body>
</html>