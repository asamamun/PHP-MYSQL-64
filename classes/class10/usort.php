<?php

$numbers = [
    984414,
    984402,
    982213,
    982214,
    982144,
    988812,
    974414,
    974402,
    972213,
    972214,
    972144,
    972112
];

usort($numbers, function($a, $b) {
    // Convert to string and pad with leading zeros if needed
    $a = str_pad($a, 6, "0", STR_PAD_LEFT);
    $b = str_pad($b, 6, "0", STR_PAD_LEFT);

    // Extract parts
    $deptA = substr($a, 2, 2);
    $deptB = substr($b, 2, 2);

    if ($deptA === $deptB) {
        $batchA = substr($a, 0, 2);
        $batchB = substr($b, 0, 2);

        if ($batchA === $batchB) {
            $rollA = substr($a, 4, 2);
            $rollB = substr($b, 4, 2);
            return $rollA <=> $rollB;
        }

        return $batchA <=> $batchB;
    }

    return $deptA <=> $deptB;
});

// Print sorted result
foreach ($numbers as $num) {
    echo $num . "\n";
}
