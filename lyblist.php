<?php
session_start();
include_once 'conn.php';
?>
<html>
<head>
<title>农产品网上销售系统</title>
<LINK href="qtimages/style.css" type=text/css rel=stylesheet>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<body>
<TABLE cellSpacing=0 cellPadding=0 width=1002 align=center border=0>
  <TBODY>
  <TR>
    <TD>
      
<?php include_once 'qttop.php';?></TD></TR>
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
                  height=42 background=qtimages/sy_bg.jpg class="title"><table width="100%" height="26" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="20%" align="center" valign="bottom"><span class="STYLE4">在线留言</span></td>
                    <td width="68%">&nbsp;</td>
                    <td width="12%" valign="bottom"><a href="lyb.php"><span class="STYLE4">我要留言</span></a></td>
                  </tr>
                </table></TD>
              </TR>
              <TR>
                <TD vAlign=top bgColor=#edf7f9 height=74>
                  <TABLE cellSpacing=0 cellPadding=0 width=787 border=0>
                    <TBODY>
                    <TR>
                      <TD width=8 height="246" align=right><IMG height=660 
                        src="qtimages/sy_line.jpg" width=8></TD>
                      <TD width=100% height="660" vAlign=top bgColor=#f9fdff><table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#ADCEEF" style="border-collapse:collapse">
                        <?php
					$sql="select * from liuyanban where 1=1";
					$sql=$sql." order by id desc";
  					$query=mysql_query($sql);
	 				 $rowscount=mysql_num_rows($query);
					 if($rowscount==0)
  {}
  else
  {
  $pagelarge=5;//每页行数；
  $pagecurrent=$_GET["pagecurrent"];
  if($rowscount%$pagelarge==0)
  {
		$pagecount=$rowscount/$pagelarge;
  }
  else
  {
   		$pagecount=intval($rowscount/$pagelarge)+1;
  }
  if($pagecurrent=="" || $pagecurrent<=0)
{
	$pagecurrent=1;
}
 
if($pagecurrent>$pagecount)
{
	$pagecurrent=$pagecount;
}
		$ddddd=$pagecurrent*$pagelarge;
	if($pagecurrent==$pagecount)
	{
		if($rowscount%$pagelarge==0)
		{
		$ddddd=$pagecurrent*$pagelarge;
		}
		else
		{
		$ddddd=$pagecurrent*$pagelarge-$pagelarge+$rowscount%$pagelarge;
		}
	}

	for($i=$pagecurrent*$pagelarge-$pagelarge;$i<$ddddd;$i++)
{
					 ?>
                        <tr>
                          <td width="11" rowspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                          <td width="85" rowspan="3" align="center" valign="middle"><img width='70'height='70' src=<?php echo mysql_result($query,$i,"zhaopian");?> border=0> </td>
                          <td height="20" colspan="2" align="left" valign="middle">&nbsp; &nbsp; 留言于:<?php echo mysql_result($query,$i,"addtime");?> &nbsp;</td>
                          <td width="12" rowspan="3" valign="top" style="width: 10px"><!--DWLayoutEmptyCell-->&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="78" align="left" valign="top">&nbsp;<?php echo mysql_result($query,$i,"liuyan");?></td>
                          <td align="left" valign="top"><p>回复：</p>
                              <p><?php echo mysql_result($query,$i,"huifu");?></p></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="left" valign="middle" style="height: 25px">&nbsp; &nbsp;账号：<?php echo mysql_result($query,$i,"zhanghao");?> &nbsp; &nbsp;姓名：<?php echo mysql_result($query,$i,"xingming");?>&nbsp;&nbsp;</td>
                        </tr>
                        <?php
						  }
  	}
  ?>
                      </table>
                        <p align="center"><a href="lyblist.php?pagecurrent=1">首页</a>, <a href="lyblist.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="lyblist.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="lyblist.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 以上数据共
                          <?php
		echo $rowscount;
	?>
                          条,
  <input type="button" name="Submit2" onClick="javascript:window.print();" value="打印本页" style=" height:19px; border:solid 1px #000000; color:#666666" />
                        </p></TD>
                    </TR></TBODY></TABLE></TD></TR>
              <TR>
                <TD bgColor=#f9fdff height=5></TD></TR>
              <TR>
                <TD>&nbsp;</TD>
              </TR>
              
              <TR>
                <TD>
                  <?php include_once 'qtdown.php';?></TD></TR></TBODY></TABLE></TD>
          <TD vAlign=top width=216 
            background=qtimages/rightbg.jpg><?php include_once 'qtleft.php';?>
</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
</body>
</html>