<?php
// Check if the username and password are provided in the HTTP request (i.e. from the browser after the login prompt)
if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {

    // If credentials are provided, display the username and password (not recommended for production)
    echo "Username: " . $_SERVER['PHP_AUTH_USER'] . "<br>";
    echo "Password: " . $_SERVER['PHP_AUTH_PW'] . "<br>";
    echo "<a href='http://nouser:nopass@localhost/ROUND64/PHP/PHP-MYSQL-64/classes/class23/auth-variable.php'>reset</a>";

} else {
    // If credentials are not provided, ask the user to authenticate
    header('WWW-Authenticate: Basic realm="My Secure Area"'); 
    header('HTTP/1.0 401 Unauthorized');  // Return a 401 Unauthorized status to the browser
    echo "Authentication required to access this page.";
}
?>
