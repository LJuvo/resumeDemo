
<?php
$uploaddir = "D:/WWW/CenturyWindCarSystem/upfiles/";//设置文件保存目录 注意包含/
$type=array("jpg","gif","bmp","jpeg","png");//设置允许上传文件的类型 
$patch="upload/";//程序所在路径

$date=date("Ymd")."000";
//$uploaddir=$uploaddir.$date."/";
//if(!file_exists($uploaddir)){
//	mkdir("C://upfiles/123/",0777,false);
//mkdir()
//}
////文件夹的创建
//$file_path = $uploaddir;
//if(!file_exists($file_path)){
//	mkdir($file_path);
//	echo "创建文件夹成功";
//}else{
//	echo "文件夹已存在";
//}

//获取文件后缀名函数 
function fileext($filename)
{
	return substr(strrchr($filename, '.'), 1);
}
//生成随机文件名函数 
function random($length)
{
	$hash = 'CR-';
	$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
	$max = strlen($chars) - 1;
	mt_srand((double)microtime() * 1000000);
	for($i = 0; $i < $length; $i++)
	{
		$hash .= $chars[mt_rand(0, $max)];
	}
	return $hash;
}

$a=strtolower(fileext($_FILES['file']['name']));
//判断文件类型 
if(!in_array(strtolower(fileext($_FILES['file']['name'])),$type))
{
	$text=implode(",",$type);
	echo "您只能上传以下类型文件: ",$text,"<br>";
}
//生成目标文件的文件名 
else{
	$filename=explode(".",$_FILES['file']['name']);
	do
	{
		$filename[0]=random(10); //设置随机数长度
		$name=implode(".",$filename);
//$name1=$name.".Mcncc"; 
		$uploadfile=$uploaddir.$name;
	}

	while(file_exists($uploadfile));

	if (move_uploaded_file($_FILES['file']['tmp_name'],$uploadfile))
	{
		if(is_uploaded_file($_FILES['file']['tmp_name']))
		{

			echo "上传失败!";
		}
		else
		{//输出图片预览
			echo "<p>您的文件已经上传完毕 上传图片预览: </p><br><p style='text-align: center'><img src='../upfiles/CR-wgONqbwKuD.png'/></p>";
			echo "<br><p><a href='upload.php'>继续上传</a></p>";

			img_create_small("../upfiles/CR-wgONqbwKuD.png",50,50,"../upload/");

//			$filename="../upfiles/CR-wgONqbwKuD.png";
//			$size = getimagesize($filename); //获取mime信息
//			$fp=fopen($filename, "rb"); //二进制方式打开文件
//			if ($size && $fp) {
//				header("Content-type: {$size['mime']}");
//				fpassthru($fp); // 输出至浏览器
//				exit;
//			} else {
//// error
//			}
		}
	}

}

function img_create_small($big_img, $width, $height, $small_img) {//原始大图地址，缩略图宽度，高度，缩略图地址
	$imgage = getimagesize($big_img); //得到原始大图片
	switch ($imgage[2]) { // 图像类型判断
		case 1:
			$im = imagecreatefromgif($big_img);
			break;
		case 2:
			$im = imagecreatefromjpeg($big_img);
			break;
		case 3:
			$im = imagecreatefrompng($big_img);
			break;
	}
	$src_W = $imgage[0]; //获取大图片宽度
	$src_H = $imgage[1]; //获取大图片高度
	$tn = imagecreatetruecolor($width, $height); //创建缩略图
	imagecopyresampled($tn, $im, 0, 0, 0, 0, $width, $height, $src_W, $src_H); //复制图像并改变大小
	imagepng($tn, $small_img);
//	imagejpeg($tn, $small_img); //输出图像
}
?> 