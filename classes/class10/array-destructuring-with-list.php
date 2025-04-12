<?php
function simple_person(){
    return ["Sumi",22,"female","Dhaka"];
}
function person(){
    return [
        "name" => "Sumi",
        "age" => 22,
        "gender" => "female",
        "address" => "Dhaka"
    ];
    }
    [$n,$a,$g,$ad] = simple_person();
    ["name" => $n2,"address" => $ad2] = person();
    echo $n . " lives in " . $ad . " and she is " . $a . " years old and is " . $g . "." . PHP_EOL;
    echo $n2 . " lives in " . $ad2;