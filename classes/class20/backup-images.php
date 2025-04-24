<?php
$path = "E:/";
$destination = "F:/server-images/backup". time();
if(!is_dir($destination)) {
    mkdir($destination, 0777, true);
}

// List of image file extensions
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

function copyImages($source, $destination, $allowedExtensions) {
    // Try to read directory
    $items = @scandir($source);
    if ($items === false) {
        echo "<p style='color:red;'>Cannot access: $source</p>";
        return;
    }

    foreach ($items as $item) {
        if ($item == '.' || $item == '..') continue;

        $fullSourcePath = $source . '/' . $item;

        // If it's a directory, recurse
        if (is_dir($fullSourcePath)) {
            copyImages($fullSourcePath, $destination, $allowedExtensions);
        } elseif (is_file($fullSourcePath)) {
            $ext = strtolower(pathinfo($fullSourcePath, PATHINFO_EXTENSION));
            if (in_array($ext, $allowedExtensions)) {
                // Copy image to destination
                $filename = basename($fullSourcePath);
                $destPath = rtrim($destination, '/\\') . '/' . $filename;

                if (copy($fullSourcePath, $destPath)) {
                    echo "<p>Copied: $filename</p>";
                } else {
                    echo "<p style='color:red;'>Failed to copy: $filename</p>";
                }
            }
        }
    }
}

copyImages($path, $destination, $allowedExtensions);
?>
