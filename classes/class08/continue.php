<?php
$string = "EMPTY";
// echo strlen($string);
for ($i=0; $i < strlen($string) ; $i++) { 
    if($string[$i] == "E" || $string[$i] == "P" || $string[$i] == "Y" || $string[$i] == "M" || $string[$i] == "T"){
        continue;
    }
    echo $string[$i] . "";    
}