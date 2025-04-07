<a href="?cat=men">MEN</a> | 
<a href="?cat=women">WOMEN</a> |
<a href="?cat=kids">KIDS</a> | 
<a href="?cat=none">ALL</a> <hr>
<?php
$cat = $_GET['cat'] ?? "none";
switch ($cat) {
    case "men":
        echo "showing mens products";
        break;
    case "women":
        echo "showing women products";
        break;
    case "kids":
        echo "showing kids products";
        break;
    default:
        echo "showing all products";
        break;
}