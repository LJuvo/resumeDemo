<?php
//if($_GET["cust_ID"])
//{
//    $cust_ID=$_GET["cust_ID"];
//}
//include "../Common/localSQLSettings.php";
//localSettings();
//
////$e_ID=2013110104;
//
//// global $sqlresult;
//
//    $customers= "SELECT * FROM cutomers WHERE cust_ID=$cust_ID";
//    $account = "SELECT * FROM customer_account WHERE cust_ID=$cust_ID";
//    $address = "SELECT * FROM customer_address WHERE cust_ID=$cust_ID";
//    $assets= "SELECT * FROM customer_assets WHERE cust_ID=$cust_ID";
//    $car = "SELECT * FROM customer_car WHERE cust_ID=$cust_ID";
//    $contact = "SELECT * FROM customer_contact WHERE cust_ID=$cust_ID";
//    $idcard = "SELECT * FROM customer_idcard WHERE cust_ID=$cust_ID";
//    $license = "SELECT * FROM customer_license WHERE cust_ID=$cust_ID";
//    $other_contact = "SELECT * FROM customer_other_contact WHERE cust_ID=$cust_ID";
//    $unit = "SELECT * FROM customer_unit WHERE cust_ID=$cust_ID";
//
//    $customers1 = mysql_query($customers) or die("Error in query: $customers. " . mysql_error());
//    $account1 = mysql_query($account) or die("Error in query: $account. " . mysql_error());
//    $address1 = mysql_query($address) or die("Error in query: $address. " . mysql_error());
//    $assets1 = mysql_query($assets) or die("Error in query: $assets. " . mysql_error());
//    $car1 = mysql_query($car) or die("Error in query: $car. " . mysql_error());
//    $contact1 = mysql_query($contact) or die("Error in query: $contact. " . mysql_error());
//    $idcard1 = mysql_query($idcard) or die("Error in query: $idcard. " . mysql_error());
//    $license1 = mysql_query($license) or die("Error in query: $license. " . mysql_error());
//    $other_contact1 = mysql_query($other_contact) or die("Error in query: $other_contact. " . mysql_error());
//
//    $unit1 = mysql_query($unit) or die("Error in query: $unit. " . mysql_error());
//
//
//
//    $row0 = mysql_fetch_row($customers1); //个人信息
//
//    $row2 = mysql_fetch_row($idcard1);//身份证信息
//    $row3 = mysql_fetch_row($contact1);//联系方式
//    $row4 = mysql_fetch_row($unit1);//工作单位
//    $row5 = mysql_fetch_row($car1);//车辆信息
//    $row6 = mysql_fetch_row($address1);//住家信息
//    $row7 = mysql_fetch_row($assets1);//资产信息
//    $row8 = null;
//  //  $row8 = mysql_fetch_row($dingdan); //订单信息 暂无
//    $row9 = mysql_fetch_row($account1);//银行账户
//    $row10 = mysql_fetch_row($license1);//驾驶证信息
//    $row11 = mysql_fetch_row($other_contact1);//联系人信息
//
//    $source = "SELECT * FROM customer_source WHERE cust_ID=$row0[7]";
//    $source1 = mysql_query($source) or die("Error in query: $source. " . mysql_error());
//    $row1 = mysql_fetch_row($source1);//来源信息
//
//    $sqlresult = array($row0, $row1, $row2, $row3, $row4, $row5, $row6, $row7, $row8, $row9, $row10 ,$row11);

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
									<a href="#mineInfo">个人信息</a>
								</li>
								<li>
									<a href="#sourceInfo">来源信息</a>
								</li>
								<li>
									<a href="#identityInfo">身份信息</a>
								</li>
								<li>
									<a href="#contactInfo">联系方式信息</a>
								</li>
								<li>
									<a href="#officeInfo">工作单位信息</a>
								</li>
								<li>
									<a href="#carInfo">车辆信息</a>
								</li>
								<li>
									<a href="#homeInfo">住家信息</a>
								</li>
								<li>
									<a href="#propertyInfo">资产信息</a>
								</li>
								<li>
									<a>订单信息</a>
								</li>
								<li>
									<a href="#bankInfo">银行账户信息</a>
								</li>
                                <li>
									<a href="#carCardInfo">驾驶证信息</a>
								</li>
								<li>
									<a href="#linkman">联系人信息</a>
								</li>
								<li>
									<a>名下客户信息</a>
								</li>
								<li>
									<a>业务业绩信息</a>
								</li>
                                <li>
									<a>开票信息</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<!--content-->
				<div class="col9 docs-body" id="main_content">
                	<!--个人信息-->
					<div id="mineInfo" class="col8">
					<p>
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td>个人信息</td><td>
							</tbody>
							<tbody>
								<tr>
									<td>ID</td><td><?php echo $sqlresult[0][1];?></td>
								</tr>
							</tbody>
							<tbody>
								<tr>
									<td>姓名</td><td><?php echo $sqlresult[0][2];?></td>
								</tr>
							</tbody>
                            <tbody>
                            <tr>
                                <td>性别</td><td><?php echo $sqlresult[0][3];?></td>
                            </tr>
                            </tbody>
                            <tbody>
                            <tr>
                                <td>电话</td><td><?php echo $sqlresult[0][5];?></td>
                            </tr>
                            </tbody>
                            <tbody>
                            <tr>
                                <td>车牌号</td><td><?php echo $sqlresult[0][6];?></td>
                            </tr>
                            </tbody>
						</table>
						</p>
					</div>
                    <!--来源信息-->
                    <div id="sourceInfo" class="col8">
					<p>
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td>来源信息</td><td>
							</tbody>
							<tbody>
								<tr>
									<td>ID</td><td><?php echo $sqlresult[1][1];?></td>
								</tr>
							</tbody>
                            <tbody>
                            <tr>
                                <td>姓名</td><td><?php echo $sqlresult[1][2];?></td>
                            </tr>
                            </tbody>
                            <tbody>
                            <tr>
                                <td>性别</td><td><? echo $sqlresult[1][3];?></td>
                            </tr>
                            </tbody>
                            <tbody>
                            <tr>
                                <td>电话</td><td><?php echo $sqlresult[1][4]?></td>
                            </tr>
                            </tbody>
                        </table>
						</p>
					</div>
                    <!--身份信息-->
                    <div id="identityInfo" class="col8">
					<p>
						<table class="table table-bordered"><tbody>
				<tr><td>身份证信息</td><td></td></tr></tbody><tbody>
				<tr><td>姓名</td><td><?php echo $sqlresult[2][2]; ?></td></tr></tbody><tfoot>
				<tr><td>性别</td><td>男<?php echo $sqlresult[2][3];?></td></tr>
				<tr><td>民族</td><td>汉</td><?php echo $sqlresult[2][4];?></tr>
				<tr><td>出生</td><td>2016.07.13<?php echo $sqlresult[2][5];?></td></tr>
				<tr><td>住址</td><td>成都市青羊区优诺国际<?php echo $sqlresult[2][6];?></td></tr>
				<tr><td>公民身份证号码</td><td>510XXXXXXXXXXXXXXX<?php echo $sqlresult[2][7];?></td></tr>
				<tr><td>签发机关</td><td>公安局<?php echo $sqlresult[2][8];?></td></tr>
				<tr><td>有效期限</td><td>2050.07.03<?php echo $sqlresult[2][9];?></td></tr></tfoot></table>
						</p>
					</div>
                    <!--联系方式信息-->
                    <div id="contactInfo" class="col8">
					<p>
                    <table class="table table-bordered"><tbody>
				<tr><td>联系方式信息</td><td></td></tr></tbody><tbody>
				<tr><td>姓名</td><td>钟敏<?php echo $sqlresult[3][2];?></td></tr></tbody><tfoot>
				<tr><td>电话</td><td>13568851156  <?php echo $sqlresult[3][3];?></td></tr>
				<tr><td>QQ</td><td>501556466<?php echo $sqlresult[3][4];?></td></tr>
				<tr><td>邮箱</td><td>501556466@qq.com<?php echo $sqlresult[3][5];?></td></tr>
				<tr><td>微信</td><td>13568851156<?php echo $sqlresult[3][6];?></td></tr>
				<tr><td>微博</td><td>世纪风<?php echo $sqlresult[3][7];?></td></tr></tfoot></table>
                    
                    </p>
                    </div>
                    <!--工作单位信息-->
                    <div id="officeInfo" class="col8">
					<p>
                    	<table class="table table-bordered">
							<tbody>
								<tr>
									<td>工作单位信息</td><td></td>
							</tbody>
							<tbody>
								<tr>
									<td>单位简称</td><td><?php echo $sqlresult[4][2];?></td>
								</tr>
							</tbody>
							<tbody>
								<tr>
									<td>单位全称</td><td><?php echo $sqlresult[4][3];?></td>
								</tr>
							</tbody>
                            <tbody>
								<tr>
									<td>单位地址</td><td><?php echo $sqlresult[4][4];?></td>
								</tr>
							</tbody>
                            <tbody>
								<tr>
									<td>单位电话</td><td><?php echo $sqlresult[4][5];?></td>
								</tr>
							</tbody>
                            <tbody>
								<tr>
									<td>所在部门</td><td><?php echo $sqlresult[4][6];?></td>
								</tr>
							</tbody>
                            <tbody>
								<tr>
									<td>担任职位</td><td><?php echo $sqlresult[4][7]?></td>
								</tr>
							</tbody>	
                            <tbody>
								<tr>
									<td>办公电话</td><td><?php echo $sqlresult[4][8];?></td>
								</tr>
							</tbody>
                            <tbody>
								<tr>
									<td>入司时间</td><td><?php echo $sqlresult[4][9];?></td>
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
				<tr><td>车辆种类</td><td><?php echo $sqlresult[5][2];?></td></tr></tbody><tfoot>
				<tr><td>品牌</td><td>保时捷<?php echo $sqlresult[5][3];?></td></tr>
				<tr><td>型号</td><td><?php echo $sqlresult[5][4];?></td></tr>
				<tr><td>车牌号</td><td>川A156461<?php echo $sqlresult[5][5];?></td></tr>
				<tr><td>车辆类型</td><td><?php echo $sqlresult[5][6];?></td></tr>
				<tr><td>所有人</td><td>钟敏<?php $sqlresult[5][7];?></td></tr>
				<tr><td>住址</td><td>成都市青羊区优诺国际<?php echo $sqlresult[5][8];?></td></tr>
				<tr><td>使用性质</td><td><?php echo $sqlresult[5][9];?></td></tr>
				<tr><td>品牌型号</td><td><?php echo $sqlresult[5][10];?></td></tr>
				<tr><td>车辆识别代号</td><td><?php echo $sqlresult[5][11];?></td></tr>
				<tr><td>发动机号码</td><td><?php echo $sqlresult[5][12];?></td></tr>
				<tr><td>发证机关</td><td><?php echo $sqlresult[5][13];?></td></tr>
				<tr><td>注册日期</td><td>2016.07.13<?php echo $sqlresult[5][14];?></td></tr>
				<tr><td>核定载客人数</td><td>50<?php echo $sqlresult[5][15];?></td></tr>
				<tr><td>车身颜色</td><td>白色<?php echo $sqlresult[5][16];?></td></tr>
				<tr><td>检验有效期至</td><td>2050.07.13<?php echo $sqlresult[5][17];?></td></tr>
				<tr><td>分配给</td><td>钟敏<?php echo $sqlresult[5][18];?></td></tr></tfoot></table>
                    </p>
                    </div>
                    <!--住家信息-->
                    <div id="homeInfo" class="col8">
					<p>
                    <table class="table table-bordered"><tbody>
				<tr><td>住家信息</td><td></td></tr></tbody><tbody>
				<tr><td>小区名称</td><td><?php echo $sqlresult[6][2];?></td></tr></tbody><tfoot>
				<tr><td>地址</td><td>成都市青羊区优诺国际<?php echo $sqlresult[6][3]; ?></td></tr>
				<tr><td>性质</td><td><?php echo $sqlresult[6][4];?></td></tr>
				<tr><td>住家电话</td><td>135156465041<?php echo $sqlresult[6][5]?></td></tr>
				<tr><td>入住时间</td><td>2016.07.13<?php echo $sqlresult[6][6];?></td></tr></tfoot></table>
                    
                    </p>
                    </div>
                     <!--资产信息-->
                    <div id="propertyInfo" class="col8">
					<p>
                    <table class="table table-bordered">
                    <tbody>
				<tr><td>资产信息</td><td></td></tr>
                </tbody>
                <tbody>
				<tr><td>钟敏</td><td>s20160400025</td></tr>
                <tr><td>资产名称</td><td>房产<?php echo $sqlresult[7][2];?></td></tr>
                <tr><td>小区名称</td><td>竹韵天府<?php echo $sqlresult[7][3];?></td></tr>
                <tr><td>小区地址</td><td>成都市武侯区果堰街12号<?php echo $sqlresult[7][4];?>
                    </td></tr>
                <tr><td>具体门牌</td><td>10栋2单元7号<?php echo $sqlresult[7][5];?></td></tr>
                <tr><td>房产面积</td><td>85.6<?php echo $sqlresult[7][6];?></td></tr>
                <tr><td>产权证号</td><td>201612245<?php echo $sqlresult[7][7];?></td></tr>
                <tr><td>录入日期</td><td>2016.06.06<?php echo $sqlresult[7][8];?></td></tr>
                <tr><td>录入人员</td><td>刘敏<?php echo $sqlresult[7][9];?></td></tr>
                <tr><td>资产核实</td><td>未核实<?php echo $sqlresult[7][10];?></td></tr>
                <tr><td>核实时间</td><td>-<?php echo $sqlresult[7][11];?></td></tr>
                <tr><td>核实人员</td><td>-<?php echo $sqlresult[7][12];?></td></tr>
                <tr><td>核实结果</td><td>-<?php echo $sqlresult[7][13];?></td></tr>
                
                </tbody>
                
                </table>
                    
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
				<tr><td>类型</td><td><?php echo $sqlresult[9][2];?></td></tr>
                <tr><td>开户银行</td><td><?php echo $sqlresult[9][3];?></td></tr>
                <tr><td>银行账号</td><td><?php echo $sqlresult[9][4];?></td></tr>
                </tbody>    
                </table>       
                    </p>
                    </div>
                    <!--驾驶证信息-->
                    <div id="carCardInfo" class="col8">
                    <p>
                    <table class="table table-bordered"><tbody>
				<tr><td>驾驶证信息</td><td></td></tr></tbody><tbody>
				<tr><td>姓名</td><td>钟敏<?php echo $sqlresult[10][2];?></td></tr></tbody><tfoot>
				<tr><td>证号</td><td>165416516546846<?php echo $sqlresult[10][3];?></td></tr>
				<tr><td>档案编号</td><td>0001<?php echo $sqlresult[10][4];?></td></tr>
				<tr><td>性别</td><td>男<?php echo $sqlresult[10][5];?></td></tr>
				<tr><td>国籍</td><td>中国<?php echo $sqlresult[10][6];?></td></tr>
				<tr><td>住址</td><td>成都市青羊区优诺国际<?php echo $sqlresult[10][7];?></td></tr>
				<tr><td>出生日期</td><td>2016.07.13<?php echo $sqlresult[10][8];?></td></tr>
				<tr><td>初次领证日期</td><td>2016.07.13<?php echo $sqlresult[10][9];?></td></tr>
				<tr><td>准驾车型</td><td>C<?php echo $sqlresult[10][10];?></td></tr>
				<tr><td>发证机关</td><td>车管所<?php echo $sqlresult[10][11];?></td></tr>
				<tr><td>有效期限</td><td>2050.07.13<?php echo $sqlresult[10][12];?></td></tr></tfoot></table>
                    </p>
                    </div>
                    <!--联系人信息-->
                    <div id="linkmanInfo" class="col8">
                    <p>
                    <table class="table table-bordered"><tbody>
				<tr><td>联系人信息</td><td></td></tr></tbody><tbody>
				<tr><td>姓名</td><td>钟敏<?php echo $sqlresult[11][2];?></td></tr></tbody><tfoot>
				<tr><td>关系</td><td><?php echo $sqlresult[11][3];?></td></tr>
				<tr><td>电话</td><td>13541441648<?php echo $sqlresult[11][4];?></td></tr>
				<tr><td>住家</td><td>成都市青羊区优诺国际<?php echo $sqlresult[11][5];?></td></tr>
				<tr><td>单位</td><td>世纪风<?php echo $sqlresult[11][6];?></td></tr></tfoot></table>
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
