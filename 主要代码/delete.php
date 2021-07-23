
<?php

//分页的函数
function news($pageNum = 1, $pageSize = 3)
{
    include 'mysql.php';
    $array = array();
    // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度

    $rs = "select * from news limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
    $r = mysqli_query($conn, $rs);

    while ($obj = mysqli_fetch_object($r)) {
        $array[] = $obj;
    }
    mysqli_close($conn);

    return $array;

}
//显示总页数的函数

function allNews()
{

    include 'mysql.php';
    $rs = "select count(*) num from news"; //可以显示出总页数

    $r = mysqli_query($conn, $rs);

    $obj = mysqli_fetch_object($r);

    mysqli_close($conn);

    return $obj->num;

}

@$allNum = allNews();

@$pageSize = 3; //约定每页显示几条信息

@$pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];

@$endPage = ceil($allNum/$pageSize); //总页数

@$array = news($pageNum,$pageSize);

?>


<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Refresh:0.0001;url=login.php');
    echo "<script> alert('非法访问!')</script>";
    exit();
}
include 'DBConn.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>删除日志</title>
</head>

<body bgcolor="#C0A890">

<h1>删除日志</h1>

<tr>
    <td colspan="2" align="center">
        <a href='homepage.php'>日志首页</a></td>
</tr>


<div align="center">

<table width="900" border="1" align="center">
    <tr>
        <th>日志ID</th>
        <th>标题</th>
        <th>关键字</th>
        <th>作者</th>
        <th>发布时间</th>
        <th>内容</th>
        <th>操作</th>
    </tr>

    <?php
    include('mysql.php');

    //利用 查询语句
    $sql="select * from news ";

    //$conn->query('SET NAMES UTF8');
    $cx=mysqli_query($conn,$sql);

    foreach($array as $key=>$row){
        echo "<tr align='center'>";
        echo "<td>$row->id</td>";
        echo "<td>$row->title</td>";
        echo "<td>$row->keywords</td>";
        echo "<td>$row->author</td>";
        echo "<td>$row->addtime</td>";
        echo "<td>$row->content</td>";
        echo "<td><a href='delete.php?id={$row->id}'>删除</a></td>";
        echo "</tr>";
    }


    ?>
</table>

    </table>

    <div>
        <a href="?pageNum=1">首页</a>
        <a href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>">上一页</a>
        <a href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>">下一页</a>
        <a href="?pageNum=<?php echo $endPage?>">尾页</a>
    </div>



</div>
</body>


</html>

<?php
include("mysql.php");
$id=$_GET['id'];
$delete='delete from news where id='.$id;
if (mysqli_query($conn, $delete)) {
    echo "<script>alert('删除成功')</script>";
    mysqli_close($conn);
    header("Location: delete.php");    //刷新当前页面
}
//else {
  //  echo "Error: " . $delete . "<br>" . mysqli_error($conn);

//}
?>


