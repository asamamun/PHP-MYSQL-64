<?php
session_start();
$fh = fopen("session-data.txt", "r");
session_decode(fread($fh, filesize("session-data.txt")));
fclose($fh);
// session_decode('username|s:3:"IDB";dob|s:10:"2025-04-28";');
header("location: 03get-data-from-session.php");
?>