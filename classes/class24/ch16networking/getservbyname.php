<?php
// getservbyname() 
echo "HTTP's default port number is: ".getservbyname("http", "tcp");
echo "<br>";
echo "FTP's default port number is: ".getservbyname("ftp", "tcp");
echo "<br>";
echo "SMTP's default port number is: ".getservbyname("smtp", "tcp");
echo "<br>";
echo "POP3's default port number is: ".getservbyname("pop3", "tcp");
echo "<br>";
echo "IMAP's default port number is: ".getservbyname("imap", "tcp");
echo "<br>";
//https
echo "HTTPS's default port number is: ".getservbyname("https", "tcp");
?>