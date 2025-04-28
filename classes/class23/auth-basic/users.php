<?php
// users.php - fake database

// This simulates stored users with hashed passwords
$users = [
    'admin' => password_hash('secret123', PASSWORD_DEFAULT),
    'john' => password_hash('mypassword', PASSWORD_DEFAULT),
    'mamun'=> password_hash('mamun12345', PASSWORD_DEFAULT)
];
?>
