<?php
include_once 'conn.php';
$ndate = date("Y-m-d");
$addnew = $_POST["addnew"];
if ($addnew == "1") {
//    global $conn;
    // 生成随机盐值
//    function generateSalt() {
//        return bin2hex(random_bytes(16)); // 32字符长度的随机字符串
//    }
//    function hashPassword($password) {
//        return password_hash($password . SALT, PASSWORD_BCRYPT);
//    }

    // 密码加盐哈希
//    function hashPassword($password, $salt) {
//        return hash('sha256', $password . $salt);
//    }
	$zhanghao=$_POST["zhanghao"];$mima=$_POST["mima"];$xingming=$_POST["xingming"];$xingbie=$_POST["xingbie"];$diqu=$_POST["diqu"];$Email=$_POST["Email"];$zhaopian=$_POST["zhaopian"];
    $hashpwd = password_hash($mima, PASSWORD_DEFAULT);

//    // 调试输出
//    echo "原始密码: $mima <br>";
//    echo "哈希后的密码: $hashpwd <br>";
//    $sql = "insert into yonghuzhuce(...) values(...)";
//    echo "将要执行的SQL: " . htmlspecialchars($sql) . "<br>";
    // 使用预处理语句防止SQL注入
//    $stmt = $conn->prepare("INSERT INTO yonghu(zhanghao,mima,xingming,xingbie,diqu,Email,zhaopian)
//                           VALUES (?, ?, ?, ?, ?, ?, ?)");
//    $stmt->bind_param("sssssss", $zhanghao, $hashpwd, $xingming, $xingbie, $diqu, $Email, $zhaopian);
//    $stmt->execute();
//    if ($stmt->execute()) {
//        echo "<script>alert('添加成功!');</script>";
//    } else {
//        echo "<script>alert('添加失败: ".$stmt->error."');history.back();</script>";
//    }
//    echo "原始密码: $mima <br>";
//    echo "哈希后的密码: $hashpwd <br>";
//$stmt->close();



//    $hashpwd=password_hash($mima,PASSWORD_DEFAULT);
//    echo "原始密码: $mima <br>";
//    echo "哈希后的密码: $hashpwd <br>";
    $sql="insert into yonghuzhuce(zhanghao,mima,xingming,xingbie,diqu,Email,zhaopian)
                        values('$zhanghao','$hashpwd','$xingming','$xingbie','$diqu','$Email','$zhaopian') ";

//    mysqli_query($sql);
    $res=mysql_query($sql);
    if($res){
        echo "ok";
    }else{
        echo "no";
    }
    echo "将要执行的SQL: " . $sql . "<br>";
//    echo "mysql:".$conn-error();
//	echo "<script>javascript:alert('添加成功!');location.href='yonghuzhuce_add.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
    <title>用户注册</title>
    <script language="javascript" src="js/hsgrili.js"></script>
    <link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>
<p>添加用户注册： 当前日期： <?php echo $ndate; ?></p>
<script language="javascript">
    function check() {
        if (document.form1.zhanghao.value == "") {
            alert("请输入账号");
            document.form1.zhanghao.focus();
            return false;
        }
        if (document.form1.mima.value == "") {
            alert("请输入密码");
            document.form1.mima.focus();
            return false;
        }
        if (document.form1.xingming.value == "") {
            alert("请输入姓名");
            document.form1.xingming.focus();
            return false;
        }
        if (document.form1.Email.value == "") {
            alert("请输入Email");
            document.form1.Email.focus();
            return false;
        }
        if (document.form1.zhaopian.value == "") {
            alert("请输入照片");
            document.form1.zhaopian.focus();
            return false;
        }
    }

    // function gow() {
    //     location.href = 'peixunccccailiao_add.php?jihuabifffanhao=' + document.form1.jihuabifffanhao.value;
    // }
</script>
<form id="form1" name="form1" method="post" action="">
    <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF"
           style="border-collapse:collapse">
        <tr>
            <td>账号：</td>
            <td><input name='zhanghao' type='text' id='zhanghao' value=''/>&nbsp;*</td>
        </tr>
        <tr>
            <td>密码：</td>
            <td><input name='mima' type='text' id='mima' value=''/>&nbsp;*</td>
        </tr>
        <tr>
            <td>姓名：</td>
            <td><input name='xingming' type='text' id='xingming' value=''/>&nbsp;*</td>
        </tr>
        <tr>
            <td>性别：</td>
            <td><select name='xingbie' id='xingbie'>
                    <option value="男">男</option>
                    <option value="女">女</option>
                </select></td>
        </tr>
        <tr>
            <td>地区：</td>
            <td><select name='diqu' id='diqu'></select></td>
        </tr>
        <tr>
            <td>Email：</td>
            <td><input name='Email' type='text' id='Email' value=''/>&nbsp;*</td>
        </tr>
        <tr>
            <td>照片：</td>
            <td><input name='zhaopian' type='text' id='zhaopian' value='' size='50'/>&nbsp;*</td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td><input type="hidden" name="addnew" value="1"/>
                <input type="submit" name="Submit" value="添加" onclick="return check();"/>
                <input type="reset" name="Submit2" value="重置"/></td>
        </tr>
    </table>
</form>
<p>&nbsp;</p>
</body>
</html>