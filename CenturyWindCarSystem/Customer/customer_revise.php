<?php
//$a=$_POST;
//include "../Common/localSQLSettings.php";
//localSettings();
//
//if($_GET["cust_ID"])
//{
//    $cust_ID=$_GET["cust_ID"];
//}
//if(@$_POST['name']!=null)
//{
//    $query="update cutomers set cust_ID='".$a['cust_ID']."',name='".$a['name']."',sex='".$a['sex']."',type='".$a['type']."',phone='".$a['phone']."',car='".$a['car']."' where cust_ID='$cust_ID'";
//    $s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
//    ++$s;
//    echo"<script language='JavaScript'>alert('这里是顾客基本信息$s');</script>";
//
//}
//
//if(@$_POST['cs_name']!=null)
//{
//    $query="update customer_source set cust_ID='".$a['cust_ID']."',name='".$a['cs_name']."',sex='".$a['cs_sex']."',phone='".$a['cs_phone']."' where cust_ID='$cust_ID'";
//    $s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
//    ++$s;
//    echo"<script language='JavaScript'>alert('这里是顾客来源信息$s');</script>";
//}
//if(@$_POST['ci_number']!=null)
//{
//    $query="update customer_idcard set cust_ID='".$a['cust_ID']."',name='".$a['ci_name']."',sex='".$a['ci_sex'].
//        "',nation='".$a['ci_nation']."',birthday='".$a['ci_birthday']."',address='".$a['ci_address'].
//        "',number='" .$a['ci_number']."',organization='".$a['ci_organization']."',usefulDate='".$a['ci_usefulDate']."' where cust_ID='$cust_ID'";
//    $s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
//    ++$s;
//    echo"<script language='JavaScript'>alert('这里是顾客身份证信息$s');</script>";
//}
//if(@$_POST['cc_name']!=null)
//{
//    $query="update customer_contact set cust_ID='".$a['cust_ID']."',name='".$a['cc_name']."',phone='".$a['cc_phone']."',qq='".$a['cc_qq']."',email='".$a['cc_email']."',weChat='".$a['cc_weChat']."',weibo='".$a['cc_weibo']."'
//             where cust_ID='$cust_ID'";
//    $s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
//    ++$s;
//    echo"<script language='JavaScript'>alert('这里是顾客联系方式信息$s');</script>";
//}
//if(@$_POST['cu_phone']!=null)
//{
//    $query="update customer_unit set cust_ID='".$a['cust_ID']."',nameSample='".$a['cu_nameSample']."',nameAll='".$a['cu_nameAll'].
//        "',address='".$a['cu_address']."',phone='".$a['cu_phone']."',department='".$a['cu_department']."',position='".$a['cu_position'].
//        "',jobTel='".$a['cu_jobTel']."',inDate='".$a['cu_inDate']."'
//          where cust_ID='$cust_ID'";
//    $s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
//    ++$s;
//    echo"<script language='JavaScript'>alert('这里是顾客单位信息$s');</script>";
//}
//if(@$_POST['cr_owner']!=null)
//{
//    $query="update customer_car set cust_ID='".$a['cust_ID']."',carClass='".$a['cr_carClass']."',brand='".$a['cr_brand'].
//        "',model='".$a['cr_model']."',plateNumber='".$a['cr_plateNumber']."',carType='".$a['cr_carType']."',owner='" .$a['cr_owner'].
//        "',address='".$a['cr_address']."',useWay='".$a['cr_use']."',brandModel='".$a['cr_brandModel']."',vehicleCode='".$a['cr_vehicleCode'].
//        "',engineNumber='".$a['cr_engineNumber']."',organization='".$a['cr_organization']."',registDate='".$a['cr_registDate'].
//        "',passenger='".$a['cr_passenger']."',usefulDate='".$a['cr_usefulDate']."',carColor='".$a['cr_carColor']."',users='".$a['cr_users']."'
//         where cust_ID='$cust_ID'";
//    $s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
//    ++$s;
//    echo"<script language='JavaScript'>alert('这里是顾客车辆信息$s');</script>";
//}
//if(@$_POST['cad_tel']!=null)
//{
//    $query="update customer_address set cust_ID='".$a['cust_ID']."',community='".$a['cad_community']."',address='".$a['cad_address'].
//        "',nature='".$a['cad_nature']."',tel='".$a['cad_tel']."',checkInDate='".$a['cad_checkInDate']."'
//         where cust_ID='$cust_ID'";
//    $s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
//    ++$s;
//    echo"<script language='JavaScript'>alert('这里是顾客住家信息$s');</script>";
//}
//if(@$_POST['cas_name']!=null)
//{
//    $query="update customer_assets set cust_ID='".$a['cust_ID']."',name='".$a['cas_name']."',community='".$a['cas_community'].
//        "',address='".$a['cas_address']."',doorNumber='".$a['cas_doorNumber']."',houseArea='".$a['cas_houseArea']."',rightsNumber='".$a['cas_rightsNumber'].
//        "',inDate='". $a['cas_inDate']."',inPerson='".$a['cas_inPerson']."',checkState='".$a['cas_checkState']."',checkDate='".$a['cas_checkDate'].
//        "',checkPerson='".$a['cas_checkPerson']."',checkResult='".$a['cas_checkResult']."'
//         where cust_ID='$cust_ID'";
//    $s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
//    ++$s;
//    echo"<script language='JavaScript'>alert('这里是顾客资产信息$s');</script>";
//}
//if(@$_POST['cac_bank']!=null)
//{
//    $query="update customer_account set cust_ID='".$a['cust_ID']."',type='".$a['cac_type']."',bank='".$a['cac_bank']."',bankAccount='".$a['cac_bankAccount']."'
//             where cust_ID='$cust_ID'";
//    $s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
//    ++$s;
//    echo"<script language='JavaScript'>alert('这里是顾客账户信息$s');</script>";
//}
//if(@$_POST['cli_name']!=null)
//{
//    $query="update customer_license set cust_ID='".$a['cust_ID']."',name='".$a['cli_name']."',number='".$a['cli_number'].
//        "',serialNumber='".$a['cli_serialNumber']."',sex='".$a['cli_sex']."',country='" .$a['cli_country']."',address='".$a['cli_address'].
//        "',birthday='".$a['cli_birthday']."',firstDate='".$a['cli_firstDate']."',carType='" .$a['cli_carType'].
//        "',organization='".$a['cli_organization']."',usefulDate='".$a['cli_usefulDate']."'
//         where cust_ID='$cust_ID'";
//    $s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
//    ++$s;
//    echo"<script language='JavaScript'>alert('这里是顾客驾驶证信息$s');</script>";
//}
//if(@$_POST['co_name']!=null)
//
//{
//    $query="update customer_other_contact set cust_ID='".$a['cust_ID']."',name='".$a['co_name']."',relationship='".$a['co_relationship']."',phone='".$a['co_phone']."',address='".$a['co_address']."',unit='".$a['co_unit']."'
//             where cust_ID='$cust_ID'";
//    $s=mysql_query($query) or die("Error in query: $query. ".mysql_error());
//    ++$s;
//    echo"<script language='JavaScript'>alert('这里是顾客其他联系人信息$s');</script>";
//}
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
    <style>
        body{
        }
        input{
            width:100%;
        }
    </style>
    <title>世纪风</title>
</head>
<body onload="initView();">
<?php
include '../Common/head.php';
?>
<form action="#" method="post">
<div class="wrapper">
<div class="row">
<div class="col3">
    <ul class="sidebar">
        <li class="selected">
            <a href="">客户信息详情</a>
            <ul>
                <li class="selected">
                    <a href="#mineInfo">个人信息</a>
                </li>
                <li>
                    <a href="#sourceInfo">来源信息</a>
                </li>
                <li>
                    <a href="#identityInfo">身份信息</a>
                </li>
                <li>
                    <a href="#contactInfo">联系方式信息</a>
                </li>
                <li>
                    <a href="#officeInfo">工作单位信息</a>
                </li>
                <li>
                    <a href="#carInfo">车辆信息</a>
                </li>
                <li>
                    <a href="#homeInfo">住家信息</a>
                </li>
                <li>
                    <a href="#propertyInfo">资产信息</a>
                </li>
                <li>
                    <a>订单信息</a>
                </li>
                <li>
                    <a href="#bankInfo">银行账户信息</a>
                </li>
                <li>
                    <a href="#carCardInfo">驾驶证信息</a>
                </li>
                <li>
                    <a href="#linkman">联系人信息</a>
                </li>
                <li>
                    <a>名下客户信息</a>
                </li>
                <li>
                    <a>业务业绩信息</a>
                </li>
                <li>
                    <a>开票信息</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!--content-->
<div class="col9 docs-body" id="main_content">

<!--个人信息-->
<div id="mineInfo" class="col8">
    <p>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td>个人信息</td><td></td>
        </tbody>
        <tbody>
        <tr>
            <td>顾客识别号</td><td><input type="text" name="cust_ID" placeholder="2016072901"/></td>
        </tr>
        </tbody>
        <tbody>
        <tr>
            <td>姓名</td><td><input type="text" name="name" placeholder="李华"/></td>
        </tr>
        </tbody>
        <tbody>
        <tr>
            <td>性别</td><td><input type="text" name="sex" placeholder="男"/></td>
        </tr>
        </tbody>
        <tbody>
        <tr>
            <td>客户种类</td><td><input type="text" name="type" placeholder="个人车主"/></td>
        </tr>
        </tbody>
        <tbody>
        <tr>
            <td>联系电话</td><td><input name="phone" placeholder="1548476616"/></td>
        </tr>
        </tbody>
        <tbody>
        <tr>
            <td>车牌号码</td><td><input name="car" placeholder="钟敏"/></td>
        </tr>
        </tbody>
    </table>
    </p>
</div>
<!--来源信息-->
<div id="sourceInfo" class="col8">
    <p>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td>来源信息</td><td></td>
        </tbody>
        <tbody>
        <tr>
            <td>姓名</td><td><input type="text" name="cs_name" placeholder="20160001"/></td>
        </tr>
        <tr>
            <td>性别</td><td><input type="text" name="cs_sex" placeholder="20160001"/></td>
        </tr>
        <tr>
            <td>电话</td><td><input type="text" name="cs_phone" placeholder="20160001"/></td>
        </tr>
        </tbody>

    </table>
    </p>
</div>
<!--身份信息-->
<div id="identityInfo" class="col8">
    <p>
    <table class="table table-bordered"><tbody>
        <tr><td>身份证信息</td><td></td></tr></tbody><tbody>
        <tr><td>姓名</td><td><input type="text" name="ci_name" placeholder="钟敏"/></td></tr></tbody><tfoot>
        <tr><td>性别</td><td><input type="text" name="ci_sex" placeholder="男"/></td></tr>
        <tr><td>民族</td><td><input type="text" name="ci_nation" placeholder="汉"/></td></tr>
        <tr><td>出生</td><td><input type="text" name="ci_birthday" placeholder="2016.07.13"/></td></tr>
        <tr><td>住址</td><td><input type="text" name="ci_address" placeholder="成都市青羊区优诺国际"/></td></tr>
        <tr><td>公民身份证号码</td><td><input type="text" name="ci_number" placeholder="510XXXXXXXXXXXXXXX"/></td></tr>
        <tr><td>签发机关</td><td><input type="text" name="ci_organization" placeholder="公安局"/></td></tr>
        <tr><td>有效期限</td><td><input type="text" name="ci_usefulDate" placeholder="2050.07.03"/></td></tr></tfoot>
    </table>
</div>
<!--联系方式信息-->
<div id="contactInfo" class="col8">
    <table class="table table-bordered"><tbody>
        <tr><td>联系方式信息</td><td></td></tr></tbody><tbody>
        <tr><td>姓名</td><td><input type="text" name="cc_name" placeholder="钟敏"/></td></tr></tbody><tfoot>
        <tr><td>电话</td><td><input type="text" name="cc_phone" placeholder="13568851156"/></td></tr>
        <tr><td>QQ</td><td><input type="text" name="cc_qq" placeholder="501556466"/></td></tr>
        <tr><td>邮箱</td><td><input type="text" name="cc_email" placeholder="501556466@qq.com"/></td></tr>
        <tr><td>微信</td><td><input type="text" name="cc_weChat" placeholder="13568851156"/></td></tr>
        <tr><td>微博</td><td><input type="text" name="cc_weibo" placeholder="世纪风"/></td></tr></tfoot></table>
</div>
<!--工作单位信息-->
<div id="officeInfo" class="col8">
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td>工作单位信息</td><td>
        </tbody>
        <tbody>
        <tr>
            <td>单位简称</td><td><input type="text" name="cu_nameSample" placeholder="四川成都世纪风汽车"/></td>
        </tr>
        </tbody>
        <tbody>
        <tr>
            <td>单位全称</td><td><input type="text" name="cu_nameAll"/></td>
        </tr>
        </tbody>
        <tbody>
        <tr>
            <td>单位地址</td><td><input type="text" name="cu_address"/></td>
        </tr>
        </tbody>
        <tbody>
        <tr>
            <td>单位电话</td><td><input type="text" name="cu_phone"/></td>
        </tr>
        </tbody>
        <tbody>
        <tr>
            <td>所在部门</td><td><input type="text" name="cu_department"/></td>
        </tr>
        </tbody>
        <tbody>
        <tr>
            <td>担任职位</td><td><input type="text" name="cu_position"/></td>
        </tr>
        </tbody>
        <tbody>
        <tr>
            <td>办公电话</td><td><input type="text" name="cu_jobTel"/></td>
        </tr>
        </tbody>
        <tbody>
        <tr>
            <td>入司时间</td><td><input type="text" name="cu_inDate"/></td>
        </tr>
        </tbody>
    </table>

</div>
<!--车辆信息-->
<div id="carInfo" class="col8">
    <p>
    <table class="table table-bordered"><tbody>
        <tr><td>车辆基本信息</td><td></td></tr></tbody><tbody>
        <tr><td>车辆种类</td><td><input type="text" name="cr_carClass"/></td></tr></tbody><tfoot>
        <tr><td>品牌</td><td><input type="text" name="cr_brand"/>保时捷</td></tr>
        <tr><td>型号</td><td><input type="text" name="cr_model"/></td></tr>
        <tr><td>车牌号</td><td><input type="text" name="cr_plateNumber"/>川A156461</td></tr>
        <tr><td>车辆类型</td><td><input type="text" name="cr_carType"/></td></tr>
        <tr><td>所有人</td><td><input type="text" name="cr_owner"/>钟敏</td></tr>
        <tr><td>住址</td><td><input type="text" name="cr_address"/>成都市青羊区优诺国际</td></tr>
        <tr><td>使用性质</td><td><input type="text" name="cr_use"/></td></tr>
        <tr><td>品牌型号</td><td><input type="text" name="cr_brandModel"/></td></tr>
        <tr><td>车辆识别代号</td><td><input type="text" name="cr_vehicleCode"/></td></tr>
        <tr><td>发动机号码</td><td><input type="text" name="cr_engineNumber"/></td></tr>
        <tr><td>发证机关</td><td><input type="text" name="cr_organization"/></td></tr>
        <tr><td>注册日期</td><td><input type="text" name="cr_registDate"/>2016.07.13</td></tr>
        <tr><td>核定载客人数</td><td><input type="text" name="cr_passenger"/>50</td></tr>
        <tr><td>车身颜色</td><td><input type="text" name="cr_carColor"/>白色</td></tr>
        <tr><td>检验有效期至</td><td><input type="text" name="cr_usefulDate"/>2050.07.13</td></tr>
        <tr><td>分配给</td><td><input type="text" name="cr_users"/>钟敏</td></tr></tfoot></table>
    </p>
</div>
<!--住家信息-->
<div id="homeInfo" class="col8">
    <p>
    <table class="table table-bordered"><tbody>
        <tr><td>住家信息</td><td></td></tr></tbody><tbody>
        <tr><td>小区名称</td><td><input type="text" name="cad_community"/></td></tr></tbody><tfoot>
        <tr><td>地址</td><td><input type="text" name="cad_address"/>成都市青羊区优诺国际</td></tr>
        <tr><td>性质</td><td><input type="text" name="cad_nature"/></td></tr>
        <tr><td>住家电话</td><input type="text" name="cad_tel"/><td>135156465041</td></tr>
        <tr><td>入住时间</td><input type="text" name="cad_checkInDate"/><td>2016.07.13</td></tr></tfoot></table>

    </p>
</div>
<!--资产信息-->
<div id="propertyInfo" class="col8">
    <p>
    <table class="table table-bordered">
        <tbody>
        <tr><td>资产信息</td><td></td></tr>
        </tbody>
        <tbody>
        <tr><td>钟敏</td><td><input name=""/>s20160400025</td></tr>
        <tr><td>资产名称</td><td><input type="text" name="cas_name"/>房产</td></tr>
        <tr><td>小区名称</td><td><input type="text" name="cas_community"/>竹韵天府</td></tr>
        <tr><td>小区地址</td><td><input type="text" name="cas_address"/>成都市武侯区果堰街12号</td></tr>
        <tr><td>具体门牌</td><td><input type="text" name="cas_doorNumber"/>10栋2单元7号</td></tr>
        <tr><td>房产面积</td><td><input type="text" name="cas_houseArea"/>85.6</td></tr>
        <tr><td>产权证号</td><td><input type="text" name="cas_rightsNumber"/>201612245</td></tr>
        <tr><td>录入日期</td><td><input type="text" name="cas_inDate"/>2016.06.06</td></tr>
        <tr><td>录入人员</td><td><input type="text" name="cas_inPerson"/>刘敏</td></tr>
        <tr><td>资产核实</td><td><input type="text" name="cas_checkState"/>未核实</td></tr>
        <tr><td>核实时间</td><td><input type="text" name="cas_checkDate"/>-</td></tr>
        <tr><td>核实人员</td><td><input type="text" name="cas_checkPerson"/>-</td></tr>
        <tr><td>核实结果</td><td><input type="text" name="cas_checkResult"/>-</td></tr>

        </tbody>

    </table>

    </p>
</div>
<!--银行账户信息-->
<div id="bankInfo" class="col8">
    <p>
    <table class="table table-bordered">
        <tbody>
        <tr><td>银行账户信息</td><td></td></tr>
        </tbody>
        <tbody>
        <tr><td>类型</td><td><input type="text" name="cac_type"/></td></tr>
        <tr><td>开户银行</td><td><input type="text" name="cac_bank"/></td></tr>
        <tr><td>银行账号</td><td><input type="text" name="cac_bankAccount"/></td></tr>
        </tbody>
    </table>
    </p>
</div>
<!--驾驶证信息-->
<div id="carCardInfo" class="col8">
    <p>
    <table class="table table-bordered"><tbody>
        <tr><td>驾驶证信息</td><td></td></tr></tbody><tbody>
        <tr><td>姓名</td><td><input type="text" name="cli_name"/>钟敏</td></tr></tbody><tfoot>
        <tr><td>证号</td><td><input type="text" name="cli_number"/>165416516546846</td></tr>
        <tr><td>档案编号</td><td><input type="text" name="cli_serialNumber"/>0001</td></tr>
        <tr><td>性别</td><td><input type="text" name="cli_sex"/>男</td></tr>
        <tr><td>国籍</td><td><input type="text" name="cli_country"/>中国</td></tr>
        <tr><td>住址</td><td><input type="text" name="cli_address"/>成都市青羊区优诺国际</td></tr>
        <tr><td>出生日期</td><td><input type="text" name="cli_birthday"/>2016.07.13</td></tr>
        <tr><td>初次领证日期</td><td><input type="text" name="cli_firstDate"/>2016.07.13</td></tr>
        <tr><td>准驾车型</td><td><input type="text" name="cli_carType"/>C</td></tr>
        <tr><td>发证机关</td><td><input type="text" name="cli_organization"/>车管所</td></tr>
        <tr><td>有效期限</td><td><input type="text" name="cli_usefulDate"/>2050.07.13</td></tr></tfoot></table>
    </p>
</div>
<!--联系人信息-->
<div id="linkmanInfo" class="col8">
    <p>
    <table class="table table-bordered"><tbody>
        <tr><td>联系人信息</td><td></td></tr></tbody><tbody>
        <tr><td>姓名</td><td><input type="text" name="co_name"/>钟敏</td></tr></tbody><tfoot>
        <tr><td>关系</td><td><input type="text" name="co_relationship"/></td></tr>
        <tr><td>电话</td><td><input type="text" name="co_phone"/>13541441648</td></tr>
        <tr><td>住家</td><td><input type="text" name="co_address"/>成都市青羊区优诺国际</td></tr>
        <tr><td>单位</td><td><input type="text" name="co_unit"/>世纪风</td></tr></tfoot></table>
    </p>
</div>

</div>
<!--提交按钮-->
<div class="col1 right">
    <div class="sidebar"><input class="btn bg-blue bg-inverse" type="submit" name="customer" value="提交"></a></div>
</div>

</div>
</div></form>
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
        //数组employee_data进行数据存储
        var employee_data = {
            id : "20160001",
            name : "钟敏",
            office : "总经理",
            identyNum : "510XXXXXXXXXXXXXXXXXXXXXX"
        }
        //页面内数据改变
        document.getElementById("employee_Id").innerHTML = employee_data.id;
        document.getElementById("employee_name").innerHTML = employee_data.name;
        document.getElementById("employee_office").innerHTML = employee_data.office;
    }
</script>
</body>
</html>
