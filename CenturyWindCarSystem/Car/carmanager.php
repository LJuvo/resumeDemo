<?php
//    session_start();
//    if (empty($_SESSION['userName'])) {
//        $url = "../UserManger/login.php";
//        echo '<script language=javascript>window.location.href="' . $url . '"</script>';
//    } else {
//        @$userName = $_SESSION['userName'];
//
//	    include "../Common/localSQLSettings.php";
//	    localSettings();
//
//        $query = "SELECT * FROM user WHERE user.name='$userName'";
//        $result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
//        if (@$_GET['plateNumber']) {
//            $a = $_GET['plateNumber'];
//            echo $a;
//            $query1 = "delete from cars where plateNumber='$a'";
//            $result1 = mysql_query($query1) or die("Error in query: $query1. " . mysql_error());
//        }
//    }
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="author" content="developer@qietu.com">
		<!--禁止图像工具栏出现的网页标签-->
		<meta content="no" http-equiv="imagetoolbar">
		<!--用于iphone开发-->
		<meta content="width=device-width,initial-scale=1" name="viewport">
		<link type="image/x-icon" href="../assets/ico/favicon.png" rel="shortcut icon">
		<link rel="stylesheet" href="../assets/css/slicy.css">
		<link rel="stylesheet" href="../css/prettify.css" >
		<link rel="stylesheet" href="../css/docs.css">
		<style>
			#checkNum p{
				width: auto;
			}
			#checkNum input{
				width: auto;
			}
			table tr td{
				white-space:nowrap;
				font-size: x-small;
			}
		</style>
		<title>世纪风</title>
	</head>
	<body onload="initView();">
    <?php
    include '../Common/head.php';
    ?>
		<div class="wrapper">
			<div id="checkNum">
				<table class="table-bordered table" style="text-align: center">
					<tr>
						<td><p><input id="checkone" type="checkbox" checked="checked" onchange="showModel();"/>车辆列表</p></td>
						<td><p><input id="checktwo" type="checkbox" checked="checked" onchange="showModel();"/>公司已分配车辆</p></td>
						<td><p><input id="checkthree" type="checkbox" checked="checked" onchange="showModel();"/>公司未分配车辆</p></td>
					</tr>
				</table>
			</div>
			<div id="allCars">
			<table class="table table-bordered" style="text-align:center" id="addNewTable">
				<tbody>
					<tr>
						<td  colspan="10">车辆列表</td>
					</tr>
				</tbody>
				<tbody>
				<tr><td colspan="10"></td></tr>
				<tr><td colspan="10">车辆</td></tr>
				</tbody>
				<tbody>
					<tr>
						<td>编号</td>
						<td>车主</td>
						<td>车主类型</td>
						<td>联系电话</td>
                        <td>车辆类型</td>
                        <td>车辆品牌</td>
						<td>车牌号</td>
						<td>操作</td>
                        <td><a href="addcar.php">添加</a></td>
					</tr>
				</tbody>
				<?php
//
//				$query_company="SELECT * FROM car_procurement WHERE financialState='审核通过'";
//				$result_company = mysql_query($query_company) or die("Error in query: $query_company. ".mysql_error());
//				$temp=mysql_num_rows($result_company);
//				if($temp>0)
//				{
//					for($i=0;$i<$temp;$i++)
//					{
//						$row=mysql_fetch_row($result_company);

//						$carOwnerresult = mysql_query("SELECT * FROM cars WHERE plateNum='$row[1]'");
//						$carOwnerresult = mysql_query("SELECT * FROM cars WHERE plateNum='$row[1]'");
//
//						if(empty($carOwnerresult)){
//							$carOwner="无车主";
//						}else{
//							$carOwner="SELECT * FROM car_owener WHERE plateNum='$row[1]'";
//							$carOwnerresult = mysql_query($carOwnerQuery) or die("Error in query: $carOwnerQuery. ".mysql_error());
//
//						}
//						echo"<tbody>
//						<tr>
//						<td>$row[1]</td>
//						<td>暂无车主</td>
//						<td>单位车主</td>
//						<td>$row[9]</td>
//                        <td>$row[2]</td>
//                        <td>$row[5]</td>
//						<td>暂无</td>
//						<td><a  href='carbasicontent.php?commId=$row[1]'>查看</a></td>
//                        <td><a href='carbasirevise.php?commId=$row[1]'>修改</a></td>
//					</tr>
//				</tbody>";
//					}
//				}
//				$query_customer = "SELECT * FROM car_customer";
//				$result_customer = mysql_query($query_customer);
//				$temp_customer = mysql_num_rows($result_customer);
//				if($temp_customer>0){
//					for($i=0;$i<$temp_customer;$i++){
//						$row=mysql_fetch_row($result_customer);
//
//						$result_IdCard=mysql_fetch_row(mysql_query("SELECT * FROM car_customer_idcard WHERE carCompanyNum='$row[6]'"));
//						echo"<tbody>
//						<tr>
//						<td>$row[6]</td>
//						<td>个人车主</td>
//						<td>个人车主</td>
//						<td>$result_IdCard[10]</td>
//                        <td>$row[1]</td>
//                        <td>$row[3]</td>
//						<td>$row[5]</td>
//						<td><a  href='carbasicontent.php?commId=$row[6]'>查看</a></td>
//                        <td><a href='carbasirevise.php?commId=$row[6]'>修改</a></td>
//						</tr>
//						</tbody>";
//					}
//				}
				?>

			</table>
			</div>
			<div id="CompanyUseCars">
				<table class="table table-bordered" style="text-align:center" id="addNewTable">
					<tbody>
					<tr>
						<td  colspan="10">公司已分配车辆</td>
					</tr>
					</tbody>
					<tbody>
					<tr><td colspan="10"></td></tr>
					<tr><td colspan="10">车辆</td></tr>
					</tbody>
					<tbody>
					<tr>
						<td>编号</td>
						<td>车辆种类</td>
						<td>车辆类别</td>
						<td>品牌</td>
						<td>车牌号</td>
						<td>使用者</td>
						<td colspan="2">操作</td>
						<td><a  href="carbasicinfo.php?plateNumber=川S8162">查看</a></td>
					</tr>
					</tbody>

				</table>
			</div>
			<div id="CompanyNoneCars">
				<table class="table table-bordered" style="text-align:center" id="addNewTable">
					<tbody>
					<tr>
						<td  colspan="10">公司未分配车辆</td>
					</tr>
					</tbody>
					<tbody>
					<tr><td colspan="10"></td></tr>
					<tr><td colspan="10">车辆</td></tr>
					</tbody>
					<tbody>
					<tr>
						<td>编号</td>
						<td>车主</td>
						<td>车主类型</td>
						<td>联系电话</td>
						<td>车辆类型</td>
						<td>车辆品牌</td>
						<td>车牌号</td>
						<td colspan="2">操作</td>
						<td><a href="addcar.php">添加</a></td>
					</tr>
					</tbody>

				</table>
			</div>
		</div>
		<script src="../assets/js/jquery-1.7.1.min.js"></script>
		<script src="../assets/js/slicy.js"></script>
		<script src="../js/prettify.js"></script>
		<script src="../js/docs.js"></script>
		<script type="text/javascript">


			function showModel(){
				if(document.getElementById("checkone").checked){
					document.getElementById("allCars").style.display="block";
				}else{
					document.getElementById("allCars").style.display="none";
				}
				if(document.getElementById("checktwo").checked){
					document.getElementById("CompanyUseCars").style.display="block";
				}else{
					document.getElementById("CompanyUseCars").style.display="none";
				}
				if(document.getElementById("checkthree").checked){
					document.getElementById("CompanyNoneCars").style.display="block";
				}else{
					document.getElementById("CompanyNoneCars").style.display="none";
				}

			}

		</script>
	</body>
</html>
