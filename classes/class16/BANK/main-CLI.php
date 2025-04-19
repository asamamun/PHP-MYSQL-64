<?php

require_once 'Bank.php';

$bank = new Bank();

// Simulate operations
$bank->createAccount("ACC1001", "Alice");
$bank->deposit("ACC1001", 500);
$bank->withdraw("ACC1001", 200);
$bank->showAccount("ACC1001");

$bank->createAccount("ACC1002", "Bob");
$bank->deposit("ACC1002", 1000);
$bank->showAccount("ACC1002");

echo "\n✅ Done. Check the data folder to see saved account and transaction data.\n";
