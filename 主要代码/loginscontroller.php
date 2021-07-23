<html>
<head>
    <meta charset="utf-8">
    <title>管理员界面</title>

    <style type="text/css">
        body{
            background-image: url("01.jpg");
        }
    </style>

</head>
</html>

<?php
session_start();
if( ! ( ($_SESSION['username']) == 'system' || ($_SESSION['username']) == 'admin' ) ){
    header('Refresh:0.0001;url=login.php');
    echo "<script> alert('非法访问！')</script>";
    exit();
}
include 'DBConn.php';

//根据所传参数判断是修改请求还是添加请求
if(isset($_POST["username"])&&isset($_POST["sex"])&&isset($_POST["country"])&&isset($_POST["qq"])&&isset($_POST["password"])&&isset($_POST["email"])&&isset($_POST["phone"])){
    $username=$_POST["username"];
    $sex=$_POST["sex"];
    $country=$_POST["country"];
    $qq=$_POST["qq"];
    $password=md5($_POST["password"]);
    $email=$_POST["email"];
    $phone=$_POST["phone"];

    if($_POST["id"]!=null){//修改
        $id=$_POST["id"];
        $sqlupdate = "UPDATE logins SET NAME='$username',sex='$sex',country='$country',qq='$qq',password='$password',email='$email',phone='$phone' WHERE id=$id";
        if (mysqli_query($conn, $sqlupdate)) {
            echo "<script>alert('修改成功')</script>";
            header("Location: loginscontroller.php");    //刷新当前页面
            mysqli_close($conn);
        } else {
            echo "Error: " . $sqlupdate . "<br>" . mysqli_error($conn);
        }
    }else{//添加
        $sql = "INSERT into logins (username,sex,country,qq,password,email,phone)
                VALUES ('$username','$sex','$country','$qq','$password','$email','$phone')";
        if (mysqli_query($conn, $sql)) {
            echo  "<script>alert('新纪录插入成功')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
//查询，返回全部结果
$sqlselect="select id,username,sex,country,qq,email,phone from logins";
$result=mysqli_query($conn, $sqlselect);
if($result->num_rows>0){
    echo "<h1>你好呀~管理员".$_SESSION['username']."~</h1>";
    echo "<div><h3>欢迎来到管理员操作界面~喵~&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
    echo "<a class='btn' href='login.php'>退出登录</a><h3></div>";
    echo "<div><a href='register.php'>添加用户</a></div><br>";
    echo "<table><tr><th>姓名</th><th>性别</th><th>国家</th><th>qq</th><th>email</th><th>phone</th><th>操作</th></tr>";
    while($row=$result->fetch_assoc()){
        echo '<tr><td>'.$row["username"].'</td>
            <td>'.$row["sex"].'</td>
             <td>'.$row["country"].'</td>
                <td>'.$row["qq"].'</td>
                 <td>'.$row["email"].'</td>
                  <td>'.$row["phone"].'</td>
                <td>
                <a href="loginscontroller.php?id='.$row["id"].'&func=delete">删除</a>'.' '.
            '<a href="admin.php?id='.$row["id"].'&func=update">修改</a></td></tr>';
    }
    echo "</table>";
}else{
    echo "0个结果";
}
//删除业务，接受本页面传来的id参数，利用此参数删除对应记录
if(isset($_GET["id"])&&$_GET["func"]==delete){
    $id=$_GET["id"];
    $sqldelete='delete from logins where id='.$id;
    if (mysqli_query($conn, $sqldelete)) {
        echo "<script>alert('删除成功')</script>";
        mysqli_close($conn);
        header("Location: loginscontroller.php");    //刷新当前页面
    } else {
        echo "Error: " . $sqldelete . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);

echo '
<style type="text/css">
body{text-align: center;}
table{
	width:600px;height:300px;
	border:1px solid black;/*设置边框粗细，实线，颜色*/
	text-align:center;/*文本居中*/
	background-color:#70DB93;
	border-collapse: collapse;/*边框重叠，否则你会看到双实线*/
    margin: auto;
}
th{
	border:1px solid black;
	color:black;
	font-weight:bold;/*因为是标题栏，加粗显示*/
}
td{
	border:1px solid black;
	color:#8E2323;
}
 a{
        font-family: Arial;
        margin: 3px;
    }
    
    a:LINK,a:VISITED {
        color:#A62020;
        padding:4px 10px 4px 10px;
        background-color:#DDD;
        text-decoration: none;
        border-top: 1px solid #EEEEEE;
        border-left: 1px solid #EEEEEE;
        border-bottom: 1px solid #717171;
        border-right: 1px solid #717171;
    }
    
    a:HOVER {
        color: #821818;
        padding: 5px 8px 3px 12px;
        background-color: #CCC;
        border-top: 1px solid #717171;
        border-left: 1px solid #717171;
        border-bottom: 1px solid #EEEEEE;
        border-right: 1px solid #EEEEEE;
    }
h1{
background-color:#678;
color:white;
text-align:center;
}
div{
    text-align:center
}
.btn {
    border: none;
    color: red;
    font-family:Arial;
    padding: 10px 24px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 10px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>';
?>

