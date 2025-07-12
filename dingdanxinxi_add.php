<?php
session_start();
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
	$dingdanhao=$_POST["dingdanhao"];
    $dingdanjine=$_POST["dingdanjine"];
    $dingdanneirong=$_POST["dingdanneirong"];
    $zhanghao=$_POST["zhanghao"];
    $xingming=$_POST["xingming"];
    $shouji=$_POST["shouji"];
    $dizhi=$_POST["dizhi"];

	
	$sql="insert into dingdanxinxi(dingdanhao,dingdanjine,dingdanneirong,zhanghao,xingming,shouji,dizhi) values('$dingdanhao','$dingdanjine','$dingdanneirong','$zhanghao','$xingming','$shouji','$dizhi') ";
	mysql_query($sql);
	
	echo "<script>javascript:alert('添加成功!');history.back();</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>订单信息</title>

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
<p>添加订单信息： 当前日期： <?php echo $ndate; ?></p>
<script language="javascript">
	function check()
{
	if(document.form1.dingdanjine.value==""){alert("请输入订单金额");document.form1.dingdanjine.focus();return false;}
    
}
	function gow()
	{
		location.href='dingdanxinxi_add.php?jihuabifffanhao='+document.form1.jihuabifffanhao.value+"&id=<?php echo $_GET["id"]?>";
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
	$sql="select * from gouwuche where zhanghao='".$_SESSION["username"]."'   and issh='否' ";
	$query=mysql_query($sql);
		$rowscount=mysql_num_rows($query);
		 if($rowscount==0)
		 {
		 	$ze=0;
			$ddnr="";
		 }
		 else
		 {     
		     $kk=mysql_result($query,0,shangpinbianhao);
		 	 for($i=0;$i<$rowscount;$i++)
			 {
			 	$ze=$ze+mysql_result($query,$i,jine);
				$ddnr=$ddnr."名称：".mysql_result($query,$i,shangpinmingcheng)."，件数：".mysql_result($query,$i,goumaishu).";";
			 }
		 }
		 mysql_query("update gouwuche set issh='是' where shangpinbianhao=$kk");
?>


<form id="form1" name="form1" method="post" action="?id=<?php echo $_GET["id"]?>">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">    
	<tr><td>订单号：</td><td><input name='dingdanhao' type='text' id='dingdanhao' value='<?php echo makefilename2()?>' style='border:solid 1px #000000; color:#666666' /></td></tr>
    <tr><td>订单金额：</td><td><input name='dingdanjine' type='text' id='dingdanjine' value='<?php echo $ze?>' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr>
    <tr><td>订单内容：</td><td><textarea name='dingdanneirong' cols='50' rows='8' id='dingdanneirong' style='border:solid 1px #000000; color:#666666'><?php echo $ddnr?></textarea></td></tr>
    <tr><td>账号：</td><td><input name='zhanghao' type='text' id='zhanghao' value='<?php echo $_SESSION['username'];?>' style='border:solid 1px #000000; color:#666666' readonly='readonly' /></td></tr>
    <tr><td>姓名：</td><td><input name='xingming' type='text' id='xingming' value='' style='border:solid 1px #000000; color:#666666' /></td></tr>
    <tr><td>手机：</td><td><input name='shouji' type='text' id='shouji' value='' style='border:solid 1px #000000; color:#666666' /></td></tr>
    <tr><td>地址：</td><td><input name='dizhi' type='text' id='dizhi' value='' size='50' style='border:solid 1px #000000; color:#666666'  /></td></tr>
    <tr style='display:none'><td>发货物流：</td><td><input name='fahuowuliu' type='text' id='fahuowuliu' value='' style='border:solid 1px #000000; color:#666666' /></td></tr>
    <tr style='display:none'><td>单号：</td><td><input name='danhao' type='text' id='danhao' value='' style='border:solid 1px #000000; color:#666666' /></td></tr>
    <tr style='display:none'><td>配送员：</td><td><input name='peisongyuan' type='text' id='peisongyuan' value='' style='border:solid 1px #000000; color:#666666' /></td></tr>
    

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

