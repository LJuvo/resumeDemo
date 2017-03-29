<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/25
 * Time: 15:34
 */
/**
 * 上传图片生成缩略图
 *
 * 需要GD2库的支持
 *
 * 初始化时需要参数new thumbnails('需要缩略的图片的原始地址','缩略图的宽度','缩略图的高度','（可选参数）缩略图的保存路径');
 * 如果最后一个参数不指定，那么缩略图就默认保存在原始图片的所在目录里的small文件夹里，
 * 如果不存在small文件夹，则会自动创建small文件夹
 *
 * 初始化之后需要调用方法produce创建缩略图
 * $thumbnails = new thumbnails(''....);
 * $thumbnails->produce();
 *
 * 其中可以获取原始图片的相关信息，宽度、高度、和图片mime
 *
 * $thumbnails->getImageWidth(); //int 图片宽度
 * $thumbnails->getImageHeight(); // int 图片高度
 * $thumbnails->getImageMime(); // string 图片的mime
 *
 * $thumbnails->trueSize(); //array 这是一个包含图片等比例缩略之后的宽度和高度值的数组
 * $size = array('width'=>'','height'=>'');
 * 获取图片等比缩略之后的宽度和高度
 * $size['width']//等比缩略图的宽度
 * $size['height']//等比缩略图的高度
 *
 */
?>
<html>
<body>

<form action="upload_file.php" method="post"
      enctype="multipart/form-data">
	<label for="file">Filename:</label>
	<input type="file" name="file" id="file" />
	<br />
	<input type="submit" name="submit" value="Submit" />
</form>

</body>
</html>