<?php
$checkState = 4;
for ($count = 1; $count < 10; $count = $checkState + $count) {
    if ($checkState == 4) {
        echo "The value of count is :$count";
        break;
    } else {
        echo "The value of checkState is:$checkState";
    }
}
