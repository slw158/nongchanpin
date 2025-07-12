<?php
//验证登陆信息
session_start();
 if($_SESSION["username"]=="")
 {
	echo "<script>javascript:alert('对不起，请您先登陆！');location.href='index.php';</script>";
	exit;
 }
// 加入收藏页面
include_once 'conn.php';
//if($_POST['submit']){
	$id=$_GET["id"];
	$biao=$_GET["biao"];
	$ziduan=$_GET["ziduan"];
    $sql1 = "SELECT id FROM shoucangjilu 
             WHERE username='".$_SESSION['username']."' 
             AND xwid=".intval($id)." 
             AND biao='".addslashes($biao)."' 
             AND ziduan='".addslashes($ziduan)."'";
    $query=mysql_query($sql1);
    if (!$query) {
        die('查询失败: ' . mysql_error());
    }
    $rowscount=mysql_num_rows($query);
    if ($rowscount>0){
        $comewhere=$_SERVER['HTTP_REFERER'];
        echo "<script language='javascript'>alert('该收藏已存在！');location.href='$comewhere';</script>";
    }else{
        $sql="insert into shoucangjilu(username,xwid,ziduan,biao) values('".$_SESSION["username"]."','$id','$ziduan','$biao')";
        //echo $sql;
        mysql_query($sql);
        $comewhere=$_SERVER['HTTP_REFERER'];
        echo "<script language='javascript'>alert('操作成功！');location.href='$comewhere';</script>";
    }

	
//}
?>