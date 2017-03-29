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
						<li>
							<a href="infoEstablish.php">订单创建</a>
						</li>
						<li class="selected">
							<a href="#">待派订单</a>
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
			<table class="table table-bordered" style="text-align:center" id="addNewTable">
				<tbody>
				<tr>
					<td colspan="10">订单派发</td>
				</tr>
				<tr>
					<td>编号</td>
					<td>订单编号</td>
					<td>下单时间</td>
					<td>所属单位</td>
					<td>下单电话</td>
					<td>服务种类</td>
					<td>结算方式</td>
					<td>服务地址</td>
					<td>现场电话</td>
					<td>详情</td>
				</tr>
				<?php
//				$query="SELECT * FROM order_infomanger WHERE OrderState='未完善'AND orderGetCompany='无' ORDER BY orderNum DESC";
//				$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
//				$temp=mysql_num_rows($result);
//				if($temp>0)
//				{
//					for($i=0;$i<=$temp-1;$i++)
//					{
//						$row=mysql_fetch_row($result);
//						$n=$i+1;
//						echo"<tr><td>$n</td><td>$row[16]</td><td>$row[15]</td><td>$row[3]</td><td>$row[1]</td>
//						<td>$row[18]</td><td>$row[19]</td><td>$row[6]</td><td>$row[7]</td><td><a href='infoDistributeInfo.php?Id=$row[0]'>查看详情</a></td></tr>";
//					}
//				}
//
//				mysql_free_result($result);

				?>
				</tbody>
			</table>
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
	$(document).ready(function(){
		if(localStorage.getItem("whichDay")!=null){
			$("#whichDay").val(localStorage.getItem("whichDay"));
		}
		if(localStorage.getItem("whichDay")==null){
			$("#whichDay").val('<?php echo"$day";?>');
		}

		if(localStorage.getItem("carHour")!=null){
			$("#carHour").val(localStorage.getItem("carHour"));
		}
		if(localStorage.getItem("carHour")==null){
			$("#carHour").val('<?php $carhour=date("G");echo"$carhour";?>');
		}

		if(localStorage.getItem("carMinute")!=null){
			$("#carMinute").val(localStorage.getItem("carMinute"));
		}
		if(localStorage.getItem("carMinute")==null){
			$("#carMinute").val('<?php $carMinute=date("i");echo"$carMinute";?>');
		}
		if($("#whichDay").find("option:selected").text()=="<?php echo"$day"?>"){
			$("#carTT").hide();
		}

	});

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
