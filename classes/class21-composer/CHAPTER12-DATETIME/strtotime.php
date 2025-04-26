<h3>strtotime function  returns timestamp of date and time in seconds given by user in english like format</h3>
<h3>Next 10 days</h3>
<?php
$next10plusdays = strtotime('+10 days');
echo $next10plusdays;
echo "<br>";
echo date('Y-m-d', $next10plusdays);
echo "<br>";
?>

<h3>Next 2 months 5 days</h3>
<?php
$next2month5daysdate = strtotime('+2 months +5 days');
echo $next2month5daysdate;
echo "<br>";
echo date('Y-m-d', $next2month5daysdate);
echo "<br>";
?>

<h3>Next 3 years 5 months 50 days</h3>
<?php
$next3years5months50daysdate = strtotime('+3 years +5 months +50 days');
echo $next3years5months50daysdate;
echo "<br>";
echo date('Y-m-d', $next3years5months50daysdate);
echo "<br>";
?>