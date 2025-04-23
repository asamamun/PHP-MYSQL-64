<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .topics{
            /* three column */
            column-count: 3;
        }
    </style>
</head>
<body>
    <div class="topics">
    <h3>Retrieving a Path's Filename: basename</h3>
    <h3>Retrieving a Path's Directory: dirname</h3>
    <h3>Retrieving a Path's Extension: pathinfo</h3>
    <h3>Retrieving a Path's Realpath: realpath</h3>
    <h3>filesize:  in bytes </h3>
    <h3>float disk_free_space(string directory)</h3>
    <h3>float disk_total_space(string directory)</h3>
    <h3>opendir: </h3>
    <h3>readdir: </h3>
    <h3>closedir: </h3>
    <h3>is_dir: </h3>
    <h3>is_file: </h3>
    <h3>is_link: </h3>
    <h3>is_readable: </h3>
    <h3>is_writable: </h3>
    <h3>file_exists: </h3>
    <h3>file_get_contents: </h3>
    <h3>file_put_contents: </h3>
    <h3>fileatime: </h3>
    <h3>filectime: </h3>
    <h3>filemtime: </h3>
    <h3>fileowner: </h3>
    <h3>filegroup: </h3>
    <h3>fileperms: </h3>
    <h3>filetype: </h3>
    <h3>file: </h3>
    <h3>unlink: </h3>
    <h3>rename: </h3>
    <h3>copy: </h3>
    <h3>feof</h3>
    <h3>fgets</h3>
    <h3>fgetc</h3>
    <h3>fgets</h3>
    <h3>fgetcsv</h3>
    <h3>fopen</h3>
    <h3>fread</h3>
    <h3>fwrite</h3>
    <h3>fclose</h3>
    <h3>fflush</h3>
    <h3>readfile</h3>
    <h3>fscanf</h3>
    <h3>scandir</h3>
    <h3>rmdir</h3>
    <h3> <a href="mkdir.php" target="_blank">mkdir</a></h3>
    <h3>chdir</h3>
    <h3>chown</h3>
    <h3>chgrp</h3>
    <h3>chmod</h3>
    <h3>umask</h3>
    <h3>tempnam</h3>
    <h3>tmpfile</h3>
    <h3>getcwd</h3>
    <h3>touch</h3>
    <h3>escapeshellarg</h3>
    <h3>escapeshellcmd</h3>
    <h3>system</h3>
    <h3>exec</h3>
    </div>
    
    <?php
    //relative path
    $path = "../../class17/message.txt";
    echo "Original path:" . $path;
    echo "<br>";
    echo "File name:" . basename($path);
    echo "<br>";
    echo "Directory name:" . dirname($path);
    echo "<br> PathInfo Array:";
    echo "<pre>";
    var_dump( pathinfo($path));
    echo "</pre>";
    //relative path to absolute real path
    echo "Real path:" . realpath($path);
    echo "<br>";
    echo "File size:" . filesize($path) . " bytes";
    echo "<br>";
    echo "Free space in C:" . (disk_free_space("C:")) . " bytes";
    echo "<br>";
    echo "Free space in D:" . (disk_free_space("D:")) . " bytes";
    echo "<br>";
    echo "Free space in E:" . (disk_free_space("E:")) . " bytes";
    echo "<br>";
    echo "Free space:" . (disk_free_space(".")/(1024*1024*1024)) . " GB";
    echo "<br>";
    echo "Total space C:" . disk_total_space("C:") . " bytes";
    echo "<br>";
    echo "Total space D:" . disk_total_space("D:") . " bytes";
    echo "<br>";
    echo "Total space E:" . disk_total_space("E:") . " bytes";
    echo "<br>";
    ?>  
</body>
</html>