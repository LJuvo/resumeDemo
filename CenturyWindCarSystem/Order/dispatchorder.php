<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/26
 * Time: 14:07
 */
$orderNum=$_GET["orderNum"];
$employerTel=$_GET["employerTel"];


include "../Common/localSQLSettings.php";
localSettings();

$query="UPDATE orderlist SET orderState='待确认',employerfor='".$employerTel."' WHERE Id=".$orderNum.";";
mysql_query($query) or die("Error in query: $query. ".mysql_error());
mysql_query($query) or die("Error in query: $query. ".mysql_error());
$query="UPDATE order_employer_state SET employer_state='待确认',orderfor=".$orderNum." WHERE employer_tel=".$employerTel.";";
mysql_query($query) or die("Error in query: $query. ".mysql_error());
echo"ss:".$orderNum;
echo"aa:".$employerTel;
echo"正在进行派单……";
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!--禁止图像工具栏出现的网页标签-->
	<meta content="no" http-equiv="imagetoolbar">
	<!--用于iphone开发-->
	<meta content="width=device-width,initial-scale=1" name="viewport">
	<meta http-equiv="refresh" content="1.5;URL=orderhangenter.php">
	<style>
		body{

		}
		input{
			width: 100%;;
		}
	</style>
	<title>世纪风</title>
</head>
<body
	<?php
	include '../Common/head.php';
	?>>
<div>
	<p>正在进行派单,请等待……</p>
</div>
</body>
</html>