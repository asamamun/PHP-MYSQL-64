<?php
//database connection in $conn variable
$hostname = "localhost";
$dbusername = "root";
$dbpassword = "";
$database = "r64_php";
$conn = new mysqli($hostname, $dbusername, $dbpassword, $database) or die("Connection Failed");
$conn->set_charset("utf8mb4");
if($conn->connect_error){
    die("Connection Failed".$conn->connect_error);
}
?>