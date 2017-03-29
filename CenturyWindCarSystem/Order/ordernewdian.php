<?php
session_start();
?>
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
		body {

		}

		input {
			width: 100%;;
		}
	</style>
	<title>世纪风</title>
</head>
<body onload="initView();">
<?php
include '../Common/head.php';
?>
<div class="wrapper">
	<div class="row">
		<div class="col3">
			<ul class="sidebar nojs">
				<li>
					<ul>
						<li class="selected">
							<a href="ordernew.php">新建订单</a>
						</li>
						<li>
							<a href="orderhang.php">未完成订单</a>
						</li>
						<li>
							<a href="orderfinish.php">已完成订单</a>
						</li>
						<li>
							<a href="ordercancel.php">已取消订单</a>
						</li>
						<li>
							<a href="ordercancelexception.php">异常情况</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<!--content-->
		<div class="col9 docs-body" id="main_content">
			<form action="addneworder.php" method="post">
				<table class="table table-bordered" style="text-align:center" id="addNewTable">
					<tbody>
					<tr>
						<td colspan="4">业务种类</td>
					</tr>

					</tbody>
					<tbody>
					<tr>
						<td colspan="4" style="text-align: right">
							<input name="orderType" value="搭电业务" readonly="true" style="border: 0px;text-align: right"/>
						</td>
					</tr>
					<tr>
						<td colspan="2">下单电话</td>
						<td colspan="2"><input name="orderTel"/></td>
					</tr>
					<tr>
						<td colspan="2">下单人名</td>
						<td colspan="2"><input name="orderName"/></td>
					</tr>
					<tr>
						<td colspan="2">所属单位</td>
						<td colspan="2"><input name="orderCompany"/></td>
					</tr>
					<tr>
						<td colspan="2">现场电话</td>
						<td colspan="2"><input name="sceneTel"/></td>
					</tr>
					<tr>
						<td colspan="2">服务地址</td>
						<td colspan="2"><input name="sceneAddress"/></td>
					</tr>
					<tr>
						<td colspan="2">客户车型</td>
						<td colspan="2"><input name="customerType"/></td>
					</tr>
					<tr>
						<td colspan="2">电瓶规格</td>
						<td colspan="2" style="text-align: left;"><select name="batterySpec">
								<option value="12V">12V</option>
								<option value="24V">24V</option>
							</select></td>
					</tr>
					<tr>
						<td colspan="2">计费方式</td>
						<td colspan="2"><input placeholder=""/></td>
					</tr>
					<tr>
						<td colspan="2">收费标准</td>
						<td colspan="2"><input placeholder=""/></td>
					</tr>
					<tr>
						<td colspan="2">结算标准</td>
						<td colspan="2"><input placeholder=""/></td>
					</tr>
					<tr>
						<td colspan="2">付款人</td>
						<td colspan="2"><input placeholder=""/></td>
					</tr>
					<tr>
						<td colspan="4"><input class="btn bg-blue bg-inverse" type="submit"/></td>
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
	/*
	 *初始化界面
	 * */
	<?php
	@$userName = $_SESSION['userName'];
	include "../Common/localSQLSettings.php";
	localSettings();

	$query = "SELECT * FROM employers WHERE employers.name='$userName'";
	//	$query= "SELECT * FROM user";
	$result = mysql_query($query);

	$phone="";
	if (mysql_num_rows($result) > 0) {
		while ($row = mysql_fetch_row($result)) {
			$phone=$row[4];
		}
	}
	mysql_select_db($db) or die("Unable to select database!");
	$que = "SELECT * FROM employer_office WHERE employer_office.e_name='$userName'";
	//	$query= "SELECT * FROM user";
	$res = mysql_query($que);

	$company="";
	if (mysql_num_rows($res) > 0) {
		while ($row = mysql_fetch_row($res)) {
			$company=$row[3];
		}
	}
	echo"function initView() {";
	echo"document.getElementsByName('orderName')[0].value='$userName';
			document.getElementsByName('orderTel')[0].value='$phone';
			document.getElementsByName('orderCompany')[0].value='$company';
			}";
	?>
</script>
</body>
</html>
