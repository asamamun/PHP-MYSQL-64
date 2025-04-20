<?php
$audio = $_FILES['audio'];
$language = $_POST['language'];
$genre = $_POST['genre'];

$dir = "assets/$language/$genre";
if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}

$filename = basename($audio['name']);
$target = "$dir/$filename";

if (move_uploaded_file($audio['tmp_name'], $target)) {
    $meta = fopen("metadata.txt", "a");
    fwrite($meta, "$filename|$language|$genre\n");
    fclose($meta);
    echo "File uploaded successfully.";
} else {
    echo "Upload failed.";
}
echo "<br><a href='index.html'>Back</a>";
?>