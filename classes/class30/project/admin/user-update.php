<?php
require "admincheck.php";
require "../db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $conn->escape_string($_POST['name']) ?? '';
    $email = $_POST['email'] ?? '';
    $role = $_POST['role'] ?? '';
    $status = $_POST['status'] ?? '';
    $select = "SELECT role FROM users WHERE id = $id limit 1";
    $result = $conn->query($select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['role'] === 'admin' && $role === 'user') {
            $conn->close();
            $_SESSION['message'] = "You cannot set an admin to user";
            header("location: user-all.php");
            exit;
        }
    }
    $sql = "UPDATE users SET name = '$name', role = '$role', active = '$status' WHERE id = $id limit 1";
    $conn->query($sql);
    $conn->close();
    $_SESSION['message'] = "User updated successfully";
    header("location: user-all.php");
}