<?php
if(isset($_POST['useremail']) && isset($_POST['password'])){
    if($_POST['useremail'] == "admin@idb.com" && $_POST['password'] == "secret"){
        $message = "login ok";
    }
    else{
        $message = "login failed";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <?= $message ?? "" ?>
    <?php echo  $message ?? "" ?>
    <form action="" method="post">
        <label for="useremail">User Email:</label>
        <input type="email" name="useremail" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
