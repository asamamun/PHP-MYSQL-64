<?php

function person(){
return [
    "name" => "Sumi",
    "age" => 22,
    "gender" => "female",
    "address" => "Dhaka"
];
}
echo person()["name"] . " lives in " . person()["address"]. " and she is " . person()["age"] . " years old and is " . person()["gender"] . ".";