<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>

</head>
<body>
    

    


<?php
$coin = 0; 
while ($coin <5) {
    echo"You have" . $coin . "coins<br>";
    $coin++;
    # code...
}
?>

<hr>

<?php

$colors=['red','green','blue'];
foreach ($colors as &$color){
    $color = strtoupper($color);
}

// unset($color);

$color="Purple";

print_r($colors);

?>

<hr>

<?php
$prise="12.32";
$prisePoint=(float)$prise;
$priseInt=(int)$prisePoint;
echo $prisePoint."<br>";
echo $priseInt;
?>

<hr>

<form action="" method="post" >
    <label for="">Tapmatra koto?</label><br>
    <input type="number" name="taap" ><br>
    <input type="submit" name="calc">

</form>

<?php
if(isset($_POST['calc'])){
    $me=$_POST['taap'];
    if($me >=40){
        echo "pacha jole gelo";
    } elseif($me >=30){
        echo "Chole tao";
    }else{
        echo "Shanti re bhai!";
    }
}
?>

<hr>

<?php
$num1="5";
$num2=10;

echo $num1 + $num2;
?>

<hr> 



<form action="" method="post" class="btn btn-dark" >

<label for="" class="btn btn-secondary">Enter Digit</label><br>
<hr>
<input type="number" name="a"><br>
<br>
<input type="number" name="b"><br>
<br>
<hr>
<button name="jog"  class="btn btn-primary">+</button>
<button name="biyog" class="btn btn-danger">-</button>
<button name="gun"  class="btn btn-success">*</button>
<button name="vag"  class="btn btn-warning">/</button>
<hr>

</form>

<?php

$fNum=$_POST['a']?? 1;
$sNum=$_POST['b']?? 1;

if(isset($_POST['jog'])){
    $j=$fNum+$sNum;
    echo $j;
}
if(isset($_POST['biyog'])){
    $b=$fNum-$sNum;
    echo $b;
}
if(isset($_POST['gun'])){
    $g=$fNum*$sNum;
    echo $g;
}
if(isset($_POST['vag'])){
    if($sNum==0){
        echo "division by zero";
    }
    else{
        $v=$fNum/$sNum;
        echo $v;
    }
    
}


?>
<hr>

<br>
<?php
$res="";

if(isset($_POST['jo']) || isset($_POST['bi']) || isset($_POST['gu']) || isset($_POST['g'])){
    $prothom=$_POST['f'];
    $ditiyo=$_POST['g'];

    if(isset($_POST['jo'])){
        $res= $prothom+$ditiyo;
    } elseif(isset($_POST['bi'])){
        $res= $prothom - $ditiyo;
    } elseif(isset($_POST['gu'])){
        $res= $prothom*$ditiyo;
    } elseif (isset($_POST['va'])){
        $res= $prothom/$ditiyo; 
    }

}

?>

<form action="" method="post" class="btn btn-info">
<label for="" class="btn btn-dark">Cal with "$_SERVER"</label><br>
    <label for="">Enter Digit</label><br>
    <input type="number" name="f"><br>
    <br>
    <input type="number" name="g"><br>
    
    <hr>
    <button name="jo" type="submit" class="btn btn-light">+</button>
    <button name="bi" type="submit" class="btn btn-light">-</button>
    <button name="gu" type="submit" class="btn btn-light">*</button>
    <button name="va" type="submit" class="btn btn-light">/</button> <br>
    
    <hr>
    <input type="text" class="btn btn-dark" value="<?= $res ?>">
    <hr>

</form>


<br>
<br>

<?php
$numb="";
$secretnumber=rand(1,100);
$dewaNum=$_POST['kk']?? "";
if(isset($_POST['chap'])){
    $numb= $secretnumber-$dewaNum;
    echo "Rand Number is;". " "."<b>".$secretnumber."<b/>";

}


?>
<form action="" method="post">
    <label for=""> Number deh</label> <br>
    <input type="number" name="kk"><br>
    <button name="chap" type="submit">chap deh</button><br>
    <input type="text" value="<?= $numb ?>">
</form>



</body>
</html>