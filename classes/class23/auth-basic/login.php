<?php
session_start();
require 'users.php'; // Include our fake users

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (isset($users[$username])) {
        if (password_verify($password, $users[$username])) {
            // Password correct
            $_SESSION['username'] = $username;
            header("Location: welcome.php");
            exit;
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Username does not exist.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login Form</h2>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>

</body>
</html>
