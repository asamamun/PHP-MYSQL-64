<?php
$alllines = file("transactions.txt");
// $alllines = file("https://mzamin.com/news.php?news=157473");
// var_dump($alllines);
// echo "<br>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th>#</th>
                <th>Date and Time</th>
                <th>Transaction Type</th>
                <th>Account Number</th>
                <th>Amount</th>
            </tr>
            <?php
foreach ($alllines as $k=>$line) {
    $parts = explode("|", $line);
    echo "<tr class='" . ( trim($parts[1]) == "DEPOSIT" ? "table-primary" : "table-danger") . "'>";
    echo "<td>" . str_pad(($k+1),5,"0",STR_PAD_LEFT) . "</td>";
    echo "<td>" . $parts[0] . "</td>";
    echo "<td>" . $parts[1] . "</td>";
    echo "<td>" . explode(":", $parts[2])[1] . "</td>";
    echo "<td>" . explode(":", $parts[3])[1] . "</td>";
    echo "</tr>";
} 
?>
        </table>
    </div>

</body>
</html>
