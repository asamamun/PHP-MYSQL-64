<!-- factorial.php?n=4 -->
<form action="factorial.php" method="get">
<input type="text" name="studentname" placeholder="Enter your name" required>    
<input type="number" name="n" placeholder="Enter a number to find its factorial" required min="2">
<input type="submit" value="Submit">
</form>

<?php
$name = $_GET['studentname'] ?? "ANON";
$n = $_GET['n'] ?? 1;//null coalescing operator ??

$f = 1;
for ($i=1; $i <= $n ; $i++) { 
    $f = $f * $i;
}
echo "Factorial of $n =  " . $f;
?>