<?php
/**
 * Created by PhpStorm.
 * User: Juvo
 * Date: 2016/7/15
 * Time: 9:18
 */
include "../Common/localSQLSettings.php";
session_start();

if(@$_POST["Submit"]!="") {

	@$userName = $_POST['userName'];
	@$password = $_POST['password']."";

	localSettings();
	$query= "SELECT * FROM user WHERE user.name='$userName'";
//	$query= "SELECT * FROM user";
	$result = mysql_query($query);

	if(mysql_num_rows($result)>0){
		while($row=mysql_fetch_row($result)){
			if(strcmp($userName,$row[1])==0&&strcmp($password,$row[2]==0))
			{
//				echo $row[1];
//				echo $row[2];
//				echo $row[3];
				//session存储
				$_SESSION["userName"]=$userName;
				if(strcmp("909",$row[3]==0)){
					echo '<script language=javascript>window.location.href="index_superadmin.php"</script>';
				}else if(strcmp("606",$row[3]==0)){
					echo '<script language=javascript>window.location.href="index_admin.php"</script>';
				}else{
					echo '<script language=javascript>window.location.href="index_user.php"</script>';
				}
//				echo '<script language=javascript>window.location.href="../index.php"</script>';
			}
		}
	}else{
		echo '<script language=javascript>window.location.href="register.php"</script>';
	}

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
	<link type="image/x-icon" href="../assets/ico/favicon.png" rel="shortcut icon">
	<link rel="stylesheet" href="../assets/css/slicy.css">
	<link rel="stylesheet" href="../css/prettify.css" >
	<link rel="stylesheet" href="../css/docs.css">

	<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="../css/templatemo_style.css" rel="stylesheet" type="text/css">
	<style>
		h1 {
			font-weight: 300;
			font-size: 36px;
			line-height: normal;
			margin: auto;
			margin-top: 30px;
			text-align: center;
		}
		h2 {
			font-weight: 500;
			font-size: 20px;
			line-height: normal;
			margin: auto;
			margin-bottom: 30px;
			text-align: center;
			color: #09F;
		}
	</style>
	<title>世纪风</title>
</head>
<body onload="initView();">
<div class="naver">
	<div class="wrapper">
		<div class="brand">
			<a href="../index.php"><img src="../imgs/logo.png"/></a>
		</div>
		<div class="gh">
			<a href="#"></a>
		</div>
		<div class="module">
			<ul>
				<li>
					<a>人事管理</a>
				</li>
				<li>
					<a>车辆管理</a>
				</li>
				<li>
					<a>客户管理</a>
				</li>
				<li>
					<a>订单管理</a>
				</li>
				<li>
					<a>财务管理</a>
				</li>
				<li>
					<a>登录</a><a href="register.php">注册</a>
				</li>
			</ul>
		</div>
		<div class="sub">
			<ul>
				<li>
					<a href="" target="_blank" title="世纪风">世纪风</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="wrapper">
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15">登录</h1>
			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="#" method="post">
				<div class="form-group">
					<div class="col-xs-12">
						<div class="control-wrapper">
							<label for="username" class="control-label fa-label"><i class="fa fa-user fa-medium"></i></label>
							<input type="text" class="form-control" id="username" name="userName" placeholder="用户名" onchange="checkName();">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="control-wrapper">
							<label for="password" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Password"  onchange="checkPassword();">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="checkbox control-wrapper">
							<label>
								<input type="checkbox"> 记住我
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="control-wrapper">
							<input name="Submit" type="submit" value="登录" class="btn btn-info" onclick="login();">
							<a href="forgot_password.html" class="text-right pull-right">忘记密码?</a>
						</div>
					</div>
				</div>
				<hr>
			</form>
			<div class="text-center">
				<a href="register.php" class="templatemo-create-new">创建一个新的账户<i class="fa fa-arrow-circle-o-right"></i></a>
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
	var userCheckId="";
	function initView(){
//				var userCheckId="60620160001";
		CheckUserId(userCheckId);
	}
	function CheckUserId(userCheckId){
		var checkId=userCheckId.substring(0,3);
		if(checkId=="909"){
			alert("超级管理员");
		}else if(checkId=="606"){
			alert("管理员");
		}else if(checkId=="303"){
			alert("用户");
		}else{
//					alert("请登录您的账户！");
		}
	}
	/*
	 *登录信息比对
	 * */
	var login_name="136";
	var login_password="123";
	function login(){
		var userName=document.getElementById("username").value;
		var userPassword=document.getElementById("password").value;
		if(userName==null||password==null){
			alert("请输入用户名及密码");
		}else if(!userName){
			alert("用户名不正确");
		}else if(!userPassword){
			alert("密码不正确");
		}
	}
	function checkName(){

	}
	function checkPassword(){

	}
</script>
</body>
</html>
