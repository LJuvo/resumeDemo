<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!--禁止图像工具栏出现的网页标签-->
	<meta content="no" http-equiv="imagetoolbar">
	<!--用于iphone开发-->
	<meta content="width=device-width,initial-scale=1" name="viewport">
	<link type="image/x-icon" href="../assets/ico/favicon.png" rel="shortcut icon">
	<link rel="stylesheet" href="../assets/css/slicy.css">
	<link rel="stylesheet" href="../css/prettify.css">
	<link rel="stylesheet" href="../css/docs.css">
	<style>
		body{

		}
		#main_content input{
			width: auto;
		}
	</style>
	<title>世纪风</title>
</head>
<body>

<?php
	include '../Common/head.php';
?>

<div class="wrapper">
	<div class="row">
		<div class="col3">
			<ul class="sidebar nojs">
				<li>
					<ul>
						<li>
							<a href="finance.php">收入</a>
						</li>
						<li class="selected">
							<a href="financeexpend.php">支出</a>
						</li>
						<li>
							<a href="financedetain.php">暂扣</a>
						</li>
						<li>
							<a href="financefund.php">基金</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<!--content-->
		<div class="col9 docs-body" id="main_content">
			<form method="post" action="<?php echo"expendexamine.php?carOId=$_GET[Id]";?>">
			<table class="table table-bordered" style="text-align:center">
				<tbody>
				<tr>
					<td>审核单号</td>
					<td>车辆种类</td>
					<td>车辆品牌</td>
					<td>车辆型号</td>
					<td>申请金额</td>
				</tr>
				<?php

				include "../Common/localSQLSettings.php";
				localSettings();

				$query="SELECT * FROM car_procurement WHERE Id='$_GET[Id]'";
				$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());

				$row=mysql_fetch_row($result);

				echo"<tr><td>$row[0]</td><td>$row[4]</td><td>$row[6]</td><td>$row[5]</td>
					<td>$row[12]</td></tr>
					<tr><td colspan='5'></td></tr>
				<tr><td colspan='2'>新旧类别</td><td colspan='3'>$row[2]</td></tr>
				<tr><td colspan='2'>销售单位</td><td colspan='3'>$row[8]</td></tr>
				<tr><td colspan='2'>销售人员</td><td colspan='3'>$row[9]</td></tr>
				<tr><td colspan='2'>销售电话</td><td colspan='3'>$row[10]</td></tr>
				<tr><td colspan='2'>采购人员</td><td colspan='3'>$row[14]</td></tr>
				<tr><td colspan='2'>采购电话</td><td colspan='3'>$row[15]</td></tr>
				<tr><td colspan='2'>申请审核时间</td><td colspan='3'>$row[16]</td></tr>
				<tr><td colspan='2'>付款方式</td><td colspan='3'>
				<input type='radio' name='paymentBtn' value='0'>贷款支付
				<input type='radio' name='paymentBtn' value='1' checked='checked'>全额支付</td></tr>

				<tr><td colspan='2'>财务审核人</td><td colspan='3'><input name='financeName'/></td></tr>
				<tr><td colspan='2'>财务批注</td><td colspan='3'><input name='financeComment'/></td></tr>";

				mysql_free_result($result);

				?>
				<tr>
					<td colspan="2">
						<input type="submit" name="sub" value="审核不同意"
						       class="bg-grey bg-inverse btn" style="width: 100%;">
					</td>
					<td colspan="3">
						<input type="submit" name="sub" value="审核同意"
						       class="bg-blue bg-inverse btn" style="width: 100%;">
					</td>
				</tr>

				</tbody>
			</table>
			</form>
		</div>
	</div>
</div>
<?php
include '../Common/footer.php';
?>
<script src="../assets/js/jquery-1.7.1.min.js"></script>
<script src="../assets/js/slicy.js"></script>
<script src="../js/prettify.js"></script>
<script src="../js/docs.js"></script>
<script type="text/javascript">
//	function examineOpinion(index){
//		var localHref="";
//		switch(index){
//			case 0:
//				<?php //echo"localHref='expendexamine.php?carOId=$_GET[Id]&Opinion=0';";?>//;
//				break;
//			case 1:
//				<?php //echo"localHref='expendexamine.php?carOId=$_GET[Id]&Opinion=1';";?>//;
//				break;
//		}
//
//		window.location.href=localHref;
//	}
</script>
</body>
</html>
