<?php
//getservbyport 
echo "HTTP's default port number is: ".getservbyport(80, "tcp");
echo "<br>";
echo "FTP's default port number is: ".getservbyport(21, "tcp");
echo "<br>";
echo "SMTP's default port number is: ".getservbyport(25, "tcp");
echo "<br>";
echo "POP3's default port number is: ".getservbyport(110, "tcp");
echo "<br>";
echo "IMAP's default port number is: ".getservbyport(143, "tcp");
echo "<br>";
//https
echo "HTTPS's default port number is: ".getservbyport(443, "tcp");
//loop through 1 to 1000 to see the port service
for ($i=1; $i <= 10000 ; $i++) { 
    //dont show ports without service
    if(getservbyport($i, "tcp") == "") continue;
    echo "Port $i is: ".getservbyport($i, "tcp")."<br>";
}
?>