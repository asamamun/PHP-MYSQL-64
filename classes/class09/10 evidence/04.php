<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Result</title>
</head>
<body>
<form action="" method="post">
    <label for="">Enter your grade value(A+,A,B,C,F)</label><br>
    <input type="text" name="grade" required placeholder="Enter your grade value(A+,A,B,C,F)" style="width: 100%;"><br>
    <input type="submit" name="calc" value="mysub">

</form>

<?php
function calc($z){
    $z = strtoupper($z);    
    if($z == "A+"){return "Outstanding";}
    elseif($z == "A"){return "Very Good";}
    elseif($z == "B"){return "Good";}
    elseif($z == "C"){return "Poor";}
    else{ return "Fail";}
}
if(isset($_POST['grade'])){
    $abc = $_POST['grade'];
    $result = calc($abc);
    echo "<b>Result:</b> " . $result;
}
?>
</body>
</html>
