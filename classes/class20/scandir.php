<?php
$allfilesfolders = scandir("./");
foreach ($allfilesfolders as $key => $value) {
    if($value == "." || $value == "..") continue;
    echo is_file($value)? "File: " . $value . "<br>" : "Folder: " . $value . "<br>";    
}