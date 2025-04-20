<?php
if (!file_exists("metadata.txt")) {
    echo "<p>No files uploaded yet.</p>";
    return;
}

$lines = file("metadata.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($lines as $line) {
    $line = trim($line);
    if ($line === '') continue;

    $parts = explode("|", $line);
    if (count($parts) < 3) continue;

    $filename = trim($parts[0]);
    $language = trim($parts[1]);
    $genre = trim($parts[2]);

    $filepath = "assets/$language/$genre/$filename";
    if (!file_exists($filepath)) {
        echo "<p style='color:orange;'>Missing file for metadata entry: <code>$filename</code> in <code>$language/$genre</code></p>";
        continue;
    }

    echo "<div>
        <p><strong>" . htmlspecialchars($filename) . "</strong> [$language / $genre]</p>
        <audio controls src='$filepath'></audio><br>
        <a href='delete.php?filename=" . urlencode($filename) . "&language=" . urlencode($language) . "&genre=" . urlencode($genre) . "'>Delete</a>
    </div><hr>";
}
?>
