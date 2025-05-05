<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files array</title>
</head>
<body>
    <h3>$_FILES array</h3>
    <ul>
        <li>name : the name of the uploaded file</li>
        <li>full_path: the full path to the uploaded file</li>
        <li>type: the type of the uploaded file</li>
        <li>tmp_name: the temporary name of the uploaded file</li>
        <li>error: the error code</li>
        <li>size: the size of the uploaded file in bytes</li>

    </ul>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- <input type="file" name="files[]" multiple> -->
         <label for="homework">Upload</label>
         <input type="file" name="homework" id="homework" required>
         <input type="submit" value="Upload">
    </form>

    <?php
    /*
name : ChatGPT Image Apr 12, 2025, 12_10_13 PM.png
full_path : ChatGPT Image Apr 12, 2025, 12_10_13 PM.png
type : image/png
tmp_name : D:\xampp8240\tmp\php2D21.tmp
error : 0
size : 1993201
    */
    if(isset($_FILES['homework'])) {
        $imagetypes = ['image/jpeg', 'image/png', 'image/gif','image/webp'];
        $files = $_FILES['homework'];
        print_r($files);
        echo "<br>";
        foreach ($files as $key => $value) {
            echo "$key : $value <br>";
        }
        if($files['error'] == 0) {
            move_uploaded_file($files['tmp_name'], "files/" . time() . '-' . $files['name']);
        }
    }
    ?>
</body>
</html>