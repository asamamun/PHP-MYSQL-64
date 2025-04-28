<?php
// Basic Auth Example with Re-prompt

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
    send_auth_request();
} else {
    $username = $_SERVER['PHP_AUTH_USER'];
    $password = $_SERVER['PHP_AUTH_PW'];

    if ($username === 'admin' && $password === 'secret') {
        echo "Welcome, $username!";
        echo "<br>";
        ?>
    <a href="http://fakeuser:fakepass@localhost/ROUND64/PHP/PHP-MYSQL-64/classes/class23/auth-variables.php">Logout</a>
        <?php
    } else {
        // Wrong credentials: re-ask for login
        send_auth_request();
    }
}

function send_auth_request() {
    header('WWW-Authenticate: Basic realm="My Secure Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authentication required.';
    exit;
}
?>
