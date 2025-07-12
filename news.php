<?php
session_start();
include_once 'conn.php';
$lb=$_GET["lb"];
if($lb=="")
{
	$lb=$_POST["lb"];
}
$biaoti=$_POST["biaoti"];
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
                  height=42 background=qtimages/sy_bg.jpg class="title"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="8%">&nbsp;</td>
                    <td width="92%" ><font class="title">[<?php echo $lb;?>]</font></td>
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
                      <TD width=100% height="660" vAlign=top bgColor=#f9fdff><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0" class="newsline">
                        <?php 
    $sql="select * from xinwentongzhi where 1=1";
  
if ($biaoti!=""){$sql=$sql." and biaoti like '%$biaoti%'";}
if($lb!=""){$sql=$sql." and leibie='$lb'";}
  $sql=$sql." order by id desc";
  
$query=mysql_query($sql);
  $rowscount=mysql_num_rows($query);
  if($rowscount==0)
  {}
  else
  {
  $pagelarge=20;//每页行数；
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
                        <tr height="25">
                          <td width="3%" align="center" class="newsline"><img src="qtimages/1.jpg"></td>
                          <td width="71%" class="newsline"><a href="gg_detail.php?id=<?php echo mysql_result($query,$i,"id");?>"><?php echo mysql_result($query,$i,"biaoti");?></a></td>
<!--                          <td width="10%" class="newsline">被12点击--><?php //echo mysql_result($query,$i,"dianjilv");?><!--次</td>-->
                          <td width="16%" class="newsline"><?php echo mysql_result($query,$i,"addtime");?></td>
                        </tr>
                        <?php
						}
					  }
					  ?>
                      </table>
                        <p align="center"><a href="news.php?pagecurrent=1&lb=<?php echo $lb;?>">首页</a>, <a href="news.php?pagecurrent=<?php echo $pagecurrent-1;?>&lb=<?php echo $lb;?>">前一页</a> ,<a href="news.php?pagecurrent=<?php echo $pagecurrent+1;?>&lb=<?php echo $lb;?>">后一页</a>, <a href="news.php?pagecurrent=<?php echo $pagecount;?>&lb=<?php echo $lb;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 以上数据共
                          <?php
		echo $rowscount;
	?>
                          条,
  <input type="button" name="Submit22" onClick="javascript:window.print();" value="打印本页" style=" height:19px; border:solid 1px #000000; color:#666666" />
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