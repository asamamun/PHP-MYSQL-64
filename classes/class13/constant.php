<?php
class Math{
    const PI = 3.14;
    const VAT = 0.05;
    public static function withTax($price){
        return $price * (1 + self::VAT);
    }

}
//you dont need to create object to access constant
echo Math::PI;
echo "<br>";
echo Math::VAT;
//if you want to use constant value inside class you can use self keyword
echo "<br>";
echo Math::withTax(100);
?>