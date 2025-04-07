<a href="?cat=5&id=10">send cat=5 and id=10</a> |
<a href="?cat=10&id=5">send cat 10 and id 5</a> |
<a href="loop-foreach.php?a=5&name=IDB">loop foreach</a> |
<a href="check-referer.php">checking referer</a>
<hr>
<?php
echo $_SERVER['QUERY_STRING'];
echo "<br>";
echo "Category:" . ($_GET['cat']??"");
echo "<br>";
echo "ID: " . ($_GET['id']??"");
?>