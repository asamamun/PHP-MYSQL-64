<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>

    </script>
    <style>

    </style>
</head>
<body>
    <h1>যেই পেজ এ পিএইচপি এর কোড আছে সেই পেজ এর এক্সটেনশন .php হবে</h1>
    <h1>Browser cannot understand the php code, browser will ignore the php code. It can only understand the html, css and js code.</h1>
    <h1>So, to run the php code we have to use php server, the PHP code will preprocess by the php server.</h1>
    <h2>
    <?php
    //server will preprocess the php code, client or users will not see the php code.
    $x = rand(1, 100) + rand(1, 100) + rand(1, 100);
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    echo "<marquee>total characters : " . strlen($characters)   . "</marquee>";
    $randomChar = $characters[random_int(0, strlen($characters) - 1)];

    echo "Hello World number " . $x;
    ?>
    <hr>
    </h2>
    <?php
    //server will preprocess the php code, client or users will not see the php code.
    echo "Goodbye number :  " . $characters[rand(0, strlen($characters) - 1)] . $characters[rand(0, strlen($characters) - 1)] . $characters[rand(0, strlen($characters) - 1)];
    ?>
</body>
</html>