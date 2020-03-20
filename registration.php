<?php
session_start();
include "RegConnection.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname="AdminUser";
$conn =  mysqli_connect($servername, $username, $password, $dbname);
if (isset($_POST["RegBtn"])){
    session_start();
    $AdmName=$_POST["UserName"];
    $Email=$_POST["email"];
    $Pass=$_POST["psw"];
    $Pass=md5($Pass);
    $sql="INSERT INTO Users(UserName,Email,Password)VALUES ('$AdmName','$Email','$Pass')";
    mysqli_query($conn,$sql);
    $_SESSION['message']="Yor are now logged in";
    $_SESSION['AdmName']="$AdmName";
    header("location:welcome.php");
}



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!--<form action="" method="post">-->
<!--    <input type="text" name="UserName" placeholder="Name">-->
<!--    <input type="email" name="UserEmail" placeholder="Email">-->
<!--    <input type="password" name="UserPass" placeholder="Password">-->
<!--    <input type="submit" name="Regist" value="Registration">-->
<!--</form>-->
<form action="registration.php" method="post">
    <div class="container">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label for="UserName"><b>Name</b></label>
        <input type="text" placeholder="Name" name="UserName" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <hr>

        <button type="submit" class="registerbtn" name="RegBtn">Register</button>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="login.php">Sign in</a>.</p>
    </div>
</form>
</body>
</html>