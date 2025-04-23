<?php require "class.FileUtils.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
<form method="post">
    <label for="path">Enter file path:</label>
    <input type="text" name="path" required>
    <input type="submit" value="Submit">
</form>
<hr>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['path'])) {
    $path = $_POST['path'];
    // echo "Path submitted: " . htmlspecialchars($path);
    if(file_exists($path)){
        $size = FileUtils::calculateDirectorySize($path);
        echo "Directory size:" . round($size/(1024*1024) , 2) . "MB";
        echo "<br>";
    }
}
?>

    <?php
/* $path = "2025-Calendar-Bangladesh-with-Govt.-Holidays.jpg";

if(file_exists($path)){
    $size = filesize($path);
    echo "File size:" . $size;
    echo "<br>";
} */
?>
<hr>
<?php
// $path = "D:/xampp8240/htdocs/ROUND64/";
/* var_dump( glob($path . "/*") );
exit; */
//find directory size


?>
</body>
</html>