<pre>
🕒 filemtime() : File Modified Time
Returns: The timestamp of the last content modification.

This is the time when the file's contents were last changed.

It does not change if you only change permissions or move the file without editing it.

Example use case:
echo "Last modified: " . date("F d Y H:i:s.", filemtime("file.txt"));
🕕 filectime() : Change Time (NOT Creation Time on Unix!)
On Unix/Linux: This is the time when the file's inode was last changed.

Includes changes to permissions, ownership, and sometimes moving or renaming the file.

Not the file creation time.

On Windows: filectime() does return the file creation time, which causes the confusion.

Example use case:
echo "Change time (or creation on Windows): " . date("F d Y H:i:s.", filectime("file.txt"));
</pre>
<?php
$file = "mkdir_example.php";

if (file_exists($file)) {
    $accessTime = fileatime($file);//returns timestamp
    $modificationTime = filemtime($file);//returns timestamp
    $changeTime = filectime($file);//returns timestamp

    echo "Access Time: " . date("Y-m-d H:i:s", $accessTime) . "<br>";
    echo "Modification Time: " . date("Y-m-d H:i:s", $modificationTime) . "<br>";
    echo "Change Time: " . date("Y-m-d H:i:s", $changeTime) . "<br>";
}