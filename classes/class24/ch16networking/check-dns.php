<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="domain" placeholder="Enter domain name">
        <input type="submit" value="Submit">
    </form>
    <?php
    if(isset($_POST['domain'])){
        $domain = $_POST['domain'];
        echo "<br>gethostbyname($domain): " . gethostbyname($domain) . "<br>";
        if (gethostbyname($domain) != $domain) {
            echo "Domain $domain exists. Not available";
        } else {
            echo "Domain $domain does not exist. so, it is available";
        }
        /* $result = checkdnsrr($domain, "A") || checkdnsrr($domain, "MX");
        if ($result == 1) {
            echo "Domain $domain is available";
        } else {
            echo "Domain $domain is not available";
        } */
    }        
    ?>
</body>
</html>