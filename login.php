<?php
//include "RegConnection.php";
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname="AdminUser";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["Login_btn"])){
    $UsName=$_POST["uname"];
    $UsPass=$_POST["Logpsw"];
    $UsPass=md5($UsPass);
    $sql="SELECT * FROM users WHERE UserName='$UsName' AND Password='$UsPass'";
    $result=mysqli_query($conn,$sql);

    if (mysqli_num_rows($result)==1){
        $_SESSION['message']="You are logged in";
        $_SESSION['username']=$UsName;
        header("Location:welcome.php");
    }else{
        $_SESSION['message']="Username/Password combination incorrect";
    }



}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="login.php" method="post">
    <div class="imgcontainer">
        <img src="Logo/userLogo.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="Logpsw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="Logpsw" required>

        <button type="submit" name="Login_btn">Login</button>
        <label>
            <input type="checkbox"  name="remember"> Remember me
        </label>
    </div>

</form>
</body>
</html>