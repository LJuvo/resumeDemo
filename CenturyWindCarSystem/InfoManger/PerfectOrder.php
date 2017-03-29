<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/26
 * Time: 14:07
 */
include "../Common/localSQLSettings.php";
localSettings();

$orderId=$_GET["Id"];
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
	$orderId=$_GET["Id"];
	$payTimeName=array("carPayYear","carPayeMonth","carPayDay","carPayHour","carPayMinute");
	$payInfoName=array("carPaySum","carPayType","carPayPerson","carPayAccountNum","carReceivePerson",
		"carReceiveAccountNum");
	$infoList=array("carType","carBrand","carLicense","carVIN","carColor","carStartAddress",
		"carStartCourse","carCustomerState","carServiceYear","carServiceMonth","carServiceDay",
		"carServiceHour","carServiceMinute","carEndPlaceName","carEndAddress","carEndCourse","carSigner",
		"carSignerTel","FreightBasis","StartPrice","StartCourse","StartUnitPrice","benchMark",
		"carAllCourse","carAllCoursePrice","carHelpDevice","carDevicePrice","carAllPrice",
		"carBilling");
	for($i=0;$i<count($infoList);$i++){
		$n=$infoList[$i];
		if($n=="carType"&&$_POST[$n]==null){
			$_POST[$n]="轿车/2";
		}
		if($n=="carCustomerState"&&$_POST[$n]==null){
			$_POST[$n]="是";
		}
		if($n=="FreightBasis"&&$_POST[$n]==null){
			$_POST[$n]="公司计费标准";
		}
		if($n=="carBilling"&&$_POST[$n]==null){
			$_POST[$n]="否";
		}
		if($_POST[$n]==null&&$n!="carAllCoursePrice"){
			echo"<meta http-equiv='refresh' content='0.1;URL=infoPerfectInfo.php?Id=$orderId'>";
			echo"<script>alert('信息不完整,请填写完整');</script>";
			break;
		}else if($i==count($infoList)-1){
			$result=mysql_fetch_row(mysql_query("SELECT OrderNum FROM order_infomanger WHERE Id=$orderId"));

			$carSServiceTime=$_POST["carServiceYear"]."-".$_POST["carServiceMonth"]."-".$_POST["carServiceDay"].
				" ".$_POST["carServiceHour"].":".$_POST["carServiceMinute"];
			$resdetail=mysql_fetch_row(mysql_query("SELECT Id FROM order_infomanger_detail WHERE OrderNum=$result[0]"));

			$resStartTime=mysql_fetch_row(mysql_query("SELECT createAt FROM order_infomanger WHERE Id=$orderId"));

			$payTimeName=array("carPayYear","carPayMonth","carPayDay","carPayHour","carPayMinute");
			$payInfoName=array("carPaySum","carPayType","carPayPerson","carPayAccountNum","carReceivePerson",
				"carReceiveAccountNum");
			if($resdetail[0]==null){
				$queryDetail="INSERT INTO order_infomanger_detail (OrderNum,carType,carBrand,carLicense,carVIN,carColor,
carServiceStartTime,carStartAddress,carStartCourse,carCustomerState,carServiceTime,carEndPlaceName,carEndAddress,
carEndCourse,carSigner,carSignerTel,FreightBasis,StartPrice,StartCourse,StartUnitPrice,benchMark,carAllCourse,
carAllCoursePrice,carHelpDevice,carDevicePrice,carAllPrice,carBilling,createAt)
 VALUES ('$result[0]','$_POST[carType]','$_POST[carBrand]','$_POST[carLicense]','$_POST[carVIN]','$_POST[carColor]',
 '$resStartTime[0]','$_POST[carStartAddress]','$_POST[carStartCourse]','$_POST[carCustomerState]',
 '$carSServiceTime','$_POST[carEndPlaceName]','$_POST[carEndAddress]','$_POST[carEndCourse]','$_POST[carSigner]',
 '$_POST[carSignerTel]','$_POST[FreightBasis]','$_POST[StartPrice]','$_POST[StartCourse]','$_POST[StartUnitPrice]',
 '$_POST[benchMark]','$_POST[carAllCourse]','$_POST[carAllCoursePrice]','$_POST[carHelpDevice]','$_POST[carDevicePrice]',
 '$_POST[carAllPrice]','$_POST[carBilling]','$nowTime')";


				$carNum=$_POST["payIdNum"];
				for($i=1;$i<=$carNum;$i++){
					$payWay=$_POST["payWay".strval($i)];
					$carPaySum="carPaySum".$i;
					$carPayType="carPayType".$i;
					$carPayPerson="carPayPerson".$i;
					$carPayAccountNum="carPayAccountNum".$i;
					$carReceivePerson="carReceivePerson".$i;
					$carReceiveAccountNum="carReceiveAccountNum".$i;
					$carPayTime=$_POST["carPayYear".$i]."-".$_POST["carPayMonth".$i]."-".$_POST["carPayDay".$i].
						" ".$_POST["carPayHour".$i].":".$_POST["carPayMinute".$i];
//					echo"$_POST[$carReceivePerson]";
					if($payWay=="现金付款"){
						$querypay="INSERT INTO order_infomanger_pay (carPayNum,carPayTime,carPaySum,carPayType,carPayPerson,
carPayAccountNum,carReceivePerson,carReceiveAccountNum,createAt) VALUES ('$result[0]','$carPayTime','$_POST[$carPaySum]',
'$_POST[$carPayType]','$_POST[$carPayPerson]','无','$_POST[$carReceivePerson]','无','$nowTime')";
						mysql_query($querypay)or die("Error in query: $querypay. " . mysql_error());
					}else{
						$querypay="INSERT INTO order_infomanger_pay (carPayNum,carPayTime,carPaySum,carPayType,carPayPerson,
carPayAccountNum,carReceivePerson,carReceiveAccountNum,createAt) VALUES ('$result[0]','$carPayTime','$_POST[$carPaySum]',
'$_POST[$carPayType]','$_POST[$carPayPerson]','$_POST[$carPayAccountNum]','$_POST[$carReceivePerson]',
'$_POST[$carReceiveAccountNum]','$nowTime')";
						mysql_query($querypay)or die("Error in query: $querypay. " . mysql_error());
					}

				}

				mysql_query($queryDetail);

			}else{
				$queryDetail="UPDATE order_infomanger_detail SET OrderNum='$result[0]',carType='$_POST[carType]',
carBrand='$_POST[carBrand]',carLicense='$_POST[carLicense]',carVIN='$_POST[carVIN]',carColor='$_POST[carColor]',
carServiceStartTime='$resStartTime',carStartAddress='$_POST[carStartAddress]',
carStartCourse='$_POST[carStartCourse]',carCustomerState='$_POST[carCustomerState]',carServiceTime='$carSServiceTime',
carEndPlaceName='$_POST[carEndPlaceName]',carEndAddress='$_POST[carEndAddress]',carEndCourse='$_POST[carEndCourse]',
carSigner='$_POST[carSigner]',carSignerTel= '$_POST[carSignerTel]',FreightBasis='$_POST[FreightBasis]',StartPrice='$_POST[StartPrice]',
StartCourse='$_POST[StartCourse]',StartUnitPrice='$_POST[StartUnitPrice]',benchMark='$_POST[benchMark]',
carAllCourse='$_POST[carAllCourse]',carAllCoursePrice='$_POST[carAllCoursePrice]',carHelpDevice='$_POST[carHelpDevice]',
carDevicePrice='$_POST[carDevicePrice]',carAllPrice= '$_POST[carAllPrice]',carBilling='$_POST[carBilling]',createAt='$nowTime'";
//				mysql_query($query) or die("Error in query: $query. " . mysql_error());

			}



//			$name=$_POST["payWay1"];
//			echo"$name";
			mysql_query("UPDATE order_infomanger SET OrderState='已完善' WHERE Id=$orderId");
			mysql_query("UPDATE order_infomanger SET serviceAddress=$_POST[carStartAddress] WHERE Id=$orderId");
//			if($_POST["carStartAddress"]!=)
			echo"<meta http-equiv='refresh' content='1.0;URL=infoFinished.php'>";
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