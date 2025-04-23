<?php
if(!is_dir("prothomalo")) {
    mkdir("prothomalo", 0777, true);
}
$sitename = "https://www.prothomalo.com/";
$filename = "prothomalo/cache.html";
$lastModified = filemtime($filename);
$oneHour = 60;
if(time() - $lastModified < $oneHour) {
    echo "loaded within 60 seconds";
    echo "<br>";
    echo "Current Time: " . date("F d Y H:i:s.");
    echo "<br>";
    echo "last modified: " . date("F d Y H:i:s.", $lastModified);
    exit;
}
$data = file_get_contents($sitename);
file_put_contents($filename, $data);

