<?php
// $dir = opendir("/");//root drive
$dir = opendir("./"); //current directory
/* echo readdir($dir);
echo "<br>";
echo readdir($dir);
echo "<br>";
echo readdir($dir);
echo "<br>";
echo readdir($dir);
echo "<br>";
echo readdir($dir);
echo "<br>"; */
while($file = readdir($dir)){
    if($file == "." || $file == "..") continue;
    echo is_file($file)? "File: " . $file . "<br>" : "Folder: " . $file . "<br>";
}
closedir($dir);
