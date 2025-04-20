<h1>preg_split()</h1>
<?php

$string = 'The quick brown fox jumped over the lazy dog. another quick brown fox';

$result = preg_split('/\s+/', $string);
echo "<pre>";
var_dump($result);
echo "</pre>";
?>
<hr>
<?php
$string = 'apple, banana; cherry orange';
$string2 = 'apple, banana, cherry, orange';
$result = preg_split('/[,\s;]+/', $string);
// $result = preg_split('/[abc]+/', $string);
print_r($result);
echo "<br>";
$parts = explode(',', $string2);
var_dump($parts);
?>
