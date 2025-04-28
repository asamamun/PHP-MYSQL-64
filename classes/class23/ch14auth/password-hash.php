<?php
$pass = "secret";
echo "Original pass:" . $pass . "<br>";
echo "MD5: " . md5($pass) . "<br>";
echo "SHA1: " . sha1($pass) . "<br>";
echo "SHA256: " . hash("sha256", $pass) . "<br>";
echo "SHA512: " . hash("sha512", $pass) . "<br>";
echo "Argon2i: " . password_hash($pass, PASSWORD_ARGON2I) . "<br>";
echo "Argon2id: " . password_hash($pass, PASSWORD_ARGON2ID) . "<br>";
echo "Bcrypt: " . password_hash($pass, PASSWORD_BCRYPT) . "<br>";
echo "password hash default: " . password_hash($pass, PASSWORD_DEFAULT) . "<br>";
