<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php //include "menu.php"; ?>
    <?php require "menu.php"; ?>
    <?php require "manu.php"; ?>
    <hr>
    <?php
    ini_set("date.timezone", 'Asia/Tokyo');
    echo date("Y-m-d H:i:s");
    ?>
</body>
</html>