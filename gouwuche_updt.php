<?php 
session_start();
include_once 'conn.php';
$id=$_GET["id"];
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
	$danhao=$_POST["danhao"];
    $shangpinbianhao=$_POST["shangpinbianhao"];
    $shangpinmingcheng=$_POST["shangpinmingcheng"];
    $leibie=$_POST["leibie"];
    $shichangjia=$_POST["shichangjia"];
    $huiyuanjia=$_POST["huiyuanjia"];
    $kucun=$_POST["kucun"];
    $goumaishu=$_POST["goumaishu"];
    $jine=$_POST["jine"];
    $zhanghao=$_POST["zhanghao"];
    $xingming=$_POST["xingming"];
    $shuoming=$_POST["shuoming"];
    
	//lixandonxgjixelxb
	$sql="update gouwuche set danhao='$danhao',shangpinbianhao='$shangpinbianhao',shangpinmingcheng='$shangpinmingcheng',leibie='$leibie',shichangjia='$shichangjia',huiyuanjia='$huiyuanjia',kucun='$kucun',goumaishu='$goumaishu',jine='$jine',zhanghao='$zhanghao',xingming='$xingming',shuoming='$shuoming' where id= ".$id;
	mysql_query($sql);
	echo "<script>javascript:alert('修改成功!');</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>修改购物车</title>

<link rel="stylesheet" href="css.css" type="text/css">
<script type="text/javascript" src="js/My97DatePicker/WdatePicker.js" charset="gb2312"></script>
</head>
<script language="javascript">
	
	
	function OpenScript(url,width,height)
{
  var win = window.open(url,"SelectToSort",'width=' + width + ',height=' + height + ',resizable=1,scrollbars=yes,menubar=no,status=yes' );
}
	function OpenDialog(sURL, iWidth, iHeight)
{
   var oDialog = window.open(sURL, "_EditorDialog", "width=" + iWidth.toString() + ",height=" + iHeight.toString() + ",resizable=no,left=0,top=0,scrollbars=no,status=no,titlebar=no,toolbar=no,menubar=no,location=no");
   oDialog.focus();
}
	function hsgxia2shxurxu(nstr,nwbk)
{
	if (eval("form1."+nwbk).value.indexOf(nstr)>=0)
	{
		eval("form1."+nwbk).value=eval("form1."+nwbk).value.replace(nstr+"；", "");
	}
	else
	{
		eval("form1."+nwbk).value=eval("form1."+nwbk).value+nstr+"；";
	}
}
</script>
<!--hxsglxiangdxongjxs-->
<body>
<p>修改购物车： 当前日期： <?php echo $ndate; ?></p>
<?php
$sql="select * from gouwuche where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($rowscount>0)
{
//lixanxdoxngcxhaxifxen
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse"> 

      <tr><td>单号：</td><td><input name='danhao' type='text' id='danhao' value='<?php echo mysql_result($query,0,danhao);?>' /></td></tr>
      <tr><td>农产品编号：</td><td><input name='shangpinbianhao' type='text' id='shangpinbianhao' value='<?php echo mysql_result($query,0,shangpinbianhao);?>' /></td></tr>
      <tr><td>农产品名称：</td><td><input name='shangpinmingcheng' type='text' id='shangpinmingcheng' value='<?php echo mysql_result($query,0,shangpinmingcheng);?>' /></td></tr>
      <tr><td>类别：</td><td><input name='leibie' type='text' id='leibie' value='<?php echo mysql_result($query,0,leibie);?>' /></td></tr>
      <tr><td>市场价：</td><td><input name='shichangjia' type='text' id='shichangjia' value='<?php echo mysql_result($query,0,shichangjia);?>' /></td></tr>
      <tr><td>会员价：</td><td><input name='huiyuanjia' type='text' id='huiyuanjia' value='<?php echo mysql_result($query,0,huiyuanjia);?>' /></td></tr>
      <tr><td>库存：</td><td><input name='kucun' type='text' id='kucun' value='<?php echo mysql_result($query,0,kucun);?>' /></td></tr>
      <tr><td>购买数：</td><td><input name='goumaishu' type='text' id='goumaishu' value='<?php echo mysql_result($query,0,goumaishu);?>' /></td></tr>
      <tr><td>金额：</td><td><input name='jine' type='text' id='jine' value='<?php echo mysql_result($query,0,jine);?>' /></td></tr>
      <tr><td>账号：</td><td><input name='zhanghao' type='text' id='zhanghao' value='<?php echo mysql_result($query,0,zhanghao);?>' /></td></tr>
      <tr><td>姓名：</td><td><input name='xingming' type='text' id='xingming' value='<?php echo mysql_result($query,0,xingming);?>' /></td></tr>
      <tr><td>说明：</td><td><textarea name='shuoming' cols='50' rows='8' id='shuoming'><?php echo mysql_result($query,0,shuoming);?></textarea></td></tr>
      
   
   
    <tr>
      <td>&nbsp;</td>
      <td><input name="addnew" type="hidden" id="addnew" value="1" />
      <input type="submit" name="Submit" value="修改" style='border:solid 1px #000000; color:#666666' />
      <input type="reset" name="Submit2" value="重置" style='border:solid 1px #000000; color:#666666' /></td>
    </tr>
  </table>
</form>
<?php
	}
?>
<p>&nbsp;</p>
</body>
</html>

