<?php
include 'DBConn.php';
?>

<html>
<head>
    <meta charset="utf-8">
    <title>用户注册</title>

    <style type="text/css">
        body{
            background-image: url("01.jpg");
        }
    </style>

</head>
<body>
<h1>新用户注册</h1>
<h3>欢迎加入猫咪之家，快来注册一个账号，和我们一起云撸猫吧~喵~</h3>
<div>
    <form method="post" action="register.php" onSubmit="return check();">
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
                       <input type="submit" id="register" name="register" value="注册">
               </tr><tr>
                <td colspan="2" align="center">
                    如果已有账号，快去<a href="login.php">登录</a>吧！ </td> </tr>

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
   if(isset($_POST["username"])&&isset($_POST["sex"])&&isset($_POST["country"])&&isset($_POST["qq"])&&isset($_POST["password"])&&isset($_POST["email"])&&isset($_POST["phone"])){

       $username=$_POST["username"];
       $sex=$_POST["sex"];
       $country=$_POST["country"];
       $phone=$_POST["phone"];
       $email=$_POST["email"];
       $qq=$_POST["qq"];
       $password=md5($_POST["password"]);

       //用户名不可重复
       $sqlSelect=" select username from logins where username='$username' ";
       $result=mysqli_query($conn, $sqlSelect);

       if ($result->num_rows==1){
           echo  "<script>alert('用户名已存在！')</script>";
       }else{
           $sql = "INSERT into logins (username,sex,country,password,qq,email,phone)
                   VALUES ('$username','$sex','$country','$password','$qq','$email','$phone')";
           if (mysqli_query($conn, $sql)) {
               echo  "<script>alert('注册成功！')</script>"; //这里不能关闭数据库
           } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
           }
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