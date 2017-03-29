<?php
session_start();
// 保存一天
$lifeTime = 24 * 3600;
//setcookie(session_name(),session_id(),time()+60,"/");

$time=date('Y');

//var_dump(session_name());
//var_dump(session_id());

if(isset($_POST['apply_flag']))
{
    $_SESSION["apply"]=$_POST;
}
@$apply_temp=$_SESSION["apply"];
if(isset($_POST['id_flag']))
{
    $_SESSION["id"]=$_POST;
}
@$id_temp=$_SESSION["id"];
if(isset($_POST['contact_flag']))
{
    $_SESSION["contact"]=$_POST;
}
@$contact_temp=$_SESSION["contact"];
if(isset($_POST['license_flag']))
{
    $_SESSION["license"]=$_POST;
}
@$license_temp=$_SESSION["license"];
if(isset($_POST['car_flag']))
{
    $_SESSION["car"]=$_POST;
}
@$car_temp=$_SESSION["car"];
if(isset($_POST['home_flag']))
{
    $_SESSION["home"]=$_POST;
}
@$home_temp=$_SESSION["home"];
if(isset($_POST['linkman_flag']))
{
    $_SESSION["linkman"]=$_POST;
}
@$linkman_temp=$_SESSION["linkman"];
if(isset($_POST['bank_flag']))
{
    $_SESSION["bank"]=$_POST;
}
@$bank_temp=$_SESSION["bank"];
if(isset($_POST['office_flag']))
{
    $_SESSION["office"]=$_POST;
}
@$office_temp=$_SESSION["office"];
if(isset($_POST['salary_flag']))
{
    $_SESSION["salary"]=$_POST;
}
@$salary_temp=$_SESSION["salary"];
if(isset($_POST['property_flag']))
{
    $_SESSION["property"]=$_POST;
}
@$property_temp=$_SESSION["property"];


if(empty($_SESSION["e_ID"]))
{
    if($id_temp!=null)
    {
        $temp=$id_temp["number"];
        $temp=substr($temp,6,12);
        $temp="sif".$temp;
        $_SESSION["e_ID"]=$temp;
    }
}
@$e_ID=$_SESSION["e_ID"];


$host = "localhost";
$user = "root";
$pass = "root";
$db = "sjf";
//创建一个mysql连接
$connection = mysql_connect($host, $user, $pass) or die("Unable to connect!");
//选择一个数据库
mysql_select_db($db) or die("Unable to select database!");
mysql_query("set names utf8");

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <!--禁止图像工具栏出现的网页标签-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--用于iphone开发-->
    <link type="image/x-icon" href="../assets/ico/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="../assets/css/slicy.css">
    <link rel="stylesheet" href="../css/prettify.css">
    <link rel="stylesheet" href="../css/docs.css">
    <title>世纪风</title>
</head>
<body onload="initView();">

<?php
include '../Common/head.php';
?>
<div class="wrapper">
    <div class="row">
        <div class="col3">
            <ul class="sidebar nojs">
                <li class="selected">

                    <ul>
                        <liclass="selected">
                        <a onClick="show_info(1);">应聘信息</a>
                </li>
                <li>
                    <a onClick="show_info(2);">身份信息</a>
                </li>
                <li>
                    <a onClick="show_info(3);">联系方式信息</a>
                </li>
                <li>
                    <a onClick="show_info(4);">驾驶证信息</a>
                </li>

                <li>
                    <a onClick="show_info(6);">住家信息</a>
                </li>
                <li>
                    <a onClick="show_info(7);">联系人信息</a>
                </li>
                <li>
                    <a onClick="show_info(8);">银行账户信息</a>
                </li>
                <li>
                    <a onClick="show_info(5);">车辆信息</a>
                </li>
                <li>
                    <a onClick="show_info(9);">任职设定</a>
                </li>
                <li>
                    <a onClick="show_info(10);">薪资设定</a>
                </li>
                <li>
                    <a onClick="show_info(11);">财产分配</a>
                </li>
            </ul>
            </li>
            </ul>
        </div>

        <div class="col9 docs-body" id="main_content">
            <div id="sd">
                <p>
                <table class="table table-bordered">
                    <!--这里是动态添加的内容-->
                </table>
                </p>
            </div>
        </div>
    </div>
</div>
<?php
	include "../Common/footer.php";
?>
<script src="../assets/js/jquery-1.7.1.min.js"></script>
<script src="../assets/js/slicy.js"></script>
<script src="../js/prettify.js"></script>
<script src="../js/docs.js"></script>
<script type="text/javascript">
/*
 页面数据初始化
 * */
function initView() {
    var flag = null;
    flag="<?php echo $e_ID?>";
    if(!flag)
    {
        identity();
        return false;
    }
    flag="<?php echo @$_POST['id_flag'];?>";
    if(flag){
        identity();
        return false;
    }
    flag="<?php echo @$_POST["contact_flag"];?>";
    if(flag){
        contact();
        return false;
    }
    flag="<?php echo @$_POST["license_flag"];?>";
    if(flag)
    {
        license();
        return false;
    }
    flag="<?php echo @$_POST["car_flag"];?>";
    if(flag)
    {
        car();
        return false;
    }
    flag="<?php echo @$_POST["home_flag"];?>";
    if(flag)
    {
        home();
        return false;
    }
    flag="<?php echo @$_POST["linkman_flag"];?>";
    if(flag)
    {
        linkman();
        return false;
    }
    flag="<?php echo @$_POST["bank_flag"];?>";
    if(flag)
    {
        bank();
        return false;
    }
    flag="<?php echo @$_POST["office_flag"];?>";
    if(flag)
    {
        office();
        return false;
    }
    flag="<?php echo @$_POST["salary_flag"];?>";
    if(flag)
    {
        salary();
        return false;
    }
    flag="<?php echo @$_POST["property_flag"];?>";
    if(flag)
    {
        property();
        return false;
    }
	apply();
}
/*
 选择不同的信息
 * */
function show_info(checkId) {
    //alert(checkId+"aa");
    switch (checkId) {
        case 0:
            //个人信息
            personal();
            break;
        case 1:
            //应聘信息
            apply();
            break;
        case 2:
            //身份信息
            identity();
            break;
        case 3:
            //联系方式信息
            contact();
            break;
        case 4:
            //驾驶证信息
            license();
            break;
        case 5:
            //车辆信息
            car();
            break;
        case 6:
            //住家信息
            home();
            break;
        case 7:
            //联系人信息
            linkman();
            break;
        case 8:
            //银行账户信息
            bank();
            break;
        case 9:
            //任职设定
            office();
            break;
        case 10:
            //薪资标准
            salary();
            break;
        case 11:
            //资产分配
            property();
            break;
        default:
            alert("error");
            break;
    }
}

/*pp：id；ppi：flag；*/
var pp = "sd";
var ppi = 0;
//个人信息
function personal() {
    temp= '';
    var temp='<div id="' + pp + '"><form action="" method="post"><table class="table table-bordered">';
    temp +=' <tr> <td  colspan="2">员工信息</td></tr> ';
    temp +='<tr> <td>员工编号</td> <td style="padding-right:15px;"> <input type="text" name="e_ID" placeholder="0001"style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>姓名</td> <td style="padding-right:15px;"> <input type="text" name="e_name"  placeholder="姓名"style="width:100%;padding:5px; margin-right:50px; display: block;" > </td> </tr>';
    temp +='<tr> <td>性别</td> <td> <input type="radio" name="sex"  value="男"><p>男</p><input type="radio" name="sex"  value="女"><p>女</p></td> </tr>';
    temp +='<tr> <td>联系电话</td> <td style="padding-right:15px;"> <input type="text" name="e_phone" placeholder="联系电话" > </td> </tr> <tr> <td>分配车辆</td> <td style="padding-right:15px;"> <input type="text" name="e_car" placeholder="车牌号" > </td> </tr>';
    temp +='<tr> <td align="center" colspan="2"><input class="btn bg-blue bg-inverse" type="submit" name="employers" value="提交"style="width:100%;padding:5px; margin-right:50px; display: block;"></td> </tr>';
    temp +=' </table> </form></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//应聘信息

function apply() {
    var temp = '<div id="' + pp + '"><form action="" method="post"> <table class="table table-bordered">';
    temp += '<tr> <td  colspan="2">应聘信息</td> </tr>';
    temp += '<tr> <td>时间</td> <td style="padding-right:15px;"> <select name="applyYear";><?php for($i=1950;$i<=$time;$i++){?><option <?php @$e=$id_temp["applyYear"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>年';
    temp +='<select name="applyMonth";><?php for($i=1;$i<=12;$i++){?><option <?php @$e=$id_temp["applyMonth"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>月';
    temp +='<select name="applyDay";><?php for($i=1;$i<=31;$i++){?><option <?php @$e=$id_temp["applyDay"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>日</td> </tr>';
    temp += '<tr> <td>渠道</td> <td style="padding-right:15px;"> <input type="text" name="channel" value="<?php @$e=$apply_temp["channel"];echo $e;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td>职位</td> <td style="padding-right:15px;"> <input type="text" name="position" value="<?php @$e=$apply_temp["position"];echo $e;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td>证件</td> <td style="padding-right:15px;"> <input type="text" name="number" value="<?php @$e=$apply_temp["number"];echo $e;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td align="center" colspan="2"><input type="hidden" name="apply_flag" value="1"><input class="btn bg-blue bg-inverse" type="submit" name="apply_info" value="提交"></td> </tr>';
    temp += '</table> </form></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//身份信息
function identity() {
	$flag="<?php @$a=$id_temp["id_flag"];echo $a;?>";
	if($flag) {
    var temp='<div id="' + pp + '"><form action="" method="post"> <table class="table table-bordered">';
    temp +='<tr> <td  colspan="2">身份信息</td> </tr>';
    temp +='<tr> <td>姓名</td> <td style="padding-right:15px;"> <input type="text" name="name" value="<?php @$e=$id_temp["name"];echo $e;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>性别</td> <td style="padding-right:15px;"><select name="sex";> <option <?php @$e=$id_temp["sex"];if ($e =="男") { ?>selected="selected" <?php } ?> value="男">男</option> <option <?php @$e=$id_temp["sex"];if ($e =="女") { ?>selected="selected" <?php } ?>  value="女">女</option> </select> </td>  </tr>';
    temp +='<tr> <td>民族</td> <td style="padding-right:15px;"> <input type="text" name="nation" value="<?php @$e=$id_temp["nation"];echo $e;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>出生</td> <td style="padding-right:15px;"> <select name="birthYear";><?php for($i=1950;$i<=$time;$i++){?><option <?php @$e=$id_temp["birthYear"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>年';
    temp +='<select name="birthMonth";><?php for($i=1;$i<=12;$i++){?><option <?php @$e=$id_temp["birthMonth"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>月';
    temp +='<select name="birthDay";><?php for($i=1;$i<=31;$i++){?><option <?php @$e=$id_temp["birthDay"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>日</td> </tr>';
    temp +='<tr> <td>住址</td> <td style="padding-right:15px;"> <input type="text" name="address" value="<?php @$e=$id_temp["address"];echo $e;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>公民身份证号码</td> <td style="padding-right:15px;"> <input type="text" name="number" value="<?php @$e=$id_temp["number"];echo $e;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>签发机关</td> <td style="padding-right:15px;"> <input type="text" name="organization" value="<?php @$e=$id_temp["organization"];echo $e;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr> ' ;
    temp +='<tr> <td>有限期限</td> <td style="padding-right:15px;"> <select name="startYear";><?php for($i=$time-50;$i<=$time;$i++){?><option <?php @$e=$id_temp["startYear"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>年';
    temp +='<select name="startMonth";><?php for($i=1;$i<=12;$i++){?><option <?php @$e=$id_temp["startMonth"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>月';
    temp +='<select name="startDay";><?php for($i=1;$i<=31;$i++){?><option <?php @$e=$id_temp["startDay"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>日&nbsp至&nbsp';
    temp +='<select name="endYear";><?php for($i=$time;$i<=$time+80;$i++){?><option <?php @$e=$id_temp["endYear"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>年';
    temp +='<select name="endMonth";><?php for($i=1;$i<=12;$i++){?><option <?php @$e=$id_temp["endMonth"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>月';
    temp +='<select name="endDay";><?php for($i=1;$i<=31;$i++){?><option <?php @$e=$id_temp["endDay"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>日</td> </tr>';
    temp +='<tr> <td align="center" colspan="2"><input type="hidden" name="id_flag" value="1"><input class="btn bg-blue bg-inverse" type="submit" name="employer_idcard" value="提交"></td></tr>';
    temp +=' </table> </form></div>';
    //改变main_content的内容
    changeinfo(temp);
	}
	else
	{
		alert("应聘信息没有添加，请点击回到应聘信息添加界面！");
		identity();
	}
}
//联系方式信息
function contact() {
    $flag="<?php @$a=$id_temp["id_flag"];echo $a;?>";
    if($flag) {
        var temp = '<div id="' + pp + '"><form action="" method="post"> <table class="table table-bordered">';
        temp += '<tr> <td ></td><td >姓名：<?php echo $id_temp["name"];?>&nbsp&nbsp&nbsp性别：<?php echo $id_temp["sex"];?>&nbsp&nbsp&nbsp编号：<?php echo $e_ID;?></td></tr>';
        temp += ' <tr> <td  colspan="2">联系方式信息</td> </tr>';
        temp += ' <tr> <td>电话</td> <td style="padding-right:15px;"> <input type="text" name="phone" value="<?php @$a=$contact_temp["phone"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp += ' <tr> <td>QQ</td> <td style="padding-right:15px;"> <input type="text" name="qq" value="<?php @$a=$contact_temp["qq"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp += ' <tr> <td>邮箱</td> <td style="padding-right:15px;"> <input type="text" name="email" value="<?php @$a=$contact_temp["email"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp += ' <tr> <td>微信</td> <td style="padding-right:15px;"> <input type="text" name="weChat" value="<?php @$a=$contact_temp["weChat"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp += ' <tr> <td>微博</td> <td style="padding-right:15px;"> <input type="text" name="weibo" value="<?php @$a=$contact_temp["weibo"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp += ' <tr> <td align="center" colspan="2"><input type="hidden" name="contact_flag" value="1"><input class="btn bg-blue bg-inverse" type="submit" name="employer_contact" value="提交"></td> </tr>';
        temp += ' </table> </form> </div>';
        //改变main_content的内容
        changeinfo(temp);
    }
    else
    {
        alert("身份信息没有添加，请点击回到应聘信息添加界面！");
        identity();
    }

}
//驾驶证信息
function license() {
    $flag="<?php @$a=$id_temp["id_flag"];echo $a;?>";
    if($flag) {
        var temp='<div id="' + pp + '"><form action="" method="post"> <table class="table table-bordered">';
        temp += '<tr> <td ></td><td >姓名：<?php echo $id_temp["name"];?>&nbsp&nbsp&nbsp性别：<?php echo $id_temp["sex"];?>&nbsp&nbsp&nbsp编号：<?php echo $e_ID;?></td></tr>';
        temp +='<tr> <td  colspan="2">驾驶证信息</td> </tr>';
        temp +='<tr> <td>身份证号</td> <td style="padding-right:15px;"> <input type="text" name="number" value="<?php @$a=$license_temp["number"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>档案编号</td> <td style="padding-right:15px;"> <input type="text" name="serialNumber" value="<?php @$a=$license_temp["number"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>姓名</td> <td style="padding-right:15px;"><?php @$a=$id_temp["name"];echo $a;?></td> </tr>';
        temp +='<tr> <td>性别</td> <td style="padding-right:15px;"> <?php @$e=$id_temp["sex"];echo $e;?> </td> </tr>';
        temp +='<tr> <td>国籍</td> <td style="padding-right:15px;"> <input type="text" name="country" value="<?php @$a=$license_temp["country"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>住址</td> <td style="padding-right:15px;"> <input type="text" name="address" value="<?php @$a=$license_temp["address"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>出生日期</td> <td style="padding-right:15px;"> <?php @$e=$id_temp["birthday"];echo $e;?> </td> </tr>';
        temp +='<tr> <td>初次领证日期</td> <td style="padding-right:15px;"><select name="firstYear";><?php for($i=1950;$i<=$time;$i++){?><option <?php @$e=$id_temp["applyYear"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>年';
        temp +='<select name="firstMonth";><?php for($i=1;$i<=12;$i++){?><option <?php @$e=$id_temp["applyMonth"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>月';
        temp +='<select name="firstDay";><?php for($i=1;$i<=31;$i++){?><option <?php @$e=$id_temp["applyDay"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>日</td> </tr>';
        temp +='<tr> <td>准驾车型</td> <td style="padding-right:15px;"> <input type="text" name="carType" value="<?php @$a=$license_temp["carType"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>发证机关</td> <td style="padding-right:15px;"> <input type="text" name="organization" value="<?php @$a=$license_temp["organization"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>有限期限</td> <td style="padding-right:15px;"> <select name="startYear";><?php for($i=$time-50;$i<=$time;$i++){?><option <?php @$e=$id_temp["startYear"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>年';
        temp +='<select name="startMonth";><?php for($i=1;$i<=12;$i++){?><option <?php @$e=$id_temp["startMonth"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>月';
        temp +='<select name="startDay";><?php for($i=1;$i<=31;$i++){?><option <?php @$e=$id_temp["startDay"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>日&nbsp至&nbsp';
        temp +='<select name="endYear";><?php for($i=$time;$i<=$time+80;$i++){?><option <?php @$e=$id_temp["endYear"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>年';
        temp +='<select name="endMonth";><?php for($i=1;$i<=12;$i++){?><option <?php @$e=$id_temp["endMonth"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>月';
        temp +='<select name="endDay";><?php for($i=1;$i<=31;$i++){?><option <?php @$e=$id_temp["endDay"];if ($e ==$i) { ?>selected="selected" <?php } ?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>日</td> </tr>';
        temp +='<tr> <td align="center" colspan="2"><input type="hidden" name="license_flag" value="1"><input class="btn bg-blue bg-inverse" type="submit" name="employer_license" value="提交"></td> </tr>';
        temp +=' </table> </form></div>';
        //改变main_content的内容
        changeinfo(temp);
    }
    else
    {
        alert("身份信息没有添加，请点击回到应聘信息添加界面！");
        identity();
    }

}
//车辆信息
function car() {
    $flag="<?php @$a=$id_temp["id_flag"];echo $a;?>";
    if($flag) {
        var temp='<div id="' + pp + '"><form action="" method="post"> <table class="table table-bordered">';
        temp += '<tr> <td ></td><td >姓名：<?php echo $id_temp["name"];?>&nbsp&nbsp&nbsp性别：<?php echo $id_temp["sex"];?>&nbsp&nbsp&nbsp员工ID：<?php echo $e_ID;?></td></tr>';
        temp +='<tr> <td  colspan="2">车辆基本信息</td> </tr>';
        temp +='<tr> <td>车辆种类</td> <td style="padding-right:15px;"> <input type="text" name="carClass" value="<?php @$a=$car_temp["carClass"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>品牌</td> <td style="padding-right:15px;"> <input type="text" name="brand" value="<?php @$a=$car_temp["brand"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>型号</td> <td style="padding-right:15px;"> <input type="text" name="model" value="<?php @$a=$car_temp["model"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>车牌号</td> <td style="padding-right:15px;"> <input type="text" name="plateNumber" value="<?php @$a=$car_temp["plateNumber"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>车辆类型</td> <td style="padding-right:15px;"> <input type="text" name="carType" value="<?php @$a=$car_temp["carType"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>所有人</td> <td style="padding-right:15px;"> <input type="text" name="owner" value="<?php @$a=$car_temp["owner"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>住址</td> <td style="padding-right:15px;"> <input type="text" name="address" value="<?php @$a=$car_temp["address"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>使用性质</td> <td style="padding-right:15px;"> <input type="text" name="use" value="<?php @$a=$car_temp["use"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>品牌型号</td> <td style="padding-right:15px;"> <input type="text" name="brandModel" value="<?php @$a=$car_temp["brandModel"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>车辆识别代号</td> <td style="padding-right:15px;"> <input type="text" name="vehicleCode" value="<?php @$a=$car_temp["vehicleCode"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>发动机号码</td> <td style="padding-right:15px;"> <input type="text" name="engineNumber" value="<?php @$a=$car_temp["engineNumber"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr> ';
        temp +='<tr> <td>发证机关</td> <td style="padding-right:15px;"> <input type="text" name="organization" value="<?php @$a=$car_temp["organization"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>注册日期</td> <td style="padding-right:15px;"> <input type="text" name="registDate" value="<?php @$a=$car_temp["registDate"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>核定载客人数</td> <td style="padding-right:15px;"> <input type="text" name="passenger" value="<?php @$a=$car_temp["passenger"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>车身颜色</td> <td style="padding-right:15px;"> <input type="text" name="carColor" value="<?php @$a=$car_temp["carColor"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>检验有效期至</td> <td style="padding-right:15px;"> <input type="text" name="usefulDate" value="<?php @$a=$car_temp["usefulDate"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>分配给</td> <td style="padding-right:15px;"> <input type="text" name="users" value="<?php @$a=$car_temp["users"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td align="center" colspan="2"><input type="hidden" name="car_flag" value="1"><input class="btn bg-blue bg-inverse" type="submit" name="car_msg" value="提交"></td> </tr>';
        temp +='</table></form> </div>';
        //改变main_content的内容
        changeinfo(temp);
    }
    else
    {
        alert("身份信息没有添加，请点击回到应聘信息添加界面！");
        identity();
    }

}
//住家信息
function home() {
    $flag="<?php @$a=$id_temp["id_flag"];echo $a;?>";
    if($flag) {
        var temp='<div id="' + pp + '"><form action="" method="post"> <table class="table table-bordered">';
        temp += '<tr> <td ></td><td >姓名：<?php echo $id_temp["name"];?>&nbsp&nbsp&nbsp性别：<?php echo $id_temp["sex"];?>&nbsp&nbsp&nbsp员工ID：<?php echo $e_ID;?></td></tr>';
        temp +='<tr> <td  colspan="2">住家信息</td> </tr>';
        temp +='<tr> <td>小区名称</td> <td style="padding-right:15px;"> <input type="text" name="community" value="<?php @$a=$home_temp["community"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>地址</td> <td style="padding-right:15px;"> <input type="text" name="address" value="<?php @$a=$home_temp["address"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>性质</td> <td style="padding-right:15px;"> <input type="text" name="nature" value="<?php @$a=$home_temp["nature"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>住家电话</td> <td style="padding-right:15px;"> <input type="text" name="tel" value="<?php @$a=$home_temp["tel"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>入住时间</td> <td style="padding-right:15px;"> <input type="text" name="checkInDate" value="<?php @$a=$home_temp["checkInDate"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td align="center" colspan="2"><input type="hidden" name="home_flag" value="1"><input class="btn bg-blue bg-inverse" type="submit" name="employer_address" value="提交"></td> </tr>';
        temp +='</table> </form> </div>';
        //改变main_content的内容
        changeinfo(temp);
    }
    else
    {
        alert("身份信息没有添加，请点击回到应聘信息添加界面！");
        identity();
    }

}
//联系人信息
function linkman() {
    $flag="<?php @$a=$id_temp["id_flag"];echo $a;?>";
    if($flag)
    {
        var temp = '<div id="' + pp + '"><form action="" method="post"> <table class="table table-bordered">';
        temp += '<tr> <td ></td><td >姓名：<?php echo $id_temp["name"];?>&nbsp&nbsp&nbsp性别：<?php echo $id_temp["sex"];?>&nbsp&nbsp&nbsp员工ID：<?php echo $e_ID;?></td></tr>';
        temp += '<tr> <td  colspan="2">联系人信息</td> </tr>';
        temp += '<tr> <td>姓名</td> <td style="padding-right:15px;"> <input type="text" name="name" value="<?php @$a=$linkman_temp["name"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp += '<tr> <td>关系</td> <td style="padding-right:15px;"> <input type="text" name="relationship" value="<?php @$a=$linkman_temp["relationship"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp += '<tr> <td>电话</td> <td style="padding-right:15px;"> <input type="text" name="phone" value="<?php @$a=$linkman_temp["phone"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp += '<tr> <td>住家</td> <td style="padding-right:15px;"> <input type="text" name="address" value="<?php @$a=$linkman_temp["address"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp += '<tr> <td>单位</td> <td style="padding-right:15px;"> <input type="text" name="unit" value="<?php @$a=$linkman_temp["unit"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp += '<tr> <td align="center" colspan="2"><input type="hidden" name="linkman_flag" value ="1"><input class="btn bg-blue bg-inverse" type="submit" name="employer_other_contact" value="提交"></td> </tr>';
        temp += '</table> </form> </div>';
        //改变main_content的内容
        changeinfo(temp);
    }
    else
    {
        alert("身份信息没有添加，请点击回到应聘信息添加界面！");
        identity();
    }

}
//银行账户信息
function bank() {
    $flag="<?php @$a=$id_temp["id_flag"];echo $a;?>";
    if($flag)
    {
        var temp = '<div id="' + pp + '"><form action="" method="post"> <table class="table table-bordered">';
        temp += '<tr> <td ></td><td >姓名：<?php echo $id_temp["name"];?>&nbsp&nbsp&nbsp性别：<?php echo $id_temp["sex"];?>&nbsp&nbsp&nbsp员工ID：<?php echo $e_ID;?></td></tr>';
        temp += '<tr> <td  colspan="2">银行卡信息</td> </tr>';
        temp += '<tr> <td>类别</td> <td style="padding-right:15px;"> <input type="text" name="type" value="<?php @$a=$bank_temp["type"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp += '<tr> <td>开户银行</td> <td style="padding-right:15px;"> <input type="text" name="bank" value="<?php @$a=$bank_temp["bank"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp += '<tr> <td>银行账号</td> <td style="padding-right:15px;"> <input type="text" name="bankAccount" value="<?php @$a=$bank_temp["bankAccount"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp += '<tr> <td align="center" colspan="2"><input class="btn bg-blue bg-inverse" type="submit" name="employer_account" value="提交"></td> </tr>';
        temp += '</table> </form> </div>';
        //改变main_content的内容
        changeinfo(temp);
    }
    else
    {
        alert("身份信息没有添加，请点击回到应聘信息添加界面！");
        identity();
    }

}
//任职设定
function office() {
    $flag="<?php @$a=$id_temp["id_flag"];echo $a;?>";
    if($flag)
    {
        var temp = '<div id="' + pp + '"><form action="" method="post"> <table class="table table-bordered">';
        temp += '<tr> <td ></td><td >姓名：<?php echo $id_temp["name"];?>&nbsp&nbsp&nbsp性别：<?php echo $id_temp["sex"];?>&nbsp&nbsp&nbsp员工ID：<?php echo $e_ID;?></td></tr>';
        temp +='<tr> <td  colspan="2">员工任职</td> </tr>';
        temp +='<tr> <td>姓名</td> <td style="padding-right:15px;"> <?php @$e=$id_temp["name"];echo $e;?> </td> </tr>';
        temp +='<tr> <td>身份证号</td> <td style="padding-right:15px;"> <?php @$e=$id_temp["number"];echo $e;?> </td> </tr>';
        temp +='<tr> <td>任职公司</td> <td style="padding-right:15px;"> <input type="text" name="company" value="<?php @$a=$office_temp["company"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>任职部门</td> <td style="padding-right:15px;"> <input type="text" name="department" value="<?php @$a=$office_temp["department"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>任职职位</td> <td style="padding-right:15px;"> <input type="text" name="position" value="<?php @$a=$office_temp["position"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>任职时间</td> <td style="padding-right:15px;"> <input type="text" name="date" value="<?php @$a=$office_temp["date"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td>员工ID</td> <td style="padding-right:15px;"> <?php echo $e_ID;?></td> </tr>';
        temp +='<tr> <td>人事专员</td> <td style="padding-right:15px;"> <input type="text" name="hr" value="<?php @$a=$office_temp["hr"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp +='<tr> <td align="center" colspan="2"><input class="btn bg-blue bg-inverse" type="submit" name="employer_office" value="提交"></td> </tr>';
        temp += '</table> </form> </div>';
        //改变main_content的内容
        changeinfo(temp);
    }
    else
    {
        alert("身份信息没有添加，请点击回到应聘信息添加界面！");
        identity();
    }

}
//薪资标准
function salary() {
    $flag="<?php @$a=$id_temp["id_flag"];echo $a;?>";
    if($flag)
    {
        var temp = '<div id="' + pp + '"><form action="" method="post"> <table class="table table-bordered">';
        temp += '<tr> <td ></td><td >姓名：<?php echo $id_temp["name"];?>&nbsp&nbsp&nbsp性别：<?php echo $id_temp["sex"];?>&nbsp&nbsp&nbsp员工ID：<?php echo $e_ID;?></td></tr>';
        temp += '<tr> <td  colspan="2">薪资标准</td> </tr>';
        temp += '<tr> <td>姓名</td> <td style="padding-right:15px;"> <?php @$e=$id_temp["name"];echo $e;?> </td> </tr>';
        temp += '<tr> <td>工号</td> <td style="padding-right:15px;"> <?php echo $e_ID;?> </td> </tr>';
        temp += '<tr> <td>薪资分类</td> <td style="padding-right:15px;"> <input type="text" name="type" value="服务司机类<?php @$a=$salary_temp["type"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp += '<tr> <td>计算方式</td> <td style="padding-right:15px;"> <input type="text" name="calculation1" value="（服务业绩-运营成本）*0.4+业务提成<?php @$a=$salary_temp["calculation1"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp += '<tr> <td></td> <td style="padding-right:15px;"> <input type="text" name="calculation2" value="（服务单量*（服务费*0.9））*0.8+业务提成<?php @$a=$salary_temp["calculation2"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp += '<tr> <td>绩效工资</td> <td style="padding-right:15px;"> <input type="text" name="meritPay1" value="（服务业绩-运营成本）*0.1<?php @$a=$salary_temp["meritPay1"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp += '<tr> <td></td> <td style="padding-right:15px;"> <input type="text" name="meritPay2" value="（服务单量*（服务费*0.9））*0.2<?php @$a=$salary_temp["meritPay2"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp += '<tr> <td>社会保险</td> <td style="padding-right:15px;"> <input type="text" name="socialInsurance" value="当月实缴金额<?php @$a=$salary_temp["socialInsurance"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp += '<tr> <td>住房公积金</td> <td style="padding-right:15px;"> <input type="text" name="houseConstruction" value="<?php @$a=$salary_temp["houseConstruction"];echo $a;?>" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
        temp += '<tr> <td align="center" colspan="2"><input class="btn bg-blue bg-inverse" type="submit" name="employer_salary" value="提交"></td> </tr>';
        temp += '</table> </form> </div>';
        //改变main_content的内容
        changeinfo(temp);
    }
    else
    {
        alert("身份信息没有添加，请点击回到身份信息添加界面！");
        identity();
    }

}
//资产分配
function property() {
    $flag="<?php @$a=$id_temp["id_flag"];echo $a;?>";
    if($flag)
    {
        var temp = '<div id="' + pp + '"><form action="" method="post"> <table class="table table-bordered">';
        temp += '<tr> <td ></td><td >姓名：<?php echo $id_temp["name"];?>&nbsp&nbsp&nbsp性别：<?php echo $id_temp["sex"];?>&nbsp&nbsp&nbsp员工ID：<?php echo $e_ID;?></td></tr>';
        temp += '<tr> <td  colspan="2">资产分配</td> </tr>';
        temp += '<tr> <td>编号</td> <td style="padding-right:15px;"> <?php echo $e_ID;?> </td> </tr>';
        temp += '<tr> <td>姓名</td> <td style="padding-right:15px;"> <?php @$e=$id_temp["name"];echo $e;?> </td> </tr>';
        temp += '<tr> <td>性别</td> <td align="padding-right:15px;"> <?php @$e=$id_temp["sex"];echo $e;?></td> </tr>';
        temp += '<tr> <td align="center" colspan="2"><input class="btn bg-blue bg-inverse" type="submit" name="employer_zhican" value="提交"></td> </tr>';
        temp += '</table> </form> </div>';
        //改变main_content的内容
        changeinfo(temp);
    }
    else
    {
        alert("身份信息没有添加，请点击回到身份信息添加界面！");
        identity();
    }
}

/*utils*/
function changeinfo(temp) {
    removeElement(pp);
    var oTest = document.getElementById('main_content');
    var newNode = document.createElement("p");
    if (ppi == 0) {
        newNode.innerHTML = temp;
    } else {
        removeElement(pp);
        newNode.innerHTML = temp;
    }
    ppi++;
    oTest.appendChild(newNode);
}

//删除某ID元素
function removeElement(id) {
    obj = document.getElementById(id);
    obj.parentNode.removeChild(obj);
    ppi = 0;
}
</script>

</body>
</html>
<?php
if(isset($_POST["employers"]))
{
    $e_name=$_POST["e_name"];
    $e_sex=$_POST["sex"];
    $e_phone=$_POST["e_phone"];
    $e_car=$_POST["e_car"];
    $query="insert into employers(e_ID,name,sex,phone,car) values ('$e_ID','$e_name','$e_sex','$e_phone','$e_car')";
    $s=mysql_query($query)+1;
//    echo"<script language='JavaScript'>alert('这里是员工基本信息$s');</script>";
}
if(isset($_POST["apply_info"]))
{
    $date=$_POST["applyYear"].' '.$_POST["applyMonth"].' '.$_POST["applyDay"];
    $channel=$_POST["channel"];
    $position=$_POST["position"];
    $number=$_POST["number"];
    $query2="insert into apply_info(date,channel,position,number) values ('$date','$channel','$position','$number')";
    $s2=mysql_query($query2)or die("Error in query: $query. ".mysql_error());
//    echo"<script language='JavaScript'>alert('这里是应聘信息$s2');</script>";
}
if(isset($_POST["employer_idcard"]))
{
    $id_name=$_POST["name"];
    $id_sex=$_POST["sex"];
    $id_nation=$_POST["nation"];
    $id_birthday=$_POST["birthYear"]."/".$_POST["birthMonth"]."/".$_POST["birthDay"];

    $id_address=$_POST["address"];
    $id_number=$_POST["number"];
    $organization=$_POST["organization"];
    $usefulDate=$_POST["startYear"]."/".$_POST["startMonth"]."/".$_POST["startDay"]."-".$_POST["endYear"]."/".$_POST["endMonth"]."/".$_POST["endDay"];

    $query3="insert into employer_idcard(e_ID,name,sex,nation,birthday,address,number,organization,usefulDate)
                        values ('$e_ID','$id_name','$id_sex','$id_nation','$id_birthday','$id_address','$id_number','$organization','$usefulDate')";
    $s3=mysql_query($query3)or die("Error in query: $query. ".mysql_error());
//    echo"<script language='JavaScript'>alert('这里是员工身份证信息$s3');</script>";

}
if(isset($_POST["employer_contact"]))
{

    $phone=$_POST["phone"];
    $qq=$_POST["qq"];
    $email=$_POST["email"];
    $weChat=$_POST["weChat"];
    $weibo=$_POST["weibo"];
    $query4="insert into employer_contact(e_ID,phone,qq,email,weChat,weibo)
                        values('$e_ID','$phone','$qq','$email','$weChat','$weibo')";
    $s4=mysql_query($query4)or die("Error in query: $query. ".mysql_error());
//    echo"<script language='JavaScript'>alert('这里是员工联系方式$s4');</script>";
}

if(isset($_POST["employer_license"]))
{

    $name=$_POST["name"];
    $number=$_POST["number"];
    $serialNumber=$_POST["serialNumber"];
    $sex=$_POST["sex"];
    $country=$_POST["country"];
    $address=$_POST["address"];
    $birthday=$_POST["birthday"];
    $firstDate=$_POST["firstDate"];
    $carType=$_POST["carType"];
    $organization=$_POST["organization"];
    $usefulDate=$_POST["usefulDate"];

    $query5="insert into employer_license(e_ID,name,sex,birthday,address,number,organization,usefulDate,carType,serialNumber,country,firstDate)
                        values ('$e_ID','$name','$sex','$birthday','$address','$number','$organization','$usefulDate','$carType','$serialNumber','$country','$firstDate')";
    $s5=mysql_query($query5)or die("Error in query: $query5. ".mysql_error());
//    echo"<script language='JavaScript'>alert('这里是驾驶证信息$s5');</script>";
}

if(isset($_POST["car_msg"]))
{

    $carClass=$_POST["carClass"];
    $brand=$_POST["brand"];
    $model=$_POST["model"];
    $plateNumber=$_POST["plateNumber"];
    $carType=$_POST["carType"];
    $owner=$_POST["owner"];
    $address=$_POST["address"];
    $brandModel=$_POST["brandModel"];
    $vehicleCode=$_POST["vehicleCode"];
    $carType=$_POST["carType"];
    $engineNumber=$_POST["engineNumber"];
    $organization=$_POST["organization"];
    $registDate=$_POST["registDate"];
    $passenger=$_POST["passenger"];
    $usefulDate=$_POST["usefulDate"];
    $carColor=$_POST["carColor"];
    $users=$_POST["users"];
    $query6="insert into car_msg(e_ID,carClass,brand,model,plateNumber,carType,owner,address,
                          brandModel,vehicleCode,engineNumber,organization,registDate,passenger,usefulDate,carColor,users)
                        values ('$e_ID','$carClass','$brand','$model','$plateNumber','$carType','$owner','$address',
                          '$brandModel','$vehicleCode','$engineNumber','$organization','$registDate','$passenger','$usefulDate','$carColor','$users')";
    $s6=mysql_query($query6)or die("Error in query: $query. ".mysql_error());
//    echo"<script language='JavaScript'>alert('这里是车辆信息$s6');</script>";
}

if(isset($_POST["employer_address"]))
{
    $community=$_POST["community"];
    $address=$_POST["address"];
    $nature=$_POST["nature"];
    $tel=$_POST["tel"];
    $checkInDate=$_POST["checkInDate"];
    $query7="insert into employer_address(e_ID,community,address,nature,tel,checkInDate)
                        values ('$e_ID','$community','$address','$nature','$tel','$checkInDate')";
    $s7=mysql_query($query7)or die("Error in query: $query. ".mysql_error());
//    echo"<script language='JavaScript'>alert('这里是员工家庭住址$s7');</script>";
}

if(isset($_POST["employer_other_contact"]))
{
    $name=$_POST["name"];
    $relationship=$_POST["relationship"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];
    $unit=$_POST["unit"];
    $query8="insert into employer_other_contact(e_ID,name,relationship,phone,address,unit)
                        values ('$e_ID','name','relationship','phone','address','unit')";
    $s8=mysql_query($query8)or die("Error in query: $query. ".mysql_error());
//    echo"<script language='JavaScript'>alert('这里是员工其他联系方式$s8');</script>";
}

if(isset($_POST["employer_account"]))
{
    $type=$_POST["type"];
    $bank=$_POST["bank"];
    $bankAccount=$_POST["bankAccount"];
    $query9="insert into employer_account(type,bank,bankAccount)
                        values ('$e_ID','bank','bankAccount')";
    $s9=mysql_query($query9)or die("Error in query: $query9. ".mysql_error());
//    echo "<p align='center'>这里是员工银行账户$s9</p>";
//    echo"<script language='JavaScript'>alert('这里是员工银行账户$s9');</script>";
}
if(isset($_POST["employer_office"]))
{
    $e_name=$_POST["e_name"];
    $number=$_POST["number"];
    $company=$_POST["company"];
    $department=$_POST["department"];
    $position=$_POST["position"];
    $date=$_POST["date"];
    $hr=$_POST["hr"];
    $query10="insert into employer_office(e_ID,e_name,number,company,department,position,date,hr)
                        values ('$e_ID','$e_name',$number,'$company','$department','$position','$date','$hr')";
    $s10=mysql_query($query10)or die("Error in query: $query10. ".mysql_error());
//    echo"<script language='JavaScript'>alert('这里是员工任职信息$s10');</script>";
}

if(isset($_POST["employer_salary"]))
{
    $name=$_POST["name"];
    $type=$_POST["type"];
    $calculation1=$_POST["calculation1"];
    $calculation2=$_POST["calculation2"];
    $meritPay1=$_POST["meritPay1"];
    $meritPay2=$_POST["meritPay2"];
    $socialInsurance=$_POST["socialInsurance"];
    $houseConstruction=$_POST["houseConstruction"];
    $query11="insert into employer_salary(e_ID,name,type,calculation,meritPay,socialInsurance,houseConstruction)
                        values ('$e_ID','$name','$type','$calculation1.$calculation2','$meritPay1.$meritPay2','$socialInsurance','$houseConstruction')";
    $s11=mysql_query($query11)or die("Error in query: $query11. ".mysql_error());
//    echo"<script language='JavaScript'>alert('这里是员工薪资计算信息$s11');</script>";
}

/** employer_
 *  资产分配  暂无
 */
/* if(isset($_POST[""]))
  {
      $e_ID='2013110119';
      $=$_POST[""];


      $query2="insert into car_msg(e_ID,community,address,nature,tel,checkInDate)
                  values ('$e_ID','','','','','')";
      echo "这是住址信息";
      $s2=mysql_query($query2)or die("Error in query: $query. ".mysql_error());;
      echo $s2;
  }*/

?>
