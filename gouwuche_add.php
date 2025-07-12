<?php
session_start();
include_once 'conn.php';
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
    
	
	$jinej=$shichangjia*$goumaishu;
	
	
	$sql="insert into gouwuche(danhao,shangpinbianhao,shangpinmingcheng,leibie,shichangjia,huiyuanjia,kucun,goumaishu,jine,zhanghao,xingming,shuoming) values('$danhao','$shangpinbianhao','$shangpinmingcheng','$leibie','$shichangjia','$huiyuanjia','$kucun','$goumaishu','$jinej','$zhanghao','$xingming','$shuoming') ";
	mysql_query($sql);
	
	echo "<script>javascript:alert('添加成功!');history.back();</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>购物车</title>

<script type="text/javascript" src="js/My97DatePicker/WdatePicker.js" charset="gb2312"></script>
<link rel="stylesheet" href="css.css" type="text/css">
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
</script>
<body>
<p>添加购物车： 当前日期： <?php echo $ndate; ?></p>
<script language="javascript">
	function check()
{
	if(document.form1.goumaishu.value==""){alert("请输入购买数");document.form1.goumaishu.focus();return false;}
    if((/^(\+|-)?(0|[1-9]\d*)(\.\d*[1-9])?$/.test(document.form1.goumaishu.value))){}else{alert("购买数必需数字型");document.form1.goumaishu.focus();return false;}
    if(parseFloat(document.form1.kucun.value)<parseFloat(document.form1.goumaishu.value)){alert("对不起，库存必需大于购买数");return false;}
	
}
	function gow()
	{
		location.href='gouwuche_add.php?jihuabifffanhao='+document.form1.jihuabifffanhao.value+"&id=<?php echo $_GET["id"]?>";
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

 <?php
 $sql="select * from shangpinxinxi where id=".$_GET["id"];
 $query=mysql_query($sql);
 $rowscount=mysql_num_rows($query);
 if($rowscount>0)
 {
 	$shangpinbianhao=mysql_result($query,0,shangpinbianhao);
 	$shangpinmingcheng=mysql_result($query,0,shangpinmingcheng);
 	$leibie=mysql_result($query,0,leibie);
 	$shichangjia=mysql_result($query,0,shichangjia);
 	$huiyuanjia=mysql_result($query,0,huiyuanjia);
 	$kucun=mysql_result($query,0,kucun);
 	
 }
?>
<?php
 $sql="select * from yonghuzhuce where zhanghao='".$_SESSION["username"]."'";
 $query=mysql_query($sql);
 $rowscount=mysql_num_rows($query);
 if($rowscount>0)
 {
 	$xingming=mysql_result($query,0,xingming);
 	
 }
?>
<form id="form1" name="form1" method="post" action="?id=<?php echo $_GET["id"]?>">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">    
	<tr><td>单号：</td><td><input name='danhao' type='text' id='danhao' value='<?php echo makefilename2()?>' style='border:solid 1px #000000; color:#666666' /></td></tr>
    <tr><td>农产品编号：</td><td><input name='shangpinbianhao' type='text' id='shangpinbianhao' value='' style='border:solid 1px #000000; color:#666666' /></td></tr><script language="javascript">document.form1.shangpinbianhao.value='<?php echo $shangpinbianhao?>';document.form1.shangpinbianhao.setAttribute("readOnly",'true');</script>
    <tr><td>农产品名称：</td><td><input name='shangpinmingcheng' type='text' id='shangpinmingcheng' value='' style='border:solid 1px #000000; color:#666666' /></td></tr><script language="javascript">document.form1.shangpinmingcheng.value='<?php echo $shangpinmingcheng?>';document.form1.shangpinmingcheng.setAttribute("readOnly",'true');</script>
    <tr><td>类别：</td><td><input name='leibie' type='text' id='leibie' value='' style='border:solid 1px #000000; color:#666666' /></td></tr><script language="javascript">document.form1.leibie.value='<?php echo $leibie?>';document.form1.leibie.setAttribute("readOnly",'true');</script>
    <tr><td>市场价：</td><td><input name='shichangjia' type='text' id='shichangjia' value='' style='border:solid 1px #000000; color:#666666' /></td></tr><script language="javascript">document.form1.shichangjia.value='<?php echo $shichangjia?>';document.form1.shichangjia.setAttribute("readOnly",'true');</script>
    <tr><td>会员价：</td><td><input name='huiyuanjia' type='text' id='huiyuanjia' value='' style='border:solid 1px #000000; color:#666666' /></td></tr><script language="javascript">document.form1.huiyuanjia.value='<?php echo $huiyuanjia?>';document.form1.huiyuanjia.setAttribute("readOnly",'true');</script>
    <tr><td>库存：</td><td><input name='kucun' type='text' id='kucun' value='' style='border:solid 1px #000000; color:#666666' /></td></tr><script language="javascript">document.form1.kucun.value='<?php echo $kucun?>';document.form1.kucun.setAttribute("readOnly",'true');</script>
    <tr><td>购买数：</td><td><input name='goumaishu' type='text' id='goumaishu' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*&nbsp;必需数字型</td></tr>
    <tr><td>金额：</td><td><input name='jine' type='text' id='jine' value='' style='border:solid 1px #000000; color:#666666; background-color:#CCCCCC' />&nbsp;此项不必填写，系统自动计算</td></tr>
    <tr><td>账号：</td><td><input name='zhanghao' type='text' id='zhanghao' value='<?php echo $_SESSION['username'];?>' style='border:solid 1px #000000; color:#666666' readonly='readonly' /></td></tr>
    <tr><td>姓名：</td><td><input name='xingming' type='text' id='xingming' value='' style='border:solid 1px #000000; color:#666666' /></td></tr><script language="javascript">document.form1.xingming.value='<?php echo $xingming?>';document.form1.xingming.setAttribute("readOnly",'true');</script>
    <tr><td>说明：</td><td><textarea name='shuoming' cols='50' rows='8' id='shuoming' style='border:solid 1px #000000; color:#666666'></textarea></td></tr>
    

    <tr>
      <td>&nbsp;</td>
      <td><input type="hidden" name="addnew" value="1" />
        <input type="submit" name="Submit" value="添加" onclick="return check();"  style='border:solid 1px #000000; color:#666666' />
      <input type="reset" name="Submit2" value="重置" style='border:solid 1px #000000; color:#666666' /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>

</body>
</html>

