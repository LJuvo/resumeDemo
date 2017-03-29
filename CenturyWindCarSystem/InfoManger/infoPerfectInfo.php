<?php
/**
 * Created by PhpStorm.
 * User: Juvo
 * Date: 2016/7/12
 * Time: 9:39
 */
include "../Common/localSQLSettings.php";
localSettings();

$orderId=$_GET['Id'];

$query="SELECT * FROM order_infomanger WHERE Id=$orderId";
$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
$temp=mysql_num_rows($result);

$rocc=mysql_fetch_row($result);

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
		#aa input{
			width: 50px;;
		}
	</style>
	<title>世纪风</title>
	<script>
		if("<?php echo"$rocc[18]";?>"!="拖车服务"){
			window.location.href="infoPerfectInfoOthers.php?Id=<?php echo"$orderId";?>";
		}
	</script>
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
				<li>
					<a href="infoEstablish.php">订单创建</a>
				</li>
				<li class="selected">
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
<form name="ppform" method="post" action="PerfectOrder.php?Id=<?php echo"$orderId"?>">
<table class="table table-bordered" style="text-align:center" id="addNewTable">
	<tbody>

	<?php
	$query="SELECT * FROM order_infomanger WHERE Id=$orderId";
	$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
	$temp=mysql_num_rows($result);
	if($temp>0)
	{
		for($i=0;$i<=$temp-1;$i++)
		{
			$row=mysql_fetch_row($result);

			echo"
						<tr>
							<td>订单号</td>
							<td colspan='5'>$row[0]</td>
						</tr>
						<!--来源信息-->
				<tr><td rowspan='4'>来源信息</td></tr>
				<tr>
					<td>服务种类</td>
					<td colspan='3'>$row[18]<input id='thisType' value='$row[18]' hidden='hidden'/></td>
				</tr>
				<tr>
					<td>下单电话</td>
					<td>$row[1]</td>
					<td>下单人员</td>
					<td>$row[2]</td>
				</tr>
				<tr>
					<td>所属单位</td>
					<td>$row[3]</td>
					<td>下单方式</td>
					<td>$row[4]</td>
				</tr>
				<!--现场信息-->
				<tr><td rowspan='5'>现场信息</td></tr>
				<tr>
					<td>位置标识</td>
					<td>$row[5]</td>
					<td>服务地址</td>
					<td>$row[6]</td>
				</tr>
				<tr>
					<td>现场电话</td>
					<td>$row[7]</td>
					<td>现场人员</td>
					<td>$row[8]</td>
				</tr>
				<tr>
					<td>付款方</td>
					<td>$row[9]</td>
					<td>计费方式</td>
					<td>$row[10]</td>
				</tr>
				<tr>
					<td>结算方式</td>
					<td>$row[19]</td>
					<td colspan='2'></td>
				</tr>
				<tr><td rowspan='4'>服务人员</td></tr>
				<tr>
					<td>服务单位</td>
					<td>$row[11]</td>
					<td>接单人员</td>
					<td>$row[12]</td>
				</tr>
				<tr>
					<td>服务车牌</td>
					<td>$row[13]</td>
					<td>接单人员电话</td>
					<td>$row[14]</td>
				</tr>";
		}
	}

	mysql_free_result($result);

	?>
	</tbody>
</table>
<table class="table table-bordered" style="text-align:center" id="addNewTable">
	<tbody>
	<tr>
		<td colspan="3">信息完善</td>
	</tr>
	<!--来源信息-->
	<tr><td rowspan="6">车辆信息</td></tr>
	<tr>
		<td>车辆类型</td>
		<td><select name="carType" onchange="saveInfo('carType');">
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
		<td><input name="carBrand" onchange="saveInfo('carBrand');"/></td>
	</tr>
	<tr>
		<td>车牌号码</td>
		<td><input name="carLicense" onchange="saveInfo('carLicense');"/></td>
	</tr>
	<tr>
		<td>车辆识别代号</td>
		<td><input name="carVIN" onchange="saveInfo('carVIN');"/></td>
	</tr>
	<tr>
		<td>车身颜色</td>
		<td><input name="carColor" onchange="saveInfo('carColor');"/></td>
	</tr>
	</tbody>
	<!--开始服务-->
	<tbody>
	<tr><td rowspan="5">开始服务</td></tr>
	<tr>
		<td>服务开始时间</td>
		<td>
			<input name='carServiceStartTime' disabled='true' onchange='saveInfo("carServiceStartTime");'
			       value='<?php $query="SELECT * FROM order_infomanger WHERE Id=$orderId";
			       $result=mysql_fetch_row(mysql_query($query));
			       echo"$result[15]";?>'/>
		</td>
	</tr>
	<tr>
		<td>服务开始地址</td>
		<td><input id="carStartAddress" name="carStartAddress" onchange="saveInfo('carStartAddress');"/></td>
	</tr>
	<tr>
		<td>服务开始里程</td>
		<td><input name="carStartCourse" onchange="saveInfo('carStartCourse');"/></td>
	</tr>
	<tr id="carCustomerState">
		<td>客户是否随车</td>
		<td><select name="carCustomerState"><option value="是">是</option><option value="否">否</option></select></td>
	</tr>
	</tbody>
	<!--结束信息-->
	<tbody id="EndInfo">
	<tr><td rowspan="7">结束信息</td></tr>
	<tr>
		<td>到达目的地时间</td>
		<td>
			<select name="carServiceYear" onchange="saveInfo('carServiceYear');">
				<?php for($i=2016;$i<2050;$i++){
					echo"<option value='$i'>$i</option>";
				}?></select>年
<!--			：<input style="width: 40px;"/>-->
			<select name="carServiceMonth" onchange="saveInfo('carServiceMonth');" >
				<?php
				$month=array("01","02","03","04","05","06","07","08","09","10","11","12");
				for($i=0;$i<count($month);$i++){
					echo"<option value='$month[$i]'>$month[$i]</option>";
				}?></select>月
<!--			：<inputstyle="width: 40px;"/>-->
			<select name="carServiceDay" onchange="saveInfo('carServiceDay');">
				<?php
				$day=array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16",
					"17","18","19","20","21","22","23","24","25","26","27","28","29","30","31");
				for($i=0;$i<count($day);$i++){
					echo"<option value='$day[$i]'>$day[$i]</option>";
				}?></select>日
<!--			：<input style="width: 40px;"/>-->
			<select name="carServiceHour" onchange="saveInfo('carServiceHour');">
				<?php
				$hour=array("00","01","02","03","04","05","06","07","08","09","10","11","12","13","14","15",
					"16","17","18","19","20","21","22","23");
				for($i=0;$i<count($hour);$i++){
					echo"<option value='$hour[$i]'>$hour[$i]</option>";
				}?></select>时
<!--			：<input  style="width: 40px;"/>-->
			<select name="carServiceMinute" onchange="saveInfo('carServiceMinute');">
				<?php
				$minute=array("00","01","02","03","04","05","06","07","08","09","10","11","12","13","14",
					"15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31",
					"32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48",
					"49","50","51","52","53","54","55","56","57","58","59");
				for($i=0;$i<count($minute);$i++){
					echo"<option value='$minute[$i]'>$minute[$i]</option>";
				}?></select>分
<!--			：<input style="width: 40px;"/>-->
		</td>
	</tr>
	<tr>
		<td>目的地名称</td>
		<td><input name="carEndPlaceName" onchange="saveInfo('carEndPlaceName');"/></td>
	</tr>
	<tr>
		<td>目的地地址</td>
		<td><input name="carEndAddress" onchange="saveInfo('carEndAddress');"/></td>
	</tr>
	<tr>
		<td>目的地里程</td>
		<td><input name="carEndCourse" onchange="saveAllCourse('carEndCourse');"/></td>
	</tr>
	<tr>
		<td>车辆签收员</td>
		<td><input name="carSigner" onchange="saveInfo('carSigner');"/></td>
	</tr>
	<tr>
		<td>签收人员电话</td>
		<td><input name="carSignerTel" onchange="saveInfo('carSignerTel');"/></td>
	</tr>
	</tbody>
	<!--结算信息-->
	<tbody>
	<tr><td rowspan="12">结算信息</td></tr>
	<tr>
		<td>计费方式</td>
		<td><input disabled='true'
		           value='<?php $query="SELECT * FROM order_infomanger WHERE Id=$orderId";
		           $result=mysql_fetch_row(mysql_query($query));
		           echo"$result[10]";?>'/></td>
	</tr>
	<tr>
		<td>收费标准</td>
		<td><select name="FreightBasis" onchange="changePrice();">
				<option value="0">公司计费标准</option>
				<option value="1">个人计费标准</option>
				<option value="2">自定义标准</option>
			</select></td>
	</tr>
	<tr id="aa">
		<td>标准</td>
		<td>起步价(元)：<input name="StartPrice" value="50" onchange="priceOwner();"/>
			含里程(km)：<input name="StartCourse" value="0" onchange="priceOwner();"/>
			单价(元)：<input  name="StartUnitPrice" value="7" onchange="priceOwner();"/></td>
	</tr>
	<tr>
		<td>基准收费</td>
		<td><input name="benchMark" value="50"/></td>
	</tr>
	<tr>
		<td>服务里程</td>
		<td><input name="carCCCourse" disabled="disabled"/><input name="carAllCourse" hidden="hidden"/></td>
	</tr>
	<tr>
		<td>*里程计费</td>
		<td><input name="carCCCoursePrice" disabled="disabled"/><input name="carAllCoursePrice" hidden="hidden"/></td>
	</tr>
	<tr>
		<td>辅助设备</td>
		<td><input name="carHelpDevice" onchange="saveInfo('carHelpDevice');"/></td>
	</tr>
	<tr>
		<td>设备计费</td>
		<td><input name="carDevicePrice" onchange="settlePrice();"/></td>
	</tr>
	<tr>
		<td>*结算金额</td>
		<td><input name="carCCPrice" disabled="disabled"/><input name="carAllPrice" hidden="hidden"/></td>
	</tr>
	<tr>
		<td>结算方式</td>
		<td><input disabled='true'
		           value='<?php $query="SELECT * FROM order_infomanger WHERE Id=$orderId";
		           $result=mysql_fetch_row(mysql_query($query));
		           echo"$result[19]";?>'/></td>
	</tr>
	<tr>
		<td>开票信息</td>
		<td><select name="carBilling" onchange="saveInfo('carBilling');">
				<option value="否">否</option>
				<option value="是">是</option>
			</select></td>
	</tr>
	</tbody>

	<!--付款信息-->
	<tbody>
	<tr>
		<td>付款</td>
		<td><select name="payWay">
				<option value="现金付款">现金付款</option>
				<option value="转账付款">转账付款</option></select></td>
		<td><input type="button" class="btn" value="+" onclick="addPayAttention(1);"/></td>
	</tr>
	</tbody>
	<tbody id="payInfo">
	</tbody>

	<tbody>
	<tr><td colspan="3"><input name="createBtn" type="submit" class="bg-inverse bg-blue btn" value="创建"/></td></tr>
	</tbody>
</table>
<table class="table table-bordered" style="text-align:center" id="NewTable">
</table>

<input name="payIdNum" hidden="hidden"/>
</form>
</div>
</div>
</div>
<?php
//include '../Common/footer.php';
?>
<script src="../assets/js/jquery-1.7.1.min.js"></script>
<script src="../assets/js/slicy.js"></script>
<script src="../js/prettify.js"></script>
<script src="../js/docs.js"></script>
<script src="../js/jquery-3.0.0.js"></script>
<script src="../js/jquery-3.0.0.min.js"></script>
<script type="text/javascript">
var payTimeName=["carPayYear","carPayMonth","carPayDay","carPayHour","carPayMinute"];
var payInfoName=["carPaySum","carPayType","carPayPerson","carPayAccountNum","carReceivePerson",
	"carReceiveAccountNum"];
<?php
$payTimeName=array("carPayYear","carPayMonth","carPayDay","carPayHour","carPayMinute");
$payInfoName=array("carPaySum","carPayType","carPayPerson","carPayAccountNum","carReceivePerson",
		"carReceiveAccountNum");
?>

var payIdNum=0;
function addPayAttention(num){

	var payInfo=document.getElementById("NewTable");
	var temp="<tr><td rowspan='12'>付款信息</td>";
	temp+="</tr>";
	temp+="<tr><td>付款方式</td><td>";
	payIdNum++;
	if(num==0){
		if(localStorage.getItem("payWay"+''+payIdNum)==null){
//		alert("payWay"+''+payIdNum);
			localStorage.setItem("payWay"+''+payIdNum,document.getElementsByName("payWay")[0].value);
		}else{
//		alert("ww"+localStorage.getItem("payWay"+''+payIdNum)+''+payIdNum);
			document.getElementsByName("payWay")[0].value=localStorage.getItem("payWay"+''+payIdNum);
		}
	}else if(num==1){
//		alert(document.getElementsByName("payWay")[0].value);
		localStorage.setItem("payWay"+''+payIdNum,document.getElementsByName("payWay")[0].value);
	}


	temp+=document.getElementsByName("payWay")[0].value+"<input name='payWay"+payIdNum+"' value='"+
	document.getElementsByName("payWay")[0].value+"' hidden='hidden'/>" +
	"</td>" +
	"<td><button style='border: 1px solid #ccc ;background: rgba(255, 255, 255, 0.5);'" +
	" onclick='nonShow("+payIdNum+");'>X</button>" +
	"</td>";
	temp+="</tr>";
	temp+="<tr><td>付款时间</td>";
	temp+="<td colspan='2'>";
	temp+="<select name='carPayYear"+payIdNum+"' onchange='savePay(<?php $w=0;echo"$w,";$w++;?>"+payIdNum+");'>";
	temp+="<?php for($i=2016;$i<2050;$i++){
		echo"<option value='$i'>$i</option>";
	}?>";
	temp+="</select>年";
	temp+="<select name='carPayMonth"+payIdNum+"' onchange='savePay(<?php echo"$w,";$w++;?>"+payIdNum+");'>";
	temp+="<?php for($j=0;$j<count($month);$j++){
		echo"<option value='$month[$j]'>$month[$j]</option>";
	}?>";
	temp+="</select>月";
	temp+="<select name='carPayDay"+payIdNum+"' onchange='savePay(<?php echo"$w,";$w++;?>"+payIdNum+");'>";
	temp+="<?php
	for($i=0;$i<count($day);$i++){
		echo"<option value='$day[$i]'>$day[$i]</option>";
	}?>";
	temp+="</select>日";
	temp+="<select  name='carPayHour"+payIdNum+"' onchange='savePay(<?php echo"$w,";$w++;?>"+payIdNum+");'>";
	temp+="<?php
	for($i=0;$i<count($hour);$i++){
		echo"<option value='$hour[$i]'>$hour[$i]</option>";
	}?>";
	temp+="</select>时";
	temp+="<select name='carPayMinute"+payIdNum+"' onchange='savePay(<?php echo"$w,";$w++;?>"+payIdNum+");'>";
	temp+="<?php
	for($i=0;$i<count($minute);$i++){
		echo"<option value='$minute[$i]'>$minute[$i]</option>";
	}?>";
	temp+="</select>分";
	temp+="</td>";
	temp+="</tr>";
	temp+="<tr><td>付款金额</td>";

	temp+="<td colspan='2'><input name='carPaySum"+payIdNum+"' onchange='savePay(<?php echo"$w,";$w++;?>"+payIdNum+");'/>" +
	"</td>";
	temp+="</tr>";
	temp+="<tr><td>付款方式</td>";
	temp+="<td colspan='2'><input name='carPayType"+payIdNum+"' onchange='savePay(<?php echo"$w,";$w++;?>"+payIdNum+");'/>" +
	"</td>";
	temp+="</tr>";
	temp+="<tr><td>付款人员</td>";
	temp+="<td colspan='2'><input name='carPayPerson"+payIdNum+"' onchange='savePay(<?php echo"$w,";$w++;?>"+payIdNum+");'/>" +
	"</td>";
	temp+="</tr>";
	if(document.getElementsByName("payWay")[0].value=="转账付款"){
		temp+="<tr>";
		temp+="<td>付款账号</td>";
		temp+="<td colspan='2'><input name='carPayAccountNum"+payIdNum+"' onchange='savePay(<?php echo"$w,";$w++;?>"+payIdNum+");'/>" +
		"</td>";
		temp+="</tr>";
	}

	temp+="<tr><td>收款人员</td>";
	temp+="<td colspan='2'><input name='carReceivePerson"+payIdNum+"' onchange='savePay(<?php echo"$w,";$w++;?>"+payIdNum+");'/>" +
	"</td>";
	temp+="</tr>";
	if(document.getElementsByName("payWay")[0].value=="转账付款"){
		temp+="<tr>";
		temp+="<td>收款账号</td>";
		temp+="<td colspan='2'><input name='carReceiveAccountNum"+payIdNum+"' onchange='savePay(<?php echo"$w,";$w++;?>"+payIdNum+");'/>" +
		"</td>" +
		"</tr>";
	}
	var tabPayInfo=document.createElement("tbody");
	tabPayInfo.setAttribute("id",payIdNum);
	tabPayInfo.innerHTML=temp;
//		payInfo.insertChildAfter(this,tabPayInfo);
	payInfo.appendChild(tabPayInfo);


//		alert(document.getElementsByName("payWay")[0].value);
	document.getElementsByName("payIdNum")[0].value=payIdNum;

	localStorage.setItem("payIdNum",payIdNum);
//	alert(localStorage.getItem('payIdNum')+"ss");
}
var m=0;
function initView(){
//	localStorage.clear();
	document.getElementsByName("payIdNum")[0].value=0;

	if(localStorage.getItem('payIdNum')!=null){
		if(m==0){
			var n=localStorage.getItem('payIdNum');
			m++;
		}
		for(var i=0;i<=n-1;i++){
			addPayAttention(0);
		}

		var payTimeBill=["carPayYear","carPayMonth","carPayDay","carPayHour","carPayMinute","carPaySum",
			"carPayType","carPayPerson","carReceivePerson"];
		var payInfoName=["carPaySum","carPayType","carPayPerson","carPayAccountNum","carReceivePerson",
			"carReceiveAccountNum"];
		for(var i=0;i<=n-1;i++) {
			var tem = i + 1;

			for (var j = 0; j <= payTimeBill.length-1; j++) {
					document.getElementsByName(payTimeBill[j] + tem)[0].value = localStorage.getItem(payTimeBill[j] + tem);
			}
			if(localStorage.getItem("payWay" + tem) == "转账付款"){
				document.getElementsByName("carPayAccountNum" + tem)[0].value = localStorage.getItem("carPayAccountNum" + tem);
				document.getElementsByName("carReceiveAccountNum" + tem)[0].value = localStorage.getItem("carReceiveAccountNum" + tem);
			}
		}
	}
	var infoList=["carType","carBrand","carLicense","carVIN","carColor","carStartAddress",
		"carStartCourse","carCustomerState","carServiceYear","carServiceMonth","carServiceDay",
		"carServiceHour","carServiceMinute","carEndPlaceName","carEndAddress","carEndCourse","carSigner",
		"carSignerTel","FreightBasis","StartPrice","StartCourse","StartUnitPrice","benchMark",
		"carAllCourse","carAllCoursePrice","carHelpDevice","carDevicePrice","carAllPrice",
		"carBilling"];
	for(var i=0;i<=infoList.length;i++){
		if(i==0){
			switch (localStorage.getItem(infoList[i])){
				case "轿车/2":
					document.getElementsByName(infoList[i])[0].options[0].selected=true;
					break;
				case "轿车/3":
					document.getElementsByName(infoList[i])[0].options[1].selected=true;
					break;
				default :break;
			}
		}else if(i==7){
			switch (localStorage.getItem(infoList[i])){
				case "是":
					document.getElementsByName(infoList[i])[0].options[0].selected=true;
					break;
				case "否":
					document.getElementsByName(infoList[i])[0].options[1].selected=true;
					break;
				default :break;
			}
		}else if(i==18){
			switch (localStorage.getItem(infoList[i])){
				case "0":
					document.getElementsByName(infoList[i])[0].options[0].selected=true;
					break;
				case "1":
					document.getElementsByName(infoList[i])[0].options[1].selected=true;
					break;
				case "2":
					document.getElementsByName(infoList[i])[0].options[2].selected=true;
					document.getElementsByName('StartPrice')[0].value=localStorage.getItem('benchMark');
					break;
				default :break;
			}
		}else{
			document.getElementsByName(infoList[i])[0].value=localStorage.getItem(infoList[i]);
		}

		document.getElementsByName("carCCCourse")[0].value=document.getElementsByName("carAllCourse")[0].value;
//		alert(document.getElementsByName("carAllCoursePrice")[0].value);
		document.getElementsByName("carCCCoursePrice")[0].value=document.getElementsByName("carAllCoursePrice")[0].value;

		countAPrice=parseInt(localStorage.getItem('carAllCoursePrice'));
		countACourse=parseInt(localStorage.getItem('carDevicePrice'));
		document.getElementsByName("carCCPrice")[0].value=countAPrice+countACourse;
		document.getElementsByName("carAllPrice")[0].value=countAPrice+countACourse;

	}
}

/*jquery隐藏*/
$(document).ready(function(){
//	alert(localStorage.getItem("carStartAddress"));
	if(localStorage.getItem("carStartAddress")==null){
		$("#carStartAddress").val("<?php echo"$row[6]"?>");
	}
	if($("[name='FreightBasis']").val()=="0"){
//		$("[name='FreightBasis']").val(0);
		$("[name='StartPrice']").val("50");
		$("[name='StartCourse']").val("0");
		$("[name='StartUnitPrice']").val("7");
		$("[name='benchMark']").val("50");
		if(document.getElementsByName("carCCPrice")[0].value=="NaN"){
			$("[name='carCCPrice']").val("");
		}
		localStorage.setItem("StartPrice","50");
		localStorage.setItem("StartCourse","0");
		localStorage.setItem("StartUnitPrice","7");
		localStorage.setItem("benchMark","50");
	}

});
function saveInfo(index){
	localStorage.setItem(index,document.getElementsByName(index)[0].value);
}
function saveAllCourse(index){
	localStorage.setItem(index,document.getElementsByName(index)[0].value);
	if(document.getElementsByName("carStartCourse")[0].value!=null&&document.getElementsByName("carEndCourse")[0].value!=null){
		if(document.getElementsByName("carEndCourse")[0].value>document.getElementsByName("carStartCourse")[0].value){
			document.getElementsByName("carAllCourse")[0].value=
				document.getElementsByName("carEndCourse")[0].value-document.getElementsByName("carStartCourse")[0].value;
		}else{
			document.getElementsByName("carAllCourse")[0].value=0;
		}
		localStorage.setItem("carAllCourse",document.getElementsByName("carAllCourse")[0].value);

		countPrice=parseInt(localStorage.getItem('benchMark'));
		countCourse=parseInt(localStorage.getItem('StartCourse'));
		countUnitPrice=parseInt(localStorage.getItem('StartUnitPrice'));
		countAllCourse=parseInt(localStorage.getItem('carAllCourse'));
	document.getElementsByName("carCCCoursePrice")[0].value=countPrice+(countAllCourse-countCourse)*countUnitPrice;
		document.getElementsByName("carAllCoursePrice")[0].value=countPrice+(countAllCourse-countCourse)*countUnitPrice;
		localStorage.setItem('carAllCoursePrice',document.getElementsByName('carAllCoursePrice')[0].value);

		coursePrice();
		settlePrice();

	}
	document.getElementsByName("carCCCourse")[0].value=document.getElementsByName("carAllCourse")[0].value;
}
/*
* 保存付款信息
* */
function savePay(timeOrOthers,payNum){
	if(timeOrOthers<=4){
		localStorage.setItem(payTimeName[timeOrOthers]+payNum,document.getElementsByName(payTimeName[timeOrOthers]+payNum)[0].value);
	}
	if(timeOrOthers>4){
		var num=timeOrOthers-5;
		localStorage.setItem(payInfoName[num]+payNum,document.getElementsByName(payInfoName[num]+payNum)[0].value);
	}
}
/*
* 删除多余添加付款信息块
* */
function nonShow(index) {

	document.getElementById("NewTable").removeChild(document.getElementById(index));
	for(var i=index;i<=payIdNum;i++){
		var j=i+1;
		localStorage.setItem("payWay"+''+i,localStorage.getItem("payWay"+''+j));
	}
	payIdNum--;
	document.getElementsByName("payIdNum")[0].value=localStorage.getItem("payIdNum"-1);
	localStorage.setItem("payIdNum",localStorage.getItem("payIdNum")-1);
}
/*
* 结算信息计算
* */
function changePrice(){
	localStorage.setItem('FreightBasis',document.getElementsByName('FreightBasis')[0].value);
	switch (document.getElementsByName('FreightBasis')[0].value){
		case "0":
			document.getElementsByName("benchMark")[0].value="50";

			document.getElementsByName("StartPrice")[0].value="50";
			document.getElementsByName("StartCourse")[0].value="0";
			document.getElementsByName("StartUnitPrice")[0].value="7";
			break;
		case "1":
			document.getElementsByName("benchMark")[0].value="140";
			document.getElementsByName("StartPrice")[0].value="140";
			document.getElementsByName("StartCourse")[0].value="10";
			document.getElementsByName("StartUnitPrice")[0].value="7";
			break;
		case "2":
			document.getElementsByName("benchMark")[0].value="";
			document.getElementsByName("StartPrice")[0].value="";
			document.getElementsByName("StartCourse")[0].value="";
			document.getElementsByName("StartUnitPrice")[0].value="";
			break;
	}
	localStorage.setItem('benchMark',document.getElementsByName('StartPrice')[0].value);
	localStorage.setItem('StartPrice',document.getElementsByName('StartPrice')[0].value);
	localStorage.setItem('StartCourse',document.getElementsByName('StartCourse')[0].value);
	localStorage.setItem('StartUnitPrice',document.getElementsByName('StartUnitPrice')[0].value);

//	if(document.getElementsByName("carAllCourse")[0].value!=null){
//		saveAllCourse('carEndCourse');
		countPrice=parseInt(localStorage.getItem('benchMark'));
		countCourse=parseInt(localStorage.getItem('StartCourse'));
		countUnitPrice=parseInt(localStorage.getItem('StartUnitPrice'));
		countAllCourse=parseInt(localStorage.getItem('carAllCourse'));
//		document.getElementsByName("carCCCoursePrice")[0].value=countPrice+(countAllCourse-countCourse)*countUnitPrice;
		document.getElementsByName("carAllCoursePrice")[0].value=countPrice+(countAllCourse-countCourse)*countUnitPrice;
		localStorage.setItem('carAllCoursePrice',document.getElementsByName('carAllCoursePrice')[0].value);
//		alert(document.getElementsByName("carCCCoursePrice")[0].value);
		document.getElementsByName("carCCCoursePrice")[0].value=document.getElementsByName('carAllCoursePrice')[0].value;
		coursePrice();
		settlePrice();
//	}
}
function priceOwner(){
	document.getElementsByName('FreightBasis')[0].options[2].selected=true;
	saveInfo('FreightBasis');
	localStorage.setItem('benchMark',document.getElementsByName('StartPrice')[0].value);
	document.getElementsByName('benchMark')[0].value=localStorage.getItem('benchMark');
	saveInfo('StartPrice');
	saveInfo('StartCourse');
	saveInfo('StartUnitPrice');

	coursePrice();
	settlePrice();

}
function coursePrice(){
	saveInfo('carAllCourse');

	countPrice=parseInt(localStorage.getItem('benchMark'));
	countCourse=parseInt(localStorage.getItem('StartCourse'));
	countUnitPrice=parseInt(localStorage.getItem('StartUnitPrice'));
	countAllCourse=parseInt(localStorage.getItem('carAllCourse'));
//	document.getElementsByName("carCCCoursePrice")[0].value=countPrice+(countAllCourse-countCourse)*countUnitPrice;
	document.getElementsByName("carAllCoursePrice")[0].value=countPrice+(countAllCourse-countCourse)*countUnitPrice;
	document.getElementsByName("carCCCoursePrice")[0].value=document.getElementsByName("carAllCoursePrice")[0].value;
	localStorage.setItem('carAllCoursePrice',document.getElementsByName('carAllCoursePrice')[0].value);
//	alert(document.getElementsByName("carCCCoursePrice")[0].value);

	settlePrice();
}
function settlePrice(){
	saveInfo('carDevicePrice');

	countAPrice=parseInt(localStorage.getItem('carAllCoursePrice'));
	countACourse=parseInt(localStorage.getItem('carDevicePrice'));
	document.getElementsByName("carCCPrice")[0].value=countAPrice+countACourse;
	document.getElementsByName("carAllPrice")[0].value=countAPrice+countACourse;

	saveInfo('carAllPrice');
}
</script>
</body>
</html>
