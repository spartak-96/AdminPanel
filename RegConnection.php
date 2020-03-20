<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname="AdminUser";
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//// Create database
//$sql = "CREATE DATABASE AdminUser";
//if ($conn->query($sql) === TRUE) {
//    echo "Database created successfully";
//} else {
//    echo "Error creating database: " . $conn->error;
//}
//
//$conn->close();

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE TABLE IF NOT EXISTS `Users` (
id INT(11)  AUTO_INCREMENT PRIMARY KEY,
UserName VARCHAR(30) NOT NULL,
Email VARCHAR(50) NOT NULL ,
Password VARCHAR(100) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
//    echo "Table Users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();




?>