<?php
require_once 'Bank.php';

$bank = new Bank();
$message = "";
$accountInfo = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $accNo = $_POST['account_number'] ?? '';
    $holder = $_POST['holder_name'] ?? '';
    $amount = $_POST['amount'] ?? 0;

    switch ($action) {
        case 'create':
            $bank->createAccount($accNo, $holder);
            $message = "✅ Account created for $holder.";
            break;
        case 'deposit':
            $bank->deposit($accNo, $amount);
            $message = "✅ Deposited $amount to $accNo.";
            break;
        case 'withdraw':
            $bank->withdraw($accNo, $amount);
            $message = "✅ Withdrew $amount from $accNo.";
            break;
        case 'show':
            ob_start();
            $bank->showAccount($accNo);
            $accountInfo = ob_get_clean();
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bank Account GUI</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 2rem;
            background: #f4f4f4;
        }
        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        form {
            margin-bottom: 2rem;
        }
        input, select {
            padding: 0.5rem;
            margin: 0.5rem 0;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            padding: 0.5rem 1rem;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
        }
        .message {
            background: #d1e7dd;
            color: #0f5132;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #badbcc;
            border-radius: 5px;
        }
        .account-info {
            background: #f8f9fa;
            padding: 1rem;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Simple Bank GUI (Text File Based)</h2>

    <?php if ($message): ?>
        <div class="message"><?= $message ?></div>
    <?php endif; ?>

    <form method="post">
        <label>Action:</label>
        <select name="action" required>
            <option value="create">Create Account</option>
            <option value="deposit">Deposit</option>
            <option value="withdraw">Withdraw</option>
            <option value="show">Show Account Info</option>
        </select>

        <label>Account Number:</label>
        <input type="text" name="account_number" required>

        <label>Holder Name (only for Create):</label>
        <input type="text" name="holder_name">

        <label>Amount (for Deposit/Withdraw):</label>
        <input type="number" name="amount" step="0.01" min="0">

        <button type="submit">Submit</button>
    </form>

    <?php if ($accountInfo): ?>
        <div class="account-info">
            <pre><?= $accountInfo ?></pre>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
