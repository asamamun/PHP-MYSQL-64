<?php
$path = "../../../classes/";

if (is_dir($path)) {
    if ($handle = opendir($path)) {
        echo "Contents of $path:<br><br>";

        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $fullPath = $path . DIRECTORY_SEPARATOR . $entry;

                if (is_file($fullPath)) {
                    echo "📄 $entry<br>";
                } elseif (is_dir($fullPath)) {
                    echo "📁 $entry<br>";
                } else {
                    echo "❓ $entry<br>";
                }
            }
        }

        closedir($handle);
    } else {
        echo "❌ Failed to open directory.";
    }
} else {
    echo "❌ Not a valid directory.";
}
?>
