<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="02set-data-in-session.php">set another value in session</a> <br>
    <a href="04delete-data-from-session.php">delete data</a> <br>
    <a href="05store-all-data-from-session.php">Store all data</a> <br>
    <a href="06get-all-data-from-file-into-session.php">get data from file to session</a> <br>
    <?php
    echo "username from session: " . (isset($_SESSION['username'])?$_SESSION['username']:"no name in session");
    echo "<br>";
    echo "dob from session: " . (isset($_SESSION['dob'])?$_SESSION['dob']:"no dob in session");
    ?>
</body>
</html>