<?php

abstract class Person{
    abstract public function name();
    abstract public function age();
    abstract public function address();
}
interface iIDB{
    public function training();
    public function interview();
}
interface iGenuity{
    public function attendance();
    public function breaktime();
    public function quiz();
}

//YOU can implement more than one interface
// but in abstract class you can only extend one abstract class
class IsDBStudent extends Person implements iIDB, iGenuity{
    public function name(){
        echo "name";
    }
    public function age(){
        echo "age";
    }
    public function address(){
        echo "address";
    }
    public function training(){
        echo "training";
    }
    public function interview(){
        echo "interview";
    }
    public function attendance(){
        echo "attendance";
    }
    public function breaktime(){
        echo "breaktime";
    }
    public function quiz(){
        echo "quiz";
    }
}

$student = new IsDBStudent();
$student->training();
$student->interview();
$student->attendance();
$student->breaktime();
$student->quiz();