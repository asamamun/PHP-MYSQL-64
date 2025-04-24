<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>show all images in my project</h1>
    <?php
$path = "/";

function scanforimages($path){
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    // Try to scan directory, suppress warning and check for failure
    $allfilesfolders = @scandir($path);
    if ($allfilesfolders === false) {
        // Optional: log or display which folder failed
        echo "<p style='color:red;'>Cannot access: $path</p>";
        return;
    }

    foreach ($allfilesfolders as $value) {
        if ($value == "." || $value == "..") continue;

        $fullPath = $path . $value;

        if (is_file($fullPath)) {
            $ext = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
            if (in_array($ext, $allowedExtensions)) {
                echo "<img src='" . $fullPath . "' alt='' style='max-width:200px;'>";
            }
        } elseif (is_dir($fullPath)) {
            scanforimages($fullPath . '/'); // Recurse into subdirectories
        }
    }
}

scanforimages($path);
?>


</body>
</html>