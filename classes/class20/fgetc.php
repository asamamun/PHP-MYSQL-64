<h3>fgetc: Reads a single character from a file and returns it and move the file pointer to the next character</h3>
<?php
$fh = fopen("users.txt", "r");
echo fgetc($fh);
echo "<br>";
echo fgetc($fh);
echo "<br>";
echo fgetc($fh);
echo "<br>";