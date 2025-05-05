<?php
session_start();
$fh = fopen("session-data.txt", "w");
fwrite($fh, session_encode());
fclose($fh);
?>