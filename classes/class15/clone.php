<h1>To copy an object we use clone keyword. This will create a new object</h1>
<?php
class A{
    public $name = "A";
    public $tsp = "Genuity";
    //magic method clone runs when clone keyword is used
    function __clone() {
        $this->name = "not set yet<br>";
       }
       
}
$company1 = new A();
// $company2 = $company1;//no copies are made but references are copied
$company2 = clone $company1;// a copy is made, no reference
echo $company2->name;
echo $company2->tsp;
// $company2->name = "B";
echo "<br>";
echo $company1->name;
echo "<br>";