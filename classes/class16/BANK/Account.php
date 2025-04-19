<?php

class Account
{
    public $accountNumber;
    public $holderName;
    private $balance;

    public function __construct($accountNumber, $holderName, $balance = 0)
    {
        $this->accountNumber = $accountNumber;
        $this->holderName = $holderName;
        $this->balance = $balance;
    }

    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    public function withdraw($amount)
    {
        if ($amount > 0 && $this->balance >= $amount) {
            $this->balance -= $amount;
        }
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function toString()
    {
        return "{$this->accountNumber}|{$this->holderName}|{$this->balance}";
    }

    public static function fromString($line)
    {
        [$accNum, $name, $balance] = explode('|', trim($line));
        return new Account($accNum, $name, $balance);
    }
}
