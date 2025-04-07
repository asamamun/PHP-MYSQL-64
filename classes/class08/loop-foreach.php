<?php
include "country-array.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div#country{
            display: flex;
            flex-wrap: wrap;
        }
        div#country div{
            display: flex;
            width: 200px;
            height: 100px;
            border: 1px solid #000;
            margin: 5px;
            align-items: center;
            justify-content: center;
            font-size: 1.2em;
            color: red;
        }
        .highlight{
            color: green;
            text-transform: uppercase;
            font-size: 1.2em;
            padding: 10px;
            background-color: #cccccc;
            text-align: center;
            transition: all 0.3s ease-in-out;
        }
        .highlight:hover{
            scale: 1.4;
        }
    </style>
</head>
<body>
<h3>In PHP, the => operator used in arrays is called the "double arrow operator" or sometimes the "associative array operator."</h3>
<h3 class="highlight">foreach loop in php works well with associative array</h3>
<div id="country">
<?php
foreach ($countries as $i => $v) {
    echo "<div>$i => $v</div>";
}
?>
</div>
<hr>
<?php
echo "<br> <h3 class='highlight'>\$_SERVER array contains information about the current request and response</h3>";
foreach ($_SERVER as $k => $v) {
    echo "KEY: $k => VALUE:  $v <br>";
}
?>
</body>
</html>
