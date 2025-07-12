<?php
session_start();
if($_SESSION["username"]=="")
{
	echo "<script>javascript:alert('对不起，请您先登陆！');window.close();</script>";
	exit;
}
include_once 'conn.php';
$id=$_GET["id"];
$addnew=$_POST["addnew"];

if ($addnew=="1" )
{
	
	$wenzhangID=$_POST["wenzhangID"];$pinglunneirong=$_POST["pinglunneirong"];$pinglunren=$_POST["pinglunren"];$biao=$_POST["biao"];$pingfen=$_POST["pingfen"];
	$sql="insert into pinglun(wenzhangID,pinglunneirong,pinglunren,biao,pingfen) values('$wenzhangID','$pinglunneirong','$pinglunren','$biao','$pingfen') ";
	mysql_query($sql);
	
	echo "<script>javascript:alert('评论成功!');  window.opener.location.reload();window.close();</script>";
}
?><style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
-->
</style>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">
                          <form name="form1" method="post" action="">
                            <tr style="display:none">
                              <td>文章ID：</td>
                              <td><input name='wenzhangID' type='text' id='wenzhangID' value='<?php echo $_GET["id"];?>' />
                                &nbsp;*
                                <input name="biao" type="hidden" id="biao" value="<?php echo $_GET["biao"];?>"></td>
                            </tr>
                            <tr >
                              <td>评分：</td>
                              <td><select name="pingfen" id="pingfen">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>
                              </td>
                            </tr>
                            <tr>
                              <td>留言内容：</td>
                              <td><textarea name='pinglunneirong' cols='50' rows='8' id='pinglunneirong'></textarea>
                                &nbsp;*</td>
                            </tr>
                            <tr>
                              <td>留言人：</td>
                              <td><input name='pinglunren' type='text' id='pinglunren' value='<?php echo $_SESSION["username"];?>' /></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td><input type="hidden" name="addnew" value="1" />
                                  <input type="submit" name="Submit" value="添加" onClick="return check();" />
                                  <input type="reset" name="Submit2" value="重置" /></td>
                            </tr>
                          </form>
                        </table>