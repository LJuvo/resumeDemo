<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/26
 * Time: 14:07
 */
$orderNum=$_GET["Id"];

include "../Common/localSQLSettings.php";
localSettings();

$nowTime=date("Y-m-d G:i:s");

$query="SELECT * FROM orderlist WHERE Id='$orderNum'";
$result = mysql_query($query) or die("error in query:$query.".mysql_error());
$temp = mysql_num_rows($result);
//if($temp>0){
//for($i=0;$i<=$temp-1;$i++) {
	$row = mysql_fetch_row($result);
//}}
if($_POST['orderType']==null){
	$_POST['orderType']=$row[1];
}
if($_POST['orderState']==null){
	$_POST['orderState']=$row[2];
}
if($_POST['orderTel']==null){
	$_POST['orderTel']=$row[3];
}
if($_POST['orderName']==null){
	$_POST['orderName']=$row[4];
}
if($_POST['orderCompany']==null){
	$_POST['orderCompany']=$row[5];
}

$revisequery="SELECT * FROM orderrevise WHERE orderId='$orderNum'ORDER BY reviseTime DESC";
$reviseResult=mysql_query($revisequery);
$reviseRow=mysql_num_rows($reviseResult);
if($reviseRow>0){
	$query="INSERT INTO orderrevise(orderId,reviseNum,businesstype,orderState,orderTel,orderName,
orderCompany,sceneTel,sceneAddress,customerType,destinationName,destinationAddress,destinationTel,
oilType,batterySpec,createAt, updateAt,employerfor,reviseTime) VALUES ('$orderNum','$reviseRow','$_POST[orderType]',
'$_POST[orderState]','$_POST[orderTel]','$_POST[orderName]','$_POST[orderCompany]','$row[6]','$row[7]','$row[8]',
'$row[9]','$row[10]','$row[11]','$row[12]','$row[13]','$row[14]',' $row[15]','$row[16]','$nowTime');";
}else{
	$query="INSERT INTO orderrevise(orderId,reviseNum,businesstype,orderState,orderTel,orderName,
orderCompany,sceneTel,sceneAddress,customerType,destinationName,destinationAddress,destinationTel,
oilType,batterySpec,createAt, updateAt,employerfor,reviseTime) VALUES ('$orderNum','$reviseRow',
'$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]',
'$row[10]','$row[11]','$row[12]','$row[13]','$row[14]',' $row[15]','$row[16]','$nowTime');";

	$reviseRow++;

	$query="INSERT INTO orderrevise(orderId,reviseNum,businesstype,orderState,orderTel,orderName,
orderCompany,sceneTel,sceneAddress,customerType,destinationName,destinationAddress,destinationTel,
oilType,batterySpec,createAt, updateAt,employerfor,reviseTime) VALUES ('$orderNum','$reviseRow','$_POST[orderType]',
'$_POST[orderState]','$_POST[orderTel]','$_POST[orderName]','$_POST[orderCompany]','$row[6]','$row[7]','$row[8]',
'$row[9]','$row[10]','$row[11]','$row[12]','$row[13]','$row[14]',' $row[15]','$row[16]','$nowTime');";
}


mysql_query($query) or die("Error in query: $query. ".mysql_error());
$query="UPDATE orderlist SET businesstype='$_POST[orderType]',orderState='$_POST[orderState]',orderTel='$_POST[orderTel]',
orderName='$_POST[orderName]',orderCompany='$_POST[orderCompany]',sceneTel='$row[6]',sceneAddress='$row[7]',
customerType='$row[8]',destinationName='$row[9]',destinationAddress='$row[10]',destinationTel='$row[11]',oilType='$row[12]',
batterySpec='$row[13]',createAt='$row[14]', updateAt='$nowTime',employerfor='$row[16]' WHERE Id=".$orderNum.";";
mysql_query($query) or die("Error in query: $query. ".mysql_error());
echo"ss:".$orderNum;
echo"正在进行服务……";
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!--禁止图像工具栏出现的网页标签-->
	<meta content="no" http-equiv="imagetoolbar">
	<!--用于iphone开发-->
	<meta content="width=device-width,initial-scale=1" name="viewport">
	<meta http-equiv="refresh" content="1.5;URL=orderhangserve.php">
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
	<p>信息修改成功,请等待……</p>
</div>
</body>
</html>