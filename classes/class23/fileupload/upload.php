<?php
/*
// upload.php (PHP part for handling the upload)

// Set the target directory where files will be uploaded
$targetDirectory = "files/";

// Check if the form is submitted and a file is uploaded
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    // Get file details
    $file = $_FILES['file'];
    $fileName = $file['name']; // Original name of the file
    $fileTmpName = $file['tmp_name']; // Temporary location of the file
    $fileSize = $file['size']; // Size of the file
    $fileError = $file['error']; // Any error encountered during upload
    $fileType = $file['type']; // MIME type of the file

    // Define allowed file types (optional)
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf', 'text/plain', 'application/msword'];

    // Check if there was an error during the file upload
    if ($fileError === 0) {
        // Check if the file type is allowed (optional)
        if (in_array($fileType, $allowedTypes)) {
            // Create a unique name for the file to avoid overwriting
            $uniqueFileName = uniqid('', true) . '-' . basename($fileName);
            $targetFilePath = $targetDirectory . $uniqueFileName;

            // Check the file size (optional, e.g., limit to 10MB)
            if ($fileSize <= 10 * 1024 * 1024) { // 10MB
                // Move the uploaded file to the target directory
                if (move_uploaded_file($fileTmpName, $targetFilePath)) {
                    echo "File uploaded successfully: " . $uniqueFileName;
                } else {
                    echo "Error uploading the file.";
                }
            } else {
                echo "File is too large. Maximum allowed size is 10MB.";
            }
        } else {
            echo "File type is not allowed. Only images and PDFs are allowed.";
        }
    } else {
        echo "Error during file upload. Error code: " . $fileError;
    }
}
    */
// upload.php (PHP part for handling the upload)

// Set the target directory where files will be uploaded
$targetDirectory = "files/";

// Check if the form is submitted and a file is uploaded
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    // Get file details
    $file = $_FILES['file'];
    $fileName = $file['name']; // Original name of the file
    $fileTmpName = $file['tmp_name']; // Temporary location of the file
    $fileSize = $file['size']; // Size of the file
    $fileError = $file['error']; // Any error encountered during upload
    $fileType = $file['type']; // MIME type of the file

    // Check if there was an error during the file upload
    if ($fileError === 0) {
        // Generate a unique name for the file to avoid overwriting
        $uniqueFileName = uniqid('', true) . '-' . basename($fileName);
        $targetFilePath = $targetDirectory . $uniqueFileName;

        // Check the file size (optional, e.g., limit to 10MB)
        if ($fileSize <= 10 * 1024 * 1024) { // 10MB
            // Move the uploaded file to the target directory
            if (move_uploaded_file($fileTmpName, $targetFilePath)) {
                echo "File uploaded successfully: " . $uniqueFileName;
            } else {
                echo "Error uploading the file.";
            }
        } else {
            echo "File is too large. Maximum allowed size is 10MB.";
        }
    } else {
        echo "Error during file upload. Error code: " . $fileError;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <h1>Upload a File</h1>
    <p>if your form has input file then enctype="multipart/form-data" attribute is must</p>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="file">Choose a file to upload:</label>
        <input type="file" name="file" id="file" required>
        <br><br>
        <input type="submit" value="Upload File">
    </form>
</body>
</html>
