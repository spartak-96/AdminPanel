<?php
session_start()
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>WelcomeAdmin</title>
    </head>
    <body>
    <div class="sidenav">
        <a href="categories.php">Categories</a>
        <a href="models.php">Models</a>
        <a href="products.php">Products</a>
    </div>

    <div class="exit">
        <a href="logout.php">LogOut</a>

    </div>
    <style>
        .exit {
            position: absolute;
            top: 0;
            right: 0;
            background-color: #111;
            padding: 6px 8px 6px 16px;
            display: inline-block;
        }
        .exit a{
            color: #fff;
        }

        .sidenav {
            height: 100%;
            width: 160px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
        }


        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: inline-block;
        }


        .sidenav a:hover {
            color: #f1f1f1;
        }



        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }

    </style>
    </body>
    </html>
