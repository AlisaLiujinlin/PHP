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
<head>
<title>修改提交</title>
</head>


<body bgcolor="#C0A890">
<?php
include("mysql.php");
$id=$_GET['id'];
$sql="select * from news where id='$id'";
$zy=mysqli_query($conn,$sql);
$info=mysqli_fetch_row($zy);
?>
<form action="submit.php"  method="post">
    <input type="hidden" name="id" value="<?php echo $info[0] ?>" />
    <h2  align="center">修改日志</h2>
    <hr />
    <table width="500" border="2" align="center">
        <tr>
            <td>日志标题</td>
            <td><input type="text" name="title"  value="<?php echo $info[1] ?>"/></td>
        </tr>
        <tr>
            <td>关键字</td>
            <td><input type="text" name="keywords" value="<?php echo $info[2] ?>" /></td>
        </tr>
        <tr>
            <td>作者</td>
            <td><input type="text" name="author"  value="<?php echo $info[3] ?>"/></td>
        </tr>
        <tr>
            <td>日志内容</td>
            <td><input type="text" name="content"  value="<?php echo $info[5] ?>"/></td>
        </tr>
        <tr align="center">
            <td colspan="2"><input type="submit" value="提交" /></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <a href='homepage.php'>日志首页</a></td>
        </tr>
    </table>
</form>
</body>

</html>

