<?php
session_start();
include_once 'conn.php';

?>
<html>
<head>
<title>订单信息</title>
<LINK href="qtimages/style.css" type=text/css rel=stylesheet>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<script type="text/javascript" src="js/My97DatePicker/WdatePicker.js" charset="gb2312"></script>
<!--hxsglxiangdxongjxs-->
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
                    <td width="92%" ><font class="title">[订单信息]</font></td>
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
                      <TD width=100% height="660" vAlign=top bgColor=#f9fdff>

					 <form id="form1" name="form1" method="post" action="">
  搜索: 订单号：<input name="dingdanhao" type="text" id="dingdanhao" style='border:solid 1px #000000; color:#666666;width:80px' /> 订单金额：<input name="dingdanjine" type="text" id="dingdanjine" style='border:solid 1px #000000; color:#666666;width:80px' /> 账号：<input name="zhanghao" type="text" id="zhanghao" style='border:solid 1px #000000; color:#666666;width:80px' />
  <input type="submit" name="Submit" value="查找" style='border:solid 1px #000000; color:#666666' />&nbsp;<input type="button" name="Submit3" value="切换视图" style='border:solid 1px #000000; color:#666666' onClick="location.href='dingdanxinxilisttp.php';" />
</form>
<table width="98%" border="0"  align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse" class="newsline">  
  <tr>
    <td width="25" bgcolor="#CCFFFF">序号</td>
    <td bgcolor='#CCFFFF'>订单号</td><td bgcolor='#CCFFFF'>订单金额</td><td bgcolor='#CCFFFF'>账号</td><td bgcolor='#CCFFFF'>姓名</td><td bgcolor='#CCFFFF'>手机</td><td bgcolor='#CCFFFF'>地址</td><td bgcolor='#CCFFFF'>发货物流</td><td bgcolor='#CCFFFF'>单号</td><td bgcolor='#CCFFFF'>配送员</td>
    
    <td width="30" align="center" bgcolor="#CCFFFF">操作</td>
  </tr>
  <?php 
    $sql="select * from dingdanxinxi where issh='是'";
  
if ($_POST["dingdanhao"]!=""){$nreqdingdanhao=$_POST["dingdanhao"];$sql=$sql." and dingdanhao like '%$nreqdingdanhao%'";}
if ($_POST["dingdanjine"]!=""){$nreqdingdanjine=$_POST["dingdanjine"];$sql=$sql." and dingdanjine like '%$nreqdingdanjine%'";}
if ($_POST["zhanghao"]!=""){$nreqzhanghao=$_POST["zhanghao"];$sql=$sql." and zhanghao like '%$nreqzhanghao%'";}
  $sql=$sql." order by id desc";
  
$query=mysql_query($sql);
  $rowscount=mysql_num_rows($query);
  if($rowscount==0)
  {}
  else
  {
  $pagelarge=10;//每页行数；
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
    <td width="25"><?php echo $i+1;?></td>
    <td><?php echo mysql_result($query,$i,dingdanhao);?></td><td><?php echo mysql_result($query,$i,dingdanjine);?></td><td><?php echo mysql_result($query,$i,zhanghao);?></td><td><?php echo mysql_result($query,$i,xingming);?></td><td><?php echo mysql_result($query,$i,shouji);?></td><td><?php echo mysql_result($query,$i,dizhi);?></td><td><?php echo mysql_result($query,$i,fahuowuliu);?></td><td><?php echo mysql_result($query,$i,danhao);?></td><td><?php echo mysql_result($query,$i,peisongyuan);?></td>
    
    <td width="30" align="center"><a href="dingdanxinxidetail.php?id=<?php echo mysql_result($query,$i,"id");?>">详细</a></td>
  </tr>
  	<?php
	}
}
?>
</table>
<p>以上数据共<?php echo $rowscount;?>条,
  <input type="button" name="Submit2" onclick="javascript:window.print();" value="打印本页" style='border:solid 1px #000000; color:#666666' />
</p>
<p align="center"><a href="dingdanxinxilist.php?pagecurrent=1">首页</a>, <a href="dingdanxinxilist.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="dingdanxinxilist.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="dingdanxinxilist.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 </p>

					
					
					
					
					
                     </TD>
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
<!-- dfexnxxiaxng -->
</body>
</html>
