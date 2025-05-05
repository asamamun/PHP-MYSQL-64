<?php
 // Which server to ping?
 $server = "www.w3schools.com";
 // Ping the server how many times?
 $count = 6;
 // Perform the task
 echo "<pre>";
//  system("ping -c {$count} {$server}");//for linux/ios
 system("ping -n {$count} {$server}");//for windows
 echo "</pre>";
?>