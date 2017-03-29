<?php
$a = $_POST;

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
	<meta name="save" content="history">
	<link type="image/x-icon" href="../assets/ico/favicon.ico" rel="shortcut icon">

<!--	<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">-->
<!--	<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>-->
<!--	<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>-->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/jquery-3.0.0.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

	<title>世纪风</title>
</head>
<body onload="initView();">
<?php
include '../Common/head.php';
?>
<div class="wrapper">
	<div class="row">
		<div class="col12">
			<ul id="myTab" class="nav nav-tabs">
				<li class="active">
					<a href="#home" data-toggle="tab">
						公司采购车辆信息完善
					</a>
				</li>
				<li><a href="#ios" data-toggle="tab">客户车辆信息完善</a></li>
				<li class="dropdown">
					<a href="#" id="myTabDrop1" class="dropdown-toggle"
					   data-toggle="dropdown">全部车辆
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
						<li><a href="#jmeter" tabindex="-1" data-toggle="tab">jmeter</a></li>
						<li><a href="#ejb" tabindex="-1" data-toggle="tab">ejb</a></li>
						<li><a href="#ejb" tabindex="-1" data-toggle="tab">aaa</a></li>
					</ul>
				</li>
			</ul>
			<div id="myTabContent" class="tab-content" style="margin-left: 20px;">
				<div class="tab-pane fade in active" id="home">
					<p></p>
					<table class="table table-bordered table-hover">
						<caption></caption>
						<tbody>
						<tr>
							<th>名称</th>
							<th>城市</th>
							<th>密码</th>
						</tr>


						<tr>
							<td>Tanmay</td>
							<td>Bangalore</td>
							<td>560001</td>
						</tr>
						<tr>
							<td>Sachin</td>
							<td>Mumbai</td>
							<td>400003</td>
						</tr>
						<tr>
							<td>Uma</td>
							<td>Pune</td>
							<td>411027</td>
						</tr>
						</tbody>
					</table>
				</div>
				<div class="tab-pane fade" id="ios">
					<p></p>
					<table class="table table-bordered table-hover">
						<caption></caption>
						<tbody>
						<tr>
							<th>cc</th>
							<th>zz</th>
							<th>dd</th>
						</tr>
						<tr>
							<td>Tanmay</td>
							<td>Bangalore</td>
							<td>560001</td>
						</tr>
						<tr>
							<td>Sachin</td>
							<td>Mumbai</td>
							<td>400003</td>
						</tr>
						<tr>
							<td>Uma</td>
							<td>Pune</td>
							<td>411027</td>
						</tr>
						</tbody>
					</table>
				</div>
				<div class="tab-pane fade" id="jmeter">
					<p>jMeter is an Open Source testing software. It is 100% pure
						Java application for load and performance testing.</p>
					<p></p>
					<table class="table table-bordered table-hover">
						<caption></caption>
						<tbody>
						<tr>
							<th>cc</th>
							<th>zz</th>
							<th>dd</th>
						</tr>


						<tr>
							<td>Tanmay</td>
							<td>Bangalore</td>
							<td>560001</td>
						</tr>
						<tr>
							<td>Sachin</td>
							<td>Mumbai</td>
							<td>400003</td>
						</tr>
						<tr>
							<td>Uma</td>
							<td>Pune</td>
							<td>411027</td>
						</tr>
						</tbody>
					</table>
				</div>
				<div class="tab-pane fade" id="ejb">
					<p>Enterprise Java Beans (EJB) is a development architecture
						for building highly scalable and robust enterprise level
						applications to be deployed on J2EE compliant
						Application Server such as JBOSS, Web Logic etc.
					</p>
					<p></p>
					<table class="table table-bordered table-hover">
						<caption></caption>
						<tbody>
						<tr>
							<th>cc</th>
							<th>zz</th>
							<th>dd</th>
						</tr>


						<tr>
							<td>Tanmay</td>
							<td>Bangalore</td>
							<td>560001</td>
						</tr>
						<tr>
							<td>Sachin</td>
							<td>Mumbai</td>
							<td>400003</td>
						</tr>
						<tr>
							<td>Uma</td>
							<td>Pune</td>
							<td>411027</td>
						</tr>
						</tbody>
					</table>
				</div>
				<div class="tab-pane fade" id="aaa">
					<p>Enterprise Java Beans (EJB) is a development architecture
						for building highly scalable and robust enterprise level
						applications to be deployed on J2EE compliant
						Application Server such as JBOSS, Web Logic etc.
					</p>
					<p></p>
					<table class="table table-bordered table-hover">
						<caption></caption>
						<tbody>
						<tr>
							<th>cc</th>
							<th>zz</th>
							<th>dd</th>
						</tr>


						<tr>
							<td>Tanmay</td>
							<td>Bangalore</td>
							<td>560001</td>
						</tr>
						<tr>
							<td>Sachin</td>
							<td>Mumbai</td>
							<td>400003</td>
						</tr>
						<tr>
							<td>Uma</td>
							<td>Pune</td>
							<td>411027</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>

<?php
include '../Common/footer.php';
?>


<script type="text/javascript">
	$(function () {
		$('#myTab li:eq(1) a').tab('show');
	});
</script>

</body>
</html>
