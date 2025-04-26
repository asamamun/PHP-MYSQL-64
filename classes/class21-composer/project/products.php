<?php
require __DIR__ . '/vendor/autoload.php';

use App\classes\Products;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $p = new Products();
    echo $p->index();
    ?>  
</body>
</html>