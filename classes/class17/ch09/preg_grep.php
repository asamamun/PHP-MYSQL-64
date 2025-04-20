<h1>preg_grep can be used to search for pattern and return the matching result</h1>
<?php
require "./countryList.php";

$pattern = "/y/i";

$result = preg_grep($pattern, $countryList);

print_r($result);