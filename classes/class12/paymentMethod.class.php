<?php
/*
interface PaymentMethod {
    public function processPayment(float $amount): string;
    public function validate(): bool;
}

class CreditCardPayment implements PaymentMethod {
    private $cardNumber;
    private $expiryDate;
    
    public function __construct(string $cardNumber, string $expiryDate) {
        $this->cardNumber = $cardNumber;
        $this->expiryDate = $expiryDate;
    }
    
    public function validate(): bool {
        return strlen($this->cardNumber) >= 16 && 
               strtotime($this->expiryDate) > time();
    }
    
    public function processPayment(float $amount): string {
        if (!$this->validate()) {
            throw new RuntimeException("Invalid credit card details");
        }
        if ($amount <= 0) {
            throw new InvalidArgumentException("Amount must be positive");
        }
        return sprintf(
            "Processing credit card payment of $%.2f with card ending in %s",
            $amount,
            substr($this->cardNumber, -4)
        );
    }
}

class PaymentProcessor {
    public function executePayment(PaymentMethod $paymentMethod, float $amount): string {
        return $paymentMethod->processPayment($amount);
    }
}

// Usage:
$processor = new PaymentProcessor();
$creditCard = new CreditCardPayment('4111111111111111', '12/2025');

try {
    echo htmlspecialchars($processor->executePayment($creditCard, 100.00));
} catch (Exception $e) {
    echo "Payment failed: " . htmlspecialchars($e->getMessage());
}

*/
?>