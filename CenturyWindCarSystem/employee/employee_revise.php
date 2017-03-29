<?php
session_start();
// 保存一天
$lifeTime = 24 * 3600;
//setcookie(session_name(),session_id(),time()+60,"/");
$time=date('Y');
//var_dump(session_name());
//var_dump(session_id());
$e_ID1 = $_GET['e_ID'];
//var_dump($e_ID1);
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
<?php
if(isset($_POST["employers"]))
{
    $temp=array();
    $temp['name']=$_POST["name"];
    $temp['sex']=$_POST["sex"];
    $temp['phone']=$_POST["phone"];
    $temp['car']=$_POST["car_number"];
    $keys=array_keys($temp); //返回所有键名
    $value=array_values($temp); //返回所有键值
    $query="update employers set ";
    for($i=0;$i<count($temp);$i++)
    {
        if($value[$i]!=null)
        {
            $query.=" $keys[$i]='$value[$i]',";
        }
    }
    $query=substr($query, 0, -1);
    $query.=" where e_ID='$e_ID1'";
    // var_dump($query);
    $s=mysql_query($query)or die("Error in query: $query. ".mysql_error());
}
if(isset($_POST["apply_info"]))
{
    $temp=array();
    $temp['date']=$_POST["applyMonth"]."/".$_POST["applyMonth"]."/".$_POST["applyDay"];
    $temp['channel']=$_POST["channel"];
    $temp['position']=$_POST["position"];
    $temp['number']=$_POST["number"];
    $keys=array_keys($temp); //返回所有键名
    $value=array_values($temp); //返回所有键值
//    $query="SELECT number FROM employers WHERE e_ID='$e_ID1'";
//    select * from b where id in (select id from a where 条件)
    $query="update apply_info set ";
    for($i=0;$i<count($temp);$i++)
    {
        if($value[$i]!=null)
        {
            $query.=" $keys[$i]='$value[$i]',";
        }
    }
    $query=substr($query, 0, -1);
    $query.=" where number in (SELECT number FROM employers WHERE e_ID='$e_ID1')";
//    var_dump($query);
    $s2=mysql_query($query)or die("Error in query: $query. ".mysql_error());
}
if(isset($_POST["employer_idcard"]))
{
    $temp=array();
    $temp['name']=$_POST["name"];
    $temp['sex']=$_POST["sex"];
    $temp['nation']=$_POST["nation"];
    $temp['birthday']=$_POST["birthYear"]."/".$_POST["birthMonth"]."/".$_POST["birthDay"];
    $temp['address']=$_POST["address"];
    $temp['number']=$_POST["number"];
    $temp['organization']=$_POST["organization"];
    $temp['usefulDate']=$_POST["startYear"]."/".$_POST["startMonth"]."/".$_POST["startDay"]."-".$_POST["endYear"]."/".$_POST["endMonth"]."/".$_POST["endDay"];
    $keys=array_keys($temp); //返回所有键名
    $value=array_values($temp); //返回所有键值
    $query="update employer_idcard set ";
    for($i=0;$i<count($temp);$i++)
    {
        if($value[$i]!=null)
        {
            $query.=" $keys[$i]='$value[$i]',";
        }
    }
    $query=substr($query, 0, -1);
    $query.=" where e_ID='$e_ID1'";
    $s3=mysql_query($query)or die("Error in query: $query. ".mysql_error());
}
if(isset($_POST["employer_contact"]))
{
    $temp=array();
    $temp['phone']=$_POST["phone"];
    $temp['qq']=$_POST["qq"];
    $temp['email']=$_POST["email"];
    $temp['weChat']=$_POST["weChat"];
    $temp['weibo']=$_POST["weibo"];
    $keys=array_keys($temp); //返回所有键名
    $value=array_values($temp); //返回所有键值
    $query="update employer_contact set ";
    for($i=0;$i<count($temp);$i++)
    {
        if($value[$i]!=null)
        {
            $query.=" $keys[$i]='$value[$i]',";
        }
    }
    $query=substr($query, 0, -1);
    $query.=" where e_ID='$e_ID1'";
    $s4=mysql_query($query)or die("Error in query: $query. ".mysql_error());
}

if(isset($_POST["employer_license"]))
{
    $temp=array();
//    $temp['name']=$_POST["name"];
//    $temp['number']=$_POST["number"];
    $temp['serialNumber']=$_POST["serialNumber"];
//    $temp['sex']=$_POST["sex"];
    $temp['country']=$_POST["country"];
    $temp['address']=$_POST["address"];
    $temp['birthday']=$_POST["birthday"];
    $temp['firstDate']=$_POST["firstYear"].'/'.$_POST["firstMonth"].'/'.$_POST["firstDay"];
    $temp['carType']=$_POST["carType"];
    $temp['organization']=$_POST["organization"];
    $temp['usefulDate']=$_POST["startYear"].'/'.$_POST["startMonth"].'/'.$_POST["startDay"].'-'.$_POST["endYear"].'/'.$_POST["endMonth"].'/'.$_POST["endDay"];
    $keys=array_keys($temp); //返回所有键名
    $value=array_values($temp); //返回所有键值
    $query="update employer_license set ";
    for($i=0;$i<count($temp);$i++)
    {
        if($value[$i]!=null)
        {
            $query.=" $keys[$i]='$value[$i]',";
        }
    }
    $query=substr($query, 0, -1);
    $query.=" where e_ID='$e_ID1'";
    $s5=mysql_query($query)or die("Error in query: $query. ".mysql_error());

}

if(isset($_POST["car_msg"]))
{
    $temp=array();
    $temp['carClass']=$_POST["carClass"];
    $temp['brand']=$_POST["brand"];
    $temp['model']=$_POST["model"];
    $temp['plateNumber']=$_POST["plateNumber"];
    $temp['carType']=$_POST["carType"];
    $temp['owner']=$_POST["owner"];
    $temp['address']=$_POST["address"];
    $temp['brandModel']=$_POST["brandModel"];
    $temp['vehicleCode']=$_POST["vehicleCode"];
    $temp['carType']=$_POST["carType"];
    $temp['engineNumber']=$_POST["engineNumber"];
    $temp['organization']=$_POST["organization"];
    $temp['registDate']=$_POST["registDate"];
    $temp['passenger']=$_POST["passenger"];
    $temp['usefulDate']=$_POST["usefulDate"];
    $temp['carColor']=$_POST["carColor"];
    $temp['users']=$_POST["users"];
    $keys=array_keys($temp); //返回所有键名
    $value=array_values($temp); //返回所有键值
    $query="update car_msg set ";
    for($i=0;$i<count($temp);$i++)
    {
        if($value[$i]!=null)
        {
            $query.=" $keys[$i]='$value[$i]',";
        }
    }
    $query=substr($query, 0, -1);
    $query.=" where e_ID='$e_ID1'";
    $s6=mysql_query($query)or die("Error in query: $query. ".mysql_error());

}

if(isset($_POST["employer_address"]))
{
    $temp=array();
    $temp['community']=$_POST["community"];
    $temp['address']=$_POST["address"];
    $temp['nature']=$_POST["nature"];
    $temp['tel']=$_POST["tel"];
    $temp['checkInDate']=$_POST["checkInDate"];
    $keys=array_keys($temp); //返回所有键名
    $value=array_values($temp); //返回所有键值
    $query="update employer_address set ";
    for($i=0;$i<count($temp);$i++)
    {
        if($value[$i]!=null)
        {
            $query.=" $keys[$i]='$value[$i]',";
        }
    }
    $query=substr($query, 0, -1);
    $query.=" where e_ID='$e_ID1'";
    $s7=mysql_query($query)or die("Error in query: $query. ".mysql_error());
}

if(isset($_POST["employer_other_contact"]))
{
    $temp=array();
    $temp['name']=$_POST["name"];
    $temp['relationship']=$_POST["relationship"];
    $temp['phone']=$_POST["phone"];
    $temp['address']=$_POST["address"];
    $temp['unit']=$_POST["unit"];
    $keys=array_keys($temp); //返回所有键名
    $value=array_values($temp); //返回所有键值
    $query="update employer_other_contact set ";
    for($i=0;$i<count($temp);$i++)
    {
        if($value[$i]!=null)
        {
            $query.=" $keys[$i]='$value[$i]',";
        }
    }
    $query=substr($query, 0, -1);
    $query.=" where e_ID='$e_ID1'";
    $s8=mysql_query($query)or die("Error in query: $query. ".mysql_error());
}

if(isset($_POST["employer_account"]))
{
    $temp=array();
    $temp['type']=$_POST["type"];
    $temp['bank']=$_POST["bank"];
    $temp['bankAccount']=$_POST["bankAccount"];
    $keys=array_keys($temp); //返回所有键名
    $value=array_values($temp); //返回所有键值
    $query="update employer_account set ";
    for($i=0;$i<count($temp);$i++)
    {
        if($value[$i]!=null)
        {
            $query.=" $keys[$i]='$value[$i]',";
        }
    }
    $query=substr($query, 0, -1);
    $query.=" where e_ID='$e_ID1'";
    $s9=mysql_query($query)or die("Error in query: $query. ".mysql_error());
}
if(isset($_POST["employer_office"]))
{
    $temp['company']=$_POST["company"];
    $temp['department']=$_POST["department"];
    $temp['position']=$_POST["position"];
    $temp['date']=$_POST["date"];
    $temp['hr']=$_POST["hr"];
    $keys=array_keys($temp); //返回所有键名
    $value=array_values($temp); //返回所有键值
    $query="update employer_office set ";
    for($i=0;$i<count($temp);$i++)
    {
        if($value[$i]!=null)
        {
            $query.=" $keys[$i]='$value[$i]',";
        }
    }
    $query=substr($query, 0, -1);
    $query.=" where e_ID='$e_ID1'";
    $s10=mysql_query($query)or die("Error in query: $query. ".mysql_error());
}

if(isset($_POST["employer_salary"]))
{
    $temp=array();
    $temp['name']=$_POST["name"];
    $temp['type']=$_POST["type"];
    $temp['calculation1']=$_POST["calculation1"];
    $temp['calculation2']=$_POST["calculation2"];
    $temp['meritPay1']=$_POST["meritPay1"];
    $temp['meritPay2']=$_POST["meritPay2"];
    $temp['socialInsurance']=$_POST["socialInsurance"];
    $temp['houseConstruction']=$_POST["houseConstruction"];
    $keys=array_keys($temp); //返回所有键名
    $value=array_values($temp); //返回所有键值
    $query="update employer_salary set ";
    for($i=0;$i<count($temp);$i++)
    {
        if($value[$i]!=null)
        {
            $query.=" $keys[$i]='$value[$i]',";
        }
    }
    $query=substr($query, 0, -1);
    $query.=" where e_ID='$e_ID1'";
    $s11=mysql_query($query)or die("Error in query: $query. ".mysql_error());
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
<?php
if($connection) {
// global $sqlresult;
    $employers = "SELECT * FROM employers WHERE e_ID='$e_ID1'";
    //   $apply="SELECT * FROM employers WHERE e_ID=$e_ID";
    $idcard = "SELECT * FROM employer_idcard WHERE e_ID='$e_ID1'";
    $contact = "SELECT * FROM employer_contact WHERE e_ID='$e_ID1'";
    $license = "SELECT * FROM employer_license WHERE e_ID='$e_ID1'";
    $car_msg = "SELECT * FROM car_msg WHERE e_ID='$e_ID1'";
    $address = "SELECT * FROM employer_address WHERE e_ID='$e_ID1'";
    $other_contact = "SELECT * FROM employer_other_contact WHERE e_ID='$e_ID1'";
    $account = "SELECT * FROM employer_account WHERE e_ID='$e_ID1'";
    $office = "SELECT * FROM employer_office WHERE e_ID='$e_ID1'";
    $salary = "SELECT * FROM employer_salary WHERE e_ID='$e_ID1'";

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

    $applyDateFlag=false;
    $idDateFlag=false;
    $addressDateFlag=false;
    $licenseDateFlag=false;
    $sqlresult = array($row0, $row1, $row2, $row3, $row4, $row5, $row6, $row7, $row8, $row9, $row10);
    if($row1!=null)
    {
        $applyDate=explode('/',$row1[1]);
        $applyDateFlag=true;
        echo 'apply';
//        var_dump($applyDate);
        echo '<br>';
    }
    if($row2!=null)
    {
        $idBirthDate=explode('/', $row2[5]);
        $idUsefulDate=explode('-', $row2[9]);
        $idUsefulDate[0]=explode('/', $idUsefulDate[0]);
        $idUsefulDate[1]=explode('/', $idUsefulDate[1]);
        $idDateFlag=true;
        echo "<br>";
//        var_dump($idBirthDate);
        echo "<br>";
//        var_dump($idUsefulDate);
    }
    if($row6!=null)
    {
        $addressIndate=explode('/', $row6[6]);
        $addressDateFlag=true;
        echo "<br>";
//        var_dump($addressIndate);
    }
    if($row4!=null)
    {
        $licenseFirstDate=explode('/', $row4[9]);
        $licenseUsefulDate=explode('-', $row4[12]);
        $licenseUsefulDate[0]=explode('/', $licenseUsefulDate[0]);
        $licenseUsefulDate[1]=explode('/', $licenseUsefulDate[1]);
        $licenseDateFlag=true;
        echo "<br>";
//        var_dump($licenseFirstDate);
        echo "<br>";
//        var_dump($licenseUsefulDate);
    }
}

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
        <div class="col2">
            <ul class="sidebar nojs">
                <li class="selected">
                    <ul>
                        <li>
                            &nbsp&nbsp&nbsp修改员工信息
                        </li>
                        <liclass="selected">
                        <a align="left" onClick="show_info(0);">个人信息</a>
                </li>
                <li>
                    <a align="left" onClick="show_info(1);">应聘信息</a>
                </li>
                <li>
                    <a align="left" onClick="show_info(2);">身份信息</a>
                </li>
                <li>
                    <a align="left" onClick="show_info(3);">联系方式信息</a>
                </li>
                <li>
                    <a align="left" onClick="show_info(4);">驾驶证信息</a>
                </li>

                <li>
                    <a align="left" onClick="show_info(6);">住家信息</a>
                </li>
                <li>
                    <a align="left" onClick="show_info(7);">联系人信息</a>
                </li>
                <li>
                    <a align="left" onClick="show_info(8);">银行账户信息</a>
                </li>
                <li>
                    <a align="left" onClick="show_info(5);">车辆信息</a>
                </li>
                <li>
                    <a align="left" onClick="show_info(9);">任职设定</a>
                </li>
                <li>
                    <a align="left" onClick="show_info(10);">薪资设定</a>
                </li>
                <li>
                    <a align="left" onClick="show_info(11);">财产分配</a>
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

    personal();

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
    var temp='<div id="' + pp + '"><fieldset> <legend> 注册表单 </legend> <p> <label>编号<small>sjf201311014</small></label> </p>';
    temp +='<form  action="" method="post"  style=" align-content: center">';
    temp +='<table class="table uneditable"> <tbody>';
    temp +='<tr> <td>姓名</td><td id="employee_name"><?php echo $sqlresult[0][2];?></td><td align="center"> <input name="name" type="text" placeholder="不填则为不修改该项值" class="text radius"> </td> </tr>';
    temp +='<tr> <td>性别</td><td><?php echo $sqlresult[0][3];?></td> <td align="center"> <select name="sex";> <option value="男">男</option> <option  value="女">女</option> </select></td> </tr>';
    temp +='<tr> <td>联系电话</td><td><?php echo $sqlresult[0][4];?> </td> <td align="center"> <input name="phone" type="text"  placeholder="不填则为不修改该项值" class="text radius"> </td> </tr>';
    temp +='<tr> <td>分配车辆</td> <td ><?php echo $sqlresult[0][5];?></td> <td align="center"> <select name="car_number" id="select"> <option value="川A-7081Q">川A-7081Q</option> <option value="川A-4545Q">川A-4545Q</option> <option value="川A-5959Q">川A-5959Q</option> </select></td> </tr>';
    temp +='</tbody>';
    temp +='<tfoot>';
    temp +='<tr> <td colspan="2" align="center"><a href="../index.php" class="btn">取消</a> <input name="重置" type="reset" class="btn" value="重置"> </td> <td align="center"><input type="hidden" name="e_ID" value="<?php echo @$row[1];?> " ><input class="btn bg-blue bg-inverse" type="submit" name="employers" value="修改"> </td> </tr>';
    temp +='</tfoot> </table> </form> </fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//应聘信息
function apply() {
    var temp = '<div id="' + pp + '"><fieldset> <legend> 应聘信息 </legend><form action="" method="post"> <table class="table table-bordered">';
    temp += '<tr> <td style="width:20% ;"></td><td>初始信息</td> <td>修改信息</td> </tr>';
    temp += '<tr> <td>时间</td><td><?php if($sqlresult[1][1])echo $sqlresult[1][1];else echo "暂无";?></td><td style="padding-right:15px;"> <select name="applyYear";><?php for($i=1950;$i<$time+1;$i++){?><option <?php if($applyDateFlag){if($applyDate[0]==$i)echo "selected";}?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>年';
    temp +='<select name="applyMonth";><?php for($i=1;$i<=12;$i++){?><option <?php if($applyDateFlag){if($applyDate[1]==$i)echo "selected";}?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>月';
    temp +='<select name="applyDay";><?php for($i=1;$i<=31;$i++){?><option <?php if($applyDateFlag){if($applyDate[2]==$i)echo "selected";}?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>日</td> </tr>';
    temp += '<tr> <td>渠道</td><td><?php if($sqlresult[1][2])echo $sqlresult[1][2];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="channel" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td>职位</td> <td><?php if($sqlresult[1][3])echo $sqlresult[1][3];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="position" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td>证件</td> <td><?php if($sqlresult[1][4])echo $sqlresult[1][4];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="number" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td align="center" colspan="3"><a  style="width:13%;" href="../index.php" class="btn">取消</a><input style="width:20%;align:center; "name="重置" type="reset" class="btn" value="重置"> <input style="width:20%;margin-left: 0px " class="btn bg-blue bg-inverse" type="submit" name="apply_info" value="修改"></td> </tr>';
    temp += '</table> </form></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//身份信息
function identity() {
    var temp='<div id="' + pp + '"><fieldset> <legend> 身份信息 </legend><form action="" method="post"> <table class="table table-bordered">';
    temp +='<tr> <td style="width:20% ;">姓名</td><td><?php echo $sqlresult[2][2];?></td> <td style="padding-right:15px;"> <input type="text" name="name" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>性别</td><td><?php echo $sqlresult[2][3];?></td><td style="padding-right:15px;"><select name="sex";> <option  value="男">男</option> <option   value="女">女</option> </select> </td>  </tr>';
    temp +='<tr> <td>民族</td><td><?php echo $sqlresult[2][4];?></td><td style="padding-right:15px;"> <input type="text" name="nation" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>出生</td><td><?php echo $sqlresult[2][5];?></td><td style="padding-right:15px;"> <select name="birthYear";><?php for($i=1950;$i<=$time;$i++){?><option <?php if($idDateFlag){if($idBirthDate[0]==$i)echo "selected";}?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>年';
    temp +='<select name="birthMonth";><?php for($i=1;$i<=12;$i++){?><option <?php if($idDateFlag){if($idBirthDate[1]==$i)echo "selected";}?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>月';
    temp +='<select name="birthDay";><?php for($i=1;$i<=31;$i++){?><option <?php if($idDateFlag){if($idBirthDate[2]==$i)echo "selected";}?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>日</td> </tr>';
    temp +='<tr> <td>住址</td><td><?php echo $sqlresult[2][6];?></td><td style="padding-right:15px;"> <input type="text" name="address" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>公民身份证号码</td><td><?php echo $sqlresult[2][7];?></td><td style="padding-right:15px;"> <input type="text" name="number" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>签发机关</td><td><?php echo $sqlresult[2][8];?></td><td style="padding-right:15px;"> <input type="text" name="organization" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr> ' ;
    temp +='<tr> <td>有限期限</td><td><?php echo $sqlresult[2][9];?></td><td style="padding-right:15px;"> <select name="startYear";><?php for($i=$time-50;$i<=$time;$i++){?><option <?php if($idDateFlag){if($idUsefulDate[0][0]==$i)echo "selected";}?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>年';
    temp +='<select name="startMonth";><?php for($i=1;$i<=12;$i++){?><option <?php if($idDateFlag){if($idUsefulDate[0][1]==$i)echo "selected";}?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>月';
    temp +='<select name="startDay";><?php for($i=1;$i<=31;$i++){?><option <?php if($idDateFlag){if($idUsefulDate[0][2]==$i)echo "selected";}?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>日&nbsp至&nbsp';
    temp +='<select name="endYear";><?php for($i=$time;$i<=$time+80;$i++){?><option <?php if($idDateFlag){if($idUsefulDate[1][0]==$i)echo "selected";}?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>年';
    temp +='<select name="endMonth";><?php for($i=1;$i<=12;$i++){?><option <?php if($idDateFlag){if($idUsefulDate[1][1]==$i)echo"selected";}?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>月';
    temp +='<select name="endDay";><?php for($i=1;$i<=31;$i++){?><option <?php if($idDateFlag)if($idUsefulDate[1][2]==$i)echo "selected";?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>日</td> </tr>';
    temp +='<tr> <td align="center" colspan="3"><a style="width: 13%" href="../index.php"class="btn">取消</a><input style="width: 20%;"type="reset" class="btn" value="重置"><input style="width: 20%;" class="btn bg-blue bg-inverse" type="submit" name="employer_idcard" value="修改"></td></tr>';
    temp +=' </table> </form></fieldest></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//联系方式信息
function contact() {
    var temp = '<div id="' + pp + '"><fieldset><legend>联系方式</legend><form action="" method="post"><small>姓名:&nbsp<?php echo $sqlresult[2][2];?>&nbsp&nbsp&nbsp&nbsp性别:&nbsp<?php echo $sqlresult[2][3];?>&nbsp&nbsp&nbsp&nbsp员工ID:&nbsp<?php echo $sqlresult[2][1];?>&nbsp&nbsp&nbsp&nbsp</small><table class="table table-bordered">';
    temp += ' <tr> <td style="width:20% ;">电话</td><td><?php if($sqlresult[3][2])echo $sqlresult[3][2];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="phone" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += ' <tr> <td>QQ</td><td><?php if($sqlresult[3][2])echo $sqlresult[3][2];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="qq" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += ' <tr> <td>邮箱</td><td><?php if($sqlresult[3][2])echo $sqlresult[3][2];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="email" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += ' <tr> <td>微信</td><td><?php if($sqlresult[3][2])echo $sqlresult[3][5];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="weChat" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += ' <tr> <td>微博</td><td><?php if($sqlresult[3][2])echo $sqlresult[3][6];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="weibo" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += ' <tr> <td align="center" colspan="3"><a style="width: 13%;" href="../index.php" class="btn">取消</a><input style="width: 20%;" class="btn" type="reset" value="重置"><input style="width: 20%;" class="btn bg-blue bg-inverse" type="submit" name="employer_contact" value="修改"></td> </tr>';
    temp += ' </table> </form></fieldset> </div>';
    //改变main_content的内容
    changeinfo(temp);


}
//驾驶证信息
function license() {
    var temp='<div id="' + pp + '"><fieldset><legend>驾驶证信息</legend><form action="" method="post"><small>姓名:&nbsp<?php echo $sqlresult[2][2];?>&nbsp&nbsp&nbsp&nbsp性别:&nbsp<?php echo $sqlresult[2][3];?>&nbsp&nbsp&nbsp&nbsp员工ID:&nbsp<?php echo $sqlresult[2][1];?>&nbsp&nbsp&nbsp&nbsp</small><table class="table table-bordered">';
    temp +='<tr> <td style="width: 20%;">身份证号</td><td ><?php if($sqlresult[4][3])echo $sqlresult[4][3];else echo "暂无";?></td><td style="padding-right:15px;> <input type="text" name="number" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>档案编号</td> <td><?php if($sqlresult[4][4])echo $sqlresult[4][4];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="serialNumber" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>姓名</td><td><?php if($sqlresult[4][2])echo $sqlresult[4][2];else echo "暂无";?></td><td style="padding-right:15px;"></td> </tr>';
    temp +='<tr> <td>性别</td> <td><?php if($sqlresult[4][5])echo $sqlresult[4][5];else echo "暂无";?></td><td style="padding-right:15px;"> </td> </tr>';
    temp +='<tr> <td>国籍</td><td><?php if($sqlresult[4][6])echo $sqlresult[4][6];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="country" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>住址</td> <td><?php if($sqlresult[4][7])echo $sqlresult[4][7];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="address" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>出生日期</td> <td><?php if($sqlresult[4][8])echo $sqlresult[4][8];else echo "暂无";?></td><td style="padding-right:15px;">  </td> </tr>';
    temp +='<tr> <td>初次领证日期</td> <td><?php if($sqlresult[4][9])echo $sqlresult[4][9];else echo "暂无";?></td><td style="padding-right:15px;"><select name="firstYear";><?php for($i=1950;$i<=$time;$i++){?><option <?php if($licenseDateFlag){if($licenseFirstDate[0]==$i)echo "selected";}?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>年';
    temp +='<select name="firstMonth";><?php for($i=1;$i<=12;$i++){?><option <?php if($licenseDateFlag){if($licenseFirstDate[1]==$i)echo"selected";}?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>月';
    temp +='<select name="firstDay";><?php for($i=1;$i<=31;$i++){?><option <?php if($licenseDateFlag){if($licenseFirstDate[2]==$i)echo "selected";}?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>日</td> </tr>';
    temp +='<tr> <td>准驾车型</td><td><?php if($sqlresult[4][10])echo $sqlresult[4][10];else echo "暂无";?></td> <td style="padding-right:15px;"> <input type="text" name="carType" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>发证机关</td> <td><?php if($sqlresult[4][11])echo $sqlresult[4][11];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="organization" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>有限期限</td> <td><?php if($sqlresult[4][12])echo $sqlresult[4][12];else echo "暂无";?></td><td style="padding-right:15px;"> <select name="startYear";><?php for($i=$time-50;$i<=$time;$i++){?><option <?php if($licenseDateFlag){if($licenseUsefulDate[0][0]==$i)echo "selected";}?> value="<?php echo $i;?>"><?php echo $i;?></option><?php }?></select>年';
    temp +='<select name="startMonth";><?php for($i=1;$i<=12;$i++){?><option <?php if($licenseDateFlag){if($licenseUsefulDate[0][1]==$i)echo "selected";}?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>月';
    temp +='<select name="startDay";><?php for($i=1;$i<=31;$i++){?><option <?php if($licenseDateFlag){if($licenseUsefulDate[0][2]==$i)echo "selected";}?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>日&nbsp至&nbsp';
    temp +='<select name="endYear";><?php for($i=$time;$i<=$time+80;$i++){?><option <?php if($licenseDateFlag){if($licenseUsefulDate[1][0]==$i)echo"selected";}?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>年';
    temp +='<select name="endMonth";><?php for($i=1;$i<=12;$i++){?><option <?php if($licenseDateFlag){if($licenseUsefulDate[1][1]==$i)echo "selected";}?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>月';
    temp +='<select name="endDay";><?php for($i=1;$i<=31;$i++){?><option <?php if($licenseDateFlag){if($licenseUsefulDate[1][2]==$i)echo "selected";}?> value="<?php echo$i?>"><?php echo$i?></option><?php }?></select>日</td> </tr>';
    temp +='<tr> <td align="center" colspan="3"><a style="width: 13%;" href="../index.php" class="btn">取消</a><input style="width: 20%;" type="reset" class="btn" value="重置"><input style="width: 20%;" class="btn bg-blue bg-inverse" type="submit" name="employer_license" value="修改"></td> </tr>';
    temp +=' </table> </form></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//车辆信息
function car() {
    var temp='<div id="' + pp + '"><fieldset><legend>车辆信息</legend><form action="" method="post"><small>姓名:&nbsp<?php echo $sqlresult[2][2];?>&nbsp&nbsp&nbsp&nbsp性别:&nbsp<?php echo $sqlresult[2][3];?>&nbsp&nbsp&nbsp&nbsp员工ID:&nbsp<?php echo $sqlresult[2][1];?>&nbsp&nbsp&nbsp&nbsp</small><table class="table table-bordered">';
    temp +='<tr> <td style="width: 20%;">车辆种类</td><td><?php if($sqlresult)echo $sqlresult[5][2];else echo "暂无";?></td> <td style="padding-right:15px;"> <input type="text" name="carClass" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>品牌</td> <td><?php if($sqlresult[5][3])echo $sqlresult[5][3];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="brand" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>型号</td> <td><?php if($sqlresult[5][4])echo $sqlresult[5][4];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="model" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>车牌号</td> <td><?php if($sqlresult[5][5])echo $sqlresult[5][5];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="plateNumber" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>车辆类型</td> <td><?php if($sqlresult[5][6])echo $sqlresult[5][6];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="carType" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>所有人</td> <td><?php if($sqlresult[5][7])echo $sqlresult[5][7];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="owner" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>住址</td> <td><?php if($sqlresult[5][8])echo $sqlresult[5][8];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="address" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>使用性质</td> <td><?php if($sqlresult[5][9])echo $sqlresult[5][9];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="use" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>品牌型号</td> <td><?php if($sqlresult[5][10])echo $sqlresult[5][10];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="brandModel" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>车辆识别代号</td> <td><?php if($sqlresult[5][11])echo $sqlresult[5][11];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="vehicleCode" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>发动机号码</td> <td><?php if($sqlresult[5][12])echo $sqlresult[5][12];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="engineNumber" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr> ';
    temp +='<tr> <td>发证机关</td> <td><?php if($sqlresult[5][13])echo $sqlresult[5][13];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="organization" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>注册日期</td> <td><?php if($sqlresult[5][14])echo $sqlresult[5][14];else echo "暂无";?></td><td style="padding-right:15px;"><select name="year"><?php for($i=$time-50;$i<=$time;$i++){?><option value="<?php echo $i;?>"><?php echo $i;?></option><?php }?></select>年<select name="month"><?php for($i=1;$i<=12;$i++){?><option value="<?php echo $i;?>"><?php echo $i;?></option><?php }?></select>月<select><?php ?><option value="<?php ?>"><?php echo $i;?></option></select>日<input type="text" name="registDate" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>核定载客人数</td> <td><?php if($sqlresult[5][15])echo $sqlresult[5][15];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="passenger" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>车身颜色</td> <td><?php if($sqlresult[5][17])echo $sqlresult[5][17];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="carColor" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>检验有效期至</td> <td><?php if($sqlresult[5][16])echo $sqlresult[5][16];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="usefulDate" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>分配给</td> <td><?php if($sqlresult[5][18])echo $sqlresult[5][18];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="users" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td align="center" colspan="3"><a style="width: 13%;" href="../index.php" class="btn">取消</a><input style="width: 20%;" type="reset" class="btn" value="重置"><input style="width: 20%;" class="btn bg-blue bg-inverse" type="submit" name="car_msg" value="修改"></td> </tr>';
    temp +='</table></form></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//住家信息
function home() {
    var temp='<div id="' + pp + '"><fieldset><legend>住家信息</legend><form action="" method="post"><small>姓名:&nbsp<?php echo $sqlresult[2][2];?>&nbsp&nbsp&nbsp&nbsp性别:&nbsp<?php echo $sqlresult[2][3];?>&nbsp&nbsp&nbsp&nbsp员工ID:&nbsp<?php echo $sqlresult[2][1];?>&nbsp&nbsp&nbsp&nbsp</small><table class="table table-bordered">';
    temp +='<tr> <td style="width: 20%;">小区名称</td><td><?php if($sqlresult[6][2])echo $sqlresult[6][2];else echo "暂无";?></td> <td style="padding-right:15px;"> <input type="text" name="community" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>地址</td> <td><?php if($sqlresult[6][3])echo $sqlresult[6][3];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="address" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>性质</td> <td><?php if($sqlresult[6][4])echo $sqlresult[6][4];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="nature" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>住家电话</td> <td><?php if($sqlresult[6][5])echo $sqlresult[6][5];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="tel" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>入住时间</td> <td><?php if($sqlresult[6][6])echo $sqlresult[6][6];else echo "暂无";?></td><td style="padding-right:15px;"> <select ><?php for($i=$time-80;$i<=$time;$i++){?><option <?php if($addressDateFlag){if($addressIndate[0]==$i)echo "selected";}?> value="<?php echo $i;?>"><?php echo $i;?></option><?php }?></select>年<select>';
    temp +='<?php for($i=1;$i<=12;$i++){?><option <?php if($addressDateFlag){if($addressIndate[1]==$i)echo "selected";}?> value="<?php echo $i;?>"><?php echo $i;?></option><?}?></select>月<select>';
    temp +='<?php for($i=1;$i<=31;$i++){?><option <?php if($addressDateFlag){if($addressIndate[2]==$i)echo "selected";}?> value="<?php echo $i;?>"><?php echo $i;?></option><?php }?></select>日</td> </tr>';
    temp +='<tr> <td align="center" colspan="3"><a style="width: 13%;" class="btn" href="../index.php">取消</a><input style="width: 20%;" class="btn" type="reset" value="重置"><input style="width: 20%;" class="btn bg-blue bg-inverse" type="submit" name="employer_address" value="修改"></td> </tr>';
    temp +='</table> </form></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//联系人信息
function linkman() {
    var temp = '<div id="' + pp + '"><fieldset><legend>联系人信息</legend><form action="" method="post"><small>姓名:&nbsp<?php echo $sqlresult[2][2];?>&nbsp&nbsp&nbsp&nbsp性别:&nbsp<?php echo $sqlresult[2][3];?>&nbsp&nbsp&nbsp&nbsp员工ID:&nbsp<?php echo $sqlresult[2][1];?>&nbsp&nbsp&nbsp&nbsp</small><table class="table table-bordered">';
    temp += '<tr> <td style="width: 20%;">姓名</td><td><?php if($sqlresult[7][2])echo $sqlresult[7][2];else echo "暂无";?></td> <td style="padding-right:15px;"> <input type="text" name="name" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td>关系</td> <td><?php if($sqlresult[7][3])echo $sqlresult[7][3];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="relationship" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td>电话</td> <td><?php if($sqlresult[7][4])echo $sqlresult[7][4];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="phone" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td>住家</td> <td><?php if($sqlresult[7][5])echo $sqlresult[7][5];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="address" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td>单位</td> <td><?php if($sqlresult[7][6])echo $sqlresult[7][6];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="unit" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td align="center" colspan="3"><a style="width: 13%;" class="btn" href="../index.php">取消</a><input style="width: 20%;" class="btn" type="reset" value="重置"><input style="width: 20%;" class="btn bg-blue bg-inverse" type="submit" name="employer_other_contact" value="修改"></td> </tr>';
    temp += '</table> </form></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//银行账户信息
function bank() {
    var temp = '<div id="' + pp + '"><fieldset><legend>银行卡信息</legend><form action="" method="post"><small>姓名:&nbsp<?php echo $sqlresult[2][2];?>&nbsp&nbsp&nbsp&nbsp性别:&nbsp<?php echo $sqlresult[2][3];?>&nbsp&nbsp&nbsp&nbsp员工ID:&nbsp<?php echo $sqlresult[2][1];?>&nbsp&nbsp&nbsp&nbsp</small><table class="table table-bordered">';
    temp += '<tr> <td style="width: 20%;">类别</td><td><?php if($sqlresult[8][2])echo $sqlresult[8][2];else echo "暂无";?></td> <td style="padding-right:15px;"> <input type="text" name="type" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td>开户银行</td> <td><?php if($sqlresult[8][3])echo $sqlresult[8][3];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="bank" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td>银行账号</td> <td><?php if($sqlresult[8][4])echo $sqlresult[8][4];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="bankAccount" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td align="center" colspan="3"><a style="width: 13%;" class="btn" href="../index.php">取消</a><input style="width: 20%;" class="btn" type="reset" value="重置"><input style="width: 20%;" class="btn bg-blue bg-inverse" type="submit" name="employer_account" value="修改"></td> </tr>';
    temp += '</table> </form></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//任职设定
function office() {

    var temp = '<div id="' + pp + '"><fieldset><legend>任职设定</legend><form action="" method="post"><small>姓名:&nbsp<?php echo $sqlresult[2][2];?>&nbsp&nbsp&nbsp&nbsp性别:&nbsp<?php echo $sqlresult[2][3];?>&nbsp&nbsp&nbsp&nbsp员工ID:&nbsp<?php echo $sqlresult[2][1];?>&nbsp&nbsp&nbsp&nbsp <table class="table table-bordered">';
    temp +='<tr> <td style="width:20% ;">身份证号</td><td><?php if($sqlresult[9][2])echo $sqlresult[9][2];else echo "暂无";?></td> <td style="padding-right:15px;">无法修改</td> </tr>';
    temp +='<tr> <td>任职公司</td> <td><?php if($sqlresult[9][3])echo $sqlresult[9][3];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="company" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>任职部门</td> <td><?php if($sqlresult[9][4])echo $sqlresult[9][4];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="department" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>任职职位</td> <td><?php if($sqlresult[9][5])echo $sqlresult[9][5];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="position" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>任职时间</td> <td><?php if($sqlresult[9][6])echo $sqlresult[9][6];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="date" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td>员工ID</td> <td><?php if($sqlresult[9][7])echo $sqlresult[9][7];else echo "暂无";?></td><td style="padding-right:15px;">无法修改</td> </tr>';
    temp +='<tr> <td>人事专员</td> <td><?php if($sqlresult[9][8])echo $sqlresult[9][8];else echo "暂无";?></td><td style="padding-right:15px;"> <input type="text" name="hr" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp +='<tr> <td align="center" colspan="3"><a style="width: 13%;" class="btn" href="../index.php">取消</a><input style="width: 20%;" class="btn" type="reset" value="重置"><input style="width: 20%;" class="btn bg-blue bg-inverse" type="submit" name="employer_office" value="修改"></td> </tr>';
    temp += '</table> </form></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//薪资标准
function salary() {
    var temp = '<div id="' + pp + '"><fieldset><legend>薪资标准</legend><form action="" method="post"><small>姓名:&nbsp<?php echo $sqlresult[2][2];?>&nbsp&nbsp&nbsp&nbsp性别:&nbsp<?php echo $sqlresult[2][3];?>&nbsp&nbsp&nbsp&nbsp员工ID:&nbsp<?php echo $sqlresult[2][1];?>&nbsp&nbsp&nbsp&nbsp</small><table class="table table-bordered">';
    temp += '<tr> <td>薪资分类</td> <td style="padding-right:15px;"> <input type="text" name="type" value="服务司机类" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td>计算方式</td> <td style="padding-right:15px;"> <input type="text" name="calculation1" value="（服务业绩-运营成本）*0.4+业务提成" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td></td> <td style="padding-right:15px;"> <input type="text" name="calculation2" value="（服务单量*（服务费*0.9））*0.8+业务提成" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td>绩效工资</td> <td style="padding-right:15px;"> <input type="text" name="meritPay1" value="（服务业绩-运营成本）*0.1" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td></td> <td style="padding-right:15px;"> <input type="text" name="meritPay2" value="（服务单量*（服务费*0.9））*0.2" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td>社会保险</td> <td style="padding-right:15px;"> <input type="text" name="socialInsurance" value="当月实缴金额" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td>住房公积金</td> <td style="padding-right:15px;"> <input type="text" name="houseConstruction" value="" style="width:100%;padding:5px; margin-right:50px; display: block;"> </td> </tr>';
    temp += '<tr> <td align="center" colspan="3"><a style="width: 13%;" class="btn" href="../index.php">取消</a><input style="width: 20%;" class="btn" type="reset" value="重置"><input style="width: 20%;" class="btn bg-blue bg-inverse" type="submit" name="employer_salary" value="修改"></td> </tr>';
    temp += '</table> </form></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);
}
//资产分配
function property() {
    var temp = '<div id="' + pp + '"><fieldset><legend>资产分配</legend><form action="" method="post"><small>姓名:&nbsp<?php echo $sqlresult[2][2];?>&nbsp&nbsp&nbsp&nbsp性别:&nbsp<?php echo $sqlresult[2][3];?>&nbsp&nbsp&nbsp&nbsp员工ID:&nbsp<?php echo $sqlresult[2][1];?>&nbsp&nbsp&nbsp&nbsp</small><table class="table table-bordered">';
    temp += '<tr> <td style="width:20% ;">编号</td> <td style="padding-right:15px;">  </td> </tr>';
    temp += '<tr> <td>姓名</td> <td style="padding-right:15px;">  </td> </tr>';
    temp += '<tr> <td>性别</td> <td align="padding-right:15px;"> </td> </tr>';
    temp += '<tr> <td align="center" colspan="3"><a style="width: 13%;" class="btn" href="../index.php">取消</a><input style="width: 20%;" class="btn" type="reset" value="重置"><input style="width: 20%;" class="btn bg-blue bg-inverse" type="submit" name="employer_zhican" value="修改"></td> </tr>';
    temp += '</table> </form></fieldset></div>';
    //改变main_content的内容
    changeinfo(temp);

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

