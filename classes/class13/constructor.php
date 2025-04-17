<?php
class A{
    public function __construct($message = "Hello World") {
        echo $message . "<br>\n";
    }
}
//constructors are methods that are called automatically when an object is created
// constructor can take parameters
$object = new A("Hello World");
$aa     = new A("Hello World Again");