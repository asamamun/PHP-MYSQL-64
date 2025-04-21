<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="mkdir.php?action=create">Create 500 directories inside testdir</a> |   
<a href="mkdir.php?action=delete">Delete all directories</a>

<form action="mkdir.php">
    <input type="hidden" name="action" value="student">
    <input type="text" name="name" id="" placeholder="student name">
    <input type="submit" value="Submit">
</form>
    <?php
    if(isset($_GET["action"]) && $_GET["action"] == "student"){
        $name = $_GET["name"];
        if(!is_dir("student/$name"))
        mkdir("student/$name", 0777, true);
        header("Location: mkdir.php");
    }

    if(isset($_GET["action"]) && $_GET["action"] == "delete"){
        $files = glob("testdir/*");
        foreach($files as $file){
            if(is_dir($file)){
                rmdir($file);
            }
        }
        rmdir("testdir");
        header("Location: mkdir.php");
    }
    ?>
    <?php
    //create a directory
    if(isset($_GET["action"]) && $_GET["action"] == "create"){
    if(!is_dir("testdir")){
        mkdir("testdir", 0777, true);
    }
    //create 500 directories
    for($i = 1; $i <= 500; $i++){
        if(!is_dir("testdir/subdir$i"))
        mkdir("testdir/subdir$i", 0777, true);
    }
}
    ?>
    
</body>
</html>