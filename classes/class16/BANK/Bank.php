<?php

require_once 'Account.php';
require_once 'Transaction.php';

class Bank
{
    private $accountsFile = __DIR__ . '/data/accounts.txt';
    private $accounts = [];

    public function __construct()
    {
        $this->loadAccounts();
    }

    private function loadAccounts()
    {
        if (!file_exists($this->accountsFile)) return;

        $lines = file($this->accountsFile, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            $account = Account::fromString($line);
            $this->accounts[$account->accountNumber] = $account;
        }
    }
    /*
Line-by-Line Explanation:
✅ if (!file_exists(...)) return;
Checks if accounts.txt exists.
If not, it skips loading — likely this is the first time the app is run.
✅ file(..., FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)
Reads the file line-by-line into an array:
[
  "ACC1001|Alice|300",
  "ACC1002|Bob|1000"
]
FILE_IGNORE_NEW_LINES: removes \n at the end of each line
FILE_SKIP_EMPTY_LINES: skips blank lines (just in case)
✅ foreach ($lines as $line) { ... }
Loops over every account line
✅ $acc = Account::fromString($line);
Each line is converted back into an Account object using a static method like:
public static function fromString($str)
{
    [$number, $name, $balance] = explode('|', $str);
    $account = new self($number, $name);
    $account->deposit($balance); // or set balance directly
    return $account;
}
✅ $this->accounts[$acc->accountNumber] = $acc;
Adds the loaded account to the in-memory accounts list:
$this->accounts = [
    'ACC1001' => Account Object,
    'ACC1002' => Account Object,
];
    */

    private function saveAccounts()
    {
        $lines = array_map(fn($acc) => $acc->toString(), $this->accounts);
        file_put_contents($this->accountsFile, implode(PHP_EOL, $lines));
    }
    /*
Line by Line Breakdown:
✅ array_map(fn($acc) => $acc->toString(), $this->accounts);
This line loops through all account objects stored in $this->accounts
Each account ($acc) calls its toString() method, which formats it like:

ACC1001|Alice|300
ACC1002|Bob|1000
The result is an array of strings, one for each account
php
$lines = [
    "ACC1001|Alice|300",
    "ACC1002|Bob|1000"
];
✅ implode(PHP_EOL, $lines);
Joins the array of strings using line breaks (PHP_EOL = platform-safe new line)

Produces a single string:
ACC1001|Alice|300
ACC1002|Bob|1000
✅ file_put_contents($this->accountsFile, ...)
Writes the full string to the file path defined in $this->accountsFile
If the file already exists, it overwrites it with the new content
So the file data/accounts.txt ends up looking like:
ACC1001|Alice|300
ACC1002|Bob|1000
    */

    public function createAccount($accountNumber, $holderName)
    {
        if (isset($this->accounts[$accountNumber])) {
            echo "❌ Account already exists.\n";
            return;
        }

        $acc = new Account($accountNumber, $holderName);
        $this->accounts[$accountNumber] = $acc;
        $this->saveAccounts();
        echo "✅ Account created for $holderName.\n";
    }

    public function deposit($accountNumber, $amount)
    {
        if (!isset($this->accounts[$accountNumber])) {
            echo "❌ Account not found.\n";
            return;
        }

        $this->accounts[$accountNumber]->deposit($amount);
        Transaction::log('DEPOSIT', $accountNumber, $amount);
        $this->saveAccounts();
        echo "✅ Deposited $amount to $accountNumber.\n";
    }

    public function withdraw($accountNumber, $amount)
    {
        if (!isset($this->accounts[$accountNumber])) {
            echo "❌ Account not found.\n";
            return;
        }

        $this->accounts[$accountNumber]->withdraw($amount);
        Transaction::log('WITHDRAW', $accountNumber, $amount);
        $this->saveAccounts();
        echo "✅ Withdrew $amount from $accountNumber.\n";
    }

    public function history($accountNumber)
{
    $logFile = __DIR__ . '/data/transactions.txt';

    if (!file_exists($logFile)) {
        return "No transactions found.\n";
    }

    $lines = file($logFile, FILE_IGNORE_NEW_LINES);
    $history = "📜 Transaction History:\n";

    foreach ($lines as $line) {
        if (strpos($line, "Acc: $accountNumber") !== false) {
            $history .= $line . "\n";
        }
    }

    if (trim($history) === "📜 Transaction History:") {
        $history .= "No transactions yet.\n";
    }

    return $history;
}


/*     public function showAccount($accountNumber)
    {
        if (!isset($this->accounts[$accountNumber])) {
            echo "❌ Account not found.\n";
            return;
        }

        $acc = $this->accounts[$accountNumber];
        echo "📘 Account Info:\n";
        echo "Holder: $acc->holderName\n";
        echo "Account #: $acc->accountNumber\n";
        echo "Balance: " . $acc->getBalance() . "\n";
    } */
    public function showAccount($accountNumber)
    {
        if (!isset($this->accounts[$accountNumber])) {
            echo "❌ Account not found.\n";
            return;
        }
    
        $acc = $this->accounts[$accountNumber];
        echo "📘 Account Info:\n";
        echo "Holder: $acc->holderName\n";
        echo "Account #: $acc->accountNumber\n";
        echo "Balance: " . $acc->getBalance() . "\n\n";
    
        // Display transaction history
        echo $this->history($accountNumber);
    }
    
}
