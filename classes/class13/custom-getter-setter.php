<?php
class Employee
{
    private $name;
    // Getter
    public function getName()
    {
        return $this->name;
    }
    // Setter
    public function setName($name)
    {
        $this->name = $name;
    }
}

$mosharraf = new Employee();
// echo $mosharraf->name = "Mosharraf";
$mosharraf->setName("Mosharraf");
echo $mosharraf->getName();