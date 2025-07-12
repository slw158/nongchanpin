<?php
session_start();
include_once 'conn.php';
$id = $_GET["id"];
$ndate = date("Y-m-d");
$addnew = $_POST["addnew"];
if ($addnew == "1") {
    $dingdanhao = $_POST["dingdanhao"];
    $dingdanjine = $_POST["dingdanjine"];
    $dingdanneirong = $_POST["dingdanneirong"];
    $zhanghao = $_POST["zhanghao"];
    $xingming = $_POST["xingming"];
    $shouji = $_POST["shouji"];
    $dizhi = $_POST["dizhi"];

    //lixandonxgjixelxb
    $sql = "update dingdanxinxi set dingdanhao='$dingdanhao',dingdanjine='$dingdanjine',dingdanneirong='$dingdanneirong',zhanghao='$zhanghao',xingming='$xingming',shouji='$shouji',dizhi='$dizhi' where id= " . $id;
    mysql_query($sql);
    echo "<script>javascript:alert('修改成功!');</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
    <title>修改订单信息</title>

    <link rel="stylesheet" href="css.css" type="text/css">
    <script type="text/javascript" src="js/My97DatePicker/WdatePicker.js" charset="gb2312"></script>
</head>
<script language="javascript">


    function OpenScript(url, width, height) {
        var win = window.open(url, "SelectToSort", 'width=' + width + ',height=' + height + ',resizable=1,scrollbars=yes,menubar=no,status=yes');
    }

    function OpenDialog(sURL, iWidth, iHeight) {
        var oDialog = window.open(sURL, "_EditorDialog", "width=" + iWidth.toString() + ",height=" + iHeight.toString() + ",resizable=no,left=0,top=0,scrollbars=no,status=no,titlebar=no,toolbar=no,menubar=no,location=no");
        oDialog.focus();
    }

    function hsgxia2shxurxu(nstr, nwbk) {
        if (eval("form1." + nwbk).value.indexOf(nstr) >= 0) {
            eval("form1." + nwbk).value = eval("form1." + nwbk).value.replace(nstr + "；", "");
        } else {
            eval("form1." + nwbk).value = eval("form1." + nwbk).value + nstr + "；";
        }
    }
</script>
<!--hxsglxiangdxongjxs-->
<body>
<p>修改订单信息： 当前日期： <?php echo $ndate; ?></p>
<?php
$sql = "select * from dingdanxinxi where id=" . $id;
$query = mysql_query($sql);
$rowscount = mysql_num_rows($query);
if ($rowscount > 0) {
//lixanxdoxngcxhaxifxen
    ?>
    <form id="form1" name="form1" method="post" action="">
        <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF"
               style="border-collapse:collapse">

            <tr>
                <td>订单号：</td>
                <td><input name='dingdanhao' type='text' id='dingdanhao'
                           value='<?php echo mysql_result($query, 0, dingdanhao); ?>'/></td>
            </tr>
            <tr>
                <td>订单金额：</td>
                <td><input name='dingdanjine' type='text' id='dingdanjine'
                           value='<?php echo mysql_result($query, 0, dingdanjine); ?>'/></td>
            </tr>
            <tr>
                <td>订单内容：</td>
                <td><textarea name='dingdanneirong' cols='50' rows='8'
                              id='dingdanneirong'><?php echo mysql_result($query, 0, dingdanneirong); ?></textarea></td>
            </tr>
            <tr>
                <td>账号：</td>
                <td><input name='zhanghao' type='text' id='zhanghao'
                           value='<?php echo mysql_result($query, 0, zhanghao); ?>'/></td>
            </tr>
            <tr>
                <td>姓名：</td>
                <td><input name='xingming' type='text' id='xingming'
                           value='<?php echo mysql_result($query, 0, xingming); ?>'/></td>
            </tr>
            <tr>
                <td>手机：</td>
                <td><input name='shouji' type='text' id='shouji'
                           value='<?php echo mysql_result($query, 0, shouji); ?>'/></td>
            </tr>
            <tr>
                <td>地址：</td>
                <td><input name='dizhi' type='text' id='dizhi' size='50'
                           value='<?php echo mysql_result($query, 0, dizhi); ?>'/></td>
            </tr>
            <tr style='display:none'>
                <td>发货物流：</td>
                <td><input name='fahuowuliu' type='text' id='fahuowuliu'
                           value='<?php echo mysql_result($query, 0, fahuowuliu); ?>'/></td>
            </tr>
            <tr style='display:none'>
                <td>单号：</td>
                <td><input name='danhao' type='text' id='danhao'
                           value='<?php echo mysql_result($query, 0, danhao); ?>'/></td>
            </tr>
            <tr style='display:none'>
                <td>配送员：</td>
                <td><input name='peisongyuan' type='text' id='peisongyuan'
                           value='<?php echo mysql_result($query, 0, peisongyuan); ?>'/></td>
            </tr>


            <tr>
                <td>&nbsp;</td>
                <td><input name="addnew" type="hidden" id="addnew" value="1"/>
                    <input type="submit" name="Submit" value="修改" style='border:solid 1px #000000; color:#666666'/>
                    <input type="reset" name="Submit2" value="重置" style='border:solid 1px #000000; color:#666666'/>
                </td>
            </tr>
        </table>
    </form>
    <?php
}
?>
<p>&nbsp;</p>
</body>
</html>

