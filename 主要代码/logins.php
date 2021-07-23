<?php

include 'DBConn.php';
// 接收表单提交的用户名密码
if(isset($_REQUEST['checkcode'])){
    session_start();
    if(strtolower($_REQUEST['checkcode'])==$_SESSION['checkcode']){
        $username = $_POST['username'];

        if( $username=='admin' || $username=='system'){
            $password = $_POST['password'];
//从数据库查询用户名和密码
        }else{
            $password =md5($_POST['password']) ;
        }



        $sqlsel="select username,password from logins where username='$username' and password='$password'";
        $result=mysqli_query($conn, $sqlsel);

        if($result->num_rows==1){
            session_start();
            $_SESSION['username'] = $username;
            if( ($_SESSION['username']) == 'system' || ($_SESSION['username']) == 'admin'){
                header("Refresh:0.0001;url=admin.php");
            }else{
                header("Refresh:0.0001;url=homepage.php");
            }
//    echo "<script> alert('登录成功')</script>";
            exit();
        }else{
            header("Refresh:0.0001;url=login.php");
            echo "<script> alert('登录失败')</script>";
            exit();
        }
    }else{
        header("Refresh:0.0001;url=login.php");
        echo "<script> alert('验证码失败，请重试！')</script>";
    }
    exit();
}


