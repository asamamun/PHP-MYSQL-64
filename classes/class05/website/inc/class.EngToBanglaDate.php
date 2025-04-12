<?php
include "class.BanglaDate.php";

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