<?php
if(isset($_POST['useremail']) && isset($_POST['password'])){
    session_start();
    $useremail = $_POST['useremail'];
    $password = $_POST['password'];
    $lines = file('users.txt', FILE_IGNORE_NEW_LINES);
    foreach($lines as $line){
        list($name, $tempemail,$temppassword) = explode(",",$line);
        if($useremail == trim($tempemail) && sha1($password) == trim($temppassword)){
            $_SESSION['username'] = $name;
            $_SESSION['useremail'] = $tempemail;
            $_SESSION['loggedin'] = true;
            header("location: admin/index.php");
            exit;
        }
    }
    $_SESSION['error'] = "Invalid username or password";

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="text-center">Login Form</h1>
    <?php
    if(isset($_SESSION['error'])){
        echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
        unset($_SESSION['error']);
    }
    ?>
    <form method="post">
        <div class="mb-3">
            <label for="useremail" class="form-label">User Email</label>
            <input type="text" class="form-control" id="useremail" name="useremail" required value="<?php echo isset($_POST['useremail']) ? $_POST['useremail'] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="register.php" class="btn btn-success">Register</a>
    </form>
</div>
</body>
</html>
