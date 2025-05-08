<?php
/* require "admincheck.php";
require "../db.php";
$id = $_GET['id'];
$sql = "delete from users where id=$id";
$conn->query($sql);
if($conn->affected_rows){
    $conn->close();
    $_SESSION['message'] = "User deleted successfully";
    header("location: user-all.php");
} */

require "admincheck.php";
require "../db.php";

$id = intval($_GET['id']); // Sanitize input

// First, check the role of the user
$checkRoleSql = "SELECT role FROM users WHERE id = $id LIMIT 1";
$result = $conn->query($checkRoleSql);

if ($result->num_rows) {
    $row = $result->fetch_assoc();
    
    if ($row['role'] === 'admin') {
        $conn->close();
        $_SESSION['message'] = "Admin user cannot be deleted";
        header("location: user-all.php");
        exit;
    } else {
        // Safe to delete
        $deleteSql = "DELETE FROM users WHERE id = $id limit 1";
        $conn->query($deleteSql);
        
        if ($conn->affected_rows) {
            $_SESSION['message'] = "User deleted successfully";
        } else {
            $_SESSION['message'] = "Deletion failed or user not found";
        }
    }
} else {
    $_SESSION['message'] = "User not found";
}

$conn->close();
header("location: user-all.php");
exit;
?>

?>