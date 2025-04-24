<h3>fread is used to read a file</h3>
<?php
$fh = fopen("users.txt", "r");
echo fread($fh, filesize("users.txt"));
fclose($fh);
?>