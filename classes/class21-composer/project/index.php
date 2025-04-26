<?php
// echo __DIR__;
require __DIR__ . '/vendor/autoload.php';
use App\classes\Products;
use App\classes\Users;
use App\classes\logs\Logfile;
use Carbon\Carbon;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $p = new Products();
    $c =  $p->create();
    Logfile::write($c);

    $u = new Users();
    $c =  $u->create();
    Logfile::write($c);
    echo $u->index();

    ?>
    <hr>
    <?php
    $timestamp = mktime(0, 0, 0, 04, 25, 1999);
    $carbon = Carbon::createFromTimestamp($timestamp);
    // echo $carbon->diffInDays();
    // echo $carbon->diffForHumans();
echo $carbon->diff(Carbon::now())->format('%y years, %m months, and %d days');
echo "<br>";
echo Carbon::now();
echo "<br>";
echo Carbon::yesterday();
echo "<br>";
echo Carbon::tomorrow();
echo "<br>";
echo "5 days ago: ".Carbon::now()->subDays(5);
echo "<br>";
echo "5 days from now: " . Carbon::now()->addDays(5);
echo "<br>";
echo "5 weeks ago: ".Carbon::now()->subWeeks(5);
echo "<br>";
echo "5 weeks from now: ".Carbon::now()->addWeeks(5);
echo "<br>";
echo "5 months ago: " . Carbon::now()->subMonths(5);
echo "<br>";
echo "5 months from now: " . Carbon::now()->addMonths(5);
echo "<br>";
echo "5 years ago: " . Carbon::now()->subYears(5);
echo "<br>";
echo "5 years from now: " . Carbon::now()->addYears(5);
echo "<br>";
echo "2 years 1 month 3 days from now: " . Carbon::now()->addYears(2)->addMonth()->addDays(3);
echo "<br>";
echo "90 days from now: " . Carbon::now()->addDays(90);
echo "<br>";
  
    ?>

</body>
</html>