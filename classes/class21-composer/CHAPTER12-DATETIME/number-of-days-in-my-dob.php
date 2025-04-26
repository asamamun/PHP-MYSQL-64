<form action="">
    <input type="date" required name="date">
    <input type="submit" value="Submit">
</form>
<?php
if(isset($_GET['date'])) {
    $date = $_GET['date'];
    echo "<h3>$date</h3>";
    $ts = strtotime($date);
    echo $ts;
    echo "<br>";
// echo date("L", $ts);
echo $ts;
echo "<br>";
echo time();
echo "<br>";
echo "You are ".(time() - $ts)." seconds old.";
echo "<br>";
echo "You are ".(time() - $ts)/60/60/24 ." days old.";
echo "<br>";
echo "You are ".(time() - $ts)/60/60/24/365 ." years old.";
echo "<br>";
// show age in year, month and days
echo "You are ".date('Y', time() - $ts)." years ".date('m', time() - $ts)." months ".date('d', time() - $ts)." days old.";
}
?>