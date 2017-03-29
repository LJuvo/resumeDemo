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
	$infoList=array("orderTel","orderPerson","orderCompany","orderMode","locationMark","serviceAddress",
		"localeTel","localePerson","payer","billPattern","orderGetCompany","orderGetPerson","servicePlate","orderGetPersonTel");
	$_POST["orderGetCompany"]="无";
	$_POST["orderGetPerson"]="无";
	$_POST["servicePlate"]="无";
	$_POST["orderGetPersonTel"]="无";

	for($i=0;$i<count($infoList);$i++){
		$n=$infoList[$i];
		if($n=="locationMark"&&$_POST[$n]==null){
			$_POST[$n]="地面";
		}
		if($n=="billPattern"&&$_POST[$n]==null){
			$_POST[$n]="按里程计费";
		}
		if($n=="orderType"&&$_POST[$n]==null){
			$_POST[$n]="拖车服务";
		}
		if($n=="accountMethod"&&$_POST[$n]==null){
			$_POST[$n]="签单记账";
		}
		if($_POST[$n]==null){
			echo"<meta http-equiv='refresh' content='0.1;URL=infoDistribute.php'>";
			echo"<script>alert('信息不完整,请填写完整');</script>";
			break;
		}else if($i==count($infoList)-1){
			$num=intval(date("Ymd"));
			$numDay=date("Ymd");
			$num=$num*1000+1;
			$num=strval($num);
			$query="SELECT * FROM order_infomanger ORDER BY orderNum DESC";
			$result=mysql_query($query);
			$temp=mysql_num_rows($result);
			if($temp>0) {
				for ($i = 0; $i<=1; $i++) {
					$row = mysql_fetch_row($result);
					if($row[17]==$numDay){
						$num=substr($row[16],5);
						$num=intval($num)+1;
						$num=strval($num);
						$num=date("Y")."0".$num;

						break;
					}
				}
			}

			$query="INSERT INTO order_infomanger (orderTel,orderPerson,orderCompany,orderMode,
locationMark,serviceAddress,localeTel,localePerson,payer,billPattern,orderGetCompany,orderGetPerson,servicePlate,
orderGetPersonTel,createAt,orderNum,orderNumDay,orderType,accountMethod)
 VALUES ('$_POST[orderTel]','$_POST[orderPerson]','$_POST[orderCompany]','$_POST[orderMode]','$_POST[locationMark]',
 '$_POST[serviceAddress]','$_POST[localeTel]','$_POST[localePerson]','$_POST[payer]','$_POST[billPattern]',
 '$_POST[orderGetCompany]','$_POST[orderGetPerson]','$_POST[servicePlate]','$_POST[orderGetPersonTel]','$nowTime',
 '$num','$numDay','$_POST[orderType]','$_POST[accountMethod]')";
			 mysql_query($query) or die("Error in query: $query. " . mysql_error());

			$carday=$_POST["whichDay"];
			$day=date("d");
			if($carday!=$day){
				$carhour=$_POST["carHour"];
				$carminute=$_POST["carMinute"];
				$year=date("Ym");
				//orderNumDay
				$carNumDay=$year.$carday;
				//orderNum
				$carnum=$carNumDay*1000+1;
				$carnum=strval($carnum);
				$query="SELECT * FROM order_infomanger ORDER BY orderNum DESC";
				$result=mysql_query($query);
				$temp=mysql_num_rows($result);
				if($temp>0) {
					for ($i = 0; $i<=1; $i++) {
						$row = mysql_fetch_row($result);
						if($row[17]==$carNumDay){
							$carnum=substr($row[16],5);
							$carnum=intval($carnum)+1;
							$carnum=strval($carnum);
							$carnum=date("Y")."0".$carnum;
							break;
						}
					}
				}
				//createAt
				$cyear=date("Y-m-");
				$cTime=$cyear.$carday." ".$carhour.":".$carminute.":00";

				$query="UPDATE order_infomanger SET createAt='$cTime',orderNum='$carnum',orderNumDay='$carNumDay' WHERE orderNum='$num'";
				$query="CREATE TABLE order_show ";
				mysql_query($query);

			}

			echo"<meta http-equiv='refresh' content='1.0;URL=infoDistribute.php'>";
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