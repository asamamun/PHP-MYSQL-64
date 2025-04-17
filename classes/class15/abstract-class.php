<?php
abstract class Student {
    abstract public function study();
    abstract public function sleep();
    abstract public function exam();
}
//you cannot create object of abstract class
//BUT you can create child class of abstract class

class Undergraduate extends Student {
    public function study() {
        echo "Undergraduate is studying.";
    }
    public function sleep() {
        echo "Undergraduate is sleeping.";
    }
    public function exam() {
        echo "Undergraduate is taking an exam.";
    }
}

abstract class PrimaryStudent extends Student {

    abstract public function study();
    abstract public function cartoon();
    public function sleep() {
        echo "Primary student is sleeping.";
    }
    public function exam() {
        echo "Primary student is taking an exam.";
    }
}

class MonipurPrimary extends PrimaryStudent {
    public function study() {
        echo "Monipur Primary student is studying.";
    }
    public function cartoon() {
        echo "Monipur Primary student is watching cartoon.";
    }
}

$ob1 = new Undergraduate();
//$ob3 = new PrimaryStudent();//error: Cannot instantiate abstract class PrimaryStudent
$ob2 = new MonipurPrimary();
$ob1->study();
$ob1->sleep();
$ob1->exam();
$ob2->study();
$ob2->sleep();
$ob2->exam();