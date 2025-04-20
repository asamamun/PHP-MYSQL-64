<?php
try {
    $x = rand(1,3);
    if($x == 1){
        throw new Exception("forcefully throwing Error Processing Request", 564);
    }
    else{
        echo "x is $x";
    }   
    
} catch (\Throwable $th) {
    //throw $th;
    echo $th->getMessage();
    echo "<br>";
    echo $th->getCode();
    echo "<br>";
    echo $th->getFile();
    echo "<br>";
    echo $th->getLine();

}
finally {
    echo "<br>";
    echo "Done";
    
}