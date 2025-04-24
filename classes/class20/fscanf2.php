<?php
$fh = fopen("phoneno.txt", "r");
/* $phone = fscanf($fh, "%d-%d-%d");
list($countrycode,$operator,$number) = $phone;
echo "Country Code: $countrycode <br>";
echo "Operator: $operator <br>";
echo "Number: $number <br>";
$phone = fscanf($fh, "%d-%d-%d");
list($countrycode,$operator,$number) = $phone;
echo "Country Code: $countrycode <br>";
echo "Operator: $operator <br>";
echo "Number: $number <br>";
var_dump($phone); */
while($phone = fscanf($fh, "%d-%d-%d")){
    list($countrycode,$operator,$number) = $phone;
    echo "Country Code: $countrycode <br>";
    echo "Operator: $operator <br>";
    echo "Number: $number <br>";
}
fclose($fh);
?>