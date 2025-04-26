<?php
echo $_SERVER['PHP_SELF'];
?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="get"></form>
<form action="" method="get"></form>
<!-- <form action="age-calculator-simple.php" method="get"></form> -->

<?php
echo "<br>";
$dob = "2005-01-01";
$today = new DateTime();
$birthday = new DateTime($dob);
$diff = $today->diff($birthday);
echo $diff->y . " years, " . $diff->m . " months, " . $diff->d . " days";