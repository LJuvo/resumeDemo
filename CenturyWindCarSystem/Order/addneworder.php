<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/25
 * Time: 10:42
 */

@$userName = "root";
include "../Common/localSQLSettings.php";
localSettings();

$nowTime=date("Y-m-d G:i:s");

if($_POST['orderType']=="拖车业务"){
	mysql_query("INSERT INTO orderlist (businesstype,orderTel,orderName,orderCompany,
sceneTel,sceneAddress,customerType,destinationName,destinationAddress,destinationTel,createAt,updateAt)
 VALUES ('$_POST[orderType]','$_POST[orderTel]','$_POST[orderName]','$_POST[orderCompany]',
 '$_POST[sceneTel]','$_POST[sceneAddress]','$_POST[customerType]','$_POST[destinationName]',
 '$_POST[destinationAddress]','$_POST[destinationTel]','$nowTime','$nowTime')");
}
if($_POST['orderType']=="燃油业务"){
	mysql_query("INSERT INTO orderlist (businesstype,orderTel,orderName,orderCompany,
sceneTel,sceneAddress,customerType,oilType,createAt,updateAt)
 VALUES ('$_POST[orderType]','$_POST[orderTel]','$_POST[orderName]','$_POST[orderCompany]',
 '$_POST[sceneTel]','$_POST[sceneAddress]','$_POST[customerType]','$_POST[oilType]','$nowTime','$nowTime')");
}
if($_POST['orderType']=="换胎业务"){
	mysql_query("INSERT INTO orderlist (businesstype,orderTel,orderName,orderCompany,
sceneTel,sceneAddress,customerType,createAt,updateAt)
 VALUES ('$_POST[orderType]','$_POST[orderTel]','$_POST[orderName]','$_POST[orderCompany]',
 '$_POST[sceneTel]','$_POST[sceneAddress]','$_POST[customerType]','$nowTime','$nowTime')");
}
if($_POST['orderType']=="搭电业务"){
	mysql_query("INSERT INTO orderlist (businesstype,orderTel,orderName,orderCompany,
sceneTel,sceneAddress,customerType,batterySpec,createAt,updateAt)
 VALUES ('$_POST[orderType]','$_POST[orderTel]','$_POST[orderName]','$_POST[orderCompany]',
 '$_POST[sceneTel]','$_POST[sceneAddress]','$_POST[customerType]','$_POST[batterySpec]','$nowTime','$nowTime')");
}

mysql_close($connection);
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!--禁止图像工具栏出现的网页标签-->
	<meta content="no" http-equiv="imagetoolbar">
	<!--用于iphone开发-->
	<meta content="width=device-width,initial-scale=1" name="viewport">
	<meta http-equiv="refresh" content="1.5;URL=orderhang.php">
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
	<p>新建订单成功,请等待……</p>
</div>
</body>
</html>