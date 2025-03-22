<form action="file_get_contents.php" method="get">
<input type="text" name="news">
<input type="submit" value="Submit">
</form>
<hr>
<?php
var_dump($_GET);
//https://mzamin.com/news.php?news=153255
// $newsid = 153256;
//you can get the news id from the url by using $_GET
$newsid = $_GET['news'] ?? 153252;
// echo $newsid;
$fulllink = "https://mzamin.com/news.php?news={$newsid}";
// https://mzamin.com/news.php?news=153256#
echo file_get_contents($fulllink);
/* $s = file_get_contents("https://www.w3schools.com/");
echo $s; */
?>
