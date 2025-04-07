<?php
$primes = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47);
// echo in_array(33, $primes);
printf("%d", in_array(33, $primes));
// echo rand(1,100);
echo "<br>";
for ($count = 1; $count < 1000; $count++) {
    $randomNumber = rand(1, 500);
    if (in_array($randomNumber, $primes)) {
        printf("Step : $count =  $randomNumber is a Prime number ! %d <br />", $randomNumber);
        break;
    } else {
        printf("Step : $count =  Non-prime number found: %d <br />", $randomNumber);
    }
}
