<?php
var_dump($_SERVER);
echo "<br>";
foreach ($_SERVER as $k => $v) {
    echo "KEY: $k => VALUE:  $v <br>";
}