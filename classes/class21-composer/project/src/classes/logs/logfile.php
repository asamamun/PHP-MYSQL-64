<?php
namespace App\classes\logs;

class Logfile{
    public static function write($message){
        $file = fopen('log.txt', 'a');
        fwrite($file, $message . PHP_EOL);
        fclose($file);
    }
}