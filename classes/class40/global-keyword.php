<?php
//global variables is not automatically accessible in any function
// to use a global variable inside a function use global keyword or pass by reference
$x = 5;

function myTest() {
    global $x;
    echo $x;
}

myTest();