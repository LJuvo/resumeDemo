<?php
//$a = $_POST;
//
//include "../Common/localSQLSettings.php";
//localSettings();
//
//$a = $_POST;
//
//$nowTime = date("Y-m-d G:i:s");

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!--禁止图像工具栏出现的网页标签-->
	<meta content="no" http-equiv="imagetoolbar">
	<!--用于iphone开发-->
	<meta content="width=device-width,initial-scale=1" name="viewport">
	<meta name="save" content="history">
	<link type="image/x-icon" href="../assets/ico/favicon.ico" rel="shortcut icon">
	<link rel="stylesheet" href="../assets/css/slicy.css">
	<link rel="stylesheet" href="../css/prettify.css">
	<link rel="stylesheet" href="../css/docs.css">
	<style>
		table tr {
			text-align: center;
		}
	</style>
	<title>世纪风</title>
</head>
<body onload="initView();">
<?php
include '../Common/head.php';
?>
<div class="wrapper">
	<form action="refercustomercar.php" method="post">
		<table class="table table-bordered">
			<tbody>
			<tr>
				<th colspan="3">客户车辆信息录入</th>
			</tr>
			<tr>
				<td rowspan="6">车辆基本信息</td>
			</tr>
			<tr>
				<td>车辆类型</td>
				<td><select name="select" onchange="changeInfo('select')">
						<option value="新车">新车</option>
						<option value="二手车">二手车</option>
					</select></td>
			</tr>
			<tr>
				<td>车辆种类</td>
				<td><select name="p_class" onchange="changeInfo('p_class')">
						<option value="轿车/2">轿车/2</option>
						<option value="轿车/3">轿车/3</option>
						<option value="商务车">商务车</option>
						<option value="越野车">越野车</option>
						<option value="跑车">跑车</option>
						<option value="大巴车">大巴车</option>
						<option value="加长车">加长车</option>
						<option value="特种车">特种车</option>
					</select></td>
			</tr>
			<tr>
				<td>车辆品牌</td>
				<td><input type="text" name="p_brand" onchange="changeInfo('p_brand')"/></td>
			</tr>
			<tr>
				<td>车辆型号</td>
				<td><input type="text" name="p_type" onchange="changeInfo('p_type')"/></td>
			</tr>
			<tr>
				<td>车牌号</td>
				<td><input type="text" name="carPlateNum" onchange="changeInfo('carPlateNum')"/></td>
			</tr>
			<tr>
				<td rowspan="10">身份信息</td>
			</tr>
			<tr>
				<td>姓名</td>
				<td><input type="text" name="carOwnerName" onchange="changeInfo('carOwnerName')"/></td>
			</tr>
			<tr>
				<td>性别</td>
				<td><select id="carOwnerSex" name="carOwnerSex" onchange="changeInfo('carOwnerSex')">
						<option value="男">男</option>
						<option value="女">女</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>民族</td>
				<td><input type="text" name="carOwnerNation" onchange="changeInfo('carOwnerNation')"/></td>
			</tr>
			<tr>
				<td>出生日期</td>
				<td><select name="carOwnerBothYear" onchange="changeInfo('carOwnerBothYear')">
						<?php for($i=2016;$i>=1940;$i--){
							echo "<option value='$i'>$i</option>";
						}?>
					</select>年
					<select name="carOwnerBothMonth" onchange="changeInfo('carOwnerBothMonth')">
						<?php for($i=0;$i<count($toMonth);$i++){
							echo "<option value='$toMonth[$i]'>$toMonth[$i]</option>";
						}?>
					</select>月
					<select name="carOwnerBothDay" onchange="changeInfo('carOwnerBothDay')">
						<?php for($i=0;$i<count($toDay);$i++){
							echo "<option value='$toDay[$i]'>$toDay[$i]</option>";
						}?>
					</select>日
				</td>
			</tr>
			<tr>
				<td>住址</td>
				<td><input type="text" name="carOwnerAddress" onchange="changeInfo('carOwnerAddress')"/></td>
			</tr>
			<tr>
				<td>公民身份证号码</td>
				<td><input type="text" name="carOwnerIdCard" onchange="changeInfo('carOwnerIdCard')"/></td>
			</tr>
			<tr>
				<td>签发机关</td>
				<td><input type="text" name="carOwnerOrganization" onchange="changeInfo('carOwnerOrganization')"/></td>
			</tr>
			<tr>
				<td>有效期</td>
				<td><select name="carOwnerUseDateYear" onchange="changeInfo('carOwnerUserDateYear')">
						<?php for($i=2050;$i>=1940;$i--){
							echo "<option value='$i'>$i</option>";
						}?>
					</select>年
					<select name="carOwnerUseDateMonth" onchange="changeInfo('carOwnerUserDateMonth')">
						<?php for($i=0;$i<count($toMonth);$i++){
							echo "<option value='$toMonth[$i]'>$toMonth[$i]</option>";
						}?>
					</select>月
					<select name="carOwnerUseDateDay" onchange="changeInfo('carOwnerUserDateDay')">
						<?php for($i=0;$i<count($toDay);$i++){
							echo "<option value='$toDay[$i]'>$toDay[$i]</option>";
						}?>
					</select>日</td>
			</tr>
			<tr>
				<td>联系电话</td>
				<td><input type="text" name="p_phone" onchange="changeInfo('p_phone')"></td>
			</tr>

			<tr>
				<td colspan="3"><input class="btn bg-blue bg-inverse" type="submit" name="addAll" value="提交"></td>
			</tr>
			</tbody>
		</table>

	</form>
</div>

<?php
include '../Common/footer.php';
?>
<script src="../assets/js/jquery-1.7.1.min.js"></script>
<script src="../assets/js/slicy.js"></script>
<script src="../js/prettify.js"></script>
<script src="../js/docs.js"></script>
<script type="text/javascript">
	var indexName=["p_class","p_brand","p_type","carPlateNum","carOwnerName","carOwnerSex",
		"carOwnerNation","carOwnerBothYear","carOwnerBothMonth","carOwnerBothDay","carOwnerAddress",
		"carOwnerIdCard","carOwnerOrganization","carOwnerUserDateYear","carOwnerUserDateMonth",
		"carOwnerUserDateDay","p_phone"];
	function nonShow() {
		document.getElementById("noneShow").style.display = "none";
	}
	function changeInfo(index){
		localStorage.setItem(index,document.getElementsByName(index)[0].value);
	}
	$(document).ready(function(){
		for(var i=0;i<indexName.length;i++) {
			if(localStorage.getItem(indexName[i])!=null){
				$("[name='"+indexName[i]+"']").val(localStorage.getItem(indexName[i]));
			}
		}
	});
</script>

</body>
</html>
