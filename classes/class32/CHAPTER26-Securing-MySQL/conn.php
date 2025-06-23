<?php
$conn = new mysqli("localhost", "round64", "R64", "r64_php");
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from users";
$result = $conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "ID: " . $row['id'] . " , Name: " . $row['name'] . " , Email: " . $row['email'] . " , Phone: " . $row['phone'] . " , Role: " . $row['role'];
        echo "<br>";
    }
}
