<?php
//Fatal error: Cannot declare class Car, because the name is already in use in D:\xampp8240\htdocs\ROUND64\PHP\PHP-MYSQL-64\classes\class15\namespace\car2.php on line 2
require "car1.php";
require "car2.php";
$b = new Car("BMW", "X5");//problem can be solved by using namespace
$b->show();