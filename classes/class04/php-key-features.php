<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PHP Key Features: 4 P's</h1>
    <ul>
        <li>Practicality</li>
        <li>Power</li>
        <li>Possibility</li>
        <li>Price</li>
    </ul>
    <h1>PEAR: PHP Extension and Application Repository</h1>
    <h1>Today is: <?php echo date("Y-m-d"); ?></h1>
    <h1>Today is: <?php echo date("d/m/Y"); ?></h1>
    <h1>Today is: <?php echo date("d/m/Y H:i:s a"); ?></h1>
    <?php $name = "islamic development bank"; 
    echo "Original string: " . $name . "<br>";
    echo "Uppercase first(ucfirst): " . ucfirst($name) . "<br>";
    echo "Uppercase all(strtoupper): " . strtoupper($name) . "<br>";
    echo "Lowercase all(strtolower): " . strtolower($name) . "<br>";
    echo "Uppercase first word(ucwords): " . ucwords($name) . "<br>";
    ?>
</body>
</html>