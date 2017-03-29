<?php
/*if($_GET["cust_ID"])
{
    $cust_ID=$_GET["cust_ID"];
}
include "../Common/localSQLSettings.php";
localSettings();

//$e_ID=2013110104;
if($connection) {
// global $sqlresult;

    $customers= "SELECT * FROM cutomers WHERE cust_ID=$cust_ID";
    $account = "SELECT * FROM customer_account WHERE cust_ID=$cust_ID";
    $address = "SELECT * FROM customer_idcard WHERE cust_ID=$cust_ID";
    $assets= "SELECT * FROM customer_assets WHERE cust_ID=$cust_ID";
    $car = "SELECT * FROM customer_car WHERE cust_ID=$cust_ID";
    $contact = "SELECT * FROM customer_contact WHERE cust_ID=$cust_ID";
    $idcard = "SELECT * FROM customer_idcard WHERE cust_ID=$cust_ID";
    $license = "SELECT * FROM customer_license WHERE cust_ID=$cust_ID";
    $other_contact = "SELECT * FROM customer_other_contact WHERE cust_ID=$cust_ID";
    $source = "SELECT * FROM customer_source WHERE cust_ID=$cust_ID";
    $unit = "SELECT * FROM customer_unit WHERE cust_ID=$cust_ID";

    /*$customers1 = mysql_query($customers) or die("Error in query: $customers. " . mysql_error());
    $account1 = mysql_query($account) or die("Error in query: $account. " . mysql_error());
    $address1 = mysql_query($address) or die("Error in query: $address. " . mysql_error());
    $assets1 = mysql_query($assets) or die("Error in query: $assets. " . mysql_error());
    $car1 = mysql_query($car) or die("Error in query: $car. " . mysql_error());
    $contact1 = mysql_query($contact) or die("Error in query: $contact. " . mysql_error());
    $other_contact1 = mysql_query($other_contact) or die("Error in query: $other_contact. " . mysql_error());
    $idcard1 = mysql_query($idcard) or die("Error in query: $idcard. " . mysql_error());
    $license1 = mysql_query($license) or die("Error in query: $license. " . mysql_error());
    $other_contact1 = mysql_query($other_contact) or die("Error in query: $other_contact. " . mysql_error());
    $source1 = mysql_query($source) or die("Error in query: $source. " . mysql_error());
    $unit1 = mysql_query($unit) or die("Error in query: $unit. " . mysql_error());



    $row0 = mysql_fetch_row($employers1); //个人信息

    $row2 = mysql_fetch_row($idcard1);//身份证信息
    $row3 = mysql_fetch_row($contact1);//联系方式
    $row4 = mysql_fetch_row($license1);//驾驶证信息
    $row5 = mysql_fetch_row($car_msg1);//车辆信息
    $row6 = mysql_fetch_row($address1);//居住地
    $row7 = mysql_fetch_row($other_contact1);//其他联系人
    $row8 = mysql_fetch_row($account1);//银行账户
    $row9 = mysql_fetch_row($office1);//任职
    $row10 = mysql_fetch_row($salary1);//薪资设定

    */
 /*   $sqlresult = array($row0, $row1, $row2, $row3, $row4, $row5, $row6, $row7, $row8, $row9, $row10);
}*/
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
							<a href="">客户信息详情</a>
							<ul>
								<li class="selected">
									<a href="#sourceInfo">来源信息</a>
								</li>
								<li>
									<a href="#identityInfo">注册信息</a>
								</li>
								<li>
									<a href="#contactInfo">联系方式信息</a>
								</li>
								<li>
									<a href="#staffInfo">员工信息</a>
								</li>
								<li>
									<a href="#officeInfo">办公信息</a>
								</li>
								<li>
									<a href="#propertyInfo">资产信息</a>
								</li>
								<li>
									<a href="#carInfo">车辆信息</a>
								</li>
								<li>
									<a>咨询信息</a>
								</li>
								<li>
									<a>订单信息</a>
								</li>
								<li>
									<a href="#bankInfo">银行账户信息</a>
								</li>
								<li>
									<a>名下客户信息</a>
								</li>
								<li>
									<a>业务业绩信息</a>
								</li>
                                <li>
									<a>开票记录</a>
								</li>
								<li>
									<a>签约信息</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<!--content-->
				<div class="col9 docs-body" id="main_content">

                    <!--来源信息-->
                    <div id="sourceInfo" class="col8">
					<p>
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td>来源信息<?php echo $sqlresult[1][1];?></td><td>
							</tbody>
							<tbody>
								<tr>
									<td>ID</td><td><?php echo $sqlresult[1][1];?></td>
								</tr>
							</tbody>						
						</table>
						</p>
					</div>
                    <!--执照信息-->
                    <div  id="identityInfo"  class="col8">
	                    <div>
		                    <p>
		                    <table class="table table-bordered">
			                    <tbody>
			                    <tr>
				                    <td>执照信息</td>
				                    <td>
				                    </td>
			                    </tbody>
			                    <tbody>
			                    <tr>
				                    <td>统一社会信用代码<?php echo $sqlresult[1][1];?></td>
				                    <td>91510100054946627W<?php echo $sqlresult[1][1];?></td>
			                    </tr>
			                    <tr>
				                    <td>名称</td>
				                    <td>四川世纪风汽车救援服务有限公司W<?php echo $sqlresult[1][1];?></td>
			                    </tr>
			                    <tr>
				                    <td>类型</td>
				                    <td>有限责任公司（自然人投资或控股）<?php echo $sqlresult[1][1];?></td>
			                    </tr>
			                    <tr>
				                    <td>住所</td>
				                    <td>成都市武侯区顺和街1号附57号1幢2楼3号<?php echo $sqlresult[1][1];?></td>
			                    </tr>
			                    <tr>
				                    <td>法定代表人</td>
				                    <td>钟敏<?php echo $sqlresult[1][1];?></td>
			                    </tr>
			                    <tr>
				                    <td>注册资本</td>
				                    <td>（人民币）贰佰万元<?php echo $sqlresult[1][1];?></td>
			                    </tr>
			                    <tr>
				                    <td>成立日期</td>
				                    <td>2012/11/9<?php echo $sqlresult[1][1];?></td>
			                    </tr>
			                    <tr>
				                    <td>营业期限</td>
				                    <td>至永久<?php echo $sqlresult[1][1];?></td>
			                    </tr>
			                    <tr>
				                    <td>经营范围</td>
				                    <td><?php echo $sqlresult[1][1];?></td>
			                    </tr>
			                    <tr>
				                    <td>登记机关</td>
				                    <td>成都市工商行政管理局<?php echo $sqlresult[1][1];?></td>
			                    </tr>
			                    <tr>
				                    <td>发证日期</td>
				                    <td>2016/5/4<?php echo $sqlresult[1][1];?></td>
			                    </tr>
			                    </tbody>
		                    </table>
		                    </p>
	                    </div>
                    </div>
                    <!--联系方式信息-->
                    <div id="contactInfo" class="col8">
					<p>
                    <table class="table table-bordered"><tbody>
				<tr><td>联系方式信息</td><td></td></tr></tbody><tbody>
				<tr><td>姓名</td><td>钟敏<?php echo $sqlresult[1][1];?></td></tr></tbody><tfoot>
				<tr><td>电话</td><td>13568851156<?php echo $sqlresult[1][1];?></td></tr>
				<tr><td>QQ</td><td>501556466<?php echo $sqlresult[1][1];?></td></tr>
				<tr><td>邮箱</td><td>501556466@qq.com<?php echo $sqlresult[1][1];?></td></tr>
				<tr><td>微信</td><td>13568851156<?php echo $sqlresult[1][1];?></td></tr>
				<tr><td>微博</td><td>世纪风<?php echo $sqlresult[1][1];?></td></tr></tfoot></table>
                    
                    </p>
                    </div>
                    <!--员工信息-->
                    <div id="staffInfo" class="col8">
					<p>
                    	<table class="table table-bordered">
							<tbody>
								<tr>
									<td>添加单位员工</td><td>
							</tbody>
							<tbody>
								<tr>
									<td>姓名</td><td>钟敏<?php echo $sqlresult[1][1];?></td>
								</tr>
							</tbody>
							<tbody>
								<tr>
									<td>性别</td><td>男<?php echo $sqlresult[1][1];?></td>
								</tr>
							</tbody>
                            <tbody>
								<tr>
									<td>手机</td><td>13568851156<?php echo $sqlresult[1][1];?></td>
								</tr>
							</tbody>
                            <tbody>
								<tr>
									<td>部门</td><td>总经办<?php echo $sqlresult[1][1];?></td>
								</tr>
							</tbody>
                            <tbody>
								<tr>
									<td>职位</td><td>总经理<?php echo $sqlresult[1][1];?></td>
								</tr>
							</tbody>	
                            <tbody>
								<tr>
									<td>座机</td><td>028-61676773<?php echo $sqlresult[1][1];?></td>
								</tr>
							</tbody>
                            <tbody>
								<tr>
									<td>QQ</td><td>283838119<?php echo $sqlresult[1][1];?></td>
								</tr>
								<tr>
									<td>邮箱</td><td>283838119@qq.com<?php echo $sqlresult[1][1];?></td>
								</tr>
								<tr>
									<td>微信</td><td>13568851156<?php echo $sqlresult[1][1];?></td>
								</tr>
								<tr>
									<td>微博</td><td>13568851162<?php echo $sqlresult[1][1];?></td>
								</tr>
								<tr>
									<td>授权</td><td>救援业务<?php echo $sqlresult[1][1];?></td>
								</tr>
                            </tbody>
						</table>
                    </p>
                    </div>
                    <!--办公信息-->
                    <div id="officeInfo" class="col8">
	                    <p>
	                    <table class="table table-bordered">
		                    <tbody>
		                    <tr>
			                    <td>办公场所信息</td><td>
		                    </tbody>
		                    <tbody>
		                    <tr>
			                    <td>地址</td><td>成都市青羊区青羊大道97号36栋一单元605<?php echo $sqlresult[1][1];?></td>
		                    </tr>
		                    <tr>
			                    <td>性质</td><td>租赁<?php echo $sqlresult[1][1];?></td>
		                    </tr>
		                    <tr>
			                    <td>入住时间</td><td>2011.05.11<?php echo $sqlresult[1][1];?></td>
		                    </tr>
		                    <tr>
			                    <td>面积</td><td>76.6㎡<?php echo $sqlresult[1][1];?></td>
		                    </tr>
		                    </tbody>
	                    </table>
	                    </p>
                    </div>
                    <!--资产信息-->
                    <div id="propertyInfo" class="col8">
	                    <p>
	                    <table class="table table-bordered">
		                    <tbody>
		                    <tr>
			                    <td>资产信息</td><td></td>
		                    </tr>
		                    <tr>
			                    <td>钟敏</td><td>s201600025<?php echo $sqlresult[1][1];?></td>
		                    </tr>
		                    </tbody>
		                    <tbody>
		                    <tr>
			                    <td>资产名称</td><td>房产<?php echo $sqlresult[1][2];?></td>
		                    </tr>
		                    <tr>
			                    <td>小区名称</td><td>竹韵天府<?php echo $sqlresult[1][3];?></td>
		                    </tr>
		                    <tr>
			                    <td>小区地址</td><td>成都市武侯区果堰街12号<?php echo $sqlresult[1][4];?></td>
		                    </tr>
		                    <tr>
			                    <td>具体门牌</td><td>10栋2单元7号<?php echo $sqlresult[1][1];?></td>
		                    </tr>
		                    <tr>
			                    <td>房产面积</td><td>85.6<?php echo $sqlresult[1][1];?></td>
		                    </tr>
		                    <tr>
			                    <td>产权证号</td><td>201612245<?php echo $sqlresult[1][1];?></td>
		                    </tr>
		                    <tr>
			                    <td>录入日期</td><td>2016.06.06<?php echo $sqlresult[1][1];?></td>
		                    </tr>
		                    <tr>
			                    <td>录入人员</td><td>刘敏<?php echo $sqlresult[1][1];?></td>
		                    </tr>
		                    <tr>
			                    <td>资产核实</td><td>未核实<?php echo $sqlresult[1][1];?></td>
		                    </tr>
		                    <tr>
			                    <td>核实时间</td><td>-<?php echo $sqlresult[1][1];?></td>
		                    </tr>
		                    <tr>
			                    <td>核实人员</td><td>-<?php echo $sqlresult[1][1];?></td>
		                    </tr>
		                    <tr>
			                    <td>核实结果</td><td>-<?php echo $sqlresult[1][1];?></td>
		                    </tr>
		                    </tbody>
	                    </table>
	                    </p>
                    </div>
                    <!--车辆信息-->
                    <div id="carInfo" class="col8">
					<p>
                <table class="table table-bordered"><tbody>
				<tr><td>车辆基本信息</td><td></td></tr></tbody><tbody>
				<tr><td>车辆种类</td><td><?php echo $sqlresult[1][2];?></td></tr></tbody><tfoot>
				<tr><td>品牌</td><td>保时捷<?php echo $sqlresult[1][3];?></td></tr>
				<tr><td>型号</td><td><?php echo $sqlresult[1][4];?></td></tr>
				<tr><td>车牌号</td><td>川A156461<?php echo $sqlresult[1][5];?></td></tr>
				<tr><td>车辆类型</td><td><?php echo $sqlresult[1][6];?></td></tr>
				<tr><td>所有人</td><td>钟敏<?php echo $sqlresult[1][7];?></td></tr>
				<tr><td>住址</td><td>成都市青羊区优诺国际<?php echo $sqlresult[1][8];?></td></tr>
				<tr><td>使用性质</td><td><?php echo $sqlresult[1][9];?></td></tr>
				<tr><td>品牌型号</td><td><?php echo $sqlresult[1][10];?></td></tr>
				<tr><td>车辆识别代号</td><td><?php echo $sqlresult[1][11];?></td></tr>
				<tr><td>发动机号码</td><td><?php echo $sqlresult[1][12];?></td></tr>
				<tr><td>发证机关</td><td><?php echo $sqlresult[1][13];?></td></tr>
				<tr><td>注册日期</td><td><?php echo $sqlresult[1][14];?>2016.07.13</td></tr>
				<tr><td>核定载客人数</td><td><?php echo $sqlresult[1][15];?>50</td></tr>
				<tr><td>车身颜色</td><td><?php echo $sqlresult[1][16];?>白色</td></tr>
				<tr><td>检验有效期至</td><td>2050.07.13<?php echo $sqlresult[1][17];?></td></tr>
				<tr><td>分配给</td><td>钟敏<?php echo $sqlresult[1][18];?></td></tr></tfoot></table>
                    </p>
                    </div>
                    <!--银行账户信息-->
                    <div id="bankInfo" class="col8">
					<p>
                    <table class="table table-bordered">
                    <tbody>
				<tr><td>银行账户信息</td><td></td></tr>
                </tbody>
                <tbody>
				<tr><td>类型</td><td><?php echo $sqlresult[1][2];?></td></tr>
                <tr><td>开户银行</td><td><?php echo $sqlresult[1][3];?></td></tr>
                <tr><td>银行账号</td><td><?php echo $sqlresult[1][4];?></td></tr>
                </tbody>    
                </table>       
                    </p>
                    </div>
				</div>
			</div>
		</div>
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
					id : "20160001",
					name : "钟敏",
					office : "总经理",
					identyNum : "510XXXXXXXXXXXXXXXXXXXXXX"
				}
				//页面内数据改变
				document.getElementById("employee_Id").innerHTML = employee_data.id;
				document.getElementById("employee_name").innerHTML = employee_data.name;
				document.getElementById("employee_office").innerHTML = employee_data.office;
			}
			
		</script>
	</body>
</html>
