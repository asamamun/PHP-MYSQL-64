<?php
$o = 0755;// it is in octal(0)
$oo = 0o755;// it is in octal(0o)
$b = 0b111;// binary(0b)
$hexa = 0xdead;
$e = 8.7e4; // 8.7 x 10000 
echo $o . "<br>";
echo $oo . "<br>";
echo $b . "<br>";
echo $hexa . "<br>";
echo $e . "<br>";
$a = "123";
$b = "456";
echo $a + $b . "<br>";
// to add, javascript personally change the data type of variables  a and b to number for a short time, but originally they are string type. this automatic short time type conversion by javascript itself is called type juggling.
