<?php
class Employee {
    public $dool = "rajon";  
    private $los;
    private $ck = 30;

    function setlos($los) {
        $this->los = $los;
    }
    function getlos() {
        return $this->los;
    }
    
    function getck() {
        return $this->ck;
    }
}

$nai = new Employee();
$nai->setlos(60);
$property = "dool";
echo $nai->$property . " loss... : " . $nai->getlos() . ", Get " . $nai->getck(); 
echo "<br>los: " . $nai->getlos() . "<br>";
echo "New Employee: " . $nai->getck();
?>