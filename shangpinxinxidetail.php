<?php
session_start();
include_once 'conn.php';

$id = $_GET["id"];
?>
<html>
<head>
    <title>农产品信息</title>
    <LINK href="qtimages/style.css" type=text/css rel=stylesheet>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<script language="javascript">
    function OpenScript(url, width, height) {
        var win = window.open(url, "SelectToSort", 'width=' + width + ',height=' + height + ',resizable=1,scrollbars=yes,menubar=no,status=yes');
    }

    function OpenDialog(sURL, iWidth, iHeight) {
        var oDialog = window.open(sURL, "_EditorDialog", "width=" + iWidth.toString() + ",height=" + iHeight.toString() + ",resizable=no,left=0,top=0,scrollbars=no,status=no,titlebar=no,toolbar=no,menubar=no,location=no");
        oDialog.focus();
    }
</script>
<body>
<!--商品详情页-->
<TABLE cellSpacing=0 cellPadding=0 width=1002 align=center border=0>
    <TBODY>
    <TR>
        <TD>

            <?php include_once 'qttop.php'; ?></TD>
    </TR>
    <TR>
        <TD>
            <TABLE cellSpacing=0 cellPadding=0 width=1002 border=0>
                <TBODY>
                <TR>
                    <TD vAlign=top width=786>
                        <TABLE cellSpacing=0 cellPadding=0 width=787 bgColor=#f9fdff
                               border=0>
                            <TBODY>
                            <TR>
                                <TD
                                        height=42 background=qtimages/sy_bg.jpg class="title">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td width="8%">&nbsp;</td>
                                            <td width="92%"><font class="title">[农产品信息]</font></td>
                                        </tr>
                                    </table>
                                </TD>
                            </TR>
                            <TR>
                                <TD vAlign=top bgColor=#edf7f9 height=74>
                                    <TABLE cellSpacing=0 cellPadding=0 width=787 border=0>
                                        <TBODY>
                                        <TR>
                                            <TD width=8 height="246" align=right><IMG height=660
                                                                                      src="qtimages/sy_line.jpg"
                                                                                      width=8></TD>
                                            <TD width=100% height="660" vAlign=top bgColor=#f9fdff>
                                                <?php
                                                $sql = "select * from shangpinxinxi where id=" . $id;
                                                $query = mysql_query($sql);
                                                $rowscount = mysql_num_rows($query);
//                                                echo $rowscount;
                                                if ($rowscount > 0) {
                                                    ?>
                                                    <table width="98%" border="0" align="center" cellpadding="3"
                                                           cellspacing="1" bordercolor="#00FFFF"
                                                           style="border-collapse:collapse" class="newsline">
                                                        <tr>
                                                            <td width='11%' height=44>农产品编号：</td>
                                                            <td width='39%'><?php echo mysql_result($query, 0, shangpinbianhao); ?></td>
                                                            <td rowspan=7 align=center><a
                                                                        href=<?php echo mysql_result($query, 0, tupian); ?> target=_blank><img
                                                                            src=<?php echo mysql_result($query, 0, tupian); ?> width=228
                                                                            height=215 border=0></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td width='11%' height=44>农产品名称：</td>
                                                            <td width='39%'><?php echo mysql_result($query, 0, shangpinmingcheng); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width='11%' height=44>类别：</td>
                                                            <td width='39%'><?php echo mysql_result($query, 0, leibie); ?></td>
                                                        </tr>
                                                        <tr>

                                                            <td width='11%' height=44>市场价：</td>
                                                            <td width='39%'><?php echo mysql_result($query, 0, shichangjia); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width='11%' height=44>会员价：</td>
                                                            <td width='39%'><?php echo mysql_result($query, 0, huiyuanjia); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width='11%' height=44>库存：</td>
                                                            <td width='39%'><?php echo mysql_result($query, 0, kucun); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width='11%' height=44>销售量：</td>
                                                            <td width='39%'><?php echo mysql_result($query, 0, xiaoshouliang); ?></td>
                                                        </tr>
                                                        <tr>

                                                            <td width='11%' height=100>农产品简介：</td>
                                                            <td width='39%' colspan=2
                                                                height=100><?php echo mysql_result($query, 0, jianjie); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan=3 align=center>
                                                                <table width="100%" border="1" align="center"
                                                                       cellpadding="3" cellspacing="1"
                                                                       bordercolor="#00FFFF"
                                                                       style="border-collapse:collapse">
                                                                    <tr>
                                                                        <td width="50" bgcolor="#D8E8F8">序号</td>
                                                                        <td width="323" align="left" bgcolor='#D8E8F8'>
                                                                            评论内容
                                                                        </td>
                                                                        <td width="98" align="left" bgcolor='#D8E8F8'>
                                                                            评论人
                                                                        </td>
                                                                        <td width="106" align="center"
                                                                            bgcolor="#D8E8F8">评分
                                                                        </td>
                                                                        <td width="106" align="center"
                                                                            bgcolor="#D8E8F8">评论时间
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    $sql = "select * from pinglun where wenzhangID='$id' and biao='shangpinxinxi' order by id desc";
                                                                    $query = mysql_query($sql);
                                                                    $rowscount = mysql_num_rows($query);
                                                                    if ($rowscount == 0) {
                                                                    } else {
                                                                        for ($i = 0; $i < $rowscount; $i++) {
                                                                            ?>
                                                                            <tr>
                                                                                <td width="50"><?php echo $i + 1; ?></td>
                                                                                <td align="left"><?php echo mysql_result($query, $i, pinglunneirong); ?></td>
                                                                                <td align="left"><?php echo mysql_result($query, $i, pinglunren); ?></td>
                                                                                <td width="106"
                                                                                    align="center"><?php echo mysql_result($query, $i, "pingfen"); ?></td>
                                                                                <td width="106"
                                                                                    align="center"><?php echo mysql_result($query, $i, "addtime"); ?></td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan=3 align=center><input type=button name=Submit5
                                                                                              value=返回
                                                                                              onClick="javascript:history.back()"
                                                                                              style='border:solid 1px #000000; color:#666666; width:50px;'/><input
                                                                        type=button name=Submit53 value=评论
                                                                        onClick="javascript:OpenScript('hsgpinglun.php?biao=shangpinxinxi&id=<?php echo $id; ?>',500,200)"
                                                                        style='border:solid 1px #000000; color:#666666; width:50px;'/><input
                                                                        type=button name=Submit52 value=收藏
                                                                        onClick="javascript:location.href='jrsc.php?id=<?php echo $id; ?>&biao=shangpinxinxi&ziduan=shangpinmingcheng';"
                                                                        style='border:solid 1px #000000; color:#666666; width:50px;'/>

                                                                <input type=button name=Submit522 value=加入购物车
                                                                       onClick="javascript:location.href='gouwucheadd.php?id=<?php echo $id; ?>';"
                                                                       size='80'
                                                                       style='border:solid 1px #000000; color:#666666; width:80px;'/>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <?php
                                                }
                                                ?>
                                            </TD>
                                        </TR>
                                        </TBODY>
                                    </TABLE>
                                </TD>
                            </TR>
                            <TR>
                                <TD bgColor=#f9fdff height=5></TD>
                            </TR>
                            <TR>
                                <TD>&nbsp;</TD>
                            </TR>

                            <TR>
                                <TD>
                                    <?php include_once 'qtdown.php'; ?></TD>
                            </TR>
                            </TBODY>
                        </TABLE>
                    </TD>
                    <TD vAlign=top width=216
                        background=qtimages/rightbg.jpg><?php include_once 'qtleft.php'; ?>
                    </TD>
                </TR>
                </TBODY>
            </TABLE>
        </TD>
    </TR>
    </TBODY>
</TABLE>

</body>
</html>
