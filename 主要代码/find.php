<?php
include 'DBConn.php';
?>


<html>
<head>
    <meta charset="utf-8">
    <title>找回密码</title>

    <style type="text/css">
        body{
            background-image: url("01.jpg");
        }
    </style>

</head>
<body>
<h1>找回密码</h1>
<div>
    <form method="post" action="set.php" onSubmit="return check();">
        <table border="0">
            <tr>
                <td>用户名：</td>
                <td><input type="text" id="username" name="username" required="required"></td>
            </tr><tr>
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
                </td>
            </tr><tr>
                <td>修改密码：</td> <td><input type="password" id="password" name="password" required="required"></td>
            </tr> <tr>
                <td>确认密码：</td> <td><input type="password" id="password2" name="password2" required="required"></td>
            </tr>


            <tr>
                <td colspan="2" align="center">
                    <input type="hidden" id="id"  name="id" value=""/>

                    <br>
                    <input type="submit" id="find" name="find" value="提交">
            </tr><tr>
                <td colspan="2" align="center">
                    <a href="login.php">登录</a> </td> </tr>

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