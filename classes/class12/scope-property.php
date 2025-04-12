<?php
class A{
    public $a = 10;
    private $b = 20;
    protected $c = 30;
}

class B extends A{
    public $d = 40;
    private $e = 50;
    protected $f = 60;
    function fxa(){
        return $this->a;
    }
    function fxb(){
        return $this->b;
    }
    function fxc(){
        return $this->c;
    }
    // function fxd(){
    //     return $this->d;
    // }
    //property overloading example with accessor and mutator for private and protected property
    //accessor or getter
    function fxe(){
        return $this->e;
    }
    //accessor or getter
    function fxf(){
        return $this->f;
    }
    //mutator or setter
    function set_fxe($e){
        $this->e = $e;
    }
    //mutator or setter
    function set_fxf($f){
        $this->f = $f;
    }
}

$a = new A();
echo $a->a . "<br>";
//echo $a->b . "<br>";//you cannot access private property from outside the class
//echo $a->c . "<br>";//you cannot access protected property from outside the class but you can access from subclass/child class

$b = new B();
echo $b->a . "<br>";
// echo $b->b . "<br>";
// echo $b->c . "<br>";
echo $b->fxc() . "<br>";
echo $b->d . "<br>";
// echo $b->e . "<br>";
// echo $b->f . "<br>";
// echo $b->fxd() . "<br>";
$b->set_fxe(100);
$b->set_fxf(200);
echo $b->fxe() . "<br>";
echo $b->fxf() . "<br>";
?>