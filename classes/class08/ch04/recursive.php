<!DOCTYPE html>
<html>
<head>
    <title>Payment Schedule Calculator</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        table { border-collapse: collapse; width: 100%; max-width: 600px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: right; }
        th { background-color: #f0f0f0; }
        input, button { padding: 8px; margin: 5px 0; width: 100%; max-width: 200px; }
    </style>
</head>
<body>

<h2>Payment Schedule Calculator</h2>

<form method="post">
    <label>Loan Amount:</label><br>
    <input type="number" name="amount" step="0.01" required><br>

    <label>Annual Interest Rate (%):</label><br>
    <input type="number" name="rate" step="0.01" required><br>

    <label>Number of Payments:</label><br>
    <input type="number" name="terms" required><br>

    <button type="submit">Calculate Schedule</button>
</form>

<?php
function calculateSchedule($balance, $monthlyRate, $payment, $term, $count = 1) {
    if ($term <= 0 || $balance <= 0) return;

    $interest = $balance * $monthlyRate;
    $principal = $payment - $interest;
    $newBalance = $balance - $principal;

    echo "<tr>
            <td>$count</td>
            <td>" . number_format($payment, 2) . "</td>
            <td>" . number_format($interest, 2) . "</td>
            <td>" . number_format($principal, 2) . "</td>
            <td>" . number_format(max($newBalance, 0), 2) . "</td>
          </tr>";

    calculateSchedule($newBalance, $monthlyRate, $payment, $term - 1, $count + 1);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = (float)$_POST['amount'];
    $rate = (float)$_POST['rate'];
    $terms = (int)$_POST['terms'];

    $monthlyRate = $rate / 100 / 12;

    // Monthly payment formula (fixed payment loan)
    $payment = $monthlyRate > 0
        ? $amount * ($monthlyRate * pow(1 + $monthlyRate, $terms)) / (pow(1 + $monthlyRate, $terms) - 1)
        : $amount / $terms;

    echo "<h3>Payment Schedule</h3>";
    echo "<table>
            <tr>
                <th>#</th>
                <th>Payment</th>
                <th>Interest</th>
                <th>Principal</th>
                <th>Remaining Balance</th>
            </tr>";

    calculateSchedule($amount, $monthlyRate, $payment, $terms);

    echo "</table>";
}
?>

</body>
</html>
