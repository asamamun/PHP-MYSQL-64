<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>HTTP is a stateless protocol</h1>
    <h3>to make http stateful we use sessions or cookies or tokens or local storage</h3>
    <h1><mark> to use session in php every page need to start with session_start()</mark></h1>
    <h1><mark>to store data in session we use $_SESSION['varname'] = 'value'</mark></h1>
    <h1><mark>to get data from session in any page we use $value = $_SESSION['varname']</mark></h1>
    <h1><mark>to delete data from session we use unset($_SESSION['varname'])</mark></h1>
    <h1><mark>to delete all data from session we use session_destroy()</mark></h1>
    <h1><mark>to see the session id we use session_id() : <?php echo session_id() ?></mark></h1>
    <h1><mark>to store all session data in a string we use session_encode()</mark></h1>
    <h1><mark>to get all session data from string we use session_decode()</mark></h1>
</body>
</html>