<?php

// Step 1: Generate 10MB of random A–Z, a–z characters
$length = 10 * 1024 * 1024; // 10 MB
$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charCount = strlen($chars);

$randomText = '';
for ($i = 0; $i < $length; $i++) {
    $randomText .= $chars[random_int(0, $charCount - 1)];
}

// Step 2: Save original file
file_put_contents('original.txt', $randomText);

// Step 3: Compress using gzcompress()
$compressed = gzcompress($randomText);

// Step 4: Save compressed file
file_put_contents('compressed.txt.gz', $compressed);

// Step 5: Get sizes and calculate compression ratio
$originalSize = strlen($randomText);         // in bytes
$compressedSize = strlen($compressed);       // in bytes
$compressionRatio = $compressedSize / $originalSize;

echo "Original size: " . number_format($originalSize) . " bytes\n";
echo "Compressed size: " . number_format($compressedSize) . " bytes\n";
echo "Compression ratio: " . round($compressionRatio * 100, 2) . "%\n";
echo "Compression saved: " . round((1 - $compressionRatio) * 100, 2) . "%\n";
