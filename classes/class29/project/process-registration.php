<?php
session_start();
require "db.php";// you have now $conn variable

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name =$conn->escape_string($_POST['name']) ?? '';
    $email = $conn->escape_string($_POST['email']) ?? '';
    $phone = $conn->escape_string($_POST['phone']) ?? '';
    $password = $_POST['password'] ?? '';
  
    //check if the email is already in Table or not
    $select = "select id from users where email='$email'";
    $result = $conn->query($select);

    if($result->num_rows > 0) {
        $conn->close(); // Close before redirection
        $_SESSION['message'] = "Email already exists";
        header("location: registration.php");
        exit;
    }

$hash = password_hash($password, PASSWORD_DEFAULT);
$sql = "insert into users(name, email, phone, password, active) values ('$name', '$email', '$phone', '$hash', 1)";
// echo $sql;

try {
    $conn->query($sql);
} catch (\Throwable $th) {
    echo $th->getMessage();
}


if($conn->affected_rows > 0) {
    $conn->close(); // Close before redirection
    $_SESSION['message'] = "Registration successful";
    header("location: registration.php");
    exit;
}
}   


?>