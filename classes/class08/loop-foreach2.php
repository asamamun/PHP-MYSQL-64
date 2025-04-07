<?php
$links = array("www.apress.com", "www.php.net", "www.apache.org");

foreach ($links as $k => $link) {
    echo "<a href='http://{$link}'>{$link}</a><br>\n";
    echo "<a href='http://" . $link . "'>" . $link . "</a><br>\n";
}
?>
<hr>
<?php
$links = [
    "The Apache Web Server" => "www.apache.org",
    "Apress" => "www.apress.com",
    "The PHP Scripting Language" => "www.php.net"
];

foreach ($links as $k => $link) {
    echo "<a href='http://{$link}'>{$k}</a><br>\n";
    echo "<a href='http://" . $link . "'>" . $k . "</a><br>\n";
}
?>
