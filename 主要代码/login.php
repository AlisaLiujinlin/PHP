<?php
session_start();
if(isset($_SESSION)){
    session_start();
//  这种方法是将原来注册的某个变量销毁
    unset($_SESSION['admin']);
//  这种方法是销毁整个 Session 文件
    session_destroy();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>猫咪之家登录</title>
    <style type="text/css">
        body{
            background-image: url("01.jpg");
        }
    </style>
    <link rel="stylesheet" href="SignUpStyle.css">
    <link href="https://fonts.googleapis.com/css?familymPermanent+Marker" >
    <script>
        function change(){
            document.getElementById("image_checkcode").src='captcha.php?r='+Math.random();
        }
    </script>
</head>

<body>
<div class="sign-div">

    <form class="" action="logins.php" method="post">
        <h1>用户登录</h1>
        <input class="sign-text" type="text" name="username" placeholder="用户名" >
        <input class="sign-text" type="password" name="password" placeholder="密码">


        <h2>欢迎来到猫咪之家~</h2>
        <img id="image_checkcode" src="captcha.php?r=<?php echo rand();?>"  />
        <a href="javascript:void(0)" onclick="change()">看不清楚</a><br/>
        <input stype="text" name="checkcode" placeholder="请输入验证码">
        <input type="submit" onclick="window.location.href='logins.php'" value="登录"/>
        <br>
        <input type="button" onclick="window.location.href='register.php'" value="注册">
        <tr>
            <td colspan="2" align="center">
                <a href='find.php'>忘记密码</a></td>
        </tr>
    </form>

</div>

<style>
    body{
        margin: 0;
        padding: 0;
    }
    .sign-div{
        width: 300px;
        padding: 20px;
        text-align: center;
        background: url(bg02.jpg);
        position:absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        overflow: hidden;
    }
    .sign-div h1 ,h2{
        margin-top: 100px;
        color: #fff;
        font-size: 40px;
    }
    .sign-div input{
        display: block;
        width: 100%;
        padding: 0 16px;
        height: 44px;
        text-align: center;
        box-sizing: border-box;
        outline: none;
        border: none;
        font-family: "montserrat",sans-serif;
    }
    .sign-text{
        margin:4px;
        background: rgba(255,255,255,5);
        border-radius: 6px;
    }

    .sign-btn:hover{
        transform:scale(0.96);
    }
    .sign-div a{
        text-decoration: none;
        color: #fff;
        font-family: "montserrat", sans-serif;
        font-size: 14px;
        padding: 10px;
        transition: 0.8s;
        display: block;
    }
    .sign-div a:hover{
        background: rgba(0,0,0,.3);
    }

</style>

</body>
</html>


