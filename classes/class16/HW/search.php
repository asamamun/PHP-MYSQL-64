<?php
$query = strtolower($_GET['query']);
$found = false;

if (!file_exists("metadata.txt")) {
    echo "No files available.";
    return;
}

$lines = file("metadata.txt");
foreach ($lines as $line) {
    list($filename, $language, $genre) = explode("|", trim($line));
    if (strpos(strtolower($filename), $query) !== false) {
        $filepath = "assets/$language/$genre/$filename";
        echo "<div>
            <p><strong>$filename</strong> [$language / $genre]</p>
            <audio controls src='$filepath'></audio><br>
            <a href='delete.php?filename=$filename&language=$language&genre=$genre'>Delete</a>
        </div><hr>";
        $found = true;
    }
}
if (!$found) {
    echo "No matching audio found.";
}
echo "<br><a href='index.html'>Back</a>";
?>