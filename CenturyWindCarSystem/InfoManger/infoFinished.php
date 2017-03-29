<?php
/**
 * Created by PhpStorm.
 * User: Juvo
 * Date: 2016/7/12
 * Time: 9:39
 */
//include "../Common/localSQLSettings.php";
//localSettings();

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
		table tr td{
			white-space:nowrap;
			font-size: x-small;
		}
	</style>
	<title>世纪风</title>
</head>
<body>

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
							<a href="infoDistribute.php">待派订单</a>
						</li>
						<li>
							<a href="infoPerfect.php">订单信息完善</a>
						</li>
						<li class="selected">
							<a href="#">已完成订单</a>
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
					<td colspan="10">订单信息</td>
				</tr>
				<tr>
					<td>编号</td>
					<td>订单编号</td>
					<td>服务种类</td>
					<td>所属单位</td>
					<td>车牌号</td>
					<td>服务地址</td>
					<td>服务金额</td>

					<td>结算方式</td>
					<td>详情</td>
				</tr>
				<?php
//				$query="SELECT * FROM order_infomanger WHERE OrderState='已完善' ORDER BY createAt DESC";
//				$result = mysql_query($query) or die("Error in query: $query. ".mysql_error());
//				$temp=mysql_num_rows($result);
//				if($temp>0)
//				{
//					for($i=0;$i<=$temp-1;$i++)
//					{
//						$row=mysql_fetch_row($result);
//						$n=$i+1;
//						$resultFinance=mysql_fetch_row(mysql_query("SELECT carAllPrice FROM order_infomanger_detail WHERE OrderNum=$row[16]"));
//						echo"<tr><td>$n</td><td>$row[16]</td><td>$row[18]</td><td>$row[3]</td><td>$row[13]</td><td>$row[6]</td>
//						<td>$resultFinance[0]</td><td>$row[19]</td><td><a href='infoFinishedInfo.php?Id=$row[0]'>查看详情</a></td></tr>";
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
</script>
</body>
</html>
