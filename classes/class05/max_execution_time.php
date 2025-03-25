<?php
ini_set('max_execution_time', '20');
// this will set the max_execution_time to 20 seconds
//create a for loop with delay 2 sec for every iteration
for ($i = 0; $i <= 15; $i++) {
    echo $i . "  ";
    sleep(2);
}