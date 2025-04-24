<?php
$path = "F:/server-images/backup1745469678";

deleteFolder($path);
function deleteFolder($folderPath) {
    // Check if folder exists
    if (!is_dir($folderPath)) {
        echo "<p style='color:red;'>Folder not found: $folderPath</p>";
        return false;
    }

    // Get all files and folders inside
    $items = scandir($folderPath);
    foreach ($items as $item) {
        if ($item == '.' || $item == '..') continue;

        $fullPath = $folderPath . DIRECTORY_SEPARATOR . $item;

        if (is_dir($fullPath)) {
            // Recursively delete subfolder
            deleteFolder($fullPath);
        } else {
            // Delete file
            unlink($fullPath);
        }
    }

    // Remove the empty directory itself
    return rmdir($folderPath);
}


?>