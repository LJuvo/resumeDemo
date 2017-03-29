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
							<a href="login.php">登录</a><a>注册</a>
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

		<div class="wrapper bdr pd-small">
			<h1 class="margin-bottom-15">创建</h1>
	<div class="container">
		<div class="col-md-12">			
			<form class="form-horizontal templatemo-create-account templatemo-container" role="form" action="#" method="post">
				<div class="form-inner">
					<div class="form-group">
			          <div class="col-md-6">		          	
			            <label for="first_name" class="control-label">姓名</label>
			            <input type="text" class="form-control" id="first_name" placeholder="">		            		            		            
			          </div>   
                      <div class="col-md-6 templatemo-radio-group">
			          	<label class="radio-inline">
		          			<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1"> 男
		          		</label>
		          		<label class="radio-inline">
		          			<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> 女
		          		</label>
			          </div>              
			        </div>
			        <div class="form-group">
			          <div class="col-md-12">		          	
			            <label for="username" class="control-label">邮箱Email</label>
			            <input type="email" class="form-control" id="email" placeholder="">		            		            		            
			          </div>              
			        </div>			
			        <div class="form-group">
			          <div class="col-md-12">		          	
			            <label for="username" class="control-label">用户名（邮箱/手机号码）</label>
			            <input type="text" class="form-control" id="username" placeholder="">		            		            		            
			          </div>
			                 
			        </div>
			        <div class="form-group">
			          <div class="col-md-6">
			            <label for="password" class="control-label">密码</label>
			            <input type="password" class="form-control" id="password" placeholder="">
			          </div>
			          <div class="col-md-6">
			            <label for="password" class="control-label">重复密码</label>
			            <input type="password" class="form-control" id="password_confirm" placeholder="">
			          </div>
			        </div>
			        <div class="form-group">
			          <div class="col-md-12">
			            <label><input type="checkbox">我同意<a data-toggle="modal" data-target="#templatemo_modal">服务条款</a> 和 <a  data-toggle="modal" data-target="#templatemo_modal">隐私权政策和用户协议。</a></label>
			          </div>
			        </div>
			        <div class="form-group">
			          <div class="col-md-12">
			            <input type="submit" value="创建用户" class="btn btn-info">
			            <a href="login.php" class="pull-right">登录</a>
			          </div>
			        </div>	
				</div>				    	
		      </form>		      
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
        <!-- Modal -->
	<div class="modal fade" id="templatemo_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Terms of Service</h4>
	      </div>
	      <div class="modal-body">
	      	<p>This form is provided by <a rel="nofollow" href="http://www.cssmoban.com/page/1">Free HTML5 Templates</a> that can be used for your websites. Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
	        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
	        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
		<script src="../assets/js/jquery-1.7.1.min.js"></script>
		<script src="../assets/js/slicy.js"></script>
		<script src="../js/prettify.js"></script>
		<script src="../js/docs.js"></script>
        <script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	</body>
</html>
