<?php
if ($_GET['action'] == "save"){
	include_once('conn.php');
	include_once('uploadclass.php');
	$title=$_POST['title'];
	$pic=$uploadfile;
	if($title == "")
		echo"<Script>window.alert('对不起！你输入的信息不完整!');history.back()</Script>";
	$sql="insert into upload(title,pic) values('$title','$pic')";
	$result=mysql_query($sql,$conn);

//echo"<Script>window.alert('信息添加成功');location.href='upload.php'</Script>"; 
}
?>
<html>
<head>
	<title>文件上传实例</title>
</head>
<body>
<form method="post" action="?action=save" enctype="multipart/form-data">
	<table border=0 cellspacing=0 cellpadding=0 align=center width="100%">
		<tr>
			<td width=55 height=20 align="center"> </TD>
			<td height="16">

				<table width="48%" height="93" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td>标题：</td>
						<td><input name="title" type="text" id="title"></td>
					</tr>
					<tr>
						<td>文件： </td>
						<td><label>
								<input name="file" type="file" value="浏览" >
								<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
							</label></td>
					</tr>
					<tr>
						<td> </td>
						<td><input type="submit" value="上 传" name="upload"></td>
					</tr>
				</table></td>
		</tr>
	</table>
</form>
</body>
</html> 