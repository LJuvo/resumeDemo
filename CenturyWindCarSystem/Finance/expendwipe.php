<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/26
 * Time: 14:07
 */

include "../Common/localSQLSettings.php";
localSettings();

$nowTime=date("Y-m-d G:i:s");

if($_GET['numId']==0){
	$query="INSERT INTO financeexpend(expendState,expendType,expendmoney,expendTime,expendAddress,expendContract,
expendName,expendTel,createAt,expendInfo,expendContent) VALUES ('未报销','过路费报销','$_POST[expendmoney]',
'$_POST[expendTime]','$_POST[expendAddress]','$_POST[expendContract]','$_POST[expendName]','$_POST[expendTel]',
'$nowTime','$_POST[expendInfo]','$_POST[expendContent]');";
	mysql_query($query) or die("Error in query: $query. ".mysql_error());
}
if($_GET['numId']==1){
	$query="INSERT INTO financeexpend(expendState,expendType,expendmoney,expendTime,expendAddress,expendCourse,expendContract,
expendName,expendTel,createAt,expendInfo,expendContent) VALUES ('未报销','燃油费报销','$_POST[expendmoney]',
'$_POST[expendTime]','$_POST[expendAddress]','$_POST[expendCourse]','$_POST[expendContract]','$_POST[expendName]','$_POST[expendTel]',
'$nowTime','$_POST[expendInfo]','$_POST[expendContent]');";
	mysql_query($query) or die("Error in query: $query. ".mysql_error());
}
if($_GET['numId']==2){
	$query="INSERT INTO financeexpend(expendState,expendType,expendmoney,expendTime,expendAddress,
expendName,expendTel,createAt) VALUES ('未报销','洗车费报销','$_POST[expendmoney]',
'$_POST[expendTime]','$_POST[expendAddress]','$_POST[expendName]','$_POST[expendTel]','$nowTime');";
	mysql_query($query) or die("Error in query: $query. ".mysql_error());
}
if($_GET['numId']==3){
	$query="INSERT INTO financeexpend(expendState,expendType,expendmoney,expendTime,expendAddress,expendContract,
expendName,expendTel,createAt) VALUES ('未报销','停车费报销','$_POST[expendmoney]',
'$_POST[expendTime]','$_POST[expendAddress]','$_POST[expendContract]','$_POST[expendName]','$_POST[expendTel]',
'$nowTime');";
	mysql_query($query) or die("Error in query: $query. ".mysql_error());
}
if($_GET['numId']==4){
	$query="INSERT INTO financeexpend(expendState,expendType,expendmoney,expendTime,expendName,expendTel,createAt,
expendKeepAddress,expendKeepProvider,expendKeepCourse,expendKeepSubject) VALUES ('未报销','保养费报销','$_POST[expendmoney]',
'$_POST[expendTime]','$_POST[expendName]','$_POST[expendTel]','$nowTime','$_POST[expendKeepAddress]',
'$_POST[expendKeepProvider]','$_POST[expendKeepCourse]','$_POST[expendKeepSubject]');";
	mysql_query($query) or die("Error in query: $query. ".mysql_error());
}
if($_GET['numId']==5){
	$query="INSERT INTO financeexpend(expendState,expendType,expendmoney,expendTime,expendName,expendTel,createAt,
entertainAddress,entertainCompany,entertainForCompany,entertainForPerson) VALUES ('未报销','招待费报销','$_POST[expendmoney]',
'$_POST[expendTime]','$_POST[expendName]','$_POST[expendTel]','$nowTime','$_POST[entertainAddress]','$_POST[entertainCompany]',
'$_POST[entertainForCompany]','$_POST[entertainForPerson]');";
	mysql_query($query) or die("Error in query: $query. ".mysql_error());
}
if($_GET['numId']==6){
	$query="INSERT INTO financeexpend(expendState,expendType,expendmoney,expendTime,expendAddress,
expendName,expendTel,createAt,expendInfo,expendContent) VALUES ('未报销','其他报销','$_POST[expendmoney]',
'$_POST[expendTime]','$_POST[expendAddress]','$_POST[expendName]','$_POST[expendTel]',
'$nowTime','$_POST[expendInfo]','$_POST[expendContent]');";
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
	<meta http-equiv="refresh" content="1.5;URL=financeexpendwipe.php">
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
	<p>提交报销成功,财务会尽快处理</p>
</div>
</body>
</html>