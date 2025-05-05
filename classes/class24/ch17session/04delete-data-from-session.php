<?php
session_start();
unset($_SESSION['username']);
session_destroy();
header("location: 03get-data-from-session.php");
?>