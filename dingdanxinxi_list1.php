<?php 
session_start();
include_once 'conn.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>订单信息</title>
<script type="text/javascript" src="js/My97DatePicker/WdatePicker.js" charset="gb2312"></script>
<link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>
<!--订单信息发货页面-->
<p>已有订单信息列表：</p>
<form id="form1" name="form1" method="post" action="">
  搜索: 订单号：<input name="dingdanhao" type="text" id="dingdanhao" style='border:solid 1px #000000; color:#666666;width:80px' /> 订单金额：<input name="dingdanjine" type="text" id="dingdanjine" style='border:solid 1px #000000; color:#666666;width:80px' /> 账号：<input name="zhanghao" type="text" id="zhanghao" style='border:solid 1px #000000; color:#666666;width:80px' /> 排序
  <select name="paixu" id="paixu">
    <option value="addtime">添加时间</option>
    
  </select>
  <select name="px" id="px">
    <option value="desc">降序</option>
    <option value="asc">升序</option>
  </select>
  <input type="submit" name="Submit" value="查找" style='border:solid 1px #000000; color:#666666' />
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">  
  <tr>
    <td width="25" bgcolor="#CCFFFF">序号</td>
    <td bgcolor='#CCFFFF'>订单号</td>
    <td bgcolor='#CCFFFF'>订单金额</td>
    <td bgcolor='#CCFFFF'>账号</td>
    <td bgcolor='#CCFFFF'>姓名</td>
    <td bgcolor='#CCFFFF'>手机</td>
    <td bgcolor='#CCFFFF'>地址</td>
    <td bgcolor='#CCFFFF'>发货物流</td>
    <td bgcolor='#CCFFFF'>单号</td>
    <td bgcolor='#CCFFFF'>配送员</td>
    <td bgcolor='#CCFFFF' width='80' align='center'>是否支付</td>
    <td bgcolor='#CCFFFF' width='80' align='center'>是否确认</td>
    
	
    <td width="120" align="center" bgcolor="#CCFFFF">添加时间</td>
    <td width="120" align="center" bgcolor="#CCFFFF">操作</td>
  </tr>
  <?php 
    $sql="select * from dingdanxinxi where 1=1";
  
if ($_POST["dingdanhao"]!=""){$nreqdingdanhao=$_POST["dingdanhao"];$sql=$sql." and dingdanhao like '%$nreqdingdanhao%'";}
if ($_POST["dingdanjine"]!=""){$nreqdingdanjine=$_POST["dingdanjine"];$sql=$sql." and dingdanjine like '%$nreqdingdanjine%'";}
if ($_POST["zhanghao"]!=""){$nreqzhanghao=$_POST["zhanghao"];$sql=$sql." and zhanghao like '%$nreqzhanghao%'";}
  if($_POST["paixu"]!="")
  {
  	$sql=$sql." order by ".$_POST["paixu"]." ".$_POST["px"]."";
  }
  else
  {
  	$sql=$sql." order by id desc";
  }
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
    <td><?php echo mysql_result($query,$i,dingdanhao);?></td>
    <td><?php echo mysql_result($query,$i,dingdanjine);?></td>
    
    <td><?php echo mysql_result($query,$i,zhanghao);?></td>
    <td><?php echo mysql_result($query,$i,xingming);?></td>
    <td><?php echo mysql_result($query,$i,shouji);?></td>
    <td><?php echo mysql_result($query,$i,dizhi);?></td>
    <td><?php echo mysql_result($query,$i,fahuowuliu);?></td>
    <td><?php echo mysql_result($query,$i,danhao);?></td>
    <td><?php echo mysql_result($query,$i,peisongyuan);?></td>
    <td align='center'><?php echo mysql_result($query,$i,iszf);?></td>
     <td align='center'><?php echo mysql_result($query,$i,"issh")?></td>
	
    <td width="120" align="center"><?php echo mysql_result($query,$i,"addtime");?></td>
    <td width="120" align="center"><?php if(mysql_result($query,$i,issh)=="否"){?><a href="dingdanxinxi_updtlb.php?id=<?php echo mysql_result($query,$i,"id");?>">发货</a><?php } ?>
	 <a href="dingdanxinxi_detail.php?id=<?php echo mysql_result($query,$i,"id");?>">详细</a></td>
  </tr>
  	<?php
	}
}
?>
</table>
<p>以上数据共<?php echo $rowscount;?>条, 
  <input type="button" name="Submit2" onclick="javascript:window.print();" value="打印本页" style='border:solid 1px #000000; color:#666666' /> <input type="button" name="Submit3" onclick="javascript:location.href='dingdanxinxi_listxls.php';" value="导出EXCEL" style='border:solid 1px #000000; color:#666666' />
</p>
<p align="center"><a href="dingdanxinxi_list1.php?pagecurrent=1">首页</a>, <a href="dingdanxinxi_list1.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="dingdanxinxi_list1.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="dingdanxinxi_list1.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 </p>

</body>
</html>

