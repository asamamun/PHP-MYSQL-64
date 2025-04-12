<input type="text" size="70">
<?php
define("IDB",1);
define("VAT", 0.05);
echo __DIR__;
echo PHP_EOL;
print_r(get_declared_classes());
echo count(get_declared_classes());
echo sizeof(get_declared_classes());
print_r(get_defined_vars());
$food = array(
    'fruits' => array(
        'orange',
        'banana',
        ['green apple', 'red apple']
    ),
    'veggie' => array(
        'carrot',
        'collard',
        'pea'
    )
);

class A{}
class B{}

// recursive count
// var_dump(count($food, COUNT_RECURSIVE));
var_dump(count($food, IDB));

// normal count
var_dump(count($food));

function calctotal($total){
    return $total + $total*VAT;
}

echo calctotal(400);
