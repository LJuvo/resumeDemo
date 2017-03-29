<?php
session_start();
if (empty($_SESSION['userName'])) {
	$url = "../UserManger/login.php";
	echo '<script language=javascript>window.location.href="' . $url . '"</script>';
}

if ($_GET["commId"]) {
	$plateId = $_GET["commId"];
	$commentKey = substr($plateId, 0, 1);
}

include "../Common/localSQLSettings.php";

localSettings();
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
	<style>
		.col3 input {
			width: auto;
		}
		table tr td{
			white-space:nowrap;
			font-size: x-small;
		}
		.cshow{

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
		<!--content-->

			<div class="col2">
				<div class="sidebar">
					<ul>
						<li class="selected"><a>基本信息</a></li>
						<li id="caigou"><a>采购信息</a></li>
						<li id="chezhu"><a>车主信息</a></li>
						<li id="baoxian"><a>保险信息</a></li>
						<li id="zhuce"><a>注册信息</a></li>
						<li id="daikuan"><a>贷款信息</a></li>
						<li id="addinfo"><a>加装设备信息</a></li>
						<li id="beifenpei"><a>被分配信息</a></li>
						<li id="shiyong"><a>使用记录</a></li>
						<li id="yunying"><a>运营记录</a></li>
						<li id="weizhang"><a>违章罚款记录</a></li>
						<li id="jiayou"><a>加油记录</a></li>
						<li id="guolu"><a>过路费记录</a></li>
						<li id="tingche"><a>停车费记录</a></li>
						<li id="weixiu"><a>维修记录</a></li>
						<li id="baoyang"><a>保养记录</a></li>
						<li id="xiche"><a>洗车记录</a></li>
						<li id="shigu"><a>事故记录</a></li>
						<li id="nianjian"><a>年检记录</a></li>
						<li id="jiaoyi"><a>交易记录</a></li>
						<li id="shiyonren"><a>使用人关联</a></li>
					</ul>
				</div>
			</div>
			<div class="col9 docs-body">
				<!--车辆信息-->
				<div id="basicInfo" class="col9">
					<table class="table table-bordered">
						<tbody>
						<tr>
							<td>基本信息</td>
							<td></td>
						</tr>
						</tbody>
						<?php
						if($commentKey=="K"){
							$query="SELECT * FROM car_customer WHERE carCompanyNum='$plateId'";
							$result=mysql_fetch_row(mysql_query($query));
							if($result!=null){
								$recc=mysql_fetch_row(mysql_query("SELECT * FROM car_customer_idcard WHERE carCompanyNum='$plateId'"));
								echo"<tbody><tr>
							<td>车主名称</td><td>$recc[2]</td>
							<td>车主类型</td><td>个人车主</td></tr><tr>
							<td>联系电话</td><td>$recc[10]</td>
							<td>车辆类型</td><td>$result[2]</td></tr><tr>
							<td>品牌</td><td>$result[3]</td>
							<td>车牌号</td><td>$result[5]</td></tr></tbody>";
							}
						}
						if($commentKey=="C"){
							$query="SELECT * FROM car_procurement WHERE carOId='$plateId'";
							$result=mysql_fetch_row(mysql_query($query));
							if($result!=null){
								echo"<tbody><tr>
							<td>车主名称</td><td>单位</td>
							<td>车主类型</td><td>单位车主</td></tr><tr>
							<td>联系电话</td><td>$result[10]</td>
							<td>车辆类型</td><td>$result[5]</td></tr><tr>
							<td>品牌</td><td>$result[6]</td>
							<td>车牌号</td><td>$result[3]</td></tr></tbody>";
							}
						}
						?>

					</table>
				</div>
				<!--车辆采购信息-->
				<div id="caigouInfo" class="col9 cshow">
					<p>
					<table class="table table-bordered">
						<?php
							$result_caigou=mysql_fetch_row(mysql_query("SELECT * FROM car_procurement WHERE carOId='$plateId'"));
							if($result_caigou!=null){
							echo"<tbody><tr>
							<td>车辆采购</td><td></td></tr></tbody><tbody><tr>
							<td>车辆种类</td><td>$result_caigou[4]</td>
							<td>车辆品牌</td><td>$result_caigou[6]</td></tr><tr>
							<td>车辆型号</td><td>$result_caigou[5]</td>
							<td>车辆编号</td><td>$result_caigou[1]</td></tr><tr>
							<td>销售单位</td><td>$result_caigou[8]</td>
							<td>销售人员</td><td>$result_caigou[9]</td></tr><tr>
							<td>联系电话</td><td>$result_caigou[10]</td>
							<td>厂商指导价</td><td>$result_caigou[11]</td></tr><tr>
							<td>采购价格</td><td>$result_caigou[12]</td>
							<td>购买方式</td><td>$result_caigou[13]</td></tr><tr>
							<td>采购人员</td><td>$result_caigou[14]</td>
							<td>财务审核人</td><td>$result_caigou[18]</td></tr><tr>
							<td>审核意见</td><td>$result_caigou[19]</td>
							<td>审核时间</td><td>$result_caigou[20]</td></tr><tr>
							<td>经理审核人</td><td>$result_caigou[21]</td>
							<td>审核意见</td><td>$result_caigou[22]</td></tr><tr>
							<td>审核时间</td><td>$result_caigou[23]</td><td></td><td></td></tr></tbody>";
							}else{
								echo"";
							}

						?>
					</table>
					</p>
				</div>
				<!--个人车主信息-->
				<div id="chezhuInfo" class="col9 cshow">
					<div id="sf">
						<p>
						<table class="table table-bordered">
							<?php

							if($commentKey=="K"){
								$sqlname="car_customer_idcard";
								$result_chezhu=mysql_fetch_row(mysql_query("SELECT * FROM car_customer_idcard WHERE carCompanyNum='$plateId'"));
								if($result_chezhu[0]!=null){
									echo"<tbody><tr><td>车主信息</td><td></td></tr></tbody><tbody><tr>
								<td>姓名</td><td>$result_chezhu[2]</td>
								<td>性别</td><td>$result_chezhu[3]</td></tr><tr>
								<td>民族</td><td>$result_chezhu[4]</td>
								<td>出生</td><td>$result_chezhu[5]</td></tr><tr>
								<td>住址</td><td>$result_chezhu[6]</td>
								<td>公民身份证号码</td><td>$result_chezhu[7]</td></tr><tr>
								<td>签发机关</td><td>$result_chezhu[8]</td>
								<td>有限期限</td><td>$result_chezhu[9]</td></tr><tr>
								<td>联系电话</td><td colspan='3'>$result_chezhu[10]</td></tr></tbody>";
								}else{
									echo"<form action='addInfo.php?commId=$plateId&sql=$sqlname' method='post'>
								<tbody><tr><td>车主信息</td><td></td></tr></tbody><tbody><tr>
								<td>姓名</td><td><input name='carName'/></td>
								<td>性别</td><td><input name='carSex'/></td></tr><tr>
								<td>民族</td><td><input name='carNation'/></td>
								<td>出生</td><td><input name='carBirthday'/></td></tr><tr>
								<td>住址</td><td><input name='carAddress'/></td>
								<td>公民身份证号码</td><td><input name='carNum'></td></tr><tr>
								<td>签发机关</td><td><input name='carOrganization'/></td>
								<td>有限期限</td><td><input name='carUsefulDate'/></td></tr><tr>
								<td>联系电话</td><td colspan='3'><input name='carPhone'/></td></tr>
								<tr><td colspan='4'><input type='submit' class='btn bg-blue bg-inverse'></td>
								</tr></tbody></form>";
								}
							}
							if($commentKey=="C"){
								$sqlname="car_owner_unit";
								$result_chezhuC=mysql_fetch_row(mysql_query("SELECT * FROM car_owner_unit WHERE carCompanyNum='$plateId'"));
								if($result_chezhuC[0]!=null){
									echo"<tbody><tr><td>车主信息</td><td></td></tr></tbody><tbody><tr>
							<td>统一社会信用代码</td><td>$result_chezhuC[2]</td></tr><tr>
							<td>名称</td><td>$result_chezhuC[3]</td></tr><tr>
							<td>类型</td><td>$result_chezhuC[4]</td></tr><tr>
							<td>住所</td><td>$result_chezhuC[5]</td></tr><tr>
							<td>法定代表人</td><td>$result_chezhuC[6]</td></tr><tr>
							<td>注册资本</td><td>（人民币）$result_chezhuC[7]</td></tr><tr>
							<td>成立日期</td><td>$result_chezhuC[8]</td></tr><tr>
							<td>营业期限</td><td>$result_chezhuC[9]</td></tr><tr>
							<td>经营范围</td><td>$result_chezhuC[10]</td></tr><tr>
							<td>登记机关</td><td>$result_chezhuC[11]</td></tr><tr>
							<td>发证日期</td><td>$result_chezhuC[12]</td></tr><tr>
							<td>联系电话</td><td>$result_chezhuC[13]</td></tr></tbody>";
								}else{
									echo"<form action='addInfo.php?commId=$plateId&sql=$sqlname' method='post'>
								<tbody><tr><td>车主信息</td><td></td></tr></tbody><tbody><tr>
							<td>统一社会信用代码</td><td><input name='czSCode'/></td></tr><tr>
							<td>名称</td><td><input name='czName'/></td></tr><tr>
							<td>类型</td><td><input name='czType'/></td></tr><tr>
							<td>住所</td><td><input name='czAddress'/></td></tr><tr>
							<td>法定代表人</td><td><input name='czRepresent'/></td></tr><tr>
							<td>注册资本</td><td><input name='czReCapital'/></td></tr><tr>
							<td>成立日期</td><td><input name='czUpDate'/></td></tr><tr>
							<td>营业期限</td><td><input name='czUsefulDate'/></td></tr><tr>
							<td>经营范围</td><td><input name='czScope'/></td></tr><tr>
							<td>登记机关</td><td><input name='czOrganization'/></td></tr><tr>
							<td>发证日期</td><td><input name='czReleaseDate'/></td></tr><tr>
							<td>联系电话</td><td><input name='czPhone'/></td></tr>
								<tr><td colspan='4'><input type='submit' class='btn bg-blue bg-inverse'></td>
								</tr></tbody></form>";
								}
							}
							?>


						</table>
						</p>
					</div>
				</div>
				<!--保险信息-->
				<div id="baoxianInfo" class="col9 cshow">
					<p>
					<table class="table table-bordered">
						<?php
						$sqlname="car_insurance";
						$result_baoxian=mysql_fetch_row(mysql_query("SELECT * FROM car_insurance WHERE carCompanyNum='$plateId'"));
						if($result_baoxian[0]!=null){
							echo"<tbody><tr>
							<td>车辆交通强制保险信息</td><td></td></tr><tr>
							<td>险种名称</td><td>$result_baoxian[2]</td>
							<td>承保公司</td><td>$result_baoxian[3]</td></tr><tr>
							<td>保单号</td><td>$result_baoxian[4]</td>
							<td>保险金额</td><td>$result_baoxian[5]</td></tr><tr>
							<td>车船税金额</td><td>$result_baoxian[6]</td>
							<td>有效期</td><td>$result_baoxian[7]</td></tr></tbody>";
						}else{
							echo"<form action='addInfo.php?commId=$plateId&sql=$sqlname' method='post'>
							<tbody><tr>
							<td>车辆交通强制保险信息</td><td></td></tr><tr>
							<td>险种名称</td><td><input name='bxName'/></td>
							<td>承保公司</td><td><input name='bxCompany'/></td></tr><tr>
							<td>保单号</td><td><input name='bxNumber'/></td>
							<td>保险金额</td><td><input name='bxAmount'/></td></tr><tr>
							<td>车船税金额</td><td><input name='bxTax'/></td>
							<td>有效期</td><td><input name='bxUsefulDate'/></td></tr>
							<tr><td colspan='4'><input type='submit' class='btn bg-blue bg-inverse'></td>
							</tr></tbody></form>";
						}
						?>

					</table>

					</p>
				</div>
				<!--注册信息-->
				<div id="zhuceInfo" class="col9 cshow">
					<p>
					<table class="table table-bordered">
						<?php
						$sqlname="car_regist";
						$result_zhuce=mysql_fetch_row(mysql_query("SELECT * FROM car_regist WHERE carCompanyNum='$plateId'"));
						if($result_zhuce[0]!=null){
							echo"<tbody><tr><td>车辆注册信息</td><td></td></tr><tr>
							<td>注册种类</td><td>$result_zhuce[2]</td>
							<td>车牌号</td><td>$result_zhuce[3]</td></tr><tr>
							<td>所有人</td><td>$result_zhuce[4]</td>
							<td>住址</td><td>$result_zhuce[5]</td></tr><tr>
							<td>发证机关</td><td>$result_zhuce[6]</td>
							<td>注册日期</td><td>$result_zhuce[7]</td></tr><tr>
							<td>年检有效期至</td><td>$result_zhuce[8]</td>
							<td>办理单位</td><td>$result_zhuce[9]</td></tr><tr>
							<td>办理人员</td><td>$result_zhuce[10]</td>
							<td>费用名称</td><td>$result_zhuce[11]</td></tr><tr>
							<td>费用金额</td><td colspan='3'>$result_zhuce[12]</td></tr></tbody>";
						}else{
							echo"<form action='addInfo.php?commId=$plateId&sql=$sqlname' method='post'>
							<tbody><tr><td>车辆注册信息</td><td></td></tr><tr>
							<td>注册种类</td><td><input name='zcType'/></td>
							<td>车牌号</td><td><input name='zcPlateNumber'/></td></tr><tr>
							<td>所有人</td><td><input name='zcOwner'/></td>
							<td>住址</td><td><input name='zcAddress'/></td></tr><tr>
							<td>发证机关</td><td><input name='zcOrganization'/></td>
							<td>注册日期</td><td><input name='zcReDate'/></td></tr><tr>
							<td>年检有效期至</td><td><input name='zcUsefulDate'/></td>
							<td>办理单位</td><td><input name='zcReUnit'/></td></tr><tr>
							<td>办理人员</td><td><input name='zcRePerson'/></td>
							<td>费用名称</td><td><input name='zcCostName'/></td></tr><tr>
							<td>费用金额</td><td colspan='3'><input name='zcCostAmount'/></td></tr>
							<tr><td colspan='4'><input type='submit' class='btn bg-blue bg-inverse'></td>
							</tr></tbody></form>";
						}
						?>

					</table>
					</p>
				</div>
				<!--贷款信息-->
				<div id="daikuanInfo" class="col9 cshow">
					<p>
					<table class="table table-bordered">
						<tbody>
						<tr>
							<td>车辆按揭贷款</td>
							<td></td>
						</tr>
						</tbody>
						<tbody>
						<tr>
							<td colspan="6">贷款还款详情</td>
							<td colspan="2"></td>
						</tr>
						<tr>
							<td>应还款期</td>
							<td>距最后还款</td>
							<td>应还金额</td>
							<td>还款状态</td>
							<td>还款日期</td>
							<td>还款方式</td>
							<td>经办人</td>
						</tr>
						</tbody>
						<?php
						$sqlname="car_loan";
						$result_loan=mysql_fetch_row(mysql_query("SELECT * FROM car_loan WHERE carCompanyNum='$plateId'"));
						if($result_loan[0]!=null){
							echo"<tbody><tr>
							<td>应还款期</td>
							<td>距最后还款</td>
							<td>应还金额</td>
							<td>还款状态</td>
							<td>还款日期</td>
							<td>还款方式</td>
							<td>经办人</td></tr></tbody>";
						}
							echo"<form action='addInfo.php?commId=$plateId&sql=$sqlname' method='post'>
							<tbody><tr>
							<td><input name='dkLoanDate'/></td>
							<td><input name='dkOverdue'/></td>
							<td><input name='dkPayAmount'/></td>
							<td><input name='dkIsPay'/></td>
							<td><input name='dkPayDay'/></td>
							<td><input name='dkPayWay'/></td>
							<td><input name='dkPayPerson'/></td></tr>
							<tr><td colspan='7'><input type='submit' class='btn bg-blue bg-inverse' value='添加'></td>
							</tr></tbody></form>";

						?>
					</table>
					</p>
				</div>
				<!--加装设备信息-->
				<div id="addInfo" class="col9 cshow">
					<p>
					<table class="table table-bordered">
						<?php
						$sqlname="car_addequipment";
						$res_loan=mysql_query("SELECT * FROM car_addequipment WHERE carCompanyNum='$plateId'");
						if($res_loan!=null){
							$num_loan=mysql_num_rows($res_loan);
							for($k=0;$k<$num_loan;$k++){
								$result_loan=mysql_fetch_row($res_loan);
								echo"<tbody<tr><td>设备加装</td><td colspan='3'></td></tr></tbody><tbody><tr>
							<td>加装种类</td><td>$result_loan[2]</td>
							<td>加装类别</td><td>$result_loan[3]</td></tr><tr>
							<td>设备品牌</td><td>$result_loan[4]</td>
							<td>设备编号</td><td>$result_loan[5]</td></tr><tr>
							<td>设备来源</td><td>$result_loan[6]</td>
							<td>加装位置</td><td>$result_loan[7]</td></tr><tr>
							<td>是否拆除</td><td>$result_loan[8]</td>
							<td>申请人员</td><td>$result_loan[9]</td></tr><tr>
							<td>申请时间</td><td>$result_loan[10]</td>
							<td>主管部门</td><td>$result_loan[11]</td></tr><tr>
							<td>审核意见</td><td>$result_loan[12]</td>
							<td>审核时间</td><td>$result_loan[13]</td></tr><tr>
							<td>审核人员</td><td colspan='3'>$result_loan[13]</td></tr><tr><td colspan='4'></td></tr></tbody>";
							}
						}
							echo"<form action='addInfo.php?commId=$plateId&sql=$sqlname' method='post'>
							<tbody<tr><td>设备加装</td><td colspan='3'></td></tr></tbody><tbody><tr>
							<td>加装种类</td><td><input name='equipType'/></td>
							<td>加装类别</td><td><input name='equipClass'/></td></tr><tr>
							<td>设备品牌</td><td><input name='equipBrand'/></td>
							<td>设备编号</td><td><input name='equipNum'/></td></tr><tr>
							<td>设备来源</td><td><input name='equipSource'/></td>
							<td>加装位置</td><td><input name='equipAddress'/></td></tr><tr>
							<td>是否拆除</td><td><input name='equipIsDemoli'/></td>
							<td>申请人员</td><td><input name='equipApplicant'/></td></tr><tr>
							<td>申请时间</td><td><input name='equipAppDate'/></td>
							<td>主管部门</td><td><input name='equipDepart'/></td></tr><tr>
							<td>审核意见</td><td><input name='equipOpinion'/></td>
							<td>审核时间</td><td><input name='equipDate'/></td></tr><tr>
							<td>审核人员</td><td colspan='3'><input name='equipPerson'/></td></tr>
							<tr><td colspan='7'><input type='submit' class='btn bg-blue bg-inverse' value='添加'></td>
							</tr></tbody></form>";

						?>

					</table>

					</p>
				</div>
				<!--被分配信息-->
				<div id="beifenpeiInfo" class="col9 cshow">
					<p>
					<table class="table table-bordered">
						<?php
						$sqlname="car_assigned";
						$result_assigned=mysql_fetch_row(mysql_query("SELECT * FROM car_assigned WHERE carCompanyNum='$plateId'"));
						if($result_assigned[0]!=null){
							//查询员工表中数据
							echo"<tbody><tr><td>员工任职</td><td></td></tr><tr>
							<td>钟敏</td><td>511027198209096195</td>
							<td>任职公司</td><td>四川世纪风汽车救援服务有限公司</td></tr><tr>
							<td>任职部门</td><td>车队管理部</td>
							<td>任职职位</td><td>服务司机</td></tr><tr>
							<td>任职时间</td><td>2016.06.06</td>
							<td>员工ID</td><td>$result_assigned[2]</td></tr><tr>
							<td>人事专员</td><td>何海霞</td></tr></tbody>";
						}else{
							echo"<form action='addInfo.php?commId=$plateId&sql=$sqlname' method='post'>
							<tbody><tr><td>员工任职</td><td></td></tr><tr>
							<td>钟敏</td><td>511027198209096195</td>
							<td>任职公司</td><td>四川世纪风汽车救援服务有限公司</td></tr><tr>
							<td>任职部门</td><td>车队管理部</td>
							<td>任职职位</td><td>服务司机</td></tr><tr>
							<td>任职时间</td><td>2016.06.06</td>
							<td>员工ID</td><td>s20160400025</td></tr><tr>
							<td>人事专员</td><td>何海霞</td></tr>
							<tr><td colspan='7'><input type='submit' class='btn bg-blue bg-inverse' value='添加'></td>
							</tr></tbody></form>";
						}
						?>

					</table>

					</p>
				</div>
				<!--车辆违章信息-->
				<div id="weizhangInfo" class="col9 cshow">
					<p>
					<table class="table table-bordered">
						<tbody><tr><td colspan="12">车辆违章信息</td></tr></tbody>
						<tbody><tr>
							<td>违章时间</td>
							<td>违章内容</td>
							<td>违章地点</td>
							<td>罚款</td>
							<td>扣分</td>
							<td>驾驶员</td>
							<td>违章状态</td>
							<td>处理经办</td>
							<td>经办人员</td>
							<td>代办收费</td>
							<td>收费合计</td>
							<td>费用承担</td></tr></tbody>
						<?php
						$sqlname="car_violations";
						$res_assigned=mysql_query("SELECT * FROM car_violations WHERE carCompanyNum='$plateId'");
						if($res_assigned!=null){
							$num_assigned=mysql_num_rows($res_assigned);
							for($k=0;$k<$num_assigned;$k++){
								$result_assigned=mysql_fetch_row($res_assigned);
								echo"<tbody><tr>
							<td>$result_assigned[2]</td>
							<td>$result_assigned[3]</td>
							<td>$result_assigned[4]</td>
							<td>$result_assigned[5]</td>
							<td>$result_assigned[6]</td>
							<td>$result_assigned[7]</td>
							<td>$result_assigned[8]</td>
							<td>$result_assigned[9]</td>
							<td>$result_assigned[10]</td>
							<td>$result_assigned[11]</td>
							<td>$result_assigned[12]</td>
							<td>$result_assigned[13]</td></tr></tbody>";
							}
						}
							echo"<form action='addInfo.php?commId=$plateId&sql=$sqlname' method='post'>
							<tbody><tr>
							<td><input name='violaTime'/></td>
							<td><input name='violaInfo'/></td>
							<td><input name='violaPlace'/></td>
							<td><input name='violaFines'/></td>
							<td><input name='violaDeduct'/></td>
							<td><input name='violaDriver'/></td>
							<td><input name='violaState'/></td>
							<td><input name='violaOrgan'/></td>
							<td><input name='violaPerson'/></td>
							<td><input name='violaProChar'/></td>
							<td><input name='violaTotalChar'/></td>
							<td><input name='violaCost'/></td</tr>
							<tr><td colspan='12'><input type='submit' class='btn bg-blue bg-inverse' value='添加'></td>
							</tr></tbody></form>";

						?>

					</table>
					</p>
				</div>
				<!--加油记录-->
				<div id="jiayouInfo" class="col9 cshow">
					<p>
					<table class="table table-bordered">
						<tbody>
						<tr>
							<td>加油记录</td>
							<td colspan="12"></td>
						</tr>
						</tbody>
						<tbody>
						<tr>
							<td>费用种类</td>
							<td>产生时间</td>
							<td>报销金额</td>
							<td>燃油数量</td>
							<td>车辆里程</td>
							<td>关联车辆</td>
							<td>报销人员</td>
							<td>报销时间</td>
							<td>审核人员</td>
							<td>审核结果</td>
							<td>支付方式</td>
						</tr>
						</tbody>
						<?php
						$sqlname="car_cost_tolls";
						$res_rtolls=mysql_query("SELECT * FROM car_cost_tolls WHERE carCompanyNum='$plateId' AND tolls_type='燃油费'");
						if($res_rtolls!=null){
							$num_rtolls=mysql_num_rows($res_rtolls);
							for($k=0;$k<$num_rtolls;$k++){
								$result_rtolls=mysql_fetch_row($res_rtolls);
								echo"<tbody>
						<tr>
							<td>燃油费</td>
							<td>$result_rtolls[4]</td>
							<td>$result_rtolls[3]</td>
							<td>$result_rtolls[5]</td>
							<td>$result_rtolls[6]</td>
							<td>$result_rtolls[7]</td>
							<td>$result_rtolls[10]</td>
							<td>$result_rtolls[11]</td>
							<td>$result_rtolls[12]</td>
							<td>$result_rtolls[13]</td>
							<td>$result_rtolls[15]</td>
						</tr>
						</tbody>";
							}
						}
						echo"<form action='addInfo.php?commId=$plateId&sql=$sqlname&type=燃油费' method='post'>
							<tbody>
						<tr>
							<td>燃油费</td>
							<td><input name='happenDate'/></td>
							<td><input name='tolls_amount'/></td>
							<td><input name='oilNum'/></td>
							<td><input name='carCourse'/></td>
							<td><input name='withcar'/></td>
							<td><input name='submitPerson'/></td>
							<td><input name='submitDate'/></td>
							<td><input name='auditPerson'/></td>
							<td><input name='auditOpinion'/></td>
							<td><input name='tolls_payWay'/></td>
						</tr>
						</tbody>
						<tbody>
							<tr><td colspan='12'><input type='submit' class='btn bg-blue bg-inverse' value='添加'></td>
							</tr></tbody></form>";

						?>

					</table>
					</p>
				</div>
				<!--过路费记录-->
				<div id="guoluInfo" class="col9 cshow">
					<p>
					<table class="table table-bordered">
						<tbody>
						<tr>
							<td>过路费记录</td>
							<td colspan="9"></td>
						</tr>
						</tbody>
						<tbody>
						<tr>
							<td>费用种类</td>
							<td>报销金额</td>
							<td>产生时间</td>
							<td>产生地址</td>
							<td>关联合同</td>
							<td>报销人员</td>
							<td>报销时间</td>
							<td>审核人员</td>
							<td>审核结果</td>
							<td>支付方式</td>
						</tr>
						</tbody>
						<?php
						$sqlname="car_cost_tolls";
						$res_gtolls=mysql_query("SELECT * FROM car_cost_tolls WHERE carCompanyNum='$plateId' AND tolls_type='过路费'");
						if($res_gtolls!=null){
							$num_gtolls=mysql_num_rows($res_gtolls);
							for($k=0;$k<$num_gtolls;$k++){
								$result_gtolls=mysql_fetch_row($res_gtolls);
								echo"<tbody>
						<tr>
							<td>过路费</td>
							<td>$result_gtolls[3]</td>
							<td>$result_gtolls[7]</td>
							<td>$result_gtolls[8]</td>
							<td>$result_gtolls[9]</td>
							<td>$result_gtolls[10]</td>
							<td>$result_gtolls[11]</td>
							<td>$result_gtolls[12]</td>
							<td>$result_gtolls[13]</td>
							<td>$result_gtolls[15]</td>
						</tr>
						</tbody>";
							}
						}
						echo"<form action='addInfo.php?commId=$plateId&sql=$sqlname&type=过路费' method='post'>
							<tbody>
						<tr>
							<td>过路费</td>
							<td><input name='guo_amount'/></td>
							<td><input name='guo_happenDate'/></td>
							<td><input name='guo_happenAddress'/></td>
							<td><input name='guo_contract'/></td>
							<td><input name='guo_subPerson'/></td>
							<td><input name='guo_subDate'/></td>
							<td><input name='guo_audPerson'/></td>
							<td><input name='guo_audOpinion'/></td>
							<td><input name='guo_payWay'/></td>
						</tr>
						</tbody>
						<tbody>
							<tr><td colspan='10'><input type='submit' class='btn bg-blue bg-inverse' value='添加'></td>
							</tr></tbody></form>";

						?>
					</table>
					</p>
				</div>
				<!--停车费记录-->
				<div id="tingcheInfo" class="col9 cshow">
					<p>
					<table class="table table-bordered">
						<tbody>
						<tr>
							<td>停车费记录</td>
							<td colspan="9"></td>
						</tr>
						</tbody>
						<tbody>
						<tr>
							<td>费用种类</td>
							<td>报销金额</td>
							<td>产生时间</td>
							<td>产生地址</td>
							<td>关联合同</td>
							<td>报销人员</td>
							<td>报销时间</td>
							<td>审核人员</td>
							<td>审核结果</td>
							<td>支付方式</td>
						</tr>
						</tbody>
						<?php
						$sqlname="car_cost_tolls";
						$res_ttolls=mysql_query("SELECT * FROM car_cost_tolls WHERE carCompanyNum='$plateId' AND tolls_type='停车费'");
						if($res_ttolls!=null){
							$num_ttolls=mysql_num_rows($res_ttolls);
							for($k=0;$k<$num_ttolls;$k++){
								$result_ttolls=mysql_fetch_row($res_ttolls);
								echo"<tbody>
						<tr>
							<td>停车费</td>
							<td>$result_ttolls[3]</td>
							<td>$result_ttolls[7]</td>
							<td>$result_ttolls[8]</td>
							<td>$result_ttolls[9]</td>
							<td>$result_ttolls[10]</td>
							<td>$result_ttolls[11]</td>
							<td>$result_ttolls[12]</td>
							<td>$result_ttolls[13]</td>
							<td>$result_ttolls[15]</td>
						</tr>
						</tbody>";
							}
						}
						echo"<form action='addInfo.php?commId=$plateId&sql=$sqlname&type=停车费' method='post'>
							<tbody>
						<tr>
							<td>停车费</td>
							<td><input name='ti_amount'/></td>
							<td><input name='ti_happenDate'/></td>
							<td><input name='ti_happenAddress'/></td>
							<td><input name='ti_contract'/></td>
							<td><input name='ti_subPerson'/></td>
							<td><input name='ti_subDate'/></td>
							<td><input name='ti_audPerson'/></td>
							<td><input name='ti_audOpinion'/></td>
							<td><input name='ti_payWay'/></td>
						</tr>
						</tbody>
						<tbody>
							<tr><td colspan='10'><input type='submit' class='btn bg-blue bg-inverse' value='添加'></td>
							</tr></tbody></form>";

						?>
					</table>
					</p>
				</div>
				<!--维修记录-->
				<!--保养记录-->
				<div id="baoyangInfo" class="col9 cshow">
					<p>
					<table class="table table-bordered">
						<tbody>
						<tr>
							<td>车辆保养记录</td>
							<td colspan="7"></td>
						</tr>
						</tbody>
						<tbody>
						<tr>
							<td>保养时间</td>
							<td>保养里程</td>
							<td>保养金额</td>
							<td>保养地址</td>
							<td>保养服务商</td>
							<td>送保人员</td>
							<td>保养清单</td>
							<td>结算方式</td>
						</tr>
						</tbody>
						<?php
						$sqlname="car_maintenance";
						$res_mainten=mysql_query("SELECT * FROM car_maintenance WHERE carCompanyNum='$plateId'");
						if($res_mainten!=null){
							$num_mainten =mysql_num_rows($res_mainten);
							for($k=0;$k<$num_mainten;$k++){
								$result_mainten=mysql_fetch_row($res_mainten);
								echo"<tbody>
						<tr>
							<td>$result_mainten[2]</td>
							<td>$result_mainten[3]</td>
							<td>$result_mainten[4]</td>
							<td>$result_mainten[5]</td>
							<td>$result_mainten[6]</td>
							<td>$result_mainten[7]</td>
							<td>$result_mainten[8]</td>
							<td>$result_mainten[9]</td>
						</tr>
						</tbody>";
							}
						}
						echo"<form action='addInfo.php?commId=$plateId&sql=$sqlname' method='post'>
							<tbody>
						<tr>
							<td><input name='tenDate'/></td>
							<td><input name='tenMileage'/></td>
							<td><input name='tenAmount'/></td>
							<td><input name='tenAddress'/></td>
							<td><input name='tenProvider'/.></td>
							<td><input name='tenPerson'/></td>
							<td><input name='tenListing'/></td>
							<td><input name='tenPayWay'/></td>
						</tr>
						</tbody>
						<tbody>
							<tr><td colspan='8'><input type='submit' class='btn bg-blue bg-inverse' value='添加'></td>
							</tr></tbody></form>";
						?>
					</table>
					</p>
				</div>
				<!--洗车记录-->
				<div id="xicheInfo" class="col9 cshow">
					<p>
					<table class="table table-bordered">
						<tbody>
						<tr>
							<td>车辆美容信息</td>
							<td colspan="4"></td>
						</tr>
						</tbody>
						<tbody>
						<tr>
							<td>美容时间</td>
							<td>美容类别</td>
							<td>美容金额</td>
							<td>服务商</td>
							<td>驾驶员</td>
						</tr>
						</tbody>
						<?php
						$sqlname="car_beauty";
						$res_beauty=mysql_query("SELECT * FROM car_beauty WHERE carCompanyNum='$plateId'");
						if($res_beauty!=null){
							$num_beauty=mysql_num_rows($res_beauty);
							for($k=0;$k<$num_beauty;$k++){
								$result_beauty=mysql_fetch_row($res_beauty);
								echo"<tbody>
						<tr>
							<td>$result_beauty[2]</td>
							<td>$result_beauty[3]</td>
							<td>$result_beauty[4]</td>
							<td>$result_beauty[5]</td>
							<td>$result_beauty[6]</td>

						</tr>
						</tbody>";
							}
						}
						echo"<form action='addInfo.php?commId=$plateId&sql=$sqlname' method='post'>
							<tbody>
						<tr>
							<td><input name='beaDate'/></td>
							<td><input name='beaType'/></td>
							<td><input name='beaAmount'/></td>
							<td><input name='beaProvider'/></td>
							<td><input name='beaDriver'/></td>
						</tr>
						</tbody>
						<tbody>
							<tr><td colspan='5'><input type='submit' class='btn bg-blue bg-inverse' value='添加'></td>
							</tr></tbody></form>";
						?>
					</table>
					</p>
				</div>
				<!--事故记录-->
				<!--年检记录-->
				<div id="nianjianInfo" class="col9 cshow">
					<p>
					<table class="table table-bordered">
						<tbody>
						<tr>
							<td>车辆年检信息</td>
							<td colspan="5"></td>
						</tr>
						</tbody>
						<tbody>
						<tr>
							<td>年检时间</td>
							<td>年检周期</td>
							<td>检测费</td>
							<td>五路一桥通行费</td>
							<td>下次年检时间</td>
							<td>年检人员</td>
						</tr>
						</tbody>
						<?php
						$sqlname="car_annual_inspection";
						$res_annual=mysql_query("SELECT * FROM car_annual_inspection WHERE carCompanyNum='$plateId'");
						if($res_annual!=null){
							$num_annual=mysql_num_rows($res_annual);
							for($k=0;$k<$num_annual;$k++){
								$result_annual=mysql_fetch_row($res_annual);
								echo"<tbody>
						<tr>
							<td>$result_annual[2]</td>
							<td>$result_annual[3]</td>
							<td>$result_annual[4]</td>
							<td>$result_annual[5]</td>
							<td>$result_annual[6]</td>
							<td>$result_annual[7]</td>
						</tr>
						</tbody>";
							}
						}
						echo"<form action='addInfo.php?commId=$plateId&sql=$sqlname' method='post'>
							<tbody>
						<tr>
							<td><input name='annualDate'/></td>
							<td><input name='annualCycle'/></td>
							<td><input name='annualAmount'/></td>
							<td><input name='passageAmount'/></td>
							<td><input name='nextDate'/></td>
							<td><input name='annualPerson'/></td>
						</tr>
						</tbody>
						<tbody>
							<tr><td colspan='6'><input type='submit' class='btn bg-blue bg-inverse' value='添加'></td>
							</tr></tbody></form>";
						?>
					</table>
					</p>
				</div>

			</div>

	</div>
</div>

<?php
include '../Common/footer.php';
?>

<script src="../assets/js/jquery-1.7.1.min.js"></script>
<script src="../assets/js/slicy.js"></script>
<script type="text/javascript">

	$(document).ready(function(){
		<?php

	echo"var commentKey='$commentKey';";
		$allform=array("#caigou","#chezhu","#baoxian","#zhuce","#daikuan","#addinfo","#beifenpei","#shiyong",
			"#yunying","#weizhang","#jiayou","#guolu","#tingche","#weixiu","#baoyang","#xiche","#shigu",
			"#nianjian","#jiaoyi","#shiyonren");
		for($i=0;$i<count($allform);$i++){
			$temp=$allform[$i]."Info";

			echo"$('$allform[$i]').click(function(){
				$('ul li').removeClass('selected');
				$('$allform[$i]').addClass('selected');
				$('.cshow').hide();
				$('$temp').show();";
			echo"});";

		}
?>
		$("#addInfo").hide();
		$("#addinfo").click(function(){
			$("ul li").removeClass("selected");
			$("#addinfo").addClass("selected");
			$(".cshow").hide();
			$("#addInfo").show();

		});
		$('.cshow').hide();
		if(commentKey=="K"){
			$("#caigou").hide();
//			$("#caigouInfo").hide();
//			$("#chezhu").hide();
			$("#zhuce").hide();
			$("#beifenpei").hide();
			$("#shiyong").hide();
			$("#yunying").hide();
			$("#guolu").hide();
			$("#tingche").hide();
		}
		if(commentKey=="C"){
			$("#jiaoyi").hide();
			$("#shiyongren").hide();
		}
	});


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
			temp += '</select></td></tbody><tbody>';
			temp += '<tr><td>姓名</td><td></td></tr>';
			temp += '<tr><td>性别</td><td></td></tr>';
			temp += '<tr><td>民族</td><td></td></tr>';
			temp += '<tr><td>出生</td><td></td></tr>';
			temp += '<tr><td>住址</td><td></td></tr>';
			temp += '<tr><td>公民身份证号码</td><td></td></tr>';
			temp += '<tr><td>签发机关</td><td></td></tr>';
			temp += '<tr><td>有限期限</td><td></td></tr></tbody></table></div>';
		} else {
//					alert(opt.value+"io");
			var temp = '<div id="sf"><table class="table table-bordered">';
			temp += '<tbody><tr><td>执照信息</td>';
			temp += '<td><select name="select" id="select" onchange="carOwner(this);">';
			temp += '<option value="2">单位车主</option>';
			temp += '<option value="1">个人车主</option>';
			temp += '</select></td></tbody><tbody>';
			temp += '<tr><td>统一社会信用代码</td><td>91510100054946627W</td></tr>';
			temp += '<tr><td>名称</td><td>四川世纪风汽车救援服务有限公司W</td></tr>';
			temp += '<tr><td>类型</td><td>有限责任公司（自然人投资或控股）</td></tr>';
			temp += '<tr><td>住所</td><td>成都市武侯区顺和街1号附57号1幢2楼3号</td></tr>';
			temp += '<tr><td>法定代表人</td><td>钟敏</td></tr>';
			temp += '<tr><td>注册资本</td><td>（人民币）贰佰万元</td></tr>';
			temp += '<tr><td>成立日期</td><td>2012/11/9</td></tr>';
			temp += '<tr><td>营业期限</td><td>至永久</td></tr>';
			temp += '<tr><td>经营范围</td><td></td></tr>';
			temp += '<tr><td>登记机关</td><td>成都市工商行政管理局</td></tr>';
			temp += '<tr><td>发证日期</td><td>2016/5/4</td></tr></tbody></table></div>';
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

	function showModel(index) {
		var checkNumId = ["checkzero", "checkone", "checktwo", "checkthree", "checkfour", "checkfive", "checksix",
			"checkseven", "checkeight"];

		var AllInfoNum = ["basicInfo", "mineInfo", "mineSourceInfo", "identityInfo", "contactInfo", "officeInfo",
			"carInfo", "homeInfo", "propertyInfo"];
		for (var i = 0; i <= checkNumId.length; i++) {
			if (i == index) {
//				alert(index);
				document.getElementById(checkNumId[i]).checked = true;
				document.getElementById(AllInfoNum[i]).style.display = "block";
			} else {
				document.getElementById(checkNumId[i]).checked = false;
				document.getElementById(AllInfoNum[i]).style.display = "none";
			}
		}

	}
</script>
</body>
</html>
