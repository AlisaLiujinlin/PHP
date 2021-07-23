<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Refresh:0.0001;url=login.php');
    echo "<script> alert('非法访问!')</script>";
    exit();
}
include 'DBConn.php';
?>

<html>
<body>

<title>猫咪之家</title>

<h1>亲爱的<?php echo $_SESSION['username'] ?>，欢迎来到猫咪之家~喵~</h1>

<body bgcolor="#C0A890">
<h1 align="center">猫咪之家日志首页</h1>
<h3 align="center"><a href="add.php">新建日志</a>&nbsp;&nbsp;<a href="modify.php">修改日志</a>&nbsp; &nbsp;<a href="delete.php">删除日志</a>&nbsp;&nbsp;<a href="search.php">搜索日志</a></h3>
</body>

</body>

</html>



