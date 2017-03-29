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
<body>
<?php
include '../Common/head.php';
?>
<div class="wrapper">
	<div class="row">
		<div class="col3">
			<ul class="sidebar nojs">
				<li>
					<ul>
						<li>
							<a href="finance.php">收入</a>
						</li>
						<li class="selected">
							<a href="#">支出</a>
						</li>
						<li>
							<a href="financedetain.php">暂扣</a>
						</li>
						<li>
							<a href="financefund.php">基金</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<!--content-->
		<div class="col9 docs-body" id="main_content">
			<div id="expend">
				<table class="table table-bordered" style="text-align:center" id="addNewTable">
					<tbody>
					<tr>
						<td colspan="4">支出</td>
					</tr>
					<tr>
						<td><a href="financeexpend.php">查询</a></td>
						<td class="selected"><a href="financeexpendwipe.php">报销</a></td>
					</tr>
					</tbody>
				</table>

				<table class="table table-bordered" style="text-align:center">
					<?php
					$num="1";
					echo"<form action='expendwipe.php?numId=$num' method='post'>";
					?>
						<tbody>
						<tr><td>费用报销</td><td colspan="3"></td></tr>
						<tr><td rowspan="8">报销基本信息</td><td>报销种类</td><td>燃油费报销</td></tr>
						<tr><td>报销金额</td><td colspan="3"><input name="expendmoney" value=""/></td></tr>
						<tr><td>产生时间</td><td colspan="3"><input name="expendTime" placeholder="2016-08-06 10:50"/></td></tr>
						<tr><td>产生地址</td><td colspan="3"><input name="expendAddress" placeholder=""/></td></tr>
						<tr><td>车辆里程</td><td colspan="3"><input name="expendCourse" placeholder="154854km"/></td></tr>
						<tr><td>关联合同</td><td colspan="3"><input name="expendContract" placeholder=""/></td></tr>
						<tr><td>报销人员</td><td colspan="3"><input name="expendName" placeholder=""/></td></tr>
						<tr><td>报销人员号码</td><td colspan="3"><input name="expendTel" placeholder=""/></td></tr>
						<tr><td>报销时间</td><td colspan="3"><input name="createAt" placeholder="当前时间" disabled="disabled"/></td></tr>
						<tr><td>报销内容</td><td colspan="3"><input name="expendInfo" placeholder="" </td></tr>
						<tr><td>内容详情</td><td colspan="3"><textarea name="expendContent" style="width: 96%;height: 150px;"></textarea></td></tr>
						<tr><td colspan="4"><input class="bg-inverse btn bg-blue" type="submit"/></td></tr>
						</tbody>
					</form>
				</table>
			</div>

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
