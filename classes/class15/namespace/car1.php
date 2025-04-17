<?php
namespace Car1;
class Car{
    public $name;
    public $model;
    public function __construct($n, $m){
        $this->name = $n;
        $this->model = $m;
    }
    //show
    public function show(){
        echo "Name: " . $this->name . "<br>";
        echo "Model: " . $this->model . "<br>";
    }
}