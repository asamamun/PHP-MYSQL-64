<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <select name="languages[]" multiple>
            <option value="csharp">C#</option>
            <option value="javascript" selected>JavaScript</option>
            <option value="perl">Perl</option>
            <option value="php" selected>PHP</option>
            <option value="python">Python</option>
            <option value="ruby">Ruby</option>

        </select>
        <hr>
        What's your favorite language?<br> (check all that 
apply):<br>
 <input type="checkbox" name="languages2[]" value="bangla">Bangla<br>
 <input type="checkbox" name="languages2[]" value="english">English<br>
 <input type="checkbox" name="languages2[]" value="hindi">Hindi<br>
 <input type="checkbox" name="languages2[]" value="jp">Japanese<br>
 <input type="checkbox" name="languages2[]" value="chinese">Chinese<br>

        <input type="submit">
    </form>
    <hr>
    <?php
    if (isset($_POST['languages'])) {
        $languages = $_POST['languages'];
        $languages2 = $_POST['languages2'];
        echo "<pre>";
        print_r($languages);
        echo "</pre>";
        echo "<pre>";
        print_r($languages2);
        echo "</pre>";
        echo "<h3>Selected languages:</h3>";
        foreach ($languages as $l) {
            echo $l . "<br>";
        }
        echo "<h3>Selected languages:</h3>";
        foreach ($languages2 as $l) {
            echo $l . "<br>";
        }
    }
    ?>
</body>

</html>