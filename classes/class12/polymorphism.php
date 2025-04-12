<?php
// Base interface that defines the common behavior
interface PaymentMethod {
    public function processPayment(float $amount): string;
}

// Different payment method implementations
class CreditCardPayment implements PaymentMethod {
    private $cardNumber;
    private $expiryDate;
    
    public function __construct(string $cardNumber, string $expiryDate) {
        $this->cardNumber = $cardNumber;
        $this->expiryDate = $expiryDate;
    }
    
    public function processPayment(float $amount): string {
        return "Processing credit card payment of \${$amount} with card number ending in " . 
             substr($this->cardNumber, -4) . "\n";
        // Actual credit card processing logic would go here
    }
}

class PayPalPayment implements PaymentMethod {
    private $email;
    
    public function __construct(string $email) {
        $this->email = $email;
    }
    
    public function processPayment(float $amount): string {
        return "Processing PayPal payment of \${$amount} from {$this->email}\n";
        // Actual PayPal processing logic would go here
    }
}

class BankTransferPayment implements PaymentMethod {
    private $accountNumber;
    private $routingNumber;
    
    public function __construct(string $accountNumber, string $routingNumber) {
        $this->accountNumber = $accountNumber;
        $this->routingNumber = $routingNumber;
    }
    
    public function processPayment(float $amount): string {
        if ($amount <= 0) {
            throw new InvalidArgumentException("Amount must be positive");
        }
        return "Processing bank transfer of \${$amount} to account {$this->accountNumber}\n";
        // Actual bank transfer logic would go here
    }
}

// Class that uses polymorphism to process payments
class PaymentProcessor {
    public function executePayment(PaymentMethod $paymentMethod, float $amount): string {
        //so, $paymentMethod is an object created from one of the classes: CreditCardPayment, PayPalPayment, BankTransferPayment
        return $paymentMethod->processPayment($amount);
        //$creditCard->processPayment(100.00);
        //$paypal->processPayment(50.00);
        //$bankTransfer->processPayment(75.50);
    }
}


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
// Usage example
$processor = new PaymentProcessor();

$creditCard = new CreditCardPayment('4111111111111111', '12/25');
$paypal = new PayPalPayment('user@example.com');
$bankTransfer = new BankTransferPayment('123456789', '987654321');

// The same payment processor can handle different payment methods
// echo $processor->executePayment($creditCard, 100.00);
echo nl2br(htmlspecialchars($processor->executePayment($creditCard, 100.00)));
// echo $processor->executePayment($paypal, 50.00);
echo nl2br(htmlspecialchars($processor->executePayment($paypal, 50.00)));
// echo $processor->executePayment($bankTransfer, 75.50);
echo nl2br(htmlspecialchars($processor->executePayment($bankTransfer, 75.50)));

// You can also use an array of different payment methods
$payments = [
    new CreditCardPayment('5555555555554444', '06/24'),
    new PayPalPayment('another@example.com'),
    new BankTransferPayment('987654321', '123456789')
];

foreach ($payments as $payment) {
    // echo $processor->executePayment($payment, 25.00);
    echo nl2br(htmlspecialchars($processor->executePayment($payment, 25.00)));
}
    ?>
    <img src="polymorphism.png" alt="" width="100%">
</body>
</html>