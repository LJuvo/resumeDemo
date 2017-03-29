<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/26
 * Time: 14:07
 */
include "../Common/localSQLSettings.php";
localSettings();

$nowTime = date("Y-m-d G:i:s");

$orderId=$_GET["Id"];
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!--禁止图像工具栏出现的网页标签-->
	<meta content="no" http-equiv="imagetoolbar">
	<!--用于iphone开发-->
	<meta content="width=device-width,initial-scale=1" name="viewport">
	<?php
	$infoList=array("orderGetCompany","orderGetPerson","servicePlate","orderGetPersonTel");


	for($i=0;$i<count($infoList);$i++){
		$n=$infoList[$i];
		if($_POST[$n]==null){
			echo"<meta http-equiv='refresh' content='0.1;URL=infoDistributeInfo.php?Id=$orderId'>";
			echo"<script>alert('信息不完整,请填写完整');</script>";
			break;
		}else if($i==count($infoList)-1){

				$query="UPDATE order_infomanger SET orderGetCompany='$_POST[orderGetCompany]',
orderGetPerson='$_POST[orderGetPerson]',servicePlate='$_POST[servicePlate]',
orderGetPersonTel='$_POST[orderGetPersonTel]' WHERE Id='$orderId'";
				mysql_query($query);

			echo"<meta http-equiv='refresh' content='1.0;URL=infoPerfect.php'>";
			echo"<script>localStorage.clear();</script>";
			break;

			}

	}

	?>

	<title>世纪风</title>
</head>
<body>
</body>
</html>