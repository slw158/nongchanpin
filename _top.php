<?php
session_start();

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>top文件</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<style type="text/css">
<!--
.STYLE1 {
	color: #0066cc;
	font-weight: bold;
}
-->
</style>
</head>
<link href="css/m_style.css" rel="stylesheet" type="text/css">
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="45%" align="left" background="images/title_bg.jpg"><table width="333" height="52" border="0" background="images/title.jpg">
      <tr>
        <td><table width="87%" height="51" border="0" align="left">
            <tr>
              <td align="center"><div style="font-family:宋体; color:#0066cc;  WIDTH: 100%; FONT-WEIGHT: bold; FONT-SIZE: 20px; margin-top:5pt">
                  农产品网上销售系统
              </div></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="47%" align="right" valign="top" background="images/title_bg.jpg"><table width="399" height="52" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="80%" align="right"><span class="STYLE1">当前用户：<?php echo $_SESSION['username']?>&nbsp; 权限：<?php echo $_SESSION['cx']?></span></td>
      </tr>
      <tr >
        <td height="6"></td>
      </tr>
    </table></td>
    <td width="8%" align="right" valign="top" background="images/title_bg.jpg"><table width="130" height="52" border="0" cellpadding="0" cellspacing="0" background="images/title_right.jpg">
      <tr>
        <td width="80%" align="right">&nbsp;</td>
      </tr>
      <tr >
        <td height="6"></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
