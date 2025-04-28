<?php
$pass = "dolandtrump";
echo "Original Password: " . $pass;
echo "<br>";
echo "MD5: " . md5($pass) . ", length: " . strlen(md5($pass));
echo "<br>";
echo "SHA1: " . sha1($pass) . ", length: " . strlen(sha1($pass));
echo "<br>";
echo "SHA256: " . hash("sha256", $pass) . ", length: " . strlen(hash("sha256", $pass));
echo "<br>";
echo "SHA512: " . hash("sha512", $pass). ", length: " . strlen(hash("sha512", $pass));
echo "<br>";