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
				<li>
					<a href="infoPerfect.php">订单信息完善</a>
				</li>
				<li class="selected">
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
					<td colspan='3'>$row[18]</td>
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
		<td colspan="5">信息详情</td>
	</tr>
	<?php
	$temp=mysql_fetch_row(mysql_query("SELECT OrderNum FROM order_infomanger WHERE Id=$orderId"));
	$tup=mysql_fetch_row(mysql_query("SELECT * FROM order_infomanger_detail WHERE OrderNum=$temp[0]"));

	echo"<!--来源信息-->
	<tr><td rowspan='4'>车辆信息</td></tr>
	<tr>
		<td>车辆类型</td>
		<td>$tup[2]</td>
		<td>车辆品牌</td>
		<td>$tup[3]</td>
	</tr>
	<tr>
		<td>车牌号码</td>
		<td>$tup[4]</td>
		<td>车辆识别代号</td>
		<td>$tup[5]</td>
	</tr>
	<tr>
		<td>车身颜色</td>
		<td>$tup[6]</td>
		<td colspan='2'></td>
	</tr>
	<!--开始服务-->
	<tr><td rowspan='3'>开始服务</td></tr>
	<tr>
		<td>服务开始时间</td>
		<td> ";
$query="SELECT * FROM order_infomanger WHERE Id=$orderId";
			       $result=mysql_fetch_row(mysql_query($query));
			       echo"$result[15]";
		echo"</td>
		<td>服务开始地址</td>
		<td>$tup[8]</td>
	</tr>
	<tr>
		<td>服务开始里程</td>
		<td>$tup[9]</td>
		<td>客户是否随车</td>
		<td>$tup[10]</td>
	</tr>
	<!--结束信息-->
	<tr><td rowspan='4'>结束信息</td></tr>
	<tr>
		<td>到达目的地时间</td>
		<td>$tup[11]</td>
		<td>目的地名称</td>
		<td>$tup[12]</td>
	</tr>
	<tr>
		<td>目的地地址</td>
		<td>$tup[13]</td>
		<td>目的地里程</td>
		<td>$tup[14]</td>
	</tr>
	<tr>
		<td>车辆签收员</td>
		<td>$tup[15]</td>
		<td>签收人员电话</td>
		<td>$tup[16]</td>
	</tr>
	<!--结算信息-->
	<tr><td rowspan='7'>结算信息</td></tr>
	<tr>
		<td>计费方式</td>
		<td> ";$query="SELECT * FROM order_infomanger WHERE Id=$orderId";
		           $result=mysql_fetch_row(mysql_query($query));
		           echo"$result[10]";
echo"</td>
		<td>收费标准</td>
		<td>$tup[17]</td>
	</tr>
	<tr>
		<td>标准</td>
		<td colspan='3'>起步价(元)：<input value='$tup[18]' disabled='disabled' style='width: 50px;'/>
			含里程(km)：<input value='$tup[19]' disabled='disabled' style='width: 50px;'/>
			单价(元)：<input value='$tup[20]' disabled='disabled' style='width: 50px;'/></td>

	</tr>
	<tr>
		<td>基准收费</td>
		<td>$tup[21]</td>
		<td>服务里程</td>
		<td>$tup[22]</td>
	</tr>
	<tr>
		<td>里程计费</td>
		<td>$tup[23]</td>
		<td>辅助设备</td>
		<td>$tup[24]</td>
	</tr>
	<tr>
		<td>设备计费</td>
		<td>$tup[25]</td>
		<td>*结算金额</td>
		<td>$tup[26]</td>
	</tr>
	<tr>
		<td>结算方式</td>
		<td>";
	$query="SELECT * FROM order_infomanger WHERE Id=$orderId";
		           $result=mysql_fetch_row(mysql_query($query));
		           echo"$result[19]";
echo"</td>
		<td>开票信息</td>
		<td>$tup[27]</td>
	</tr>
	</tbody>

	<!--付款信息-->
	<tbody>
	<tr>
		<td rowspan='2'>付款</td>
	</tr>
	<tr><td></td>
	<td colspan='3'></td></tr>
	</tbody>";

	$resultInfo=mysql_query("SELECT * FROM order_infomanger_pay WHERE carPayNum=$result[16]");

	$resultPayNum=mysql_num_rows($resultInfo);
	$n=0;
	for($k=0;$k<$resultPayNum;$k++){
		$resultPay=mysql_fetch_row($resultInfo);
		$n++;
		echo"<tbody><tr><td rowspan='12'>付款信息</td></tr>
	<tr>
	<td>付款方式</td><td>$resultPay[4]</td><td colspan='2'>$n</td>
	</tr>
	<tr>
	<td>付款时间</td><td>$resultPay[2]</td><td>付款金额</td><td>$resultPay[3]</td></tr>
	<tr><td>付款人员</td><td>$resultPay[5]</td><td>收款人员</td><td>$resultPay[7]</td></tr>";
		if($resultPay[4]=="转账付款"){
			echo"<tr><td>付款账号</td><td>$resultPay[6]</td>";
		}


		if($resultPay[4]=="转账付款"){
			echo"<td>收款账号</td><td><$resultPay[8]</td></tr>";
		}
	}
	echo"</tbody>";


	?>

<!--	<tbody id="payInfo">-->
<!--	</tbody>-->

<!--	<tbody>-->
<!--	<tr><td colspan="5"><input name="createBtn" type="submit" class="bg-inverse bg-blue btn" value="创建"/></td></tr>-->
<!--	</tbody>-->
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
			alert("ww"+localStorage.getItem("payWay"+''+payIdNum)+''+payIdNum);
			document.getElementsByName("payWay")[0].value=localStorage.getItem("payWay"+''+payIdNum);
		}
	}else if(num==1){
		alert(document.getElementsByName("payWay")[0].value);
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
	temp+="<td colspan='2'>" +
	"<input name='carPayYear"+payIdNum+"' onchange='savePay(<?php $w=0;echo"$w,";$w++;?>"+payIdNum+");' style='width: 40px;'/>年" +
	"<input name='carPayMonth"+payIdNum+"' onchange='savePay(<?php echo"$w,";$w++;?>"+payIdNum+");' style='width: 40px;'/>月" +
	"<input name='carPayDay"+payIdNum+"' onchange='savePay(<?php echo"$w,";$w++;?>"+payIdNum+");' style='width: 40px;'/>日" +
	"<input name='carPayHour"+payIdNum+"' onchange='savePay(<?php echo"$w,";$w++;?>"+payIdNum+");' style='width: 40px;'/>时" +
	"<input name='carPayMinute"+payIdNum+"' onchange='savePay(<?php echo"$w,";$w++;?>"+payIdNum+");' style='width: 40px;'/>分 " +
	"</td>";
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
	document.getElementsByName("payIdNum")[0].value=0;
//	alert(localStorage.getItem('payIdNum'));

	if(localStorage.getItem('payIdNum')!=null){
//		alert("sdf");
//		document.getElementsByName("payWay")[0].value=="转账付款";
		if(m==0){
			var n=localStorage.getItem('payIdNum');
			m++;
		}
		for(var i=0;i<=n-1;i++){
			addPayAttention(0);
		}
//		for(var i=0;i<=n;i++) {
//			var cl = payInfoName.length + payTimeName.length;
//			var tem = i + 1;
//
//			for (var j = 0; j <= cl; j++) {
//				if (j <= 4) {
//					document.getElementsByName(payTimeName[j] + tem)[0].value = localStorage.getItem(payTimeName[j] + tem);
//				}
//				if (j > 4) {
//					var cc = j - 5;
//					if (localStorage.getItem("payWay" + tem) == "现金付款") {
//						alert(tem);
//						if ((payInfoName[cc]+tem) == ("carPayAccountNum"+tem) || (payInfoName[cc]+tem) == ("carReceiveAccountNum"+tem)) {
//							continue;
//
//						}else{
//							document.getElementsByName(payInfoName[cc]+tem)[0].value=localStorage.getItem(payInfoName[cc]+ tem);
//						}
//					} else {
//						var cc = j - 5;
//						document.getElementsByName(payInfoName[cc] + tem)[0].value = localStorage.getItem(payInfoName[cc] + tem);
//					}
//					continue;
//				}
//			}
//		}
	}else{
//		alert("dffsdf");
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
	}


}
function saveInfo(index){
	localStorage.setItem(index,document.getElementsByName(index)[0].value);
}
function savePay(timeOrOthers,payNum){
	if(timeOrOthers<=4){
		localStorage.setItem(payTimeName[timeOrOthers]+payNum,document.getElementsByName(payTimeName[timeOrOthers]+payNum)[0].value);
	}
	if(timeOrOthers>4){
		var num=timeOrOthers-5;
		localStorage.setItem(payInfoName[num]+payNum,document.getElementsByName(payInfoName[num]+payNum)[0].value);
//		alert(document.getElementsByName(payInfoName[num]+payNum)[0].value);
	}
//	alert(localStorage.getItem(payTimeName[0]+payNum));
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
	document.getElementsByName("carAllCoursePrice")[0].value=countPrice+(countAllCourse-countCourse)*countUnitPrice;
	localStorage.setItem('carAllCoursePrice',document.getElementsByName('carAllCoursePrice')[0].value);

	settlePrice();
}
function settlePrice(){
	saveInfo('carDevicePrice');

	countAPrice=parseInt(localStorage.getItem('carAllCoursePrice'));
	countACourse=parseInt(localStorage.getItem('carDevicePrice'));
	document.getElementsByName("carAllPrice")[0].value=countAPrice+countACourse;

	saveInfo('carAllPrice');
}
</script>
</body>
</html>
