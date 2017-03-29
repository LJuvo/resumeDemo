
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!--禁止图像工具栏出现的网页标签-->
	<meta content="no" http-equiv="imagetoolbar">
	<!--用于iphone开发-->
	<meta content="width=device-width,initial-scale=1" name="viewport">
	<?php
	/**
	 * Created by PhpStorm.
	 * User: Administrator
	 * Date: 2016/7/26
	 * Time: 14:07
	 */
	$orderNum=$_GET["Id"];
	$employerTel=$_GET["employer_tel"];
	$realState=$_GET["realstate"];

	include "../Common/localSQLSettings.php";
	localSettings();

	if($realState=="行程中"){
		$query="SELECT * FROM order_employer_state WHERE employer_tel=".$employerTel." AND orderfor=".$orderNum.";";
		$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
		$temp=mysql_num_rows($result);
		if($temp>0)
		{

				$row=mysql_fetch_row($result);
				$que="INSERT INTO orderaccount (orderState,employer_name,employer_tel,employer_licence,order_for)
				VALUES ('未付款','$row[1]','$row[2]','$row[5]','$row[6]');";
				$res = mysql_query($que) or die("Error in query: $que. ".mysql_error());

			$query="UPDATE order_employer_state SET order_realstate='行程结束',employer_state='空闲' WHERE employer_tel=".$employerTel." AND orderfor=".$orderNum.";";
			mysql_query($query) or die("Error in query: $query. ".mysql_error());


		}

		echo"<meta http-equiv='refresh' content='0.2;URL=orderhangaccount.php'>";
	}else{
		if($realState=="待服务"){
			$query="UPDATE order_employer_state SET order_realstate='前往中' WHERE employer_tel=".$employerTel." AND orderfor=".$orderNum.";";
			mysql_query($query) or die("Error in query: $query. ".mysql_error());
		}
		if($realState=="前往中"){
			$query="UPDATE order_employer_state SET order_realstate='服务开始' WHERE employer_tel=".$employerTel." AND orderfor=".$orderNum.";";
			mysql_query($query) or die("Error in query: $query. ".mysql_error());
		}
		if($realState=="服务开始"){
			//	$query="UPDATE orderlist SET orderState='服务中' WHERE Id=".$orderNum." AND employerfor=".$employerTel.";";
//	mysql_query($query) or die("Error in query: $query. ".mysql_error());
//	mysql_query($query) or die("Error in query: $query. ".mysql_error());
			$query="UPDATE order_employer_state SET order_realstate='车辆检测完毕' WHERE employer_tel=".$employerTel." AND orderfor=".$orderNum.";";
			mysql_query($query) or die("Error in query: $query. ".mysql_error());
		}
		if($realState=="车辆检测完毕"){
			//	$query="UPDATE orderlist SET orderState='服务中' WHERE Id=".$orderNum." AND employerfor=".$employerTel.";";
//	mysql_query($query) or die("Error in query: $query. ".mysql_error());
//	mysql_query($query) or die("Error in query: $query. ".mysql_error());
			$query="UPDATE order_employer_state SET order_realstate='行程中' WHERE employer_tel=".$employerTel." AND orderfor=".$orderNum.";";
			mysql_query($query) or die("Error in query: $query. ".mysql_error());
		}
		echo"<meta http-equiv='refresh' content='0.2;URL=orderhangserve.php'>";
	}


	?>

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