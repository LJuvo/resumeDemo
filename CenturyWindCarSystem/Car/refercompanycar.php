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

	$infoList=array("select","p_class","p_brand","p_type","p_factoryPrice","p_saleUnit","p_salePerson",
		"p_phone","p_purchasePrice","p_buy_person","p_buy_tel");
	for($i=0;$i<count($infoList);$i++){
		$temp=$infoList[$i];

		if($temp=="select"){
			$_POST[$temp]="新车";
		}
		if($temp=="p_class"){
			$_POST[$temp]="轿车/2";
		}
		if($_POST[$temp]==null){
			echo"<meta http-equiv='refresh' content='0.1;URL=addcompanycar.php'>";
			echo"<script>alert('信息不完整,请填写完整');</script>";
			break;
		}else if($i==count($infoList)-1){

			$query_date="SELECT createAt FROM car_procurement ORDER BY createAt DESC ";
			$result=mysql_fetch_row(mysql_query($query_date));
			$EDateYear=substr($result[0],0,4);

			$comNum="C".date("Y")."000001";
			if($EDateYear==date("Y")){
				$query_num="SELECT carOId FROM car_procurement ORDER BY createAt DESC ";
				$result_num=mysql_fetch_row(mysql_query($query_num));
				$num=intval("1".substr($result_num[0],5));
				$num++;

				$comNum="C".date("Y").substr(strval($num),1);
			}

			$query = "insert into car_procurement(carOId,categories,class,type,brand,saleUnit,salePerson,phone,factoryPrice,
	purchasePrice,buyPerson,buyTel,createAt,financialState) values
            ('$comNum','$_POST[select]','$_POST[p_class]','$_POST[p_type]','$_POST[p_brand]','$_POST[p_saleUnit]',
            '$_POST[p_salePerson]','$_POST[p_phone]','$_POST[p_factoryPrice]','$_POST[p_purchasePrice] ',
            '$_POST[p_buy_person]','$_POST[p_buy_tel]','$nowTime','待审核')";
			$s = mysql_query($query) or die("Error in query: $query. " . mysql_error());

			echo"<meta http-equiv='refresh' content='1.0;URL=carcustomerinfo.php?commId=$comNum'>";
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