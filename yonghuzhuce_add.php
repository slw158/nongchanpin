<?php
include_once 'conn.php';
$ndate = date("Y-m-d");
$addnew = $_POST["addnew"];
if ($addnew == "1") {
    global $conn;
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
//	$zhanghao=$_POST["zhanghao"];$mima=$_POST["mima"];$xingming=$_POST["xingming"];$xingbie=$_POST["xingbie"];$diqu=$_POST["diqu"];$Email=$_POST["Email"];$zhaopian=$_POST["zhaopian"];
//    $salt = generateSalt();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // 验证输入
        if (empty($_POST['zhanghao']) || empty($_POST['mima'])) {
            die("账号和密码不能为空");
        }

        // 检查账号是否已存在
        $check = $conn->prepare("SELECT id FROM yonghuzhuce WHERE zhanghao = ?");
        $check->bind_param("s", $_POST['zhanghao']);
        $check->execute();
        if ($check->get_result()->num_rows > 0) {
            die("该账号已被注册");
        }
        // 准备插入语句
        $stmt = $conn->prepare("INSERT INTO yonghuzhuce(zhanghao, mima) VALUES (?, ?)");
        if ($stmt === false) {
            die("准备语句失败: " . $conn->error);
        }
        $username = $_POST['zhanghao'];
        $password = password_hash($_POST['mima'] . 'salt', PASSWORD_BCRYPT);
        $stmt->bind_param("ss", $username, $password);
        if ($stmt->execute()) {
            echo "注册成功！";
        } else {
            echo "注册失败: " . $stmt->error;
        }
        $stmt->close();
        $check->close();
    }

    $conn->close();

//    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//        $stmt = $conn->prepare("INSERT INTO yonghuzhuce(zhanghao, mima) VALUES (?, ?)");
//
//        if ($stmt === false) {
//            die("准备语句失败: " . $conn->error);
//        }
//
//        $username = $_POST['zhanghao'];
//        $password = password_hash($_POST['mima'] . 'salt', PASSWORD_BCRYPT);
//        $stmt->bind_param("ss", $username, $password);
//
//        if ($stmt->execute()) {
//            echo "注册成功！";
//        } else {
//            echo "错误: " . $stmt->error;
//        }
//
//        $stmt->close();
//    }
//    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
//    $username = $_POST['username'];
//    $password = password_hash($_POST['password'] . 'salt_string', PASSWORD_BCRYPT);

//    $stmt->bind_param("ss", $username, $password);
//    $stmt->execute();
//    $stmt->close();


//    $sql="insert into yonghuzhuce(zhanghao,mima,xingming,xingbie,diqu,Email,zhaopian)
//                        values('$zhanghao','$password','$xingming','$xingbie','$diqu','$Email','$zhaopian') ";
//    mysqli_query($sql);
//	echo "<script>javascript:alert('添加成功!');location.href='yonghuzhuce_add.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

