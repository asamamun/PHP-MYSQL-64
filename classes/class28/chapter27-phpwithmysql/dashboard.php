<?php
session_start();
if(!isset($_SESSION['loggedin']) ||  $_SESSION['loggedin'] != true){
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>welcome to user dashboard, Mr. <?= $_SESSION['username'];?></h1>
    <a href="logout.php">Logout</a>
</body>
</html>