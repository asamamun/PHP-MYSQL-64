<?php
// Configuration
$folderPath = '../../class28'; // Folder you want to zip
$zipFileName = 'my_folder.zip'; // Zip file name

// Create new ZipArchive
$zip = new ZipArchive();
if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
    exit("Failed to create zip file.\n");
}

// Function to recursively add files
function addFolderToZip($folder, $zip, $baseFolderLength) {
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($folder),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $file) {
        if (!$file->isDir()) {
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, $baseFolderLength + 1);
            $zip->addFile($filePath, $relativePath);
        }
    }
}

// Add folder contents
addFolderToZip($folderPath, $zip, strlen(realpath($folderPath)));
$zip->close();

// Send headers to force download
header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename="' . basename($zipFileName) . '"');
header('Content-Length: ' . filesize($zipFileName));

// Read and output the file
readfile($zipFileName);

// Optional: delete the zip after download
unlink($zipFileName);
exit;
?>