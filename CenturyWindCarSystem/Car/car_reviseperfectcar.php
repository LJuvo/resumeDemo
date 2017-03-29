<?php
$a=$_POST;

include "../Common/localSQLSettings.php";
localSettings();

$plateId=$_GET["plateId"];
//var_dump($a);
//if($_GET["plateNumber"])
//{
//    $plateNumber=$_GET["plateNumber"];
//    var_dump($plateNumber);
//}
if(@$_POST['owner']!=null)
{
	$query="update cars set carOId='$plateId',type='".$a['type']."',brand='".$a['brand']."',
    owner='".$a['owner']."',ownerType='".$a['ownerType']."',phone='".$a['phone']."' where carOId= '$plateId'";
	$s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
	++$s;
//    echo"<script language='JavaScript'>alert('这里是车辆基本信息$s');</script>";
	var_dump(isset($_POST['owner']));
	var_dump($_POST['owner']);
}

//if(@$_POST['p_number']!=null)
//{
//    $query="update into car_procurement set plateNumber='".$a['plateNumber']."',class='".$a['p_class']."',type='".$a['p_type']."',brand='".$a['p_brand']."',number='" .$a['p_number'].
//        "',saleUnit='".$a['p_saleUnit']."',salePerson='".$a['p_salePerson']."',phone='".$a['p_phone']."',factoryPrice='" .$a['p_factoryPrice']."',purchasePrice='".$a['p_purchasePrice'].
//        "',buyWay='".$a['p_buyWay']."',buyPerson='".$a['p_buy_person']."',financialPerson='" .$a['p_managerOpinion']."',financialOpinion='".$a['p_financialOpinion'].
//        "',financialDate='".$a['p_financialDate']."',manager='".$a['p_manager']."',managerOpinion='" .$a['p_saleUnit']."',managerDate='".$a['p_managerDate']."'
//        ";
//    $s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
//    ++$s;
//    echo"<script language='JavaScript'>alert('这里是设备采购信息$s');</script>";
//}
if(@$_POST['owner']!=null)
{
	if($_POST['ownerType']=="个人车主")
	{
		$query="update into car_owner_personal set plateNumber='".$a['plateNumber']."',name='".$a['op_name']."',
        sex='".$a['op_sex']."',nation='".$a['op_nation']."',birthday='" .$a['op_birthday']."',
        address='" .$a['op_address']."',number='".$a['op_number']."',organization='".$a['op_organization']."',
        usefulDate='".$a['op_usefulDate']."',phone='".$a['phone']."'";
		$s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
		++$s;
		echo"<script language='JavaScript'>alert('这里是车主基本信息$s');</script>";
	}

	if($_POST['ownerType']=="企业车主")
	{
		$query="update into car_owner_unit set plateNumber='".$a['plateNumber']."',socialCreditCode='".$a['ou_socialCreditCode']."',
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
if(@$_POST['i_vehicleCode']!=null)
{
	$query="update into car_info set carOId='".$a['plateId']."',brandModel='".$a['i_brandModel']."',
    vehicleCode='".$a['i_vehicleCode']."',engineNumber='".$a['i_engineNumber']."',passenger='".$a['i_passenger']."',
    color='".$a['i_color']."'";
	$s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
	++$s;
//    echo"<script language='JavaScript'>alert('这里是车辆识别信息$s');</script>";
}
if(@$_POST['ie_name']!=null)
{
	$query="update car_insurance set plateNumber='".$a['plateNumber']."',name='".$a['ie_name']."',
    company='".$a['ie_company']."',number='".$a['ie_number']."',amount='".$a['ie_amount']."',
    tax='".$a['ie_tax']."',usefulDate='".$a['ie_usefulDate']."'";
	$s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
	++$s;
	echo"<script language='JavaScript'>alert('这里是车辆保险信息$s');</script>";
}
if(@$_POST['r_type']!=null)
{
	$query="update car_regist set plateNumber='".$a['r_plateNumber']."',type='".$a['r_type']."',owner='".$a['r_owner']."',
    address='".$a['r_address']."',organization='".$a['r_organization']."',registDate='" .$a['r_registDate']."',
    usefulDate='".$a['r_usefulDate']."',registUnit='".$a['registUnit']."',registPerson='".$a['registPerson']."',
    costName='".$a['costName']."',costAmount='".$a['costAmount']."'";
	$s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
	++$s;
	echo"<script language='JavaScript'>alert('这里是车辆注册信息$s');</script>";
}
if(@$_POST['l_isPay']!=null)
{
	$query="update car_loan set plateNumber=,type=,brand=,loanPayDate=,isOverdue=,distancePay=,payAmount=,isPay=,payDate=,payWay=,payPerson=
            ('".$a['plateNumber']."','".$a['type']."','".$a['brand']."','".$a['l_loanPayDate']."','".$a['l_isOverdue']."','"
		.$a['l_distancePay']."','".$a['l_payAmount']."','".$a['l_isPay']."','".$a['l_payDate']."','".$a['l_payWay']."','".$a['l_payPerson']."')";
	$s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
	++$s;
	echo"<script language='JavaScript'>alert('这里是车辆贷款按揭信息$s');</script>";
}
if(@$_POST['ae_equipmentType']!=null)
{
	$query="update car_add_equipment set plateNumber='".$a['plateNumber']."',type='".$a['type']."',brand='".$a['brand'].
		"',equipmentType='".$a['ae_equipmentType']."',equipmentClass='".$a['ae_equipmentClass']."',equipmentBrand='".$a['ae_equipmentBrand'].
		"',equipmentNumber='" .$a['ae_equipmentNumber']."',equipmentSource='".$a['ae_equipmentSource']."',addAddress='".$a['ae_addAddress'].
		"',isDemolition='".$a['ae_isDemolition']."',applicant='".$a['ae_applicant']."',applicationDate='" .$a['ae_applicationDate'].
		"',department='" .$a['ae_department']."',auditOpinion='" .$a['ae_auditOpinion']."',auditDate='".$a['ae_auditDate'].
		"',auditPerson='".$a['ae_auditPerson']."'
        ";
	$s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
	++$s;
	echo"<script language='JavaScript'>alert('这里是加装设备信息$s');</script>";
}
if(@$_POST['cg_type'])
{
	$query="update car_cost_gasoline set plateNumber='".$a['plateNumber']."',type='".$a['cg_type']."',happenDate='".$a['cg_happenDate'].
		"',amount='".$a['cg_amount']."',gasolineVolume='".$a['cg_gasolineVolume']."',mileage='".$a['cg_mileage']."',submitPerson='".$a['cg_submitPerson'].
		"',submitDate='".$a['cg_submitDate']."',auditPerson='".$a['cg_auditPerson']."',auditOpinion='".$a['cg_auditOpinion'].
		"',isReimbursement='".$a['cg_isReimbursement']."',payWay='".$a['cg_payWay']."'
        ";
	$s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
	++$s;
	echo"<script language='JavaScript'>alert('这里是燃油报销信息$s');</script>";
}
if(@$_POST['ct_type']!=null)
{
	$query="update car_cost_tolls set plateNumber='".$a['plateNumber']."',type='".$a['ct_type']."',amount='".$a['ct_amount']."',happenDate='".$a['ct_happenDate'].
		"',happenAddress='".$a['ct_happenAddress']."',contract='".$a['ct_contract']."',submitPerson='" .$a['ct_submitPerson']."',submitDate='".$a['ct_submitDate'].
		"',auditPerson='".$a['ct_auditPerson']."',auditOpinion='".$a['ct_auditOpinion']."',isReimbursement='".$a['ct_isReimbursement']."',payWay='".$a['ct_payWay']."'
            ";
	$s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
	++$s;
	echo"<script language='JavaScript'>alert('这里是过路费报销信息$s');</script>";
}
if(@$_POST['cp_type']!=null)
{
	$query="update car_cost_park set plateNumber='".$a['plateNumber']."',type='".$a['cp_type']."',amount='".$a['cp_amount']."',happenDate='".$a['cp_happenDate'].
		"',happenAddress='".$a['cp_happenAddress']."',contract='".$a['cp_contract']."',submitPerson='" .$a['cp_submitPerson']."',submitDate='".$a['cp_submitDate'].
		"',auditPerson='".$a['cp_auditPerson']."',auditOpinion='".$a['cp_auditOpinion']."',isReimbursement='".$a['cp_isReimbursement']."',payWay='".$a['cp_payWay']."'
        ";
	$s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
	++$s;
	echo"<script language='JavaScript'>alert('这里是停车费报销信息$s');</script>";
}
if(@$_POST['v_date']!=null)
{
	$query="update car_violations set plateNumber='".$a['plateNumber']."',date='".$a['v_date']."',content='".$a['v_content']."',address='".$a['v_address']."',fines='".$a['v_fines'].
		"',deductFraction='".$a['v_deductFraction']."',driver='" .$a['v_driver']."',state='".$a['v_state']."',processOrganization='".$a['v_processOrganization'].
		"',processPerson='".$a['v_processPerson']."',processCharge='".$a['v_processCharge']."',totalCharge='" .$a['v_totalCharge']."',costUndertake='".$a['v_costUndertake']."'
        ";
	$s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
	++$s;
	echo"<script language='JavaScript'>alert('这里是车辆违章信息$s');</script>";
}
if(@$_POST['m_date']!=null)
{
	$query="update car_maintenance set plateNumber='".$a['plateNumber']."',date='".$a['m_date']."',mileage='".$a['m_mileage']."',amount='".$a['m_amount'].
		"',address='".$a['m_address']."',provider='".$a['m_provider']."',person='" .$a['m_person']."',listing='".$a['m_listing']."',payWay='".$a['m_payWay']."'
        ";
	$s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
	++$s;
	echo"<script language='JavaScript'>alert('这里是车辆保养信息$s');</script>";
}
if(@$_POST['b_date']!=null)
{
	$query="update car_beauty set plateNumber='".$a['plateNumber']."',date='".$a['b_date']."',type='".$a['b_type']."',amount='".$a['b_amount']."',provider='".$a['b_provider']."',driver='".$a['b_driver']."'
            ";
	$s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
	++$s;
	echo"<script language='JavaScript'>alert('这里是车辆美容信息$s');</script>";
}
if(@$_POST['ai_date']!=null)
{
	$query="update car_annual_inspection set plateNumber='".$a['plateNumber']."',date='".$a['ai_date']."',cycle='".$a['ai_cycle']."',testAmount='".$a['ai_testAmount'].
		"',passageAmount='".$a['ai_passageAmount']."',nextDate='".$a['ai_nextDate']."',person='".$a['ai_person']."'
            ";
	$s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
	++$s;
	echo"<script language='JavaScript'>alert('这里是车辆年检信息$s');</script>";
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
<div class="col8">
	<div id="checkNum">
		<table class="table-bordered table" style="text-align: center">
			<tr>
				<td><p><input id="checkone" type="checkbox" checked="checked" onchange="showModel();"/>采购信息</p></td>
				<td><p><input id="checkthree" type="checkbox" checked="checked" onchange="showModel();"/>基本信息</p></td>
				<td><p><input id="checktwo" type="checkbox" checked="checked" onchange="showModel();"/>车主信息</p></td>
				<td><p><input id="checkfour" type="checkbox" checked="checked" onchange="showModel();"/>保险信息</p></td>
			</tr>
			<tr>
				<?php
				$plateId=$_GET["plateId"];
				$resultn=mysql_fetch_array(mysql_query("SELECT * FROM car_procurement WHERE Id=$plateId"));
				if(!empty($resultn)){

				}
				$resultn=mysql_num_rows(mysql_query("SELECT * FROM car_regist WHERE carOId=$plateId"));
				if(empty($resultn)){
					echo"<td><p><input id='checkfive' type='checkbox' onchange='showModel();'/>注册信息</p></td>";

				}else{
					echo"<td><p><input id='checkfive' type='checkbox' checked='checked' onchange='showModel();'/>注册信息</p></td>";
				}
				$resultn=mysql_fetch_row(mysql_query("SELECT * FROM car_procurement WHERE carOId=$plateId"));
				if($resultn[12]=="贷款支付"){
					echo"<td><p><input id='checksix' type='checkbox' checked='checked' onchange='showModel();'/>贷款信息</p></td>";
				}else{
//				echo"<td><p><input id='checkfive' type='checkbox' checked='checked' onchange='showModel();'/>注册信息</p></td>";
				}


				?>


				<td><p><input id="checksix" type="checkbox" checked="checked" onchange="showModel();"/>贷款信息</p></td>
				<td><p><input id="checkseven" type="checkbox" checked="checked" onchange="showModel();"/>加装设备信息</p></td>
				<td><p><input id="checkeight" type="checkbox" checked="checked" onchange="showModel();"/>被分配信息</p></td>
			</tr>
		</table>
	</div>

</div>
<form action="" method="post">
<div class="row">

<!--content-->
<div class="col9 docs-body" id="main_content">
<div>
<!--采购信息-->
<div id="mineInfo" class="col8">
	<p>
	<table class="table table-bordered">
		<?php
		$procurementNum=$_GET["plateId"];
		$query="SELECT * FROM car_procurement WHERE Id=$procurementNum";
		$procurementResult=mysql_query($query);
		$row=mysql_fetch_row($procurementResult);
		echo"<tbody>
        <tr>
            <td>物品采购</td>
            <td></td>
        </tr>
        <tr>
            <td>物品种类</td>
            <td><input type='text' name='p_class' placeholder='$row[3]'/></td>
        </tr>
        <tr>
            <td>物品类别</td>
            <td><input type='text' name='p_type' placeholder='$row[4]'/></td>
        </tr>
        <tr>
            <td>物品品牌</td>
            <td><input type='text' name='p_brand' placeholder='$row[5]'/></td>
        </tr>
        <tr>
            <td>物品编号</td>
            <td><input type='text' name='p_number' placeholder='$row[1]'/></td>
        </tr>
        <tr>
            <td>销售单位</td>
            <td><input type='text' name='p_saleUnit' placeholder='$row[7]'/></td>
        </tr>
        <tr>
            <td>销售人员</td>
            <td><input type='text' name='p_salePerson' placeholder='$row[8]'/></td>
        </tr>
        <tr>
            <td>联系电话</td>
            <td><input type='text' name='p_phone' placeholder='$row[9]'/></td>
        </tr>
        <tr>
            <td>厂商指导价</td>
            <td><input type='text' name='p_factoryPrice' placeholder='$row[10]'/></td>
        </tr>
        <tr>
            <td>采购价格</td>
            <td><input type='text' name='p_purchasePrice' placeholder='$row[11]'/></td>
        </tr>
        <tr>
            <td>购买方式</td>
            <td><input type='text' name='p_buyWay' placeholder='$row[12]'/></td>
        </tr>
        <tr>
            <td>采购人员</td>
            <td><input type='text' name='p_buy_person' placeholder='$row[13]'/></td>
        </tr>
        <tr>
            <td>财务审核人</td>
            <td><input type='text' name='p_financialPerson' placeholder='$row[15]'/></td>
        </tr>
        <tr>
            <td>审核意见</td>
            <td><input type='text' name='p_financialOpinion' placeholder='$row[16]'/></td>
        </tr>
        <tr>
            <td>审核时间</td>
            <td><input type='text' name='p_financialDate' placeholder='$row[17]'/></td>
        </tr>
        <tr>
            <td>经理审核人</td>
            <td><input type='text' name='p_manager' placeholder='$row[18]'/></td>
        </tr>
        <tr>
            <td>审核意见</td>
            <td><input type='text' name='p_managerOpinion' placeholder='$row[19]'/></td>
        </tr>
        <tr>
            <td>审核时间</td>
            <td><input type='text' name='p_managerDate' placeholder='$row[20]'/></td>
        </tr>
        </tbody>";
		?>

	</table>
	</p>
</div>
<!--基本信息-->
<div id="identityInfo" class="col8">
	<p>
	<table class="table table-bordered">
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
</div>
<!--个人车主信息-->
<div id="mineSourceInfo" class="col8">
	<div id="sf">
		<p>
		<table class="table table-bordered">
			<tbody>
			<tr>
				<td>车主信息</td>
				<td><select name="select" id="select" onchange="carOwner(this);">
						<option value="1">个人车主</option>
						<option value="2">单位车主</option>
					</select>
				</td>
			</tbody>
			<tbody>
			<tr>
				<td>姓名</td>
				<td><input type="text" name="op_name" placeholder=""/></td>
			</tr>
			`	<tr>
				<td>联系电话</td>
				<td><input name="op_phone" placeholder=""/></td>
			</tr>
			<tr>
				<td>性别</td>
				<td><input type="text" name="op_sex" placeholder=""/></td>
			</tr>
			<tr>
				<td>民族</td>
				<td><input type="text" name="op_nation" placeholder=""/></td>
			</tr>
			<tr>
				<td>出生</td>
				<td><input type="text" name="op_birthday" placeholder=""/></td>
			</tr>
			<tr>
				<td>住址</td>
				<td><input type="text" name="op_address" placeholder=""/></td>
			</tr>
			<tr>
				<td>公民身份证号码</td>
				<td><input type="text" name="op_number" placeholder=""/></td>
			</tr>
			<tr>
				<td>签发机关</td>
				<td><input type="text" name="op_organization" placeholder=""/></td>
			</tr>
			<tr>
				<td>有限期限</td>
				<td><input type="text" name="op_usefulDate" placeholder=""/></td>
			</tr>
			</tbody>
		</table>
		</p>
	</div>
</div>

<!--保险信息-->
<div id="contactInfo" class="col8">
	<p>
	<table class="table table-bordered">
		<tbody>
		<tr>
			<td>车辆交通强制保险信息</td>
			<td></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>险种名称</td>
			<td><input type="text" name="ie_name" placeholder=""/></td>
		</tr>
		</tbody>
		<tfoot>
		<tr>
			<td>承保公司</td>
			<td><input type="text" name="ie_company" placeholder=""/></td>
		</tr>
		<tr>
			<td>保单号</td>
			<td><input type="text" name="ie_number" placeholder=""/></td>
		</tr>
		<tr>
			<td>保险金额</td>
			<td><input type="text" name="ie_amount" placeholder=""/></td>
		</tr>
		<tr>
			<td>车船税金额</td>
			<td><input type="text" name="ie_tax" placeholder=""/></td>
		</tr>
		<tr>
			<td>有效期</td>
			<td><input type="text" name="ie_usefulDate" placeholder=""/></td>
		</tr>
		</tfoot>
	</table>

	</p>
</div>
<!--注册信息-->
<div id="officeInfo" class="col8">
	<p>
	<table class="table table-bordered">
		<tbody>
		<tr>
			<td>车辆注册信息</td>
			<td>
		</tbody>
		<tbody>
		<tr>
			<td>注册种类</td>
			<td><input type="text" name="r_type" placeholder="正式号牌"/></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>车牌号</td>
			<td><input type="text" name="r_plateNumber" placeholder=""/></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>所有人</td>
			<td><input type="text" name="r_owner" placeholder=""/></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>住址</td>
			<td><input type="text" name="r_address" placeholder=""/></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>发证机关</td>
			<td><input type="text" name="r_organization" placeholder=""/></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>注册日期</td>
			<td><input type="text" name="r_registDate" placeholder=""/></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>年检有效期至</td>
			<td><input type="text" name="r_usefulDate" placeholder=""/></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>办理单位</td>
			<td><input type="text" name="registUnit" placeholder=""/></td>
		</tr>
		<tr>
			<td>办理人员</td>
			<td><input type="text" name="registPerson" placeholder=""/></td>
		</tr>
		<tr>
			<td>费用名称</td>
			<td><input type="text" name="costName" placeholder=""/></td>
		</tr>
		<tr>
			<td>费用金额</td>
			<td><input type="text" name="costAmount" placeholder=""/></td>
		</tr>
		</tbody>
	</table>
	</p>
</div>
<!--贷款信息-->
<!--<div id="carInfo" class="col8">-->
<!--    <p>-->
<!--    <table class="table table-bordered">-->
<!--		php-->
<!--		$resultn=mysql_fetch_row(mysql_query("SELECT * FROM car_procurement WHERE carOId=$plateId"));-->
<!--		if($resultn[12]=="贷款支付"){-->
<!--			$resultn=mysql_fetch_row(mysql_query("SELECT * FROM car_loan WHERE carOId=$plateId"));-->
<!--		}-->
<!--		?>-->
<!--        <tbody>-->
<!--        <tr>-->
<!--            <td>车辆按揭贷款</td>-->
<!--            <td></td>-->
<!--        </tr>-->
<!--        </tbody>-->
<!--        <tbody>-->
<!--        <tr>-->
<!--            <td colspan='3'>贷款还款详情</td>-->
<!--            <td><input placeholder='特种车'/></td>-->
<!--            <td>东风</td>-->
<!--            <td>川A-7021Q</td>-->
<!--            <td colspan='2'></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>应还款期</td>-->
<!--            <td colspan='2'>距最后还款</td>-->
<!--            <td>应还金额</td>-->
<!--            <td>还款状态</td>-->
<!--            <td>还款日期</td>-->
<!--            <td>还款方式</td>-->
<!--            <td>经办人</td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td><input type='text' name='l_loanPayDate' placeholder='2016.06.06'/></td>-->
<!--            <td><input type='text' name='l_isOverdue' placeholder='超期'/></td>-->
<!--            <td><input type='text' name='l_distancePay' placeholder='5天'/></td>-->
<!--            <td><input type='text' name='l_payAmount' placeholder='13525'/></td>-->
<!--            <td><input type='text' name='l_isPay' placeholder='未还款'/></td>-->
<!--            <td><input type='text' name='l_payDate' placeholder=''/></td>-->
<!--            <td><input type='text' name='l_payWay' placeholder=''/></td>-->
<!--            <td><input type='text' name='l_payPerson' placeholder=''/></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td><input type='text' name='l_loanPayDate1' placeholder='2016.05.06'/></td>-->
<!--            <td><input type='text' name='l_isOverdue1' placeholder='0'/></td>-->
<!--            <td><input type='text' name='l_distancePay1' placeholder='0天'/></td>-->
<!--            <td><input type='text' name='l_payAmount1' placeholder='13525'/></td>-->
<!--            <td><input type='text' name='l_isPay1' placeholder='已还款'/></td>-->
<!--            <td><input type='text' name='l_payDate1' placeholder='2016.05.06'/></td>-->
<!--            <td><input type='text' name='l_payWay1' placeholder='转账'/></td>-->
<!--            <td><input type='text' name='l_payPerson1' placeholder='刘敏'/></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td><input type="text" name="l_loanPayDate2" placeholder="2016.04.06"/></td>-->
<!--            <td><input type="text" name="l_isOverdue2" placeholder="0"/></td>-->
<!--            <td><input type="text" name="l_distancePay2" placeholder="0天"/></td>-->
<!--            <td><input type="text" name="l_payAmount2" placeholder="13525"/></td>-->
<!--            <td><input type="text" name="l_isPay2" placeholder="已还款"/></td>-->
<!--            <td><input type="text" name="l_payDate2" placeholder="2016.04.05"/></td>-->
<!--            <td><input type="text" name="l_payWay2" placeholder="转存"/></td>-->
<!--            <td><input type="text" name="l_payPerson2" placeholder="刘敏"/></td>-->
<!--        </tr>-->
<!--        </tbody>-->
<!---->
<!--    </table>-->
<!--    </p>-->
<!--</div>-->
<!--加装设备信息-->
<div id="homeInfo" class="col8">
	<p>
	<table class="table table-bordered">
		<tbody>
		<tr>
			<td>设备加装</td>
			<td><input placeholder="清障车"/></td>
			<td><input placeholder="东风"/></td>
			<td><input placeholder="川A-7021Q"/></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>加装种类</td>
			<td colspan="3"><input type="text" name="ae_equipmentType" placeholder="照明设备"/></td>
		</tr>
		<tr>
			<td>设备类别</td>
			<td colspan="3"><input type="text" name="ae_equipmentClass" placeholder="前大灯"/></td>
		</tr>
		<tr>
			<td>设备品牌</td>
			<td colspan="3"><input type="text" name="ae_equipmentBrand" placeholder="飞利浦"/></td>
		</tr>
		<tr>
			<td>设备编号</td>
			<td colspan="3"><input type="text" name="ae_equipmentNumber" placeholder="-"/></td>
		</tr>
		<tr>
			<td>设备来源</td>
			<td colspan="3"><input type="text" name="ae_equipmentSource" placeholder="单独购买"/></td>
		</tr>
		<tr>
			<td>加装位置</td>
			<td colspan="3"><input type="text" name="ae_addAddress" placeholder="左前大灯"/></td>
		</tr>
		<tr>
			<td>是否拆除</td>
			<td colspan="3"><input type="text" name="ae_isDemolition" placeholder="否"/></td>
		</tr>
		<tr>
			<td>申请人员</td>
			<td colspan="3"><input type="text" name="ae_applicant" placeholder="刘敏"/></td>
		</tr>
		<tr>
			<td>申请时间</td>
			<td colspan="3"><input type="text" name="ae_applicationDate" placeholder="2016.06.06"/></td>
		</tr>
		<tr>
			<td>主管部门</td>
			<td colspan="3"><input type="text" name="ae_department" placeholder=""/></td>
		</tr>
		<tr>
			<td>审核意见</td>
			<td colspan="3"><input type="text" name="ae_auditOpinion" placeholder=""/></td>
		</tr>
		<tr>
			<td>审核时间</td>
			<td colspan="3"><input type="text" name="ae_auditDate" placeholder=""/></td>
		</tr>
		<tr>
			<td>审核人员</td>
			<td colspan="3"><input type="text" name="ae_auditPerson" placeholder=""/></td>
		</tr>
		</tbody>
	</table>

	</p>
</div>
<!--被分配信息-->
<div id="propertyInfo" class="col8">
	<p>
	<table class="table table-bordered">
		<tbody>
		<tr>
			<td>员工任职</td>
			<td></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td><input type="text" name=""placeholder="钟敏"/></td>
			<td><input placeholder="511027198209096195"/></td>
		</tr>
		<tr>
			<td>任职公司</td>
			<td><input type="text" name="" placeholder="四川世纪风汽车救援服务有限公司"/></td>
		</tr>
		<tr>
			<td>任职部门</td>
			<td><input type="text" name="" placeholder="车队管理部"/></td>
		</tr>
		<tr>
			<td>任职职位</td>
			<td><input type="text" name="" placeholder="服务司机"/></td>
		</tr>
		<tr>
			<td>任职时间</td>
			<td><input type="text" name="" placeholder="2016.06.06"/></td>
		</tr>
		<tr>
			<td>员工ID</td>
			<td><input type="text" name="" placeholder="s20160400025"/></td>
		</tr>
		<tr>
			<td>人事专员</td>
			</td>
			<td><input type="text" name="" placeholder="何海霞"/></td>
		</tr>
		</tbody>

	</table>

	</p>
</div>

<!--加油记录-->
<div id="carCardInfo" class="col8">
	<p>
	<table class="table table-bordered">
		<tbody>
		<tr>
			<td>费用报销</td>
			<td></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>报销种类</td>
			<td><input type="text" name="cg_type" placeholder="燃油费"/></td>
		</tr>
		</tbody>
		<tfoot>
		<tr>
			<td>产生时间</td>
			<td><input type="text" name="cg_happenDate" placeholder="2016.06.06"/></td>
		</tr>
		<tr>
			<td>报销金额</td>
			<td><input type="text" name="cg_amount" placeholder="200"/></td>
		</tr>
		<tr>
			<td>燃油数量</td>
			<td><input type="text" name="cg_gasolineVolume" placeholder="65.2"/></td>
		</tr>
		<tr>
			<td>车辆里程</td>
			<td><input type="text" name="cg_mileage" placeholder="19878km"/></td>
		</tr>
		<tr>
			<td>关联车辆</td>
			<td><input type="text" name="" placeholder="川A-7081Q"></td>
		</tr>
		<tr>
			<td>报销人员</td>
			<td><input type="text" name="cg_submitPerson" placeholder="夏枝华"/></td>
		</tr>
		<tr>
			<td>报销时间</td>
			<td><input type="text" name="cg_submitDate" placeholder="2016.06.07"/></td>
		</tr>
		<tr>
			<td>审核人员</td>
			<td><input type="text" name="cg_auditPerson" placeholder="何海霞"/></td>
		</tr>
		<tr>
			<td>审核结果</td>
			<td><input type="text" name="cg_auditOpinion" placeholder="同意"/></td>
		</tr>
		<tr>
			<td>报销状态</td>
			<td><input type="text" name="cg_isReimbursement" placeholder="已支付"/></td>
		</tr>
		<tr>
			<td>支付方式</td>
			<td><input type="text" name="cg_payWay" placeholder="转账6222084402021533683"/></td>
		</tr>
		</tfoot>
	</table>
	</p>
</div>
<!--过路费记录-->
<div id="linkmanInfo" class="col8">
	<p>
	<table class="table table-bordered">
		<tbody>
		<tr>
			<td>费用报销</td>
			<td></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td><input type="text" name="" placeholder="钟敏"/></td>
			<td><input type="text" name="" placeholder="清障车"/></td>
			<td><input type="text" name="" placeholder="川A-7081Q"/></td>
		</tr>
		</tbody>
		<tfoot>
		<tr>
			<td>报销种类</td>
			<td colspan="2"><input type="text" name="ct_type" placeholder="过路费"/></td>
		</tr>
		<tr>
			<td>报销金额</td>
			<td colspan="2"><input type="text" name="ct_amount" placeholder="200"/></td>
		</tr>
		<tr>
			<td>产生时间</td>
			<td colspan="2"><input type="text" name="ct_happenDate" placeholder="2016.06.01"/></td>
		</tr>
		<tr>
			<td>产生地址</td>
			<td colspan="2"><input type="text" name="ct_happenAddress" placeholder="四川省雅安市"/></td>
		</tr>
		<tr>
			<td>关联合同</td>
			<td colspan="2"><input type="text" name="ct_contract" placeholder=""/></td>
		</tr>
		<tr>
			<td>报销人员</td>
			<td colspan="2"><input type="text" name="ct_submitPerson" placeholder="夏枝华"/></td>
		</tr>
		<tr>
			<td>报销时间</td>
			<td colspan="2"><input type="text" name="ct_submitDate"placeholder="2016.06.07"/></td>
		</tr>
		<tr>
			<td>审核人员</td>
			<td colspan="2"><input type="text" name="ct_auditPerson" placeholder="何海霞"/></td>
		</tr>
		<tr>
			<td>审核结果</td>
			<td colspan="2"><input type="text" name="ct_auditOpinion" placeholder="同意"></td>
		</tr>
		<tr>
			<td>报销状态</td>
			<td colspan="2"><input type="text" name="ct_isReimbursement" placeholder="已支付"/></td>
		</tr>
		<tr>
			<td>支付方式</td>
			<td colspan="2"><input type="text" name="ct_payWay" placeholder="转账6222084402021533683"/></td>
		</tr>
		</tfoot>
	</table>
	</p>
</div>
<!--停车费记录-->
<div id="stopInfo" class="col8">
	<p>
	<table class="table table-bordered">
		<tbody>
		<tr>
			<td>费用报销</td>
			<td></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>钟敏</td>
			<td>清障车</td>
			<td>川A-7081Q</td>
		</tr>
		</tbody>
		<tfoot>
		<tr>
			<td>报销种类</td>
			<td colspan="2"><input type="text" name="cp_type" placeholder="停车费"/></td>
		</tr>
		<tr>
			<td>报销金额</td>
			<td colspan="2"><input type="text" name="cp_amount" placeholder="5"/></td>
		</tr>
		<tr>
			<td>产生时间</td>
			<td colspan="2"><input type="text" name="cp_happenDate" placeholder="2016.06.01"/></td>
		</tr>
		<tr>
			<td>产生地址</td>
			<td colspan="2"><input type="text" name="cp_happenAddress" placeholder="四川省成都市"/></td>
		</tr>
		<tr>
			<td>关联合同</td>
			<td colspan="2"><input type="text" name="cp_contract" placeholder=""/></td>
		</tr>
		<tr>
			<td>报销人员</td>
			<td colspan="2"><input type="text" name="cp_submitPerson" placeholder="夏枝华"/></td>
		</tr>
		<tr>
			<td>报销时间</td>
			<td colspan="2"><input type="text" name="cp_submitDate" placeholder="20160.06.07"/></td>
		</tr>
		<tr>
			<td>审核人员</td>
			<td colspan="2"><input type="text" name="cp_auditPerson" placeholder="何海霞"/></td>
		</tr>
		<tr>
			<td>审核结果</td>
			<td colspan="2"><input type="text" name="cp_auditOpinion" placeholder="同意"/></td>
		</tr>
		<tr>
			<td>报销状态</td>
			<td colspan="2"><input type="text" name="cp_isReimbursement" placeholder="已支付"/></td>
		</tr>
		<tr>
			<td>支付方式</td>
			<td colspan="2"><input type="text" name="cp_payWay" placeholder="转账6222084402021533683"/></td>
		</tr>
		</tfoot>
	</table>
	</p>
</div>
<!--车辆违章信息-->
<div id="badInfo" class="col8">
	<p>
	<table class="table table-bordered">
		<tbody>
		<tr>
			<td>车辆违章信息</td>
			<td></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>钟敏</td>
			<td>清障车</td>
		</tr>
		</tbody>
		<tfoot>
		<tr>
			<td>违法时间</td>
			<td><input type="text" name="v_date" placeholder=""/></td>
		</tr>
		<tr>
			<td>违法内容</td>
			<td><input type="text" name="v_content" placeholder=""/></td>
		</tr>
		<tr>
			<td>违法地点</td>
			<td><input type="text" name="v_address" placeholder=""/></td>
		</tr>
		<tr>
			<td>罚款</td>
			<td><input type="text" name="v_fines" placeholder=""/></td>
		</tr>
		<tr>
			<td>扣分</td>
			<td><input type="text" name="v_deductFraction" placeholder=""/></td>
		</tr>
		<tr>
			<td>驾驶员</td>
			<td><input type="text" name="v_driver" placeholder=""/></td>
		</tr>
		<tr>
			<td>违章状态</td>
			<td><input type="text" name="v_state" placeholder=""/></td>
		</tr>
		<tr>
			<td>处理经办</td>
			<td><input type="text" name="v_processOrganization" placeholder=""/></td>
		</tr>
		<tr>
			<td>经办人员</td>
			<td><input type="text" name="v_processPerson" placeholder=""/></td>
		</tr>
		<tr>
			<td>代办收费</td>
			<td><input type="text" name="v_processCharge" placeholder=""/></td>
		</tr>
		<tr>
			<td>收费合计</td>
			<td><input type="text" name="v_totalCharge" placeholder=""/></td>
		</tr>
		<tr>
			<td>费用承担</td>
			<td><input type="text" name="v_costUndertake" placeholder=""/></td>
		</tr>
		</tfoot>
	</table>
	</p>
</div>
<!--维修记录-->
<!--保养记录-->
<div id="fitInfo" class="col8">
	<p>
	<table class="table table-bordered">
		<tbody>
		<tr>
			<td>车辆保养信息</td>
			<td></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>保养时间</td>
			<td><input type="text" name="m_date" placeholder=""/></td>
		</tr>
		</tbody>
		<tfoot>
		<tr>
			<td>保养里程</td>
			<td><input type="text" name="m_mileage" placeholder=""/></td>
		</tr>
		<tr>
			<td>保养金额</td>
			<td><input type="text" name="m_amount" placeholder=""/></td>
		</tr>
		<tr>
			<td>保养地址</td>
			<td><input type="text" name="m_address" placeholder=""/></td>
		</tr>
		<tr>
			<td>保养服务商</td>
			<td><input type="text" name="m_provider" placeholder=""/></td>
		</tr>
		<tr>
			<td>送保人员</td>
			<td><input type="text" name="m_person" placeholder=""/></td>
		</tr>
		<tr>
			<td>保养清单</td>
			<td><input type="text" name="m_listing" placeholder=""/></td>
		</tr>
		<tr>
			<td>结算方式</td>
			<td><input type="text" name="m_payWay" placeholder=""/></td>
		</tr>
		</tfoot>
	</table>
	</p>
</div>
<!--洗车记录-->
<div id="washInfo" class="col8">
	<p>
	<table class="table table-bordered">
		<tbody>
		<tr>
			<td>车辆美容信息</td>
			<td></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>美容时间</td>
			<td><input type="text" name="b_date" placeholder=""/></td>
		</tr>
		</tbody>
		<tfoot>
		<tr>
			<td>美容类别</td>
			<td><input type="text" name="b_type" placeholder=""/></td>
		</tr>
		<tr>
			<td>美容金额</td>
			<td><input type="text" name="b_amount" placeholder=""/></td>
		</tr>
		<tr>
			<td>服务商</td>
			<td><input type="text" name="b_provider" placeholder=""/></td>
		</tr>
		<tr>
			<td>驾驶员</td>
			<td><input type="text" name="b_driver" placeholder=""/></td>
		</tr>

		</tfoot>
	</table>
	</p>
</div>
<!--事故记录-->
<!--年检记录-->
<div id="yearInfo" class="col8">
	<p>
	<table class="table table-bordered">
		<tbody>
		<tr>
			<td>车辆年检信息</td>
			<td></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>年检时间</td>
			<td><input type="text" name="ai_date" placeholder=""/></td>
		</tr>
		</tbody>
		<tfoot>
		<tr>
			<td>年检周期</td>
			<td><input type="text" name="ai_cycle" placeholder=""/></td>
		</tr>
		<tr>
			<td>检测费</td>
			<td><input type="text" name="ai_testAmount" placeholder=""/></td>
		</tr>
		<tr>
			<td>五路一桥通行费</td>
			<td><input type="text" name="ai_passageAmount" placeholder=""/></td>
		</tr>
		<tr>
			<td>下次年检时间</td>
			<td><input type="text" name="ai_nextDate" placeholder=""/></td>
		</tr>
		<tr>
			<td>年检人员</td>
			<td><input type="text" name="ai_person" placeholder=""/></td>
		</tr>

		</tfoot>
	</table>
	</p>
</div>
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
	/*
	 页面数据初始化
	 * */
	function initView() {
		//数组employee_data进行数据存储
		var employee_data = {
			id: "20160001",
			name: "钟敏",
			office: "总经理",
			identyNum: "510XXXXXXXXXXXXXXXXXXXXXX"
		}
		//页面内数据改变
		document.getElementById("employee_Id").innerHTML = employee_data.id;
		document.getElementById("employee_name").innerHTML = employee_data.name;
		document.getElementById("employee_office").innerHTML = employee_data.office;
	}
	/*
	 * 车主类型选择
	 * */
	function carOwner(obj) {
		var opt = obj.options[obj.selectedIndex];

		if (opt.value == 1) {
//					alert(opt.value);
			var temp = '<div id="sf"><table class="table table-bordered">';
			temp += '<tbody><tr><td>车主信息</td>';
			temp += '<td><select name="select" id="select" onchange="carOwner(this);">';
			temp += '<option value="1">个人车主</option>';
			temp += '<option value="2">单位车主</option>';
			temp +='</select></td></tbody><tbody>';
			temp += '<tr><td>姓名</td><td><input name="op_name" placeholder=""/></td></tr>';
			temp += '<tr><td>联系电话</td><td><input name="op_phone" placeholder=""/></td></tr>';
			temp += '<tr><td>性别</td><td><input name="op_sex" placeholder=""/></td></tr>';
			temp += '<tr><td>民族</td><td><input name="op_nation" placeholder=""/></td></tr>';
			temp += '<tr><td>出生</td><td><input name="op_birthday" placeholder=""/></td></tr>';
			temp += '<tr><td>住址</td><td><input name="op_address" placeholder=""/></td></tr>';
			temp += '<tr><td>公民身份证号码</td><td><input name="op_number" placeholder=""/></td></tr>';
			temp += '<tr><td>签发机关</td><td><input name="op_organization" placeholder=""/></td></tr>';
			temp += '<tr><td>有限期限</td><td><input name="op_usefulDate" placeholder=""/></td></tr></tbody></table></div>';
		} else {
//					alert(opt.value+"io");
			var temp = '<div id="sf"><table class="table table-bordered">';
			temp += '<tbody><tr><td>执照信息</td>';
			temp += '<td><select name="select" id="select" onchange="carOwner(this);">';
			temp += '<option value="2">单位车主</option>';
			temp+='<option value="1">个人车主</option>';
			temp += '</select></td></tbody><tbody>';
			temp += '<tr><td>统一社会信用代码</td><td><input name="ou_socialCreditCode" placeholder="91510100054946627W"/></td></tr>';
			temp += '<tr><td>名称</td><td><input name="ou_name" placeholder="四川世纪风汽车救援服务有限公司W"/></td></tr>';
			temp += '<tr><td>类型</td><td><input name="ou_type" placeholder="有限责任公司（自然人投资或控股）"/></td></tr>';
			temp += '<tr><td>住所</td><td><input name="ou_address" placeholder="成都市武侯区顺和街1号附57号1幢2楼3号"/></td></tr>';
			temp += '<tr><td>法定代表人</td><td><input name="ou_legalRepresentative" placeholder="钟敏"/></td></tr>';
			temp += '<tr><td>联系电话</td><td><input name="ou_phone" placeholder="17748511987"/></td></tr>';
			temp += '<tr><td>注册资本</td><td><input name="ou_registeredCapital" placeholder="（人民币）贰佰万元"/></td></tr>';
			temp += '<tr><td>成立日期</td><td><input name="ou_setUpDate" placeholder="2012/11/9"/></td></tr>';
			temp += '<tr><td>营业期限</td><td><input name="ou_businessUsefulDate" placeholder="至永久"/></td></tr>';
			temp += '<tr><td>经营范围</td><td><input name="ou_businessScope" placeholder=""/></td></tr>';
			temp += '<tr><td>登记机关</td><td><input name="ou_organization" placeholder="成都市工商行政管理局"/></td></tr>';
			temp += '<tr><td>发证日期</td><td><input name="ou_releaseDate" placeholder="2016/5/4"/></td></tr></tbody></table></div>';
		}
		//改变main_content的内容
		changeinfo(temp);
	}

	/*utils*/
	function changeinfo(temp) {
		removeElement("sf");
		var oTest = document.getElementById('mineSourceInfo');
		var newNode = document.createElement("p");
		if (ppi == 0) {
			newNode.innerHTML = temp;
		} else {
			removeElement(pp);
			newNode.innerHTML = temp;
		}
		ppi++;
		oTest.appendChild(newNode);
	}
	//删除某ID元素
	function removeElement(id) {
		obj = document.getElementById(id);
		obj.parentNode.removeChild(obj);
		ppi = 0;
	}
	function showModel(){
		if(document.getElementById("checkone").checked){
			document.getElementById("mineInfo").style.display="block";
		}else{
			document.getElementById("mineInfo").style.display="none";
		}
		if(document.getElementById("checktwo").checked){
			document.getElementById("mineSourceInfo").style.display="block";
		}else{
			document.getElementById("mineSourceInfo").style.display="none";
		}
		if(document.getElementById("checkthree").checked){
			document.getElementById("identityInfo").style.display="block";
		}else{
			document.getElementById("identityInfo").style.display="none";
		}
		if(document.getElementById("checkfour").checked){
			document.getElementById("contactInfo").style.display="block";
		}else{
			document.getElementById("contactInfo").style.display="none";
		}
		if(document.getElementById("checkfive").checked){
			document.getElementById("officeInfo").style.display="block";
		}else{
			document.getElementById("officeInfo").style.display="none";
		}
		if(document.getElementById("checksix").checked){
			document.getElementById("carInfo").style.display="block";
		}else{
			document.getElementById("carInfo").style.display="none";
		}
		if(document.getElementById("checkseven").checked){
			document.getElementById("homeInfo").style.display="block";
		}else{
			document.getElementById("homeInfo").style.display="none";
		}
		if(document.getElementById("checkeight").checked){
			document.getElementById("propertyInfo").style.display="block";
		}else{
			document.getElementById("propertyInfo").style.display="none";
		}

	}

</script>

</body>
</html>
