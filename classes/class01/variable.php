<h1>in double quotes variable will be treated as variables</h1>
<h1>in single quotes variable will be treated as string</h1>
<?php
$txt = "W3Schools.com";
var_dump($txt);
echo "I love $txt!";//in double quotes variable will be treated as variables
?>
<hr>
<?php
echo "I love" .  $txt . "!";
?>
<hr>
<?php
echo 'I love $txt!<hr>';// in single quotes variable will be treated as string
?>
<hr>