<?php
include "country-array.php";
echo count($countries);
echo "<br>";
//get array keys and values in for loop
//get only the array keys
$keys = array_keys($countries);
//get only the array values
$values = array_values($countries);
var_dump($keys);
var_dump($values);
//[0]=>string(2) "AF" [1]=> string(2) "AX"
for ($i = 0; $i < count($keys); $i++) {
    echo $keys[$i] . " => " . $countries[$keys[$i]] . "<br>";
}
?>
