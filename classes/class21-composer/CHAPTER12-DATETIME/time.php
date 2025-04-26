<?php
// ini_set("default_timezone_set","Asia/Tokyo");
//Correct function is date_default_timezone_set() - you had default_timezone_set
date_default_timezone_set("Asia/Tokyo");
echo time();
echo "<br>";
echo date("U");
echo "<br>";
//1745647388
echo date("Y-m-d H:i:s",174);