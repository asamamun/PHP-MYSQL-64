<?php
abstract class Shape {
    const TYPE = "Geometric";

    abstract public function area();
    public function hi() {
        echo "hi" . "<br>";
    }
}

class Circle extends Shape {
    public function area() {
        return "Calculating circle area...";
    }
}

$c = new Circle();
$c->hi();

echo Circle::TYPE;