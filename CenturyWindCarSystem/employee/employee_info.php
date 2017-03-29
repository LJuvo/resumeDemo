<?php
if($_GET["e_ID"])
{
    $e_ID=$_GET["e_ID"];
//    var_dump($e_ID);
}
$host = "localhost";
$user = "root";
$pass = "root";
$db = "sjf";
$connection=null;
//创建一个mysql连接
$connection = mysql_connect($host, $user, $pass) or die("Unable to connect!");
//选择一个数据库
mysql_select_db($db) or die("Unable to select database!");
mysql_query("set names utf8");
//$e_ID=2013110104;
if($connection) {
// global $sqlresult;

    $employers = "SELECT * FROM employers WHERE e_ID='$e_ID'";
    //   $apply="SELECT * FROM employers WHERE e_ID=$e_ID";
    $idcard = "SELECT * FROM employer_idcard WHERE e_ID='$e_ID'";
    $contact = "SELECT * FROM employer_contact WHERE e_ID='$e_ID'";
    $license = "SELECT * FROM employer_license WHERE e_ID='$e_ID'";
    $car_msg = "SELECT * FROM car_msg WHERE e_ID='$e_ID'";
    $address = "SELECT * FROM employer_address WHERE e_ID='$e_ID'";
    $other_contact = "SELECT * FROM employer_other_contact WHERE e_ID='$e_ID'";
    $account = "SELECT * FROM employer_account WHERE e_ID='$e_ID'";
    $office = "SELECT * FROM employer_office WHERE e_ID='$e_ID'";
    $salary = "SELECT * FROM employer_salary WHERE e_ID='$e_ID'";

    $employers1 = mysql_query($employers) or die("Error in query: $employers. " . mysql_error());
    $idcard1 = mysql_query($idcard) or die("Error in query: $idcard. " . mysql_error());
    $contact1 = mysql_query($contact) or die("Error in query: $contact. " . mysql_error());
    $license1 = mysql_query($license) or die("Error in query: $license. " . mysql_error());
    $car_msg1 = mysql_query($car_msg) or die("Error in query: $car_msg. " . mysql_error());
    $address1 = mysql_query($address) or die("Error in query: $address. " . mysql_error());
    $other_contact1 = mysql_query($other_contact) or die("Error in query: $other_contact. " . mysql_error());
    $account1 = mysql_query($account) or die("Error in query: $account. " . mysql_error());
    $office1 = mysql_query($office) or die("Error in query: $office. " . mysql_error());
    $salary1 = mysql_query($salary) or die("Error in query: $salary. " . mysql_error());


    $row0 = mysql_fetch_row($employers1); //个人信息

    $row2 = mysql_fetch_row($idcard1);//身份证信息
    $row3 = mysql_fetch_row($contact1);//联系方式
    $row4 = mysql_fetch_row($license1);//驾驶证信息
    $row5 = mysql_fetch_row($car_msg1);//车辆信息
    $row6 = mysql_fetch_row($address1);//居住地
    $row7 = mysql_fetch_row($other_contact1);//其他联系人
    $row8 = mysql_fetch_row($account1);//银行账户
    $row9 = mysql_fetch_row($office1);//任职
    $row10 = mysql_fetch_row($salary1);//薪资设定

    $apply = "SELECT * FROM apply_info WHERE number='$row2[7]'";
    $apply1 = mysql_query($apply) or die("Error in query: $apply. " . mysql_error());
    $row1 = mysql_fetch_row($apply1);//应聘信息

    $sqlresult = array($row0, $row1, $row2, $row3, $row4, $row5, $row6, $row7, $row8, $row9, $row10);
    //var_dump($sqlresult);
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
                    <a href="">员工信息详情</a>
                    <ul>
                        <li class="selected">
                            <input style="margin-left:13px ; width: 15px;height: 15px;" type="checkbox" name="emp_info"  id="a1"  checked onchange="show_info();"  >个人信息
                        </li>
                        <li>
                            <input style="margin-left:13px ; width: 15px;height: 15px;" type="checkbox" name="emp_info"  id="a2"  checked onchange="show_info();"  >应聘信息
                        </li>
                        <li>
                            <input style="margin-left:13px ; width: 15px;height: 15px;" type="checkbox" name="emp_info"  id="a3"  checked onchange="show_info();"  >身份信息

                        </li>
                        <li>
                            <input style="margin-left:13px ; width: 15px;height: 15px;" type="checkbox" name="emp_info"  id="a4"  checked onchange="show_info();"  >联系方式信息

                        </li>
                        <li>
                            <input style="margin-left:13px ; width: 15px;height: 15px;" type="checkbox" name="emp_info"  id="a5"  checked onchange="show_info();"  >驾驶证信息

                        </li>
                        <li>
                            <input style="margin-left:13px ; width: 15px;height: 15px;" type="checkbox" name="emp_info"  id="a6"  checked onchange="show_info();"  >车辆信息

                        </li>
                        <li>
                            <input style="margin-left:13px ; width: 15px;height: 15px;" type="checkbox" name="emp_info"  id="a7"  checked onclick="show_info(0);"  >住家信息

                        </li>
                        <li>
                            <input style="margin-left:13px ; width: 15px;height: 15px;" type="checkbox" name="emp_info"  id="a8"  checked onclick="show_info(0);"  >联系人信息

                        </li>
                        <li>
                            <input style="margin-left:13px ; width: 15px;height: 15px;" type="checkbox" name="emp_info"  id="a9"  checked onclick="show_info(0);"  >银行账户信息

                        </li>
                        <li>
                            <input style="margin-left:13px ; width: 15px;height: 15px;" type="checkbox" name="emp_info"  id="a10"  checked onclick="show_info(0);"  >任职设定

                        </li>
                        <li>
                            <input style="margin-left:13px ; width: 15px;height: 15px;" type="checkbox" name="emp_info"  id="a11"  checked onclick="show_info(0);"  >薪资设定

                        </li>
                        <li>
                            <input style="margin-left:13px ; width: 15px;height: 15px;" type="checkbox" name="emp_info"  id="a12"  checked onclick="show_info(0);"  >财产分配
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="">客户分配信息</a>
                </li>
                <li>
                    <a href="">名下客户信息</a>
                </li>
                <li>
                    <a href="">名下业绩信息</a>
                </li>
                <li>
                    <a href="">个人行为信息</a>
                    <ul>
                        <li>
                            <a href="">福利待遇信息</a>
                        <li>
                            <a href="">行政奖惩信息</a>
                        <li>
                            <a href="">行政假期信息</a>
                        <li>
                            <a href="">行政会议信息</a>
                        <li>
                            <a href="">培训学习信息</a>
                    </ul>
                </li>
            </ul>
        </div>
        <!--content-->
        <div class="col9 docs-body" id="main_content">
            <div id="sd">
                <p>
                <table class="table table-bordered">

                </table>
                </p>
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
/*
 页面数据初始化
 * */
function initView() {
    show_info();
}
/*
 选择不同的信息
 * */
var temp233=new Array();
function show_info() {
    temp233=[];
    document.getElementById("main_content").innerHTML = "";
    var checkboxes = document.getElementsByName("emp_info");
    for (var idx = 0; idx < checkboxes.length; idx++) {
        if (checkboxes[idx].checked == true)
        {
            hehehda(idx);
            temp233[idx]=1;
        }
        else
        {

            temp233[idx]=0;
        }
    }
}
function hehehda(checkId)
{
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
    var temp = '<div id="sp0"><fieldset><legend>个人信息</legend><table class="table table-bordered"><tbody>';
    temp += '<tr><td style="width: 20%;">员工ID</td><td><?php echo $sqlresult[0][1];?></td></tr></tbody><tbody>';
    temp += '<tr><td >姓名</td><td><?php echo $sqlresult[0][2];?></td></tr></tbody><tfoot>';
    temp += '<tr><td >性别</td><td><?php echo $sqlresult[0][3];?></td></tr>';
    temp += '<tr><td >电话</td><td><?php echo $sqlresult[0][4];?></td></tr></tfoot></table></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//应聘信息
function apply() {
    var temp = '<div id="sp1"><fieldset><legend>应聘信息</legend><table class="table table-bordered"><tbody>';
    temp += '<tr><td style="width: 20%;">姓名</td><td><?php echo $sqlresult[0][2];?></td></tr></tbody><tfoot>';
    temp += '<tr><td>职位</td><td><?php echo $sqlresult[1][3];?></td></tr>';
    temp += '<tr><td>证件号</td><td><?php echo $sqlresult[1][4];?></td></tr>';
    temp += '<tr><td>时间</td><td><?php echo $sqlresult[1][1];?></td></tr>';
    temp += '<tr><td>渠道</td><td><?php echo $sqlresult[1][2];?></td></tr></tfoot></table></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}

//身份信息
function identity() {
    var temp = '<div id="sp2"><fieldset><legend>身份证信息</legend><table class="table table-bordered"><tbody>';
    temp += '<tr><td style="width: 20%;">姓名</td><td><?php echo $sqlresult[2][2];?></td></tr></tbody><tfoot>';
    temp += '<tr><td>性别</td><td><?php echo $sqlresult[2][3];?></td></tr>';
    temp += '<tr><td>民族</td><td><?php echo $sqlresult[2][4];?></td></tr>';
    temp += '<tr><td>出生</td><td><?php echo $sqlresult[2][5];?></td></tr>';
    temp += '<tr><td>住址</td><td><?php echo $sqlresult[2][6];?></td></tr>';
    temp += '<tr><td>公民身份证号码</td><td><?php echo $sqlresult[2][7];?></td></tr>';
    temp += '<tr><td>签发机关</td><td><?php echo $sqlresult[2][8];?></td></tr>';
    temp += '<tr><td>有效期限</td><td><?php echo $sqlresult[2][9];?></td></tr></tfoot></table></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//联系方式信息
function contact() {
    var temp = '<div id="sp3"><fieldset><legend>联系方式信息</legend><small>姓名:&nbsp<?php echo $sqlresult[2][2];?>&nbsp&nbsp&nbsp&nbsp性别:&nbsp<?php echo $sqlresult[2][3];?>&nbsp&nbsp&nbsp&nbsp员工ID:&nbsp<?php echo $sqlresult[0][1];?>&nbsp&nbsp&nbsp&nbsp</small><table class="table table-bordered"><tbody>';
    temp += '<tr><td style="width: 20%;">姓名</td><td><?php echo $sqlresult[2][2];?></td></tr></tbody><tfoot>';
    temp += '<tr><td>电话</td><td><?php echo $sqlresult[3][2];?></td></tr>';
    temp += '<tr><td>QQ</td><td><?php echo $sqlresult[3][2];?></td></tr>';
    temp += '<tr><td>邮箱</td><td><?php echo $sqlresult[3][2];?></td></tr>';
    temp += '<tr><td>微信</td><td><?php echo $sqlresult[3][5];?></td></tr>';
    temp += '<tr><td>微博</td><td><?php echo $sqlresult[3][6];?></td></tr></tfoot></table></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//驾驶证信息
function license() {
    var temp = '<div id="sp4"><fieldset><legend>驾驶证信息</legend><small>姓名:&nbsp<?php echo $sqlresult[2][2];?>&nbsp&nbsp&nbsp&nbsp性别:&nbsp<?php echo $sqlresult[2][3];?>&nbsp&nbsp&nbsp&nbsp员工ID:&nbsp<?php echo $sqlresult[0][1];?>&nbsp&nbsp&nbsp&nbsp</small><table class="table table-bordered"><tbody>';
    temp += '<tr><td style="width: 20%;">姓名</td><td><?php echo $sqlresult[4][2];?></td></tr></tbody><tfoot>';
    temp += '<tr><td>身份证号</td><td><?php echo $sqlresult[4][3];?></td></tr>';
    temp += '<tr><td>档案编号</td><td><?php echo $sqlresult[4][4];?></td></tr>';
    temp += '<tr><td>性别</td><td><?php echo $sqlresult[4][5];?></td></tr>';
    temp += '<tr><td>国籍</td><td><?php echo $sqlresult[4][6];?></td></tr>';
    temp += '<tr><td>住址</td><td><?php echo $sqlresult[4][7];?></td></tr>';
    temp += '<tr><td>出生日期</td><td><?php echo $sqlresult[4][8];?></td></tr>';
    temp += '<tr><td>初次领证日期</td><td><?php echo $sqlresult[4][9];?></td></tr>';
    temp += '<tr><td>准驾车型</td><td><?php echo $sqlresult[4][10];?></td></tr>';
    temp += '<tr><td>发证机关</td><td><?php echo $sqlresult[4][11];?></td></tr>';
    temp += '<tr><td>有效期限</td><td><?php echo $sqlresult[4][12];?></td></tr></tfoot></table></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//车辆信息
function car() {
    var temp = '<div id="sp5"><fieldset><legend>车辆基本信息</legend><small>姓名:&nbsp<?php echo $sqlresult[2][2];?>&nbsp&nbsp&nbsp&nbsp性别:&nbsp<?php echo $sqlresult[2][3];?>&nbsp&nbsp&nbsp&nbsp员工ID:&nbsp<?php echo $sqlresult[0][1];?>&nbsp&nbsp&nbsp&nbsp</small><table class="table table-bordered"><tbody>';
    temp += '<tr><td style="width: 20%;">车辆种类</td><td><?php echo $sqlresult[5][2];?></td></tr></tbody><tfoot>';
    temp += '<tr><td>品牌</td><td><?php echo $sqlresult[5][3];?></td></tr>';
    temp += '<tr><td>型号</td><td><?php echo $sqlresult[5][4];?></td></tr>';
    temp += '<tr><td>车牌号</td><td><?php echo $sqlresult[5][5];?></td></tr>';
    temp += '<tr><td>车辆类型</td><td><?php echo $sqlresult[5][6];?></td></tr>';
    temp += '<tr><td>所有人</td><td><?php echo $sqlresult[5][7];?></td></tr>';
    temp += '<tr><td>住址</td><td><?php echo $sqlresult[5][8];?></td></tr>';
    temp += '<tr><td>使用性质</td><td><?php echo $sqlresult[5][9];?></td></tr>';
    temp += '<tr><td>品牌型号</td><td><?php echo $sqlresult[5][10];?></td></tr>';
    temp += '<tr><td>车辆识别代号</td><td><?php echo $sqlresult[5][11];?></td></tr>';
    temp += '<tr><td>发动机号码</td><td><?php echo $sqlresult[5][12];?></td></tr>';
    temp += '<tr><td>发证机关</td><td><?php echo $sqlresult[5][13];?></td></tr>';
    temp += '<tr><td>注册日期</td><td><?php echo $sqlresult[5][14];?></td></tr>';
    temp += '<tr><td>核定载客人数</td><td><?php echo $sqlresult[5][15];?></td></tr>';
    temp += '<tr><td>车身颜色</td><td><?php echo $sqlresult[5][16];?></td></tr>';
    temp += '<tr><td>检验有效期至</td><td><?php echo $sqlresult[5][17];?></td></tr>';
    temp += '<tr><td>分配给</td><td><?php echo $sqlresult[5][18];?></td></tr></tfoot></table></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//住家信息
function home() {
    var temp = '<div id="sp6"><fieldset><legend>住家信息</legend><small>姓名:&nbsp<?php echo $sqlresult[2][2];?>&nbsp&nbsp&nbsp&nbsp性别:&nbsp<?php echo $sqlresult[2][3];?>&nbsp&nbsp&nbsp&nbsp员工ID:&nbsp<?php echo $sqlresult[0][1];?>&nbsp&nbsp&nbsp&nbsp</small><table class="table table-bordered"><tbody>';
    temp += '<tr><td style="width: 20%;">小区名称</td><td><?php echo $sqlresult[6][2];?></td></tr></tbody><tfoot>';
    temp += '<tr><td>地址</td><td><?php echo $sqlresult[6][3];?></td></tr>';
    temp += '<tr><td>性质</td><td><?php echo $sqlresult[6][4];?></td></tr>';
    temp += '<tr><td>住家电话</td><td><?php echo $sqlresult[6][5];?></td></tr>';
    temp += '<tr><td>入住时间</td><td><?php echo $sqlresult[6][6];?></td></tr></tfoot></table></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//联系人信息
function linkman() {
    var temp = '<div id="sp7"><fieldset><legend>联系人信息</legend><small>姓名:&nbsp<?php echo $sqlresult[2][2];?>&nbsp&nbsp&nbsp&nbsp性别:&nbsp<?php echo $sqlresult[2][3];?>&nbsp&nbsp&nbsp&nbsp员工ID:&nbsp<?php echo $sqlresult[0][1];?>&nbsp&nbsp&nbsp&nbsp</small><table class="table table-bordered"><tbody>';
    temp += '<tr><td style="width: 20%;">姓名</td><td><?php echo $sqlresult[7][2];?></td></tr></tbody><tfoot>';
    temp += '<tr><td>关系</td><td><?php echo $sqlresult[7][3];?></td></tr>';
    temp += '<tr><td>电话</td><td><?php echo $sqlresult[7][4];?></td></tr>';
    temp += '<tr><td>住家</td><td><?php echo $sqlresult[7][5];?></td></tr>';
    temp += '<tr><td>单位</td><td><?php echo $sqlresult[7][6];?></td></tr></tfoot></table></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//银行账户信息
function bank() {
    var temp = '<div id="sp8"><fieldset><legend>银行卡信息</legend><small>姓名:&nbsp<?php echo $sqlresult[2][2];?>&nbsp&nbsp&nbsp&nbsp性别:&nbsp<?php echo $sqlresult[2][3];?>&nbsp&nbsp&nbsp&nbsp员工ID:&nbsp<?php echo $sqlresult[0][1];?>&nbsp&nbsp&nbsp&nbsp</small><table class="table table-bordered"><tbody>';
    temp += '<tr><td style="width: 20%;">类别</td><td><?php echo $sqlresult[8][2];?></td></tr></tbody><tfoot>';
    temp += '<tr><td>开户银行</td><td><?php echo $sqlresult[8][3];?></td></tr>';
    temp += '<tr><td>银行账号</td><td><?php echo $sqlresult[8][4];?></td></tr></tfoot></table></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//任职设定
function office() {
    var temp = '<div id="sp9"><fieldset><legend>员工任职信息</legend><small>姓名:&nbsp<?php echo $sqlresult[2][2];?>&nbsp&nbsp&nbsp&nbsp性别:&nbsp<?php echo $sqlresult[2][3];?>&nbsp&nbsp&nbsp&nbsp员工ID:&nbsp<?php echo $sqlresult[0][1];?>&nbsp&nbsp&nbsp&nbsp</small><table class="table table-bordered"><tbody>';
    temp += '<tr><td style="width: 20%;"><?php echo $sqlresult[9][1];?></td><td id="employee_post"><?php echo $sqlresult[9][2];?></td></tr></tbody><tfoot>';
    temp += '<tr><td>任职公司</td><td id="employee_company"><?php echo $sqlresult[9][3];?></td></tr>';
    temp += '<tr><td>任职部门</td><td id="employee_department"><?php echo $sqlresult[9][4];?></td></tr>';
    temp += '<tr><td>任职职位</td><td id="employee_departmentPost"><?php echo $sqlresult[9][5];?></td></tr>';
    temp += '<tr><td>任职时间</td><td id="employee_departmentTime"><?php echo $sqlresult[9][6];?></td></tr>';
    temp += '<tr><td>员工ID</td><td id="employee_Id"><?php echo $sqlresult[9][7];?></td></tr>';
    temp += '<tr><td>人事专员</td><td id="employee_HRcommissioner"><?php echo $sqlresult[9][8];?></td></tr></tfoot></table></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//薪资标准
function salary() {
    var temp = '<div id="sp10"><fieldset><legend>薪资标准</legend><small>姓名:&nbsp<?php echo $sqlresult[2][2];?>&nbsp&nbsp&nbsp&nbsp性别:&nbsp<?php echo $sqlresult[2][3];?>&nbsp&nbsp&nbsp&nbsp员工ID:&nbsp<?php echo $sqlresult[0][1];?>&nbsp&nbsp&nbsp&nbsp</small><table class="table table-bordered"><tbody>';
    temp += '<tr><td style="width: 20%;">钟敏</td><td id="employee_Id">s20160400025</td></tr></tbody><tfoot>';
    temp += '<tr><td>薪资分类</td><td id="employee_salaryType"><?php echo $sqlresult[10][3];?></td></tr>';
    <!--计算方式多行示例-->
    temp+='<tr><td>计算方式</td><td id="employee_accountMethod">（服务业绩-运营成本）*0.4+业务提成</td></tr>';
    temp += '<tr><td></td><td>（服务单量*（服务费*0.9））*0.8+业务提成</td></tr>';
    <!--绩效多行示例-->
    temp+='<tr><td>绩效工资</td><td id="employee_performance">（服务业绩-运营成本）*0.1</td></tr>';
    temp += '<tr><td></td><td>（服务单量*（服务费*0.9））*0.2</td></tr>';
    temp += '<tr><td>社会保险</td><td id="employee_other"><?php echo $sqlresult[10][6];?></td></tr>';
    temp += '<tr><td>住房公积金</td><td id="employee_other"><?php echo $sqlresult[10][7];?></td></tr></tfoot></table></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//资产分配
function property() {
    var temp = '<div id="sp11"><fieldset><legend>资产分配</legend><small>姓名:&nbsp<?php echo $sqlresult[2][2];?>&nbsp&nbsp&nbsp&nbsp性别:&nbsp<?php echo $sqlresult[2][3];?>&nbsp&nbsp&nbsp&nbsp员工ID:&nbsp<?php echo $sqlresult[0][1];?>&nbsp&nbsp&nbsp&nbsp</small><table class="table table-bordered"><tbody>';
    temp += '<tr><td style="width: 20%;">钟敏</td><td id="employee_Id">s20160400025</td></tr></tbody><tfoot>';
    temp += '<tr><td>资产类别</td><td id="employee_assetType">救援设备</td></tr>';
    temp += '<tr><td>资产类型</td><td id="employee_assetStyle">液压千斤顶</td></tr>';
    temp += '<tr><td>资产品牌</td><td></td></tr></tfoot></table></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}

/*utils*/
function changeinfo(temp) {

    var oTest = document.getElementById('main_content');
    var newNode = document.createElement("p");
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