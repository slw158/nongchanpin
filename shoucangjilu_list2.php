<?php
session_start();
include_once 'conn.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
    <title>我的收藏</title>
    <link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>

<p>我的收藏：</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF"
       style="border-collapse:collapse">
    <tr>
        <td width="25" bgcolor="#CCFFFF">序号</td>
        <td width="790" bgcolor='#CCFFFF'>标题</td>
        <td width="135" align="center" bgcolor="#CCFFFF">收藏时间</td>
        <td width="75" align="center" bgcolor="#CCFFFF">操作</td>
    </tr>
    <?php
    $sql = "select * from shoucangjilu where username='" . $_SESSION['username'] . "'";

    $sql = $sql . " order by id desc";

    $query = mysql_query($sql);
    $rowscount = mysql_num_rows($query);
    if ($rowscount == 0) {
    } else {
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

        for ($i = $pagecurrent * $pagelarge - $pagelarge; $i < $ddddd; $i++) {
            $goumaishuliangz = $goumaishuliangz + floatval(mysql_result($query, $i, goumaishuliang));

            ?>
            <tr>
                <td width="25"><?php echo $i + 1; ?></td>
                <td><?php readzd(mysql_result($query, $i, "biao"), mysql_result($query, $i, "ziduan"), "id", mysql_result($query, $i, "xwid")); ?></td>
                <td width="135" align="center"><?php echo mysql_result($query, $i, "addtime"); ?></td>
                <td width="75" align="center"><a
                            href="del.php?id=<?php echo mysql_result($query, $i, "id"); ?>&tablename=shoucangjilu"
                            onclick="return confirm('真的要删除？')">删除</a> <a
                            href="<?php echo mysql_result($query, $i, "biao"); ?>detail.php?id=<?php echo mysql_result($query, $i, "xwid"); ?>"
                            target="_blank">详细</a></td>
            </tr>
            <?php
        }
    }
    ?>
</table>
<p>以上数据共<?php
    echo $rowscount;
    ?>条,
    <input type="button" name="Submit2" onclick="javascript:window.print();" value="打印本页"
           style='border:solid 1px #000000; color:#666666'/>
</p>
<p align="center"><a href="shoucangjilu_list2.php?pagecurrent=1">首页</a>, <a
            href="shoucangjilu_list2.php?pagecurrent=<?php echo $pagecurrent - 1; ?>">前一页</a> ,<a
            href="shoucangjilu_list2.php?pagecurrent=<?php echo $pagecurrent + 1; ?>">后一页</a>, <a
            href="shoucangjilu_list2.php?pagecurrent=<?php echo $pagecount; ?>">末页</a>,
    当前第<?php echo $pagecurrent; ?>页,共<?php echo $pagecount; ?>页 </p>

<p>&nbsp; </p>

</body>
</html>

