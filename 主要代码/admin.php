<?php
session_start();
if( ! ( ($_SESSION['username']) == 'system' || ($_SESSION['username']) == 'admin' ) ){
    header('Refresh:0.0001;url=login.php');
    echo "<script> alert('非法访问！')</script>";
    exit();
}
include 'DBConn.php'; ?>

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

<body>
<h1>你好呀~管理员<?php echo $_SESSION['username'] ?>~</h1>
<h3>欢迎来到管理员操作界面~喵~</h3>
<div>
    <form method="post" action="loginscontroller.php" onSubmit="return check();">
        <table border="0">
            <tr>
                <td>用户名：</td>
                <td><input type="text" id="username" name="username" required="required"></td>
            </tr> <tr>
                <td>密   码：</td> <td><input type="password" id="password" name="password" required="required"></td>
            </tr> <tr>
                <td>确认密码：</td> <td><input type="password" id="password2" name="password2" required="required"></td>
            </tr> <tr>
                <td>性别：</td>
                <td> <input type="radio" id="male" name="sex" value="male">男
                    <input type="radio" id="female" name="sex" value="female">女 </td>
            </tr> <tr>
                <td>QQ号：</td> <td><input type="text" id="qq" name="qq" required="required"></td>
            </tr> <tr>
                <td>email：</td> <td><input type="email" id="email" name="email" required="required"></td>
            </tr> <tr>
                <td>电话：</td> <td><input type="text" id="phone" name="phone" required="required"></td>
            </tr> <tr>
                <td>国籍：</td> <td><input type="text" id="country" name="country" required="required">
                </td> </tr>

            <tr>
                <td colspan="2" align="center">
                    <input type="hidden" id="id"  name="id" value=""/>

                    <br>
                    <input type="submit" id="register" name="register" value="提交">
            </tr>

        </table>
    </form>
</div>

<script type="text/javascript">
    function check(){
        var password=document.getElementById('password').value;
        var password2=document.getElementById('password2').value;
        if(password==password2){
            return true;
        }else{
            alert("两次密码不一致");
            document.getElementById('password').value="";
            document.getElementById('password2').value="";
            return false;
        }
    }
</script>

<?php
if(isset($_GET["id"])&&$_GET["func"]=="update"){
    $id=$_GET["id"];
    $sqlSelectId="select * from logins where id=".$id;
    $res=mysqli_query($conn, $sqlSelectId);
    $row=$res->fetch_assoc();
    $username=$row["username"];
    $sex=$row["sex"];
    $country=$row["country"];
    $qq=$row["qq"];
    $email=$row["email"];
    $phone=$row["phone"];
    $password=$row["password"];
    echo "
        <script>
             document.getElementById('username').value='$username';
             document.getElementById('country').value='$country';
             document.getElementById('id').value=$id;
             document.getElementById('password').value=$password;
             document.getElementById('password2').value=$password;
             document.getElementById('qq').value=$qq;
             document.getElementById('email').value=$email;
             document.getElementById('phone').value=$phone;
        </script>";

    if($sex=='male'){
        echo "
        <script>
             document.getElementById('male').checked=true;
        </script>";
    }else{
        echo "
        <script>
             document.getElementById('female').checked=true;
        </script>";
    }
}
?>

<style type="text/css">
    h1{
        background-color:#678;
        color:white;
        text-align:center;
    }
    body {
        height: 100%;
        width: 100%;
        border: none;
        overflow-x: hidden;
    }
    div{
        width:100%;
        text-align:center;
    }

</style>
</body>
</html>

