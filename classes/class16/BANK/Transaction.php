<?php

class Transaction
{
    public static function log($type, $accountNumber, $amount)
    {
        $entry = date('Y-m-d H:i:s') . " | $type | Acc: $accountNumber | Amount: $amount" . PHP_EOL;
        file_put_contents(__DIR__ . '/data/transactions.txt', $entry, FILE_APPEND);
    }
}
