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
    <title>搜索日志</title>
</head>

<form action="search.php" method="post">
    <input type="text" name="ssxw" />
    <input type="submit" value="搜索" />
</form>
</body>

<body bgcolor="#C0A890">
<table width="500" border="2">
    <tr>
        <th colspan="coL">ID</th>
        <th colspan="COL">标题</th>
        <th colspan="COL">关键字</th>
        <th colspan="COL">作者</th>
        <th colspan="COL">时间</th>
        <th colspan="COL">内容</th>
    </tr>

    <?php
    //载入数据库
    include("mysql.php");
    //获取输入的标题
    $ssxw=$_POST['ssxw'];
    //利用 查询语句
    $sql="select * from news where keywords like '%$ssxw%'";

    //利用索引数组
    $cx=mysqli_query($conn,$sql);
    //遍历出来

    while($sy=mysqli_fetch_row($cx)){
        echo "<tr>";
        echo "<td>$sy[0]</td>";
        echo "<td>$sy[1]</td>";
        echo "<td>$sy[2]</td>";
        echo "<td>$sy[3]</td>";
        echo "<td>$sy[4]</td>";
        echo "<td>$sy[5]</td>";
        echo "</tr>";
    }
    echo "<a href='homepage.php'>日志首页</a>";
    ?>
</table>
</body>

</html>


