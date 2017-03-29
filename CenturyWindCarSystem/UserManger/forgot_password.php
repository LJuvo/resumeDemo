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
							<a href="login.php" target="_blank">登录</a><a href="register.php">注册</a>
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
        	<div class="col-md-12">
			<h1 class="margin-bottom-15">密码重置</h1>
            <div id="main_content">
            <div id="sd">
			<form class="form-horizontal templatemo-forgot-password-form templatemo-container" role="form" action="#" method="post">	
				<div class="form-group">
		          <div class="col-md-12">
		          	请输入您在我们网站上注册的电子邮件地址。
		          </div>
		        </div>		
		        <div class="form-group">
		          <div class="col-md-12">
		            <input type="text" class="form-control" id="email" placeholder="Your email(www.xxxxx@163.com)">	            
		          </div>              
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		            <input type="submit" value="提交" class="btn btn-danger">
                    <br><br>
                    <a href="login.php">登录</a> |
                    <a href="register.php">注册</a> |
                    <a onClick="changeToTel();">手机号重置</a>
		          </div>
		        </div>
		      </form>
              </div>
              </div>
		</div>
		</div>
		<div class="wrapper footer">
			<p>
				&copy; CopyRight 2002-2013, Qietu Network Technology Co., Ltd. All Rights Reserved.
				<script type="text/javascript">
					var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
					document.write(unescape("%3Cspan id='cnzz_stat_icon_1255281778'%3E%3C/span%3E%3Cscript src='"
					 + cnzz_protocol + "s11.cnzz.com/stat.php%3Fid%3D1255281778' type='text/javascript'%3E%3C/script%3E"));
				</script>
				<br/>
			</p>
		</div>
       
		<script src="../assets/js/jquery-1.7.1.min.js"></script>
		<script src="../assets/js/slicy.js"></script>
		<script src="../js/prettify.js"></script>
		<script src="../js/docs.js"></script>
        <script type="text/javascript">
        	function changeToTel(){
				
				var temp = '<div id="sd"><form class="form-horizontal templatemo-forgot-password-form templatemo-container" role="form" action="#" method="post">';	
				temp+='<div class="form-group"><div class="col-md-12">请输入您在我们网站上注册的手机号码。</div></div><div class="form-group"><div class="col-md-12">';
		        temp+='<input type="text" class="form-control" id="email" placeholder="Your Telphone(136XXXXXXXX)"></div></div>';
		        temp+='<div class="form-group"><div class="col-md-12"><input type="submit" value="提交" class="btn btn-danger">';
                temp+='<br><br><a href="login.php">登录</a> |<a href="register.php">注册</a> |<a onClick="changeToEmail();">邮箱重置</a></div></div></form></div>';
				//改变main_content的内容
				changeinfo(temp);

//				alert("aa");
				}
				function changeToEmail(){
				
				var temp = '<div id="sd"><form class="form-horizontal templatemo-forgot-password-form templatemo-container" role="form" action="#" method="post">';	
				temp+='<div class="form-group"><div class="col-md-12">请输入您在我们网站上注册的电子邮件地址。</div></div><div class="form-group">';
		        temp+='<div class="col-md-12"><input type="text" class="form-control" id="email" placeholder="Your email(www.xxxxx@163.com)"></div>';              
		        temp+='</div><div class="form-group"><div class="col-md-12"><input type="submit" value="提交" class="btn btn-danger"><br><br>';
                temp+='<a href="login.php">登录</a> |<a href="register.php">注册</a> |<a onClick="changeToTel();">手机号重置</a></div></div></form></div>';
				//改变main_content的内容
				changeinfo(temp);

//				alert("aa");
				}
				/*utils*/
			function changeinfo(temp) {
				
				var oTest = document.getElementById('main_content');
				var newNode = document.createElement("p");
				removeElement('sd');
				newNode.innerHTML = temp;
			
				oTest.appendChild(newNode);
			}

			//删除某ID元素
			function removeElement(id) {
				obj = document.getElementById(id);
				obj.parentNode.removeChild(obj);
			}
        </script>
	</body>
</html>
