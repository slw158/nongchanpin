<?php
session_start();
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
	$shangpinbianhao=$_POST["shangpinbianhao"];
    $shangpinmingcheng=$_POST["shangpinmingcheng"];
    $leibie=$_POST["leibie"];
    $tupian=$_POST["tupian"];
    $shichangjia=$_POST["shichangjia"];
    $huiyuanjia=$_POST["huiyuanjia"];
    $kucun=$_POST["kucun"];
    $xiaoshouliang=$_POST["xiaoshouliang"];
    $jianjie=$_POST["jianjie"];
    

	$sql="insert into shangpinxinxi(shangpinbianhao,shangpinmingcheng,leibie,tupian,shichangjia,huiyuanjia,kucun,xiaoshouliang,jianjie) values('$shangpinbianhao','$shangpinmingcheng','$leibie','$tupian','$shichangjia','$huiyuanjia','$kucun','$xiaoshouliang','$jianjie') ";
	mysql_query($sql);
	
	echo "<script>javascript:alert('添加成功!');history.back();</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>商品信息</title>

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
<p>添加农产品信息： 当前日期： <?php echo $ndate; ?></p>
<script language="javascript">
	function check()
{
	if(document.form1.shangpinmingcheng.value==""){alert("请输入农产品名称");document.form1.shangpinmingcheng.focus();return false;}
    if(document.form1.leibie.value==""){alert("请输入类别");document.form1.leibie.focus();return false;}
    if(document.form1.shichangjia.value==""){alert("请输入市场价");document.form1.shichangjia.focus();return false;}
    if(document.form1.shichangjia.value<=0){alert("市场价须大于0");document.form1.shichangjia.focus();return false;}
    if((/^(\+|-)?(0|[1-9]\d*)(\.\d*[1-9])?$/.test(document.form1.shichangjia.value))){}else{alert("市场价必须数字型");document.form1.shichangjia.focus();return false;}
    if(document.form1.huiyuanjia.value==""){alert("请输入会员价");document.form1.huiyuanjia.focus();return false;}
    if(document.form1.huiyuanjia.value<0){alert("会员价须大于0");document.form1.huiyuanjia.focus();return false;}
    if((/^(\+|-)?(0|[1-9]\d*)(\.\d*[1-9])?$/.test(document.form1.huiyuanjia.value))){}else{alert("会员价必须数字型");document.form1.huiyuanjia.focus();return false;}
    if(document.form1.kucun.value==""){alert("请输入库存");document.form1.kucun.focus();return false;}
    if(document.form1.kucun.value<0){alert("库存数须大于0");document.form1.kucun.focus();return false;}
    if((/^(\+|-)?(0|[1-9]\d*)(\.\d*[1-9])?$/.test(document.form1.kucun.value))){}else{alert("库存必须数字型");document.form1.kucun.focus();return false;}
    if(document.form1.xiaoshouliang.value==""){alert("请输入销售量");document.form1.xiaoshouliang.focus();return false;}
    if(document.form1.xiaoshouliang.value<0>){alert("销售量须大于0");document.form1.xiaoshouliang.focus();return false;}
    if((/^(\+|-)?(0|[1-9]\d*)(\.\d*[1-9])?$/.test(document.form1.xiaoshouliang.value))){}else{alert("销售量必须数字型");document.form1.xiaoshouliang.focus();return false;}
    if(parseFloat(document.form1.shichangjia.value)<parseFloat(document.form1.huiyuanjia.value)){alert("对不起，市场价必须大于会员价");return false;}
	
}
	function gow()
	{
		location.href='shangpinxinxi_add.php?jihuabifffanhao='+document.form1.jihuabifffanhao.value+"&id=<?php echo $_GET["id"]?>";
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



<form id="form1" name="form1" method="post" action="?id=<?php echo $_GET["id"]?>">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">    
	<tr><td>农产品编号：</td><td><input name='shangpinbianhao' type='text' id='shangpinbianhao' value='<?php echo makefilename2()?>' style='border:solid 1px #000000; color:#666666' /></td></tr>
    <tr><td>农产品名称：</td><td><input name='shangpinmingcheng' type='text' id='shangpinmingcheng' value='' size='50' style='border:solid 1px #000000; color:#666666'  />&nbsp;*</td></tr>
    <tr><td>类别：</td><td><select name='leibie' id='leibie'><?php getoption("leibiexinxi","leibie")?></select>&nbsp;*</td></tr>
    <tr><td>图片：</td><td><input name='tupian' type='text' id='tupian' value='' size='50' style='border:solid 1px #000000; color:#666666'  />&nbsp;<a href="javaScript:OpenScript('upfile.php?Result=tupian',460,180)"><img src="Images/Upload.gif" width="30" height="16" border="0" align="absmiddle" /></a></td></tr>
    <tr><td>市场价：</td><td><input name='shichangjia' type='text' id='shichangjia' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*&nbsp;必需数字型</td></tr>
    <tr><td>会员价：</td><td><input name='huiyuanjia' type='text' id='huiyuanjia' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*&nbsp;必需数字型</td></tr>
    <tr><td>库存：</td><td><input name='kucun' type='text' id='kucun' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*&nbsp;必需数字型</td></tr>
    <tr><td>销售量：</td><td><input name='xiaoshouliang' type='text' id='xiaoshouliang' value='0' style='border:solid 1px #000000; color:#666666' />&nbsp;*&nbsp;必需数字型</td></tr>
    <tr><td>农产品简介：</td><td><textarea name='jianjie' cols='50' rows='8' id='jianjie' style='border:solid 1px #000000; color:#666666'></textarea></td></tr>
    

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

