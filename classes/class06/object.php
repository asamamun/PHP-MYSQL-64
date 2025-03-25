<?php
class TV{
    public $brand;
    public $model;
    public $color;
    public $price;
    //method
    public function turnOn(){
        echo "TV is turned on";
    }
    public function turnOff(){
        echo "TV is turned off";
    }
    public function setChannel($channel){
        echo "Channel is set to $channel";
    }
    public function setVolume($volume){
        echo "Volume is set to $volume";
    }
}
class SmartTV extends TV{
    public $wifi;
    public $bluetooth;
    public function youTube(){
        echo "Watching YouTube";
    }
    public function netflix(){
        echo "Watching Netflix";
    }
    public function amazonPrime(){
        echo "Watching Amazon Prime";
    }    

}
$tv = new SmartTV();
$tv->brand = "Samsung";
$tv->model = "QLED";
$tv->color = "Black";
$tv->price = "50000";
$tv->wifi = true;
$tv->bluetooth = true;
$tv->turnOn();
$tv->turnOff();
$tv->setChannel(10);
$tv->setVolume(10);
$tv->youTube();
$tv->netflix();

$sonyTV = new SmartTV();
$sonyTV->brand = "Sony";
$sonyTV->model = "QLED";
$sonyTV->color = "Black";
$sonyTV->price = "50000";
$sonyTV->wifi = true;
$sonyTV->bluetooth = true;
$sonyTV->turnOn();
$sonyTV->turnOff();
$sonyTV->setChannel(10);
$sonyTV->setVolume(10);
$sonyTV->youTube();
$sonyTV->netflix();

$nipponTV = new TV();
$nipponTV->brand = "Nippon";
$nipponTV->model = "CRT";
$nipponTV->color = "Black";
$nipponTV->price = "50000";
$nipponTV->turnOn();
$nipponTV->turnOff();
$nipponTV->setChannel(10);
$nipponTV->setVolume(10);
?>