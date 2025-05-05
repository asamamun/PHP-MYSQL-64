<?php
if(isset($_POST['host'])){
    $host = $_POST['host'];
    if (ping($host)) {
        echo "The host $host is reachable";
    } else {
        echo "The host $host is NOT reachable";
    }
}

function ping($host){
    $location = gethostbyname($host);
    if ($location == $host) {
        return false;
    }
    $start = microtime(true);
    if (file_get_contents("http://$host/") == false) {
        return false;
    }
    $stop = microtime(true);
    $time = round($stop - $start, 4);
    return $time;
}

?>

<form method="post">
    <label for="">Enter a host to ping</label>
    <input type="text" name="host">
    <input type="submit" value="Ping">
</form>
