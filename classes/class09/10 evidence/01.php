<form action="" method="get">
    <label for="">Ener your total sales amount</label><br>
    <input type="text" name="amount" required><br>
    <input type="submit" name="calc">
</form>

<?php
function calc_sales_amount($z)
{
    if ($z > 5000) {
        return $z * 0.10;
    } else {
        return $z * 0;
    }
}
if (isset($_GET['amount'])) {

    $abc = $_GET['amount'];
    $result = calc_sales_amount($abc);
    echo "<b>Sales amount:</b> " . $abc . "<br><b> Discount Amount: </b>" . $result;
}
?>