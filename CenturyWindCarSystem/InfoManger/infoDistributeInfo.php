<?php
/**
 * Created by PhpStorm.
 * User: Juvo
 * Date: 2016/7/12
 * Time: 9:39
 */
include "../Common/localSQLSettings.php";
localSettings();

$lifeTime = 1*1800;

$orderId=$_GET["Id"];

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
							<a href="infoEstablish.php">订单创建</a>
						</li>
						<li>
							<a href="#">订单创建</a>
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

					<td colspan="6">派发订单</td>
					</tr>

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
				";
							}
						}

						mysql_free_result($result);

						?>
			</table>
			<form method="post" action="DistributeOrder.php?Id=<?php echo"$orderId";?>">

				<table class="table table-bordered" style="text-align:center" id="addNewTable">
					<tbody>
				<tr><td rowspan="5">服务人员</td></tr>
				<tr>
					<td>服务单位</td>
					<td><input name="orderGetCompany" onchange="saveInfo('orderGetCompany');"/></td>
				</tr>
				<tr>
					<td>接单人员</td>
					<td><input name="orderGetPerson" onchange="saveInfo('orderGetPerson');"/></td>
				</tr>
				<tr>
					<td>服务车牌</td>
					<td><input name="servicePlate" onchange="saveInfo('servicePlate');"/></td>
				</tr>
				<tr>
					<td>接单人员电话</td>
					<td><input name="orderGetPersonTel" onchange="saveInfo('orderGetPersonTel');"/></td>
				</tr>
				<tr><td colspan="3"><input type="submit" class="bg-inverse bg-blue btn" value="提交"/></td></tr>
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
		var infoList=["orderGetCompany","orderGetPerson","servicePlate",
			"orderGetPersonTel",'orderType','accountMethod'];
		for(var i=0;i<=infoList.length;i++){

				document.getElementsByName(infoList[i])[0].value=localStorage.getItem(infoList[i]);
		}
//		alert(localStorage.getItem("carHour"));
	}


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
