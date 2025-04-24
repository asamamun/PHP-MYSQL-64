<h1>fscanf function in php is used to read data from a file in specific format</h1>
<?php
$fh = fopen("users.txt", "r");
// $info = fscanf($fh, "%d  | %s | %d | %d");
// $info = fscanf($fh, "%d | %s | %s| %d\n");
$info = fscanf($fh, "%d|%[^|]|%[^|]|%d");
var_dump($info);
list($id, $name, $email, $phone) = $info;
echo "ID: $id <br>";
echo "Name: $name <br>";
echo "Email: $email <br>";
echo "Phone: $phone <br>";
fclose($fh);
?>