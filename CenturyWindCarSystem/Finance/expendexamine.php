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

$carOId=$_GET['carOId'];
echo"$_GET[carOId]";


echo"$_POST[paymentBtn]";//支付方式
echo"$_POST[sub]";//审核意见
//$query="update car_procurement set financialState='已审核',financialPerson='$_POST[financeName]',financialOpinion='$finanicalOpinion',
//financialDate='$nowTime' WHERE carOId='$carOId'";
//mysql_query($query);

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
	<p>审核成功,审核意见为<?php echo"$_POST[sub]";?></p>
</div>
</body>
</html>