<?php
$filename = $_GET['filename'];
$language = $_GET['language'];
$genre = $_GET['genre'];

$path = "assets/$language/$genre/$filename";

if (file_exists($path)) {
    unlink($path);
    $lines = file("metadata.txt");
    $new_lines = array_filter($lines, function($line) use ($filename) {
        return strpos($line, $filename) === false;
    });
    file_put_contents("metadata.txt", implode("", $new_lines));
    echo "File deleted.";
} else {
    echo "File not found.";
}
echo "<br><a href='index.html'>Back</a>";
?>