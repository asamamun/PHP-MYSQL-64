<em>dont run this file directly. this file will process form data from <a href="factorial-log.php">factorial-log.php</a></em>
<?php
if(isset($_GET['findFactorial'])) {
    $name = $_GET['studentname'] ?? "ANON";
    $n = $_GET['n'] ?? 1;//null coalescing operator ??
    
    //log the search in a file
    $fh = fopen("factorial-log.txt", "a");
    fwrite($fh, "$name: searched for Factorial of $n at " . date('Y-m-d H:i:s a') . "\n");
    fclose($fh);
    $f = 1;
    for ($i=1; $i <= $n ; $i++) { 
        $f = $f * $i;
    }
    $message =  "Hey $name, Factorial of $n =  " . $f;
    header("Location: result.php?message=$message"); 
}
?>