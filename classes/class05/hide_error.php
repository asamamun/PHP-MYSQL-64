<?php
ini_set("display_errors", 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>in development mode display_errors is 1</h1>
    <h1>in production mode display_errors is 0</h1>
    <?php //include "manu.php"; ?>
    <?php require "manu.php"; ?>
    <hr>
    <?php
    echo date("Y-m-d H:i:s");
    ?>
</body>
</html>