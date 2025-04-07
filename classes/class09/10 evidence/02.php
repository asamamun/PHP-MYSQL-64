<?php
if (isset($_POST['calc'])) {
    $fNumber = $_POST['firstNumber'];
    $sNumber = $_POST['secondNumber'];
    $tNumber = $_POST['thirdNumber'];
    //max
    if ($fNumber >= $sNumber && $fNumber >= $tNumber) {
        $maxVal = $fNumber;
    } elseif ($sNumber >= $fNumber && $sNumber >= $tNumber) {
        $maxVal = $sNumber;
    } else {
        $maxVal = $tNumber;
    }
    //min
    if ($fNumber <= $sNumber && $fNumber <= $tNumber) {
        $minVal = $fNumber;
    } elseif ($sNumber <= $fNumber && $sNumber <= $tNumber) {
        $minVal = $sNumber;
    } else {
        $minVal = $tNumber;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($maxVal) && isset($minVal)) {
        echo "<h2>Maximum value = " . $maxVal . "<br></h2>";
        echo "<h2>Minimum value = " . $minVal . "</h2>";
    }
    ?>
    <div class="container">
        <form action="" method="post">
            <label for="">Enter First Number</label><br>
            <input type="number" name="firstNumber" required><br>

            <label for="">Enter Second Number</label><br>
            <input type="number" name="secondNumber" required><br>

            <label for="">Enter Third Number</label><br>
            <input type="number" name="thirdNumber" required><br>

            <input type="submit" name="calc">
        </form>
    </div>
</body>

</html>