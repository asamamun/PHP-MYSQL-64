<?php
include "class.BanglaDate.php";
//example of inheritance and encapsulation
//we are inheriting the BanglaDate class
//we dont need to know how BanglaDate class works. we only need to know how to call it's methods and get result
class EngToBanglaDate extends BanglaDate {
    function __construct($timestamp, $hour = 6)
    {
        //call parent constructor
        parent::__construct($timestamp, $hour);
    }
    function showBanglaDate() {
        return $this->get_date();
    }
    function nextYear() {
        $nextyear = strtotime("+1 year");
        $this->BanglaDate($nextyear);
        return $this->get_date();
    }
}