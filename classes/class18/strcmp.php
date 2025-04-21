<h1>we can use strcmp to compare two strings. such as password and retype password. if they are same then strcmp will return 0</h1>
<?php
$str1 = "abc@gmail.com";
$str2 = "ABC@gmail.com";
echo strcmp($str1, $str2); // -6
echo "<br>";
echo strcasecmp($str1, $str2); // -6