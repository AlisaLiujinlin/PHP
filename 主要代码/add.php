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
<title>插入日志</title>
</head>

<body bgcolor="#C0A890">
<form action="add.php" method="post">
    <h3 align="center">插入日志</h3>
    <table  width="300" align="center" border="2">
        <tr>
            <td>标题</td>
            <td><input type="text" name="title" /></td>
        </tr>
        <tr>
            <td>关键字</td>
            <td><input type="text" name="keywords" /></td>
        </tr>
        <tr>
            <td>作者</td>
            <td><input type="text" name="author" /></td>
        </tr>
        <tr>
            <td>内容</td>
            <td><input type="text" name="content" /></td>
        </tr>
        <tr >
            <td colspan="2" align="center"><input type="submit" value="提交" /></td>

        </tr>
        <tr>
            <td colspan="2" align="center">
                <a href='homepage.php'>日志首页</a></td>
        </tr>
    </table>
</form>
</body>

</html>


<body>
<?php
//加载数据库
include("mysql.php");
//连接数据库
//mysql_connect("localhost","root","") or die("连接失败");
//设置编码格式
//mysql_query("set names utf-8");
//选择数据库
//mysql_query("use newsdb") or die("选择失败");
//获取输入文本

if(isset($_POST["title"])&&isset($_POST["keywords"])&&isset($_POST["author"])&&isset($_POST["content"])) {

    $title = $_POST['title'];
    $keywords = $_POST['keywords'];
    $author = $_POST['author'];
    $content = $_POST['content'];
//获取系统时间
    /*改时区*/
    date_default_timezone_set('PRC');
    $time = date('Y-m-d h:i:s');
//加入数据
    $mysql = "insert into news values(null,'$title','$keywords','$author','$time','$content')";

    if (mysqli_query($conn, $mysql)) {
        echo  "<script>alert('新纪录插入成功')</script>";
    } else {
        echo "Error: " . $mysql . "<br>" . mysqli_error($conn);
    }


}
?>
</body>
