<?php
echo "32 bit random number: " . bin2hex(random_bytes(32));
echo "<br>";
echo "16 bit random number: " . bin2hex(random_bytes(16) );
echo "<br>";
echo "8 bit random number: " . bin2hex(random_bytes(8));
echo "<br>";