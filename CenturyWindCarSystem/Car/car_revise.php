<?php
$a=$_POST;

include "../Common/localSQLSettings.php";
localSettings();

$plateId=$_GET["plateId"];

/*
 * 车辆基本信息
 * */
if(@$_POST['i_vehicleCode']!=null)
{
	$query="update car_info set carOId='$_GET[plateId]',brandModel='$a[i_brandModel]', vehicleCode='$a[i_vehicleCode]',
	engineNumber='$a[i_engineNumber]',passenger='$a[i_passenger]',color='$a[i_color]' WHERE carOId='$_GET[plateId]';";
	$s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
	++$s;
	$que="update cars set carOId='$_GET[plateId]',";
}
/*
 * 注册信息
 * */
if(@$_POST['r_type']!=null)
{
	$query="update car_regist set carOId='$_GET[plateId]',type='".$a['r_type']."',owner='".$a['r_owner']."',
    address='".$a['r_address']."',organization='".$a['r_organization']."',registDate='" .$a['r_registDate']."',
    usefulDate='".$a['r_usefulDate']."',registUnit='".$a['registUnit']."',registPerson='".$a['registPerson']."',
    costName='".$a['costName']."',costAmount='".$a['costAmount']."'";
	$s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
	++$s;
}
/*
 * 车主信息
 * */
if(@$_POST['owner']!=null)
{
	if($_POST['ownerType']=="个人车主")
	{
		$query="update into car_owner_personal set carOId='$_GET[plateId]',name='".$a['op_name']."',
        sex='".$a['op_sex']."',nation='".$a['op_nation']."',birthday='" .$a['op_birthday']."',
        address='" .$a['op_address']."',number='".$a['op_number']."',organization='".$a['op_organization']."',
        usefulDate='".$a['op_usefulDate']."',phone='".$a['phone']."'";
		$s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
		++$s;
		echo"<script language='JavaScript'>alert('这里是车主基本信息$s');</script>";
	}

	if($_POST['ownerType']=="企业车主")
	{
		$query="update car_owner_unit set carOId='$_GET[plateId]',socialCreditCode='".$a['ou_socialCreditCode']."',
        name='".$a['ou_name']."',type='".$a['ou_type']."',address='".$a['ou_address']."',
        legalRepresentative='".$a['ou_legalRepresentative']."',registeredCapital='" .$a['ou_registeredCapital']."',
        setUpDate='" .$a['ou_setUpDate']."',businessUsefulDate='".$a['ou_businessUsefulDate']."',
        businessScope='".$a['ou_businessScope']."',organization='".$a['ou_organization']."',releaseDate='".$a['ou_releaseDate']."',
        phone='".$a['phone']."'";
		$s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
		++$s;
		echo"<script language='JavaScript'>alert('这里是车主信息$s');</script>";
	}
}
/*
 * 被分配信息
 * */
if(@$_POST['employeeName']!=null)
{
	echo"<p>暂不可分配</p>";
//	$query="update cars set carOId='$plateId',type='".$a['type']."',brand='".$a['brand']."',
//    owner='".$a['owner']."',ownerType='".$a['ownerType']."',phone='".$a['phone']."' where carOId= '$plateId'";
//	$s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
//	++$s;
//	var_dump(isset($_POST['owner']));
//	var_dump($_POST['owner']);
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <!--禁止图像工具栏出现的网页标签-->
    <meta content="no" http-equiv="imagetoolbar">
    <!--用于iphone开发-->
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <link type="image/x-icon" href="../assets/ico/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="../assets/css/slicy.css">
    <link rel="stylesheet" href="../css/prettify.css">
    <link rel="stylesheet" href="../css/docs.css">
	<style>
		#checkNum p{
			width: auto;
		}
		#checkNum input{
			width: auto;
		}
		.textCheck{
			text-decoration-color: #c12e2a;
		}
	</style>
    <title>世纪风</title>
</head>
<body onload="initView();">
<?php
include '../Common/head.php';
?>
<div class="wrapper">

<form action="" method="post">
<div class="row">

<!--content-->
<div class="col9 docs-body" id="main_content">
<div>

<?php
$procurementNum=$_GET['plateId'];
$query="SELECT * FROM car_procurement WHERE Id=$procurementNum";
$procurementResult=mysql_query($query);
$row=mysql_fetch_row($procurementResult);
echo"<!--采购信息-->
<div id='mineInfo' class='col8'>
	<p>
	<table class='table table-bordered'>
		<tbody>
		<tr>
			<td>车辆采购</td>
			<td colspan='3'></td>
		</tr>
		<tr>
			<td>车辆种类</td>
			<td>车辆型号</td>
			<td>车辆品牌</td>
			<td>车辆编号</td>
		</tr>
		<tr>
			<td><input type='text' name='p_class' value='$row[3]' disabled='disabled'/></td>
			<td><input type='text' name='p_type' value='$row[4]' disabled='disabled'/></td>
			<td><input type='text' name='p_brand' value='$row[5]' disabled='disabled'/></td>
			<td><input type='text' name='p_number' value='$row[1]' disabled='disabled'/></td>
		</tr>
		<tr>
			<td>销售单位</td>
			<td>销售人员</td>
			<td>联系电话</td>
			<td>厂商指导价</td>
		</tr>
		<tr>

			<td><input type='text' name='p_saleUnit' value='$row[7]' disabled='disabled'/></td>
			<td><input type='text' name='p_salePerson' value='$row[8]' disabled='disabled'/></td>
			<td><input type='text' name='p_phone' value='$row[9]' disabled='disabled'/></td>
			<td><input type='text' name='p_factoryPrice' value='$row[10]' disabled='disabled'/></td>
		</tr>
		<tr>
			<td>采购价格</td>
			<td>购买方式</td>
			<td colspan='2'>采购人员</td>
		</tr>
		<tr>
			<td><input type='text' name='p_purchasePrice' value='$row[11]' disabled='disabled'/></td>
			<td><input type='text' name='p_buyWay' value='$row[12]' disabled='disabled'/></td>
			<td colspan='2'><input type='text' name='p_buy_person' value='$row[13]' disabled='disabled'/></td>
		</tr>
		<tr>
			<td>财务审核人</td>
			<td><input type='text' name='p_financialPerson' value='$row[15]' disabled='disabled'/></td>
			<td>审核时间</td>
			<td><input type='text' name='p_financialDate' value='$row[17]' disabled='disabled'/></td>
		</tr>
		<tr>
			<td>审核意见</td>
			<td colspan='3'><input type='text' name='p_financialOpinion' value='$row[16]' disabled='disabled'/></td>
		</tr>
		<tr>
			<td>经理审核人</td>
			<td><input type='text' name='p_financialOpinion' value='$row[18]' disabled='disabled'/></td>
			<td>审核时间</td>
			<td><input type='text' name='p_managerDate' value='$row[20]' disabled='disabled'/></td>
		</tr>
		<tr>
			<td>审核意见</td>
			<td colspan='3'><input type='text' name='p_managerOpinion' value='$row[19]' disabled='disabled'/></td>
		</tr>
		</tbody>
	</table>
	</p>
</div>";

$result=mysql_fetch_row(mysql_query("SELECT * FROM car_info WHERE carOId=$plateId"));
if($result[2]==null){
	echo"<div class='col8'><p></p>";
	echo"<h6 style='color: #c12e2a'>完善车辆基本信息，剩余注册信息，个人车主信息，被分配信息需完善</h6></div>";
	echo"<!--基本信息-->
<div id='identityInfo' class='col8'>
	<p>
	<table class='table table-bordered'>
		<tbody>
		<tr>
			<td>车辆基本信息</td>
			<td></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>品牌型号</td>
			<td><input type='text' name='i_brandModel' placeholder=''/></td>
		</tr>
		</tbody>
		<tfoot>
		<tr>
			<td>车辆识别代号</td>
			<td><input type='text' name='i_vehicleCode' placeholder=''/></td>
		</tr>
		<tr>
			<td>发动机号码</td>
			<td><input type='text' name='i_engineNumber' placeholder=''/></td>
		</tr>
		<tr>
			<td>核定载客人数</td>
			<td><input type='text' name='i_passenger' placeholder=''/></td>
		</tr>
		<tr>
			<td>车身颜色</td>
			<td><input type='text' name='i_color' placeholder=''/></td>
		</tr>
		</tfoot>
	</table>
	</p>
</div>";
}else{
	@$result=mysql_fetch_row(mysql_query("SELECT * FROM car_register WHERE carOId=$plateId"));
	if($result[2]==null){
		echo"<div class='col8'><p></p>";
		echo"<h6 style='color: #c12e2a'>完善注册信息，剩余个人车主信息，被分配信息需完善</h6></div>";
		echo"<!--注册信息-->
<div id='officeInfo' class='col8'>
	<p>
	<table class='table table-bordered'>
		<tbody>
		<tr>
			<td>车辆注册信息</td>
			<td>
		</tbody>
		<tbody>
		<tr>
			<td>注册种类</td>
			<td><input type='text' name='r_type' placeholder='正式号牌'/></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>车牌号</td>
			<td><input type='text' name='r_plateNumber' placeholder=''/></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>所有人</td>
			<td><input type='text' name='r_owner' placeholder=''/></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>住址</td>
			<td><input type='text' name='r_address' placeholder=''/></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>发证机关</td>
			<td><input type='text' name='r_organization' placeholder=''/></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>注册日期</td>
			<td><input type='text' name='r_registDate' placeholder=''/></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>年检有效期至</td>
			<td><input type='text' name='r_usefulDate' placeholder=''/></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>办理单位</td>
			<td><input type='text' name='registUnit' placeholder=''/></td>
		</tr>
		<tr>
			<td>办理人员</td>
			<td><input type='text' name='registPerson' placeholder=''/></td>
		</tr>
		<tr>
			<td>费用名称</td>
			<td><input type='text' name='costName' placeholder=''/></td>
		</tr>
		<tr>
			<td>费用金额</td>
			<td><input type='text' name='costAmount' placeholder=''/></td>
		</tr>
		</tbody>
	</table>
	</p>
</div>";
	}else{
		@$result=mysql_fetch_row(mysql_query("SELECT * FROM car_owner_personal WHERE carOId=$plateId"));
		$res=mysql_fetch_row(mysql_query("SELECT * FROM car_owner_unit WHERE carOId=$plateId"));
		if($result[2]==null && $res[2]==null){
			echo"<div class='col8'><p></p>";
			echo"<h6 style='color: #c12e2a'>完善个人车主信息，剩余被分配信息需完善</h6></div>";
			echo"<!--个人车主信息-->
<div id='mineSourceInfo' class='col8'>
	<div id='sf'>
		<p>
		<table class='table table-bordered'>
			<tbody>
			<tr>
				<td>车主信息</td>
				<td><select name='select' id='select' onchange='carOwner(this);'>
						<option value='1'>个人车主</option>
						<option value='2'>单位车主</option>
					</select>
				</td>
			</tbody>
			<tbody>
			<tr>
				<td>姓名</td>
				<td><input type='text' name='op_name' placeholder=''/></td>
			</tr>
			`	<tr>
				<td>联系电话</td>
				<td><input name='op_phone' placeholder=''/></td>
			</tr>
			<tr>
				<td>性别</td>
				<td><input type='text' name='op_sex' placeholder=''/></td>
			</tr>
			<tr>
				<td>民族</td>
				<td><input type='text' name='op_nation' placeholder=''/></td>
			</tr>
			<tr>
				<td>出生</td>
				<td><input type='text' name='op_birthday' placeholder=''/></td>
			</tr>
			<tr>
				<td>住址</td>
				<td><input type='text' name='op_address' placeholder=''/></td>
			</tr>
			<tr>
				<td>公民身份证号码</td>
				<td><input type='text' name='op_number' placeholder=''/></td>
			</tr>
			<tr>
				<td>签发机关</td>
				<td><input type='text' name='op_organization' placeholder=''/></td>
			</tr>
			<tr>
				<td>有限期限</td>
				<td><input type='text' name='op_usefulDate' placeholder=''/></td>
			</tr>
			</tbody>
		</table>
		</p>
	</div>
</div>";
		}else{
			@$result=mysql_fetch_row(mysql_query("SELECT * FROM car_assigned WHERE carOId=$plateId"));
			if($result[2]==null){
				echo"<div class='col8'><p></p>";
				echo"<h6 style='color: #c12e2a'>完善被分配信息</h6></div>";
				echo"<!--被分配信息-->
<div id='propertyInfo' class='col8'>
	<p>
	<table class='table table-bordered'>
		<tbody>
		<tr>
			<td>员工任职</td>
			<td></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td><input type='text' name='employeeName'placeholder='钟敏'/></td>
			<td><input placeholder='511027198209096195'/></td>
		</tr>
		<tr>
			<td>任职公司</td>
			<td><input type='text' name='' placeholder='四川世纪风汽车救援服务有限公司'/></td>
		</tr>
		<tr>
			<td>任职部门</td>
			<td><input type='text' name='' placeholder='车队管理部'/></td>
		</tr>
		<tr>
			<td>任职职位</td>
			<td><input type='text' name='' placeholder='服务司机'/></td>
		</tr>
		<tr>
			<td>任职时间</td>
			<td><input type='text' name='' placeholder='2016.06.06'/></td>
		</tr>
		<tr>
			<td>员工ID</td>
			<td><input type='text' name='' placeholder='s20160400025'/></td>
		</tr>
		<tr>
			<td>人事专员</td>
			</td>
			<td><input type='text' name='' placeholder='何海霞'/></td>
		</tr>
		</tbody>

	</table>

	</p>
</div>";
			}else{
				echo"<p>信息完整</p>";
			}
		}
	}
}
?>

</div>
</div>

<!--提交按钮-->
<div class="col2 right">
	<div class="sidebar"><input class="btn bg-blue bg-inverse" type="submit" name="addAll" value="提交"></div>
</div>

</div>
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


</script>

</body>
</html>
