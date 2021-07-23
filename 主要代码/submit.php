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

<body>

<?php
include("mysql.php");

$id=$_POST['id'];
$title=$_POST['title'];
$keyswords=$_POST['keywords'];
$author=$_POST['author'];
$content=$_POST['content'];
//修改语句
$xg="update news set title='$title',keywords='$keyswords',author='$author',content='$content' where id=$id";
//$sy=mysqli_query($conn,$xg);

if (mysqli_query($conn, $xg)) {
    echo  "<script>alert('新纪录插入成功')</script>";
} else {
    echo "Error: " . $mysql . "<br>" . mysqli_error($conn);
}

header("Location:modify.php");
?>

</body>

</html>