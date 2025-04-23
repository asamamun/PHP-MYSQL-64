<?php echo DIRECTORY_SEPARATOR; ?>
<hr>
<?php
$p = "D:/xampp8240/htdocs";
$handler = opendir($p);
/* echo  readdir($handler) . "<br>";
echo readdir($handler) . "<br>";
echo readdir($handler) . "<br>";
echo readdir($handler) . "<br>";
echo readdir($handler) . "<br>";
echo readdir($handler) . "<br>";
echo readdir($handler) . "<br>";
echo readdir($handler) . "<br>";  */
while ($file = readdir($handler)) {
    if(is_file($p.DIRECTORY_SEPARATOR.$file))    echo "Filename: " . $file . "<br>";
    if(is_dir($p.DIRECTORY_SEPARATOR.$file))     echo "Directory: " . $file . "<br>";
}
closedir($handler);
?>