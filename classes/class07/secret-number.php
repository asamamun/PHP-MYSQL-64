<?php
 $secretNumber = 453;
 $uservalue = $_GET['guess']??"no value";
 if(!is_numeric($uservalue) ){
    echo "Please enter a number";
    // exit(); 
    die("<br>_________________");
 }

 if ( $uservalue == $secretNumber) {
 echo "Congratulations!";
 }
 elseif(abs( $uservalue - $secretNumber) <= 10){
     echo "You are getting closer";
 }
 elseif( $uservalue > $secretNumber){
    echo "Too high!";
 }
 elseif( $uservalue < $secretNumber){
    echo "Too low!";
 }
 else{
    echo "Wrong!";
 }
?>