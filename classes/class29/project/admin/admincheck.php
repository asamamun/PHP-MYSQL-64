<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {    
    header("Location: ../login.php");
    exit;
}
if($_SESSION['role'] != "admin"){
    header("Location: ../index.php");
    exit;
}
?>