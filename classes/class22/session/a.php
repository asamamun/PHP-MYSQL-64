<a href="a.php?name=John">John</a> |
<a href="a.php?name=Jane">Jane</a> |
<a href="a.php?name=Rahim">Rahim</a> |
<a href="a.php?name=Karim">Karim</a> |
<a href="a.php">Guest</a>
<hr>
<a href="b.php">go to b.php</a>

<?php
session_start();
$name = $_GET['name']??"Guest";
$_SESSION['name'] = $name;