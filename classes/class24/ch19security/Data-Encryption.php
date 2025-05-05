<?php
//hash function
$text = "IDB";
echo "Original : " . $text . "<br>";
echo "MD5 : " . hash("md5",$text) . "<br>";
echo "SHA1 : " . hash("sha1",$text) . "<br>";
echo "SHA256 : " . hash("sha256",$text) . "<br>";
echo "SHA512 : " . hash("sha512",$text) . "<br>";
echo "Argon2i : " . password_hash($text, PASSWORD_ARGON2I) . "<br>";
echo "Argon2id : " . password_hash($text, PASSWORD_ARGON2ID) . "<br>";
echo "Bcrypt : " . password_hash($text, PASSWORD_BCRYPT) . "<br>";
echo "password hash default : " . password_hash($text, PASSWORD_DEFAULT) . "<br>";
?>