<?php
var_dump($_GET);
echo "<hr>";
$c = $_GET['cat'];
$id = $_GET['id'];

echo "You passed cat: " . $c . " and id: " . $id;