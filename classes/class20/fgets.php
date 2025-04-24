<h3>Reads a line from a file and move the cursor to the next line</h3>
<?php
$fh = fopen("users.txt", "r");
/* echo fgets($fh);
echo "<br>";
echo fgets($fh);
echo "<br>"; */
while ($line = fgets($fh)) {
    echo $line;
    echo "<br>";
}