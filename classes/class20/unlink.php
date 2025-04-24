<h3>unlink is used to delete a file</h3>
<?php
echo is_file("a.txt")? unlink("a.txt"): "File not found";
// unlink("a.txt");