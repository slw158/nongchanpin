<?php 
include_once 'conn.php';
header("Content-Type: application/vnd.ms-execl");   
header("Content-Disposition: attachment; filename=购物车.xlsx");
header("Pragma: no-cache");   
header("Expires: 0");  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>购物车</title>
</head>

<body>

<p>已有购物车列表：</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">
  <tr>
    <td width="25" bgcolor="#CCFFFF">序号</td>
    <td bgcolor='#CCFFFF'>单号</td>
    <td bgcolor='#CCFFFF'>农产品编号</td>
    <td bgcolor='#CCFFFF'>农产品名称</td>
    <td bgcolor='#CCFFFF'>类别</td>
    <td bgcolor='#CCFFFF'>市场价</td>
    <td bgcolor='#CCFFFF'>会员价</td>
    <td bgcolor='#CCFFFF'>库存</td>
    <td bgcolor='#CCFFFF'>购买数</td>
    <td bgcolor='#CCFFFF'>金额</td>
    <td bgcolor='#CCFFFF'>账号</td>
    <td bgcolor='#CCFFFF'>姓名</td>
    <td bgcolor='#CCFFFF' width='80' align='center'>是否审核</td>

    <td width="120" align="center" bgcolor="#CCFFFF">添加时间</td>
  </tr>
  <?php
    $sql="select * from gouwuche order by id desc";

$query=mysql_query($sql);
  $rowscount=mysql_num_rows($query);


for($i=0;$i<$rowscount;$i++)
{
  ?>
  <tr>
    <td width="25"><?php
	echo $i+1;
?></td>
    <td><?php echo mysql_result($query,$i,danhao);?></td>
    <td><?php echo mysql_result($query,$i,shangpinbianhao);?></td>
    <td><?php echo mysql_result($query,$i,shangpinmingcheng);?></td>
    <td><?php echo mysql_result($query,$i,leibie);?></td>
    <td><?php echo mysql_result($query,$i,shichangjia);?></td>
    <td><?php echo mysql_result($query,$i,huiyuanjia);?></td>
    <td><?php echo mysql_result($query,$i,kucun);?></td>
    <td><?php echo mysql_result($query,$i,goumaishu);?></td>
    <td><?php echo mysql_result($query,$i,jine);?></td>
    <td><?php echo mysql_result($query,$i,zhanghao);?></td>
    <td><?php echo mysql_result($query,$i,xingming);?></td>

    <td align='center'><a href="sh.php?id=<?php echo mysql_result($query,$i,"id") ?>&yuan=<?php echo mysql_result($query,$i,"issh")?>&tablename=gouwuchetotal" onclick="return confirm('您确定要执行此操作？')"><?php echo mysql_result($query,$i,"issh")?></a></td>
    <td width="120" align="center"><?php echo mysql_result($query,$i,"addtime");?></td>

  </tr>
  	<?php
}
?>
</table>


</body>
</html>

