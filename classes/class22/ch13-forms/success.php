<?php
session_start();
if (!isset($_SESSION['_token'])) {
    header("Location: http://192.168.54.81/ROUND64/PHP/PHP-MYSQL-64/classes/class22/ch13-forms/form.php");
    exit;
}

if (!hash_equals($_SESSION['_token'], $_POST['_token'])) {
    header("Location: http://192.168.54.81/ROUND64/PHP/PHP-MYSQL-64/classes/class22/ch13-forms/form.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
<?php
// echo $_SERVER['REQUEST_METHOD'];
// exit;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    //use proper validation and security and sanitize user inputs
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $password2 = $_POST['password2'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $error = [];
    if (empty($name)) {
        $error['name'] = "Name is required";
    }
    if (empty($email)) {
        $error['email'] = "Email is required";
    }
    if (empty($password)) {
        $error['password'] = "Password is required";
    }
    if (empty($password)) {
        $error['password2'] = "Password is required";
    }
    if (!empty($password) && !empty($password2) && strcmp($password, $password2) !== 0) {
        $error['password_match'] = "Passwords do not match";
    }

    if (empty($mobile)) {
        $error['mobile'] = "Mobile is required";
    }
    if (count($error) > 0) {
        foreach ($error as $key => $value) {
            echo "<p class='text-danger'>$key: $value</p>";
        }
    }
    else{
        // Save user data to users.txt
        $userData = "$name, $email, ".sha1($password).", $mobile\n";
        file_put_contents('users.txt', $userData, FILE_APPEND);

        // register the user to database
        header("Location: form.php?message=Registration successful!");
    }
}
?>
</body>
</html>

