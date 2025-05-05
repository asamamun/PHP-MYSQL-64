<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //dns_get_record()
    $domain = 'mzamin.com';
    $result = dns_get_record($domain, DNS_A);
    print_r($result);
    ?>
</body>
</html>