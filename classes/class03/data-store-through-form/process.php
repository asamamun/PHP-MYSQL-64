<?php
if(isset($_GET['submit'])) {
    $name = $_GET['name'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    $position = $_GET['position'];
    $gender = $_GET['gender'];
    $message = "Name: $name,Email: $email , Password: $password, Position: $position, Gender: $gender";
    //write to a file in CSV format
    $fh = fopen('data.csv', 'a');
    fwrite($fh, $message . "\n");
    fclose($fh);
    header("Location: result.php?message=data stored successfully!");
}
?>