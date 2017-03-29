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

	$infoList=array("select","p_class","p_brand","p_type","carPlateNum","carOwnerName","carOwnerSex",
		"carOwnerNation","carOwnerBothYear","carOwnerBothMonth","carOwnerBothDay","carOwnerAddress",
		"carOwnerIdCard","carOwnerOrganization","carOwnerUseDateYear","carOwnerUseDateMonth",
		"carOwnerUseDateDay","p_phone");
	for($i=0;$i<count($infoList);$i++){
		$temp=$infoList[$i];

		if($temp=="p_class"&&$_POST["p_class"]==null){
			$_POST["p_class"]="轿车/2";
		}
		if($temp=="select"&&$_POST["select"]==null){
			$_POST["select"]="新车";
		}
		if($_POST[$temp]==null){
			echo"<meta http-equiv='refresh' content='0.1;URL=addcustomercar.php'>";
			echo"<script>alert('信息不完整,请填写完整');</script>";
			break;
		}else if($i==count($infoList)-1){
			$query_date="SELECT createAt FROM car_customer ORDER BY createAt DESC ";
			$result=mysql_fetch_row(mysql_query($query_date));
			$EDateYear=substr($result[0],0,4);

			$comNum="K".date("Y")."000001";
			if($EDateYear==date("Y")){
						$query_num="SELECT carCompanyNum FROM car_customer ORDER BY createAt DESC ";
						$result_num=mysql_fetch_row(mysql_query($query_num));
						$num=intval("1".substr($result_num[0],5));
						$num++;

						$comNum="K".date("Y").substr(strval($num),1);
			}


			$query_car="insert into car_customer(categories,p_class,p_brand,p_type,carPlateNum,carCompanyNum,createAt,updateAt)
 values ('$_POST[select]','$_POST[p_class]','$_POST[p_brand]','$_POST[p_type]','$_POST[carPlateNum]','$comNum','$nowTime','$nowTime')";
			mysql_query($query_car) or die("Error in query: $query_car. ".mysql_error());

			$carOwnerBoth=$_POST['carOwnerBothYear']."-".$_POST['carOwnerBothMonth']."-".$_POST['carOwnerBothDay'];
			$carUseDate=$_POST['carOwnerUseDateYear']."-".$_POST['carOwnerUseDateMonth']."-".$_POST['carOwnerUseDateDay'];
			$query_idCard="insert into car_customer_idcard(carCompanyNum,carOwnerName,carOwnerSex,carOwnerNation,carOwnerBothYear,
carOwnerAddress,carOwnerIdCard,carOwnerOrganization,UseDate,p_phone) values ('$comNum','$_POST[carOwnerName]',
'$_POST[carOwnerSex]','$_POST[carOwnerNation]','$carOwnerBoth','$_POST[carOwnerAddress]','$_POST[carOwnerIdCard]',
'$_POST[carOwnerOrganization]','$carUseDate','$_POST[p_phone]')";
			mysql_query($query_idCard);

			echo"<meta http-equiv='refresh' content='1.0;URL=carbasicontent.php?commId=$comNum'>";
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