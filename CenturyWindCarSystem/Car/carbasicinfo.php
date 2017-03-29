<?php
session_start();
if (empty($_SESSION['userName'])) {
    $url = "../UserManger/login.php";
    echo '<script language=javascript>window.location.href="' . $url . '"</script>';
}
?>
<?php
if($_GET["plateId"])
{
    $plateId=$_GET["plateId"];
    var_dump($plateId);
}

include "../Common/localSQLSettings.php";

localSettings();

//$e_ID=2013110104;

// global $sqlresult;

    $cars = "SELECT * FROM cars WHERE carOId='$plateId'";
    //   $apply="SELECT * FROM employers WHERE e_ID=$e_ID";
    $car_procurement = "SELECT * FROM car_procurement WHERE carOId='$plateId'";
    $car_owner_personal = "SELECT * FROM car_owner_personal WHERE carOId='$plateId'";
    $car_owner_unit = "SELECT * FROM car_owner_unit WHERE carOId='$plateId'";
    $car_info = "SELECT * FROM car_info WHERE carOId='$plateId'";
//    $car_insurance = "SELECT * FROM car_insurance WHERE carOId='$plateId'";
    $car_regist = "SELECT * FROM car_regist WHERE carOId='$plateId'";
    $car_loan = "SELECT * FROM car_loan WHERE carOId='$plateId'";
//    $car_add_equipment = "SELECT * FROM car_add_equipment WHERE carOId='$plateId'";
//   // $salary = "SELECT * FROM employer_salary WHERE carOId=$plateId";//任职
//    $car_cost_gasoline = "SELECT * FROM car_cost_gasoline WHERE carOId='$plateId'";
//    $car_cost_tolls = "SELECT * FROM car_cost_tolls WHERE carOId='$plateId'";
//    $car_cost_park = "SELECT * FROM car_cost_park WHERE carOId='$plateId'";
//    $car_violations = "SELECT * FROM car_violations WHERE carOId='$plateId'";
//    $car_maintenance = "SELECT * FROM car_maintenance WHERE carOId='$plateId'";
//    $car_beauty = "SELECT * FROM car_beauty WHERE carOId='$plateId'";
//    $car_annual_inspection = "SELECT * FROM car_annual_inspection WHERE carOId='$plateId'";


    $cars1 = mysql_query($cars) or die("Error in query: $cars. " . mysql_error());
    $car_procurement1 = mysql_query($car_procurement) or die("Error in query: $car_procurement. " . mysql_error());
    $car_owner_personal1 = mysql_query($car_owner_personal) or die("Error in query: $car_owner_personal. " . mysql_error());
    $car_owner_unit1 = mysql_query($car_owner_unit) or die("Error in query: $car_owner_unit. " . mysql_error());
    $car_info1 = mysql_query($car_info) or die("Error in query: $car_info. " . mysql_error());
//    $car_insurance1 = mysql_query($car_insurance) or die("Error in query: $car_insurance. " . mysql_error());
    $car_regist1 = mysql_query($car_regist) or die("Error in query: $car_regist. " . mysql_error());
    $car_loan1 = mysql_query($car_loan) or die("Error in query: $car_loan. " . mysql_error());
//    $car_add_equipment1 = mysql_query($car_add_equipment) or die("Error in query: $car_add_equipment. " . mysql_error());

//    $car_cost_gasoline1 = mysql_query($car_cost_gasoline) or die("Error in query: $car_cost_gasoline. " . mysql_error());
//    $car_cost_tolls1 = mysql_query($car_cost_tolls) or die("Error in query: $car_cost_tolls. " . mysql_error());
//    $car_cost_park1 = mysql_query($car_cost_park) or die("Error in query: $car_cost_park. " . mysql_error());
//    $car_violations1 = mysql_query($car_violations) or die("Error in query: $car_violations. " . mysql_error());
//    $car_maintenance1 = mysql_query($car_maintenance) or die("Error in query: $car_maintenance. " . mysql_error());
//    $car_beauty1 = mysql_query($car_beauty) or die("Error in query: $car_beauty. " . mysql_error());
//    $car_annual_inspection1 = mysql_query($car_annual_inspection) or die("Error in query: $car_annual_inspection. " . mysql_error());

    $row0 = mysql_fetch_row($cars1); //车辆信息
    $row1 = mysql_fetch_row($car_procurement1); //采购信息
    $row2 = mysql_fetch_row($car_owner_personal1);//个人车主
    $row3 = mysql_fetch_row($car_owner_unit1);//单位车主
    $row4 = mysql_fetch_row($car_info1);//车辆编号信息
    $row5 = mysql_fetch_row($car_insurance1);//保险信息
    $row6 = mysql_fetch_row($car_regist1);//车辆注册信息
    $row7 = mysql_fetch_row($car_loan1);//车辆贷款信息
    $row8 = mysql_fetch_row($car_add_equipment1);//加装设备
    $row9 = mysql_fetch_row($car_cost_gasoline1);//燃油报销
    $row10 = mysql_fetch_row($car_cost_tolls1);//过路费报销
    $row11 = mysql_fetch_row($car_cost_park1);//停车费报销
    $row12 = mysql_fetch_row($car_violations1);//车辆违章信息
    $row13 = mysql_fetch_row($car_maintenance1);//车辆保养信息
    $row14 = mysql_fetch_row($car_beauty1);//车辆美容信息
    $row15 = mysql_fetch_row($car_annual_inspection1);//车辆年检信息


    $sqlresult = array($row0, $row1, $row2, $row3, $row4, $row5, $row6, $row7, $row8, $row9, $row10, $row11, $row12, $row13, $row14, $row15);
    //var_dump($sqlresult);

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
		.col3 input{
			width: auto;
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
<div class="col3">
	<ul class="sidebar">
		<li class="selected">
			<a href="">车辆信息详情</a>
			<ul>
				<li class="selected">
					<a href="#basicInfo">车辆信息<input id="checkzero" type="checkbox" checked="checked" onchange="showModel(0);"/></a>
				</li>
				<li>
					<a href="#mineInfo">采购信息<input id="checkone" type="checkbox" onchange="showModel(1);"/></a>
				</li>
				<li>
					<a href="#identityInfo">基本信息<input id="checkthree" type="checkbox" onchange="showModel(3);"/></a>
				</li>
				<li>
					<a href="#officeInfo">注册信息<input id="checkfive" type="checkbox" onchange="showModel(5);"/></a>
				</li>
				<li>
					<a href="#mineSourceInfo">车主信息<input id="checktwo" type="checkbox" onchange="showModel(2);"/></a>
				</li>
				<li>
					<a href="#propertyInfo">被分配信息<input id="checkeight" type="checkbox" onchange="showModel(8);"/></a>
				</li>
				<li>
					<a href="#contactInfo">保险信息<input id="checkfour" type="checkbox" onchange="showModel(4);"/></a>
				</li>

				<li>
					<a href="#carInfo">贷款信息<input id="checksix" type="checkbox" onchange="showModel(6);"/></a>
				</li>
				<li>
					<a href="#homeInfo">加装设备信息<input id="checkseven" type="checkbox" onchange="showModel(7);"/></a>
				</li>
				<li>
					<a href="#userInfo">使用记录<input id="checkeight" type="checkbox" onchange="showModel(8);"/></a>
				</li>
				<li>
					<a href="#bankInfo">运营记录<input id="checknine" type="checkbox" onchange="showModel(9);"/></a>
				</li>
				<li>
					<a href="#carCardInfo">加油记录<input id="checkten" type="checkbox" onchange="showModel(10);"/></a>
				</li>
				<li>
					<a href="#linkman">过路费记录<input id="checkeleven" type="checkbox" onchange="showModel(11);"/></a>
				</li>
				<li>
					<a href="#stopInfo">停车费记录<input id="checktwelve" type="checkbox" onchange="showModel(12);"/></a>
				</li>
				<li>
					<a href="#badInfo">违章罚款记录<input id="checkthirteen" type="checkbox" onchange="showModel(13);"/></a>
				</li>
				<li>
					<a>维修记录</a>
				</li>
				<li>
					<a href="#fitInfo">保养记录</a>
				</li>
				<li>
					<a href="#washInfo">洗车记录</a>
				</li>
				<li>
					<a>事故记录</a>
				</li>
				<li>
					<a href="#yearInfo">年检记录</a>
				</li>
			</ul>
		</li>
	</ul>
</div>
<!--content-->
<div class="col9 docs-body" id="main_content">
<!--车辆信息-->
<div id="basicInfo" class="col8">
	<p>
	<table class="table table-bordered">
        <tbody>
        <tr>
            <td>基本信息</td>
            <td>
        </tbody>
        <tbody>
        <tr>
            <td>车主名称</td>
            <td><?php echo $sqlresult[0][4];?></td>
        </tr>
        <tr>
            <td>车主类型</td>
            <td><?php echo $sqlresult[0][5];?></td>
        </tr>
        <tr>
            <td>联系电话</td>
            <td><?php echo $sqlresult[0][6];?></td>
        </tr>
        <tr>
            <td>车辆类型</td>
            <td><?php echo $sqlresult[0][2];?></td>
        </tr>
        </tbody>
        <tbody>
        <tr>
            <td>品牌</td>
            <td><?php echo $sqlresult[0][3];?></td>
        </tr>
        <tr>
            <td>车牌号</td>
            <td><?php echo $sqlresult[0][1];?></td>
        </tr>
        </tbody>
	</table>
	</p>
</div>
<!--采购信息-->
<div id="mineInfo" style="display: none" class="col8">
	<p>
	<table class="table table-bordered">
		<tbody>
		<tr>
			<td>物品采购</td>
			<td>
		</tbody>
		<tbody>
		<tr>
			<td>物品种类</td>
            <td><?php echo $sqlresult[1][2];?></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>物品类别</td>
            <td><?php echo $sqlresult[1][3];?></td>
		</tr>
		<tr>
			<td>物品品牌</td>
            <td><?php echo $sqlresult[1][4];?></td>
		</tr>
		<tr>
			<td>物品编号</td>
            <td><?php echo $sqlresult[1][5];?></td>
		</tr>
		<tr>
			<td>销售单位</td>
            <td><?php echo $sqlresult[1][6];?></td>
		</tr>
		<tr>
			<td>销售人员</td>
            <td><?php echo $sqlresult[1][7];?></td>
		</tr>
		<tr>
			<td>联系电话</td>
            <td><?php echo $sqlresult[1][8];?></td>
		</tr>
		<tr>
			<td>厂商指导价</td>
            <td><?php echo $sqlresult[1][9];?></td>
		</tr>
		<tr>
			<td>采购价格</td>
            <td><?php echo $sqlresult[1][10];?></td>
		</tr>
		<tr>
			<td>购买方式</td>
            <td><?php echo $sqlresult[1][11];?></td>
		</tr>
		<tr>
			<td>采购人员</td>
            <td><?php echo $sqlresult[1][12];?></td>
		</tr>
		<tr>
			<td>财务审核人</td>
            <td><?php echo $sqlresult[1][13];?></td>
		</tr>
		<tr>
			<td>审核意见</td>
            <td><?php echo $sqlresult[1][14];?></td>
		</tr>
		<tr>
			<td>审核时间</td>
            <td><?php echo $sqlresult[1][15];?></td>
		</tr>
		<tr>
			<td>经理审核人</td>
            <td><?php echo $sqlresult[1][16];?></td>
		</tr>
		<tr>
			<td>审核意见</td>
            <td><?php echo $sqlresult[1][17];?></td>
		</tr>
		<tr>
			<td>审核时间</td>
            <td><?php echo $sqlresult[1][18];?></td>
		</tr>
		</tbody>
	</table>
	</p>
</div>
<!--个人车主信息-->
<div id="mineSourceInfo" style="display: none" class="col8">
	<div id="sf">
		<p>
		<table class="table table-bordered">
			<tbody>
			<tr>
				<td>车主信息</td>
				<td>
                </td>
			</tbody>
			<tbody>
			<tr>
				<td>姓名</td>
                <td><?php echo $sqlresult[2][2];?></td>
			</tr>
			<tr>
				<td>性别</td>
                <td><?php echo $sqlresult[2][3];?></td>
			</tr>
			<tr>
				<td>民族</td>
                <td><?php echo $sqlresult[2][4];?></td>
			</tr>
			<tr>
				<td>出生</td>
                <td><?php echo $sqlresult[2][5];?></td>
			</tr>
			<tr>
				<td>住址</td>
                <td><?php echo $sqlresult[2][6];?></td>
			</tr>
			<tr>
				<td>公民身份证号码</td>
                <td><?php echo $sqlresult[2][7];?></td>
			</tr>
			<tr>
				<td>签发机关</td>
                <td><?php echo $sqlresult[2][8];?></td>
			</tr>
			<tr>
				<td>有限期限</td>
                <td><?php echo $sqlresult[2][9];?></td>
			</tr>
            <tr>
                <td>联系电话</td>
                <td><?php echo $sqlresult[2][10];?></td>
            </tr>
			</tbody>
			<!--<tbody>-->
			<!--<tr>-->
			<!--<td>统一社会信用代码</td>-->
			<!--<td>91510100054946627W</td>-->
			<!--</tr>-->
			<!--<tr>-->
			<!--<td>名称</td>-->
			<!--<td>四川世纪风汽车救援服务有限公司W</td>-->
			<!--</tr>-->
			<!--<tr>-->
			<!--<td>类型</td>-->
			<!--<td>有限责任公司（自然人投资或控股）</td>-->
			<!--</tr>-->
			<!--<tr>-->
			<!--<td>住所</td>-->
			<!--<td>成都市武侯区顺和街1号附57号1幢2楼3号</td>-->
			<!--</tr>-->
			<!--<tr>-->
			<!--<td>法定代表人</td>-->
			<!--<td>钟敏</td>-->
			<!--</tr>-->
			<!--<tr>-->
			<!--<td>注册资本</td>-->
			<!--<td>（人民币）贰佰万元</td>-->
			<!--</tr>-->
			<!--<tr>-->
			<!--<td>成立日期</td>-->
			<!--<td>2012/11/9</td>-->
			<!--</tr>-->
			<!--<tr>-->
			<!--<td>营业期限</td>-->
			<!--<td>至永久</td>-->
			<!--</tr>-->
			<!--<tr>-->
			<!--<td>经营范围</td>-->
			<!--<td></td>-->
			<!--</tr>-->
			<!--<tr>-->
			<!--<td>登记机关</td>-->
			<!--<td>成都市工商行政管理局</td>-->
			<!--</tr>-->
			<!--<tr>-->
			<!--<td>发证日期</td>-->
			<!--<td>2016/5/4</td>-->
			<!--</tr>-->
			<!--</tbody>-->
		</table>
		</p>
	</div>
</div>
<!--基本信息-->
<div id="identityInfo" style="display: none" class="col8">
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
            <td><?php echo $sqlresult[4][2];?></td>
		</tr>
		</tbody>
		<tfoot>
		<tr>
			<td>车辆识别代号</td>
            <td><?php echo $sqlresult[4][3];?></td>
		</tr>
		<tr>
			<td>发动机号码</td>
            <td><?php echo $sqlresult[4][4];?></td>
		</tr>
		<tr>
			<td>核定载客人数</td>
            <td><?php echo $sqlresult[4][5];?></td>
		</tr>
		<tr>
			<td>车身颜色</td>
            <td><?php echo $sqlresult[4][6];?></td>
		</tr>
		</tfoot>
	</table>
	</p>
</div>
<!--保险信息-->
<div id="contactInfo" style="display: none" class="col8">
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
            <td><?php echo $sqlresult[5][2];?></td>
		</tr>
		</tbody>
		<tfoot>
		<tr>
			<td>承保公司</td>
            <td><?php echo $sqlresult[5][3];?></td>
		</tr>
		<tr>
			<td>保单号</td>
            <td><?php echo $sqlresult[5][4];?></td>
		</tr>
		<tr>
			<td>保险金额</td>
            <td><?php echo $sqlresult[5][5];?></td>
		</tr>
		<tr>
			<td>车船税金额</td>
            <td><?php echo $sqlresult[5][6];?></td>
		</tr>
		<tr>
			<td>有效期</td>
            <td><?php echo $sqlresult[5][7];?></td>
		</tr>
		</tfoot>
	</table>

	</p>
</div>
<!--注册信息-->
<div id="officeInfo" style="display: none" class="col8">
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
            <td><?php echo $sqlresult[6][2];?></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>车牌号</td>
            <td><?php echo $sqlresult[6][1];?></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>所有人</td>
            <td><?php echo $sqlresult[6][3];?></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>住址</td>
            <td><?php echo $sqlresult[6][4];?></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>发证机关</td>
            <td><?php echo $sqlresult[6][5];?></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>注册日期</td>
            <td><?php echo $sqlresult[6][6];?></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>年检有效期至</td>
            <td><?php echo $sqlresult[6][7];?></td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>办理单位</td>
            <td><?php echo $sqlresult[6][8];?></td>
		</tr>
		<tr>
			<td>办理人员</td>
            <td><?php echo $sqlresult[6][9];?></td>
		</tr>
		<tr>
			<td>费用名称</td>
            <td><?php echo $sqlresult[6][10];?></td>
		</tr>
		<tr>
			<td>费用金额</td>
            <td><?php echo $sqlresult[6][11];?></td>
		</tr>
		</tbody>
	</table>
	</p>
</div>
<!--贷款信息-->
<div id="carInfo" style="display: none" class="col8">
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
			<td colspan="3">贷款还款详情</td>
			<td><?php echo $sqlresult[7][2];?></td>
			<td><?php echo $sqlresult[7][3];?></td>
			<td><?php echo $sqlresult[7][1];?></td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td>应还款期</td>
			<td colspan="2">距最后还款</td>
			<td>应还金额</td>
			<td>还款状态</td>
			<td>还款日期</td>
			<td>还款方式</td>
			<td>经办人</td>
		</tr>
		<tr>
            <td><?php echo $sqlresult[7][4];?></td>
            <td><?php echo $sqlresult[7][6];?></td>
            <td><?php echo $sqlresult[7][5];?></td>
            <td><?php echo $sqlresult[7][7];?></td>
            <td><?php echo $sqlresult[7][8];?></td>
            <td><?php echo $sqlresult[7][9];?></td>
            <td><?php echo $sqlresult[7][10];?></td>
			<td><?php echo $sqlresult[7][11];?></td>
		</tr>
		<tr>
            <td><?php echo $sqlresult[7][4];?></td>
            <td><?php echo $sqlresult[7][6];?></td>
            <td><?php echo $sqlresult[7][5];?></td>
            <td><?php echo $sqlresult[7][7];?></td>
            <td><?php echo $sqlresult[7][8];?></td>
            <td><?php echo $sqlresult[7][9];?></td>
            <td><?php echo $sqlresult[7][10];?></td>
            <td><?php echo $sqlresult[7][11];?></td>
		</tr>
		<tr>
            <td><?php echo $sqlresult[7][4];?></td>
            <td><?php echo $sqlresult[7][6];?></td>
            <td><?php echo $sqlresult[7][5];?></td>
            <td><?php echo $sqlresult[7][7];?></td>
            <td><?php echo $sqlresult[7][8];?></td>
            <td><?php echo $sqlresult[7][9];?></td>
            <td><?php echo $sqlresult[7][10];?></td>
            <td><?php echo $sqlresult[7][11];?></td>
		</tr>
		</tbody>

	</table>
	</p>
</div>
<!--加装设备信息-->
<div id="homeInfo" style="display: none" class="col8">
	<p>
	<table class="table table-bordered">
		<tbody>
		<tr>
			<td>设备加装</td>
			<td>清障车</td>
			<td>东风</td>
			<td>川A-7021Q</td>
		</tr>
		</tbody>
		<tbody>
		<tr>
			<td>加装种类</td>
			<td colspan="3"><?php echo $sqlresult[8][4];?></td>
		</tr>
		<tr>
			<td>设备类别</td>
			<td colspan="3"><?php echo $sqlresult[8][5];?></td>
		</tr>
		<tr>
			<td>设备品牌</td>
			<td colspan="3"><?php echo $sqlresult[8][6];?></td>
		</tr>
		<tr>
			<td>设备编号</td>
			<td colspan="3"><?php echo $sqlresult[8][7];?></td>
		</tr>
		<tr>
			<td>设备来源</td>
			<td colspan="3"><?php echo $sqlresult[8][8];?></td>
		</tr>
		<tr>
			<td>加装位置</td>
			<td colspan="3"><?php echo $sqlresult[8][9];?></td>
		</tr>
		<tr>
			<td>是否拆除</td>
			<td col


		<tr>
			<td>申请人员</td>
			<td colspan="3"><?php echo $sqlresult[8][11];?></td>
		</tr>
		<tr>
			<td>申请时间</td>
			<td colspan="3"><?php echo $sqlresult[8][12];?></td>
		</tr>
		<tr>
			<td>主管部门</td>
			<td colspan="3"><?php echo $sqlresult[8][13];?></td>
		</tr>
		<tr>
			<td>审核意见</td>
			<td colspan="3"><?php echo $sqlresult[8][14];?></td>
		</tr>
		<tr>
			<td>审核时间</td>
			<td colspan="3"><?php echo $sqlresult[8][15];?></td>
		</tr>
		<tr>
			<td>审核人员</td>
			<td colspan="3"><?php echo $sqlresult[8][16];?></td>
		</tr>
		</tbody>
	</table>

	</p>
</div>
<!--被分配信息-->
<div id="propertyInfo" style="display: none" class="col8">
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
			<td>钟敏</td>
			<td>511027198209096195</td>
		</tr>
		<tr>
			<td>任职公司</td>
			<td>四川世纪风汽车救援服务有限公司</td>
		</tr>
		<tr>
			<td>任职部门</td>
			<td>车队管理部</td>
		</tr>
		<tr>
			<td>任职职位</td>
			<td>服务司机</td>
		</tr>
		<tr>
			<td>任职时间</td>
			<td>2016.06.06</td>
		</tr>
		<tr>
			<td>员工ID</td>
			<td>s20160400025</td>
		</tr>
		<tr>
			<td>人事专员</td>
			</td>
			<td>何海霞</td>
		</tr>
		</tbody>

	</table>

	</p>
</div>
<!--运营信息-->
<!--<div id="bankInfo" class="col8">-->
<!--<p>-->
<!--<table class="table table-bordered">-->
<!--<tbody>-->
<!--<tr>-->
<!--<td>银行账户信息</td>-->
<!--<td></td>-->
<!--</tr>-->
<!--</tbody>-->
<!--<tbody>-->
<!--<tr>-->
<!--<td>类型</td>-->
<!--<td></td>-->
<!--</tr>-->
<!--<tr>-->
<!--<td>开户银行</td>-->
<!--<td></td>-->
<!--</tr>-->
<!--<tr>-->
<!--<td>银行账号</td>-->
<!--<td></td>-->
<!--</tr>-->
<!--</tbody>-->
<!--</table>-->
<!--</p>-->
<!--</div>-->
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
			<td><?php echo $sqlresult[9][2];?></td>
		</tr>
		</tbody>
		<tfoot>
		<tr>
			<td>产生时间</td>
			<td><?php echo $sqlresult[9][3];?></td>
		</tr>
		<tr>
			<td>报销金额</td>
			<td><?php echo $sqlresult[9][4];?></td>
		</tr>
		<tr>
			<td>燃油数量</td>
			<td><?php echo $sqlresult[9][5];?></td>
		</tr>
		<tr>
			<td>车辆里程</td>
			<td><?php echo $sqlresult[9][6];?></td>
		</tr>
		<tr>
			<td>关联车辆</td>
			<td><?php echo $sqlresult[9][1];?></td>
		</tr>
		<tr>
			<td>报销人员</td>
			<td><?php echo $sqlresult[9][7];?></td>
		</tr>
		<tr>
			<td>报销时间</td>
			<td><?php echo $sqlresult[9][8];?></td>
		</tr>
		<tr>
			<td>审核人员</td>
			<td><?php echo $sqlresult[9][9];?></td>
		</tr>
		<tr>
			<td>审核结果</td>
			<td><?php echo $sqlresult[9][10];?></td>
		</tr>
		<tr>
			<td>报销状态</td>
			<td><?php echo $sqlresult[9][11];?></td>
		</tr>
		<tr>
			<td>支付方式</td>
			<td><?php echo $sqlresult[9][12];?></td>
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
			<td>钟敏</td>
			<td>清障车</td>
			<td>川A-7081Q</td>
		</tr>
		</tbody>
		<tfoot>
		<tr>
			<td>报销种类</td>
			<td colspan="2"><?php echo $sqlresult[10][2];?></td>
		</tr>
		<tr>
			<td>报销金额</td>
			<td colspan="2"><?php echo $sqlresult[10][3];?></td>
		</tr>
		<tr>
			<td>产生时间</td>
			<td colspan="2"><?php echo $sqlresult[10][4];?></td>
		</tr>
		<tr>
			<td>产生地址</td>
			<td colspan="2"><?php echo $sqlresult[10][5];?></td>
		</tr>
		<tr>
			<td>关联合同</td>
			<td colspan="2"><?php echo $sqlresult[10][6];?></td>
		</tr>
		<tr>
			<td>报销人员</td>
			<td colspan="2"><?php echo $sqlresult[10][7];?></td>
		</tr>
		<tr>
			<td>报销时间</td>
			<td colspan="2"><?php echo $sqlresult[10][8];?></td>
		</tr>
		<tr>
			<td>审核人员</td>
			<td colspan="2"><?php echo $sqlresult[10][9];?></td>
		</tr>
		<tr>
			<td>审核结果</td>
			<td colspan="2"><?php echo $sqlresult[10][10];?></td>
		</tr>
		<tr>
			<td>报销状态</td>
			<td colspan="2"><?php echo $sqlresult[10][11];?></td>
		</tr>
		<tr>
			<td>支付方式</td>
			<td colspan="2"><?php echo $sqlresult[10][12];?></td>
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
			<td colspan="2"><?php echo $sqlresult[11][2];?></td>
		</tr>
		<tr>
			<td>报销金额</td>
			<td colspan="2"><?php echo $sqlresult[11][3];?></td>
		</tr>
		<tr>
			<td>产生时间</td>
			<td colspan="2"><?php echo $sqlresult[11][4];?></td>
		</tr>
		<tr>
			<td>产生地址</td>
			<td colspan="2"><?php echo $sqlresult[11][5];?></td>
		</tr>
		<tr>
			<td>关联合同</td>
			<td colspan="2"><?php echo $sqlresult[11][6];?></td>
		</tr>
		<tr>
			<td>报销人员</td>
			<td colspan="2"><?php echo $sqlresult[11][7];?></td>
		</tr>
		<tr>
			<td>报销时间</td>
			<td colspan="2"><?php echo $sqlresult[11][8];?></td>
		</tr>
		<tr>
			<td>审核人员</td>
			<td colspan="2"><?php echo $sqlresult[11][9];?></td>
		</tr>
		<tr>
			<td>审核结果</td>
			<td colspan="2"><?php echo $sqlresult[11][10];?></td>
		</tr>
		<tr>
			<td>报销状态</td>
			<td colspan="2"><?php echo $sqlresult[11][11];?></td>
		</tr>
		<tr>
			<td>支付方式</td>
			<td colspan="2"><?php echo $sqlresult[11][12];?></td>
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
			<td>违章时间</td>
			<td><?php echo $sqlresult[12][2];?></td>
		</tr>
		<tr>
			<td>违章内容</td>
			<td><?php echo $sqlresult[12][3];?></td>
		</tr>
		<tr>
			<td>违章地点</td>
			<td><?php echo $sqlresult[12][4];?></td>
		</tr>
		<tr>
			<td>罚款</td>
			<td><?php echo $sqlresult[12][5];?></td>
		</tr>
		<tr>
			<td>扣分</td>
			<td><?php echo $sqlresult[12][6];?></td>
		</tr>
		<tr>
			<td>驾驶员</td>
			<td><?php echo $sqlresult[12][7];?></td>
		</tr>
		<tr>
			<td>违章状态</td>
			<td><?php echo $sqlresult[12][8];?></td>
		</tr>
		<tr>
			<td>处理经办</td>
			<td><?php echo $sqlresult[12][9];?></td>
		</tr>
		<tr>
			<td>经办人员</td>
			<td><?php echo $sqlresult[12][10];?></td>
		</tr>
		<tr>
			<td>代办收费</td>
			<td><?php echo $sqlresult[12][11];?></td>
		</tr>
		<tr>
			<td>收费合计</td>
			<td><?php echo $sqlresult[12][12];?></td>
		</tr>
		<tr>
			<td>费用承担</td>
			<td><?php echo $sqlresult[12][13];?></td>
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
			<td><?php echo $sqlresult[13][2];?></td>
		</tr>
		</tbody>
		<tfoot>
		<tr>
			<td>保养里程</td>
			<td><?php echo $sqlresult[13][3];?></td>
		</tr>
		<tr>
			<td>保养金额</td>
			<td><?php echo $sqlresult[13][4];?></td>
		</tr>
		<tr>
			<td>保养地址</td>
			<td><?php echo $sqlresult[13][5];?></td>
		</tr>
		<tr>
			<td>保养服务商</td>
			<td><?php echo $sqlresult[13][6];?></td>
		</tr>
		<tr>
			<td>送保人员</td>
			<td><?php echo $sqlresult[13][7];?></td>
		</tr>
		<tr>
			<td>保养清单</td>
			<td><?php echo $sqlresult[13][8];?></td>
		</tr>
		<tr>
			<td>结算方式</td>
			<td><?php echo $sqlresult[13][9];?></td>
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
			<td><?php echo $sqlresult[14][2];?></td>
		</tr>
		</tbody>
		<tfoot>
		<tr>
			<td>美容类别</td>
			<td><?php echo $sqlresult[14][3];?></td>
		</tr>
		<tr>
			<td>美容金额</td>
			<td><?php echo $sqlresult[14][4];?></td>
		</tr>
		<tr>
			<td>服务商</td>
			<td><?php echo $sqlresult[14][5];?></td>
		</tr>
		<tr>
			<td>驾驶员</td>
			<td><?php echo $sqlresult[14][6];?></td>
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
			<td><?php echo $sqlresult[15][2];?></td>
		</tr>
		</tbody>
		<tfoot>
		<tr>
            <td>年检周期</td>
			<td><?php echo $sqlresult[15][3];?></td>

		</tr>
		<tr>
            <td>检测费</td>
			<td><?php echo $sqlresult[15][4];?></td>
		</tr>
		<tr>
            <td>五路一桥通行费</td>
			<td><?php echo $sqlresult[15][5];?></td>
		</tr>
		<tr>
            <td>下次年检时间</td>
			<td><?php echo $sqlresult[15][6];?></td>
		</tr>
		<tr>
            <td>年检人员</td>
			<td><?php echo $sqlresult[15][7];?></td>
		</tr>

		</tfoot>
	</table>
	</p>
</div>
</div>
</div>
</div>
</div>
<div class="wrapper footer">
	<p>
		&copy; CopyRight 2002-2013, Qietu Network Technology Co., Ltd. All Rights Reserved.
		<script type="text/javascript">
			var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
			document.write(unescape("%3Cspan id='cnzz_stat_icon_1255281778'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/stat.php%3Fid%3D1255281778' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<br/>
	</p>
</div>

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
			temp+='<option value="1">个人车主</option>';
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

	function showModel(index){
		var checkNumId=["checkzero","checkone","checktwo","checkthree","checkfour","checkfive","checksix",
		"checkseven","checkeight"];

		var AllInfoNum=["basicInfo","mineInfo","mineSourceInfo","identityInfo","contactInfo","officeInfo",
			"carInfo","homeInfo","propertyInfo"];
		for(var i=0;i<=checkNumId.length;i++){
			if(i==index){
//				alert(index);
				document.getElementById(checkNumId[i]).checked=true;
				document.getElementById(AllInfoNum[i]).style.display="block";
			}else{
				document.getElementById(checkNumId[i]).checked=false;
				document.getElementById(AllInfoNum[i]).style.display="none";
			}
		}

	}
</script>
</body>
</html>
