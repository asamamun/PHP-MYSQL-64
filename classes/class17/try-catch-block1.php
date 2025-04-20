<?php
// $file = fopen("message.txt", "r");
/* $file = fopen("E:\Bootstrap Project\poject-sathi\pakutia.htmll", "r");
$content = fread($file, filesize("E:\Bootstrap Project\poject-sathi\pakutia.htmll"));
echo "File Content: " . $content; */

try {
    $filePath = "E:\\Bootstrap Project\\poject-sathi\\pakutia.html";

    if (!file_exists($filePath)) {
        throw new Exception("File not found: $filePath");
    }

    $file = fopen($filePath, "r");
    if (!$file) {
        throw new Exception("Failed to open the file.");
    }

    $content = fread($file, filesize($filePath));
    echo "File Content: " . $content;

} catch (Exception $e) {
    echo "Oops! Error: " . $e->getMessage();

} finally {
    echo "<br>Done trying to read the file.";

    if (isset($file) && is_resource($file)) {
        fclose($file);
    }
}
?>
