<?php

include 'DBConn.php';
// 接收表单提交的用户名密码

$username = $_POST['username'];
$password = md5($_POST['password']);
$sex=$_POST["sex"];
$country=$_POST["country"];
$qq=$_POST["qq"];
$email=$_POST["email"];
$phone=$_POST["phone"];

$Sel=" select username , sex, country, qq, email, phone from logins where username='$username' and sex='$sex' and country='$country' and qq='$qq' and email='$email' and  phone='$phone'";
$result=mysqli_query($conn, $Sel);

if ($result->num_rows==1){

    $sql = "UPDATE logins SET password='$password' where username='$username'";
    if (mysqli_query($conn, $sql)) {
        echo  "<script>alert('修改成功！')</script>"; //这里不能关闭数据库
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}else{

    echo "用户不存在!";
    header("Location: find.php");


}