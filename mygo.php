<?php
session_start();
if($_SESSION['cx']=="超级管理员" || $_SESSION['cx']=="管理员"){echo "<script>javascript:location.href='left.php';</script>";}
if($_SESSION['cx']=="注册用户" ){echo "<script>javascript:location.href='left2.php';</script>";}
?>




