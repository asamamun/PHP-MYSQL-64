<?php
session_start();
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'r64_php';

// Collect form data
$senderId = (int)$_POST['sender_id'];
$receiverId = (int)$_POST['receiver_id'];
$amount = (float)$_POST['amount'];

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start transaction
$conn->begin_transaction();

try {
    // Deduct from sender
    $stmt1 = $conn->prepare("UPDATE accounts SET balance = balance - ? WHERE account_id = ? AND balance >= ?");
    $stmt1->bind_param("dii", $amount, $senderId, $amount);
    $stmt1->execute();

    if ($stmt1->affected_rows === 0) {
        throw new Exception("Insufficient funds or sender account not found.");
    }

    // Add to receiver
    $stmt2 = $conn->prepare("UPDATE accounts SET balance = balance + ? WHERE account_id = ?");
    $stmt2->bind_param("di", $amount, $receiverId);
    $stmt2->execute();

    if ($stmt2->affected_rows === 0) {
        throw new Exception("Receiver account not found.");
    }

    // Record transaction
    $stmt3 = $conn->prepare("INSERT INTO transactions (sender_id, receiver_id, amount) VALUES (?, ?, ?)");
    $stmt3->bind_param("iid", $senderId, $receiverId, $amount);
    $stmt3->execute();

    // Commit transaction
    $conn->commit();
    $_SESSION['message'] = "Transfer successful.";
    header("Location: transaction.php");
    exit();

} catch (Exception $e) {
    $conn->rollback();
    $_SESSION['message'] = "Transfer failed: " . $e->getMessage();
    header("Location: transaction.php");
    exit();
}

$conn->close();
?>
