<?php
/**
 * Created by PhpStorm.
 * User: Juvo
 * Date: 2016/7/12
 * Time: 9:39
 */
//include "../Common/localSQLSettings.php";
//localSettings();

$lifeTime = 1*1800;

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
		body{

		}
		input{
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
		<div class="col2">
			<ul class="sidebar nojs">
				<li>
					<ul>
						<li class="selected">
							<a href="#">订单创建</a>
						</li>
						<li>
							<a href="infoDistribute.php">待派订单</a>
						</li>
						<li>
							<a href="infoPerfect.php">订单信息完善</a>
						</li>
						<li>
							<a href="infoFinished.php">已完成订单</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<!--content-->
		<div class="col9 docs-body" id="main_content">
			<form method="post" action="establishOrder.php">
			<table class="table table-bordered" style="text-align:center" id="addNewTable">
				<tbody>
				<tr>

					<td colspan="2">订单创建</td>
					<td colspan="1">
						<?php
						$day=date("d");
						$day=intval($day);
						$yesterday=$day-1;
						$lastday=$day-2;
						echo"日期：<select id='whichDay'  name='whichDay' onchange='changeDay();'>
							<option value='$day'>$day</option>
							<option value='$yesterday'>$yesterday</option>
							<option value='$lastday'>$lastday</option>
						</select>日";
						?>
						<nobr id="carTT">
						<select id="carHour" name="carHour" onchange="saveInfo('carHour');">
							<?php
							$hour=array("00","01","02","03","04","05","06","07","08","09","10","11","12","13","14","15",
								"16","17","18","19","20","21","22","23");
							for($i=0;$i<count($hour);$i++){
								echo"<option value='$hour[$i]'>$hour[$i]</option>";
							}?></select>时
						<!--			：<input  style="width: 40px;"/>-->
						<select id="carMinute" name="carMinute" onchange="saveInfo('carMinute');">
							<?php
							$minute=array("00","01","02","03","04","05","06","07","08","09","10","11","12","13","14",
								"15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31",
								"32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48",
								"49","50","51","52","53","54","55","56","57","58","59");
							for($i=0;$i<count($minute);$i++){
								echo"<option value='$minute[$i]'>$minute[$i]</option>";
							}?></select>分
						</nobr>
					</td>
				</tr>
				<!--来源信息-->
				<tr><td rowspan="6">来源信息</td></tr>
				<tr>
					<td>服务种类</td>
					<td><select name="orderType" onchange="changeService('orderType');">
							<option value="拖车服务">拖车服务</option>
							<option value="搭电服务">搭电服务</option>
							<option value="轮胎服务">轮胎服务</option>
							<option value="困境服务">困境服务</option>
							<option value="地下牵引">地下牵引</option></select></td>
				</tr>
				<tr>
					<td>下单电话</td>
					<td><input name="orderTel" onchange="saveInfo('orderTel');"/></td>
				</tr>
				<tr>
					<td>下单人员</td>
					<td><input name="orderPerson" onchange="saveInfo('orderPerson');"/></td>
				</tr>
				<tr>
					<td>所属单位</td>
					<td><input name="orderCompany" onchange="saveInfo('orderCompany');"/></td>
				</tr>
				<tr>
					<td>下单方式</td>
					<td><input name="orderMode" onchange="saveInfo('orderMode');"/></td>
				</tr>
				<!--现场信息-->
				<tr><td rowspan="8">现场信息</td></tr>
				<tr>
					<td>位置标识</td>
					<td><select name="locationMark" onchange="saveInfo('locationMark');">
						<option value="地面">地面</option><option value="地下">地下</option></select></td>
				</tr>
				<tr>
					<td>服务地址</td>
					<td><input name="serviceAddress" onchange="saveInfo('serviceAddress');"/></td>
				</tr>
				<tr>
					<td>现场电话</td>
					<td><input name="localeTel" onchange="saveInfo('localeTel');"/></td>
				</tr>
				<tr>
					<td>现场人员</td>
					<td><input name="localePerson" onchange="saveInfo('localePerson');"/></td>
				</tr>
				<tr>
					<td>计费方式</td>
					<td><select name="billPattern" onchange="saveInfo('billPattern');">
							<option value="按里程计费">按里程计费</option>
							<option value="按次数计费">按次数计费</option></select></td>
				</tr>
				<tr>
					<td>付款方</td>
					<td><input name="payer" onchange="saveInfo('payer');"/></td>
				</tr>
				<tr>
					<td>结算方式</td>
					<td><select name="accountMethod" onchange="saveInfo('accountMethod');">
							<option value="签单记账">签单记账</option>
							<option value="现金现收">现金现收</option></select></td>
				</tr>

				<tr hidden="hidden"><td rowspan="5">服务人员</td></tr>
				<tr hidden="hidden">
					<td>服务单位</td>
					<td><input name="orderGetCompany" onchange="saveInfo('orderGetCompany');" value="无"/></td>
				</tr>
				<tr hidden="hidden">
					<td>接单人员</td>
					<td><input name="orderGetPerson" onchange="saveInfo('orderGetPerson');"  value="无"/></td>
				</tr>
				<tr hidden="hidden">
					<td>服务车牌</td>
					<td><input name="servicePlate" onchange="saveInfo('servicePlate');" value="无"/></td>
				</tr>
				<tr hidden="hidden">
					<td>接单人员电话</td>
					<td><input name="orderGetPersonTel" onchange="saveInfo('orderGetPersonTel');" value="无"/></td>
				</tr>
				<tr><td colspan="3"><input type="submit" class="bg-inverse bg-blue btn" value="创建"/></td></tr>
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
	function initView(){
		var infoList=["orderTel","orderPerson","orderCompany","orderMode","locationMark","serviceAddress",
			"localeTel","localePerson","payer","billPattern","orderGetCompany","orderGetPerson","servicePlate",
			"orderGetPersonTel",'orderType','accountMethod'];
		for(var i=0;i<=infoList.length;i++){
			if(i==4){
				switch (localStorage.getItem("locationMark")){
					case "地面":
						document.getElementsByName("locationMark")[0].options[0].selected=true;
						break;
					case "地下":
						document.getElementsByName("locationMark")[0].options[1].selected=true;
						break;
					default :break;
				}
			}else if(i==9){
				switch (localStorage.getItem(infoList[i])){
					case "按里程计费":
						document.getElementsByName(infoList[i])[0].options[0].selected=true;
						break;
					case "按次数计费":
						document.getElementsByName(infoList[i])[0].options[1].selected=true;
						break;
					default :break;
				}
			}else if(i==14){
				switch (localStorage.getItem(infoList[i])){
					case "拖车服务":
						document.getElementsByName(infoList[i])[0].options[0].selected=true;
						break;
					case "搭电服务":
						document.getElementsByName(infoList[i])[0].options[1].selected=true;
						break;
					case "轮胎服务":
						document.getElementsByName(infoList[i])[0].options[2].selected=true;
						break;
					case "困境服务":
						document.getElementsByName(infoList[i])[0].options[3].selected=true;
						break;
					case "地下牵引":
						document.getElementsByName(infoList[i])[0].options[4].selected=true;
						break;
					default :break;
				}
			}else if(i==15){
				switch (localStorage.getItem(infoList[i])){
					case "签单记账":
						document.getElementsByName(infoList[i])[0].options[0].selected=true;
						break;
					case "现金现收":
						document.getElementsByName(infoList[i])[0].options[1].selected=true;
						break;
					default :break;
				}
			}else{
				document.getElementsByName(infoList[i])[0].value=localStorage.getItem(infoList[i]);
			}
		}
//		alert(localStorage.getItem("carHour"));
	}
	/*jquery隐藏*/
//	$(document).ready(function(){
//		if(localStorage.getItem("whichDay")!=null){
//			$("#whichDay").val(localStorage.getItem("whichDay"));
//		}
//		if(localStorage.getItem("whichDay")==null){
//			$("#whichDay").val('<?php //echo"$day";?>//');
//		}
//
//		if(localStorage.getItem("carHour")!=null){
//			$("#carHour").val(localStorage.getItem("carHour"));
//		}
//		if(localStorage.getItem("carHour")==null){
//			$("#carHour").val('<?php //$carhour=date("G");echo"$carhour";?>//');
//		}
//
//		if(localStorage.getItem("carMinute")!=null){
//			$("#carMinute").val(localStorage.getItem("carMinute"));
//		}
//		if(localStorage.getItem("carMinute")==null){
//			$("#carMinute").val('<?php //$carMinute=date("i");echo"$carMinute";?>//');
//		}
//		if($("#whichDay").find("option:selected").text()=="<?php //echo"$day"?>//"){
//			$("#carTT").hide();
//		}
//
//	});

	function saveInfo(index){
		localStorage.setItem(index,document.getElementsByName(index)[0].value);

	}
	function changeService(index){
		saveInfo(index);
		if(document.getElementsByName(index)[0].value!="拖车服务"){
			document.getElementsByName("billPattern")[0].options[1].selected=true;
			localStorage.setItem("billPattern",document.getElementsByName("billPattern")[0].value);
		}
		if(document.getElementsByName(index)[0].value=="拖车服务"){
			document.getElementsByName("billPattern")[0].options[0].selected=true;
			localStorage.setItem("billPattern",document.getElementsByName("billPattern")[0].value);
		}
	}
	function changeDay(){
		if(document.getElementsByName("whichDay")[0].options[0].selected==true){
			$("#carTT").hide();
		}else{
			$("#carTT").show();
		}
		localStorage.setItem("whichDay",document.getElementsByName("whichDay")[0].value);
	}

</script>
</body>
</html>
