<?php
class A{
    public function __construct(){
        echo "this is a parent class class";
    }
}
class B extends A{
    public function __construct(){
        echo "this is a child class constructor";
        //you can call parent class constructor using parent::__construct();
        parent::__construct();
        
    }
}

$company1 = new B();