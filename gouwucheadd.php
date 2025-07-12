<?php
session_start();
 if($_SESSION["username"]=="")
 {
	echo "<script>javascript:alert('对不起，请您先登陆！');location.href='index.php';</script>";
	exit;
 }
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
	
	
	mysql_query("update shangpinxinxi set kucun=kucun-'$goumaishu' where shangpinbianhao=$shangpinbianhao");
	
	mysql_query("update shangpinxinxi set xiaoshouliang=xiaoshouliang+'$goumaishu' where shangpinbianhao=$shangpinbianhao");
	
	echo "<script>javascript:alert('操作成功!');location.href='index.php';</script>";
}
?>
<html>
<head>
<title>购物车</title>
<LINK href="qtimages/style.css" type=text/css rel=stylesheet>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<script type="text/javascript" src="js/My97DatePicker/WdatePicker.js" charset="gb2312"></script>
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
	function check()
{
	if(document.form1.goumaishu.value==""){alert("请输入购买数");document.form1.goumaishu.focus();return false;}
    if((/^(\+|-)?(0|[1-9]\d*)(\.\d*[1-9])?$/.test(document.form1.goumaishu.value))){}else{alert("购买数必需数字型");document.form1.goumaishu.focus();return false;}
    if(parseFloat(document.form1.kucun.value)<parseFloat(document.form1.goumaishu.value)){alert("对不起，库存必需大于购买数");return false;}
	
}
	function gow()
	{
		location.href='gouwucheadd.php?jihuabifffanhao='+document.form1.jihuabifffanhao.value+"&id=<?php echo $_GET["id"]?>";
	}
</script>

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
                    <td width="92%" ><font class="title">[购物车]</font></td>
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
<form id="form1" name="form1" method="post" action="">
<table width="98%" border="0"  align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse" class="newsline">    
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
        <input type="submit" name="Submit" value="确定" onClick="return check();"  style='border:solid 1px #000000; color:#666666' />
      <input type="reset" name="Submit2" value="重置" style='border:solid 1px #000000; color:#666666' /></td>
    </tr>
  </table>
</form>


					
					
					
					
					
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
