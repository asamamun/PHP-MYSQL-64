<?php
echo "DIR: " .  __DIR__ . "<br>";
echo "FILE: " . __FILE__ . "<br>";
echo "LINE: " . __LINE__ . "<br>";
echo "METHOD: " . __METHOD__ . "<br>";
echo "NAMESPACE: " . __NAMESPACE__ . "<br>";
echo "TRAIT: " . __TRAIT__ . "<br>";
echo "FUNCTION: " . __FUNCTION__ . "<br>";
echo "CLASS: " . __CLASS__ . "<br>";
echo "TRAIT: " . __TRAIT__ . "<br>";
echo "FILE_APPEND: " . FILE_APPEND . "<br>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Constant</th>
            <th>Value</th>
        </tr>
        <?php
        $constants = get_defined_constants(true);
        foreach ($constants as $key => $value) {
            echo "<tr><td>$key</td><td>";
            if (is_array($value)) {
                echo implode(", ", $value);
            } else {
                echo $value;
            }
            echo "</td></tr>";
        }
        ?>
    </table>
</body>
</html>

