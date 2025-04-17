<?php
namespace Car2;
class Car{
    public $color;
    public $model;
    public $year;
    public function __construct($color, $model, $year){
        $this->color = $color;
        $this->model = $model;
        $this->year = $year;
    }
    //show
    public function show(){
        echo "Color: " . $this->color . "<br>";
        echo "Model: " . $this->model . "<br>";
        echo "Year: " . $this->year . "<br>";
    }
}
