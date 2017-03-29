<?php
//$a = $_POST;
//
//include "../Common/localSQLSettings.php";
//localSettings();
//

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
	<title>世纪风</title>
</head>
<body onload="initView();">
<?php
include '../Common/head.php';
?>
<div class="wrapper">
	<form action="refercompanycar.php" method="post">

		<table class="table-bordered table">
			<tbody>
			<tr>
				<td>车辆采购</td>
			</tr>
			</tbody>
		</table>
		<table class="table table-bordered">
			<tbody>
			<tr>
				<td>采购车辆</td>
				<td><select name="select" onchange="changeInfo('select')">
						<option value="新车">新车</option>
						<option value="二手车">二手车</option>
					</select></td>
			</tr>
			</tbody>
			<tbody>
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
			</tbody>
			<tbody>

			<tr>
				<td>车辆品牌</td>
				<td><input type="text" name="p_brand" onchange="changeInfo('p_brand')"/></td>
			</tr>
			<tr>
				<td>车辆型号</td>
				<td><input type="text" name="p_type" onchange="changeInfo('p_type')"/></td>
			</tr>
			<tr>
				<td>厂商指导价</td>
				<td><input type="text" name="p_factoryPrice" onchange="changeInfo('p_factoryPrice')"/></td>
			</tr>

			<tr>
				<td>销售单位</td>
				<td><input type="text" name="p_saleUnit" onchange="changeInfo('p_saleUnit')"/></td>
			</tr>
			<tr>
				<td>销售人员</td>
				<td><input type="text" name="p_salePerson" onchange="changeInfo('p_salePerson')"/></td>
			</tr>
			<tr>
				<td>联系电话</td>
				<td><input type="text" name="p_phone" onchange="changeInfo('p_phone')"/></td>
			</tr>

			<tr>
				<td>采购价格</td>
				<td><input type="text" name="p_purchasePrice" onchange="changeInfo('p_purchasePrice')"/></td>
			</tr>
			<tr>
				<td>采购人员</td>
				<td><input type="text" name="p_buy_person" onchange="changeInfo('p_buy_person')"/></td>
			</tr>
			<tr>
				<td>采购人员电话</td>
				<td><input type="text" name="p_buy_tel" onchange="changeInfo('p_buy_tel')"/></td>
			</tr>
			<tr>
				<td>财务审核</td>
				<td><input type="text" name="p_financialState" placeholder="待审核" disabled="disabled"/></td>
			</tr>
			<tr>
				<td colspan="2"><input class="btn bg-blue bg-inverse" type="submit" name="addAll" value="提交"></td>
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
	var indexName=["select","p_class","p_brand","p_type","p_factoryPrice","p_saleUnit","p_salePerson",
		"p_phone","p_purchasePrice","p_buy_person","p_buy_tel"];
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
