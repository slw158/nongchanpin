<?php
session_start();
include_once 'conn.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
    <title>购物车</title>
    <script type="text/javascript" src="js/My97DatePicker/WdatePicker.js" charset="gb2312"></script>
    <link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>
<!--销售统计-->
<p>已有购物车列表：</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">
    <tr>
        <td width="25" bgcolor="#CCFFFF">序号</td>
<!--        <td bgcolor='#CCFFFF'>单号</td>-->
<!--        <td bgcolor='#CCFFFF'>商品编号</td>-->
        <td bgcolor='#CCFFFF'>农产品名称</td>
<!--        <td bgcolor='#CCFFFF'>类别</td>-->
        <td bgcolor='#CCFFFF'>购买数</td>
        <td bgcolor='#CCFFFF'>金额</td>
    </tr>
    <?php
    $sql = "select * from gouwucheTotal ";
    if ($_POST["shangpinmingcheng"] != "") {
        $nreqshangpinmingcheng = $_POST["shangpinmingcheng"];
        $sql = $sql . " and shangpinmingcheng like '%$nreqshangpinmingcheng%'";
    }
    $query = mysql_query($sql);
    $rowscount = mysql_num_rows($query);
    if ($rowscount == 0)
    {
    }
    else
    {
    $pagelarge = 10;//每页行数；
    $pagecurrent = $_GET["pagecurrent"];
    if ($rowscount % $pagelarge == 0) {
        $pagecount = $rowscount / $pagelarge;
    } else {
        $pagecount = intval($rowscount / $pagelarge) + 1;
    }
    if ($pagecurrent == "" || $pagecurrent <= 0) {
        $pagecurrent = 1;
    }

    if ($pagecurrent > $pagecount) {
        $pagecurrent = $pagecount;
    }
    $ddddd = $pagecurrent * $pagelarge;
    if ($pagecurrent == $pagecount) {
        if ($rowscount % $pagelarge == 0) {
            $ddddd = $pagecurrent * $pagelarge;
        } else {
            $ddddd = $pagecurrent * $pagelarge - $pagelarge + $rowscount % $pagelarge;
        }
    }

    for ($i = $pagecurrent * $pagelarge - $pagelarge;
    $i < $ddddd;
    $i++)

    {
    $jinez = $jinez + floatval(mysql_result($query, $i, zongjine));
    $zongshuz= $zongshuz + floatval(mysql_result($query, $i, zongshu));

    ?>
    <tr>
        <td width="25"><?php echo $i + 1; ?></td>
        <td><?php echo mysql_result($query, $i, shangpinmingcheng); ?></td>
        <td><?php echo mysql_result($query, $i, zongshu); ?></td>
        <td><?php echo mysql_result($query, $i, zongjine); ?></td>

        <?php
        }
        }
        ?>
</table>
<p>以上数据共<?php echo $rowscount; ?>条, 销售量:<?php echo $zongshuz ?>，共计金额:<?php echo $jinez ?>；
    <input type="button" name="Submit2" onclick="javascript:window.print();" value="打印本页"
           style='border:solid 1px #000000; color:#666666'/> <input type="button" name="Submit3" onclick="javascript:location.href='xiaoshoutongji.php';" value="导出EXCEL"
                                                                    style='border:solid 1px #000000; color:#666666'/>
</p>
<p align="center"><a href="gouwuche_list1.php?pagecurrent=1">首页</a>, <a
            href="gouwuche_list1.php?pagecurrent=<?php echo $pagecurrent - 1; ?>">前一页</a> ,<a
            href="gouwuche_list1.php?pagecurrent=<?php echo $pagecurrent + 1; ?>">后一页</a>, <a
            href="gouwuche_list1.php?pagecurrent=<?php echo $pagecount; ?>">末页</a>, 当前第<?php echo $pagecurrent; ?>
    页,共<?php echo $pagecount; ?>页 </p>

</body>
</html>

