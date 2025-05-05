<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST['name']) && isset($_POST['dob'])){
        $_SESSION['username'] = $_POST['name'];
        $_SESSION['dob'] = $_POST['dob'];
        echo "name set in session : ". $_POST['name'] . "<br>";
        echo "dob set in session : ". $_POST['dob'] . "<br>";
    }
    ?>
    <form action="02set-data-in-session.php" method="post">
        <label for="">Enter your name</label><input type="text" name="name"></label>
        <label for="">Enter your dob</label><input type="date" name="dob"></label>
        <input type="submit" value="Submit">
    </form>
    <a href="03get-data-from-session.php">see the session data in another page</a>
</body>
</html>