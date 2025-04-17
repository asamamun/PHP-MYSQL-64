<?php

class Person {
    private $data = [];

    // Magic setter
    public function __set($name, $value) {
        echo "Setting '$name' to '$value'\n";
        $this->data[$name] = $value;
    }
    // Magic getter
    public function __get($name) {
        echo "Getting '$name'\n";
        return $this->data[$name] ?? null;
    }
}
// Using the class
$person = new Person();
$person->name = "Alice";     // Triggers __set
$person->age = 30;           // Triggers __set

echo $person->name . "\n";   // Triggers __get
echo $person->age . "\n";    // Triggers __get
echo $person->address . "\n"; // Triggers __get

?>
