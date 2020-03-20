<?php
include "RegConnection.php";
session_start();

header("location:login.php");

session_destroy();

?>