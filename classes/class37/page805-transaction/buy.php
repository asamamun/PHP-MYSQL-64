<?php
session_start();
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'r64_php';

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$buyerId = (int)$_POST['buyer_id'];
$productId = (int)$_POST['product_id'];
$price = 50.00; // You can make this dynamic later

$conn->begin_transaction();

try {
    // 1. Get current owner of the product
    $stmt = $conn->prepare("SELECT participents_id FROM trunks WHERE id = ?");
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) throw new Exception("Product not found.");

    $row = $result->fetch_assoc();
    $ownerId = (int)$row['participents_id'];
    if ($buyerId === $ownerId) throw new Exception("Buyer already owns this product.");

    // 2. Deduct from buyer
    $stmt = $conn->prepare("UPDATE participents SET amount = amount - ? WHERE id = ? AND amount >= ?");
    $stmt->bind_param("dii", $price, $buyerId, $price);
    $stmt->execute();
    if ($stmt->affected_rows === 0) throw new Exception("Insufficient funds.");

    // 3. Add to owner
    $stmt = $conn->prepare("UPDATE participents SET amount = amount + ? WHERE id = ?");
    $stmt->bind_param("di", $price, $ownerId);
    $stmt->execute();
    if ($stmt->affected_rows === 0) throw new Exception("Owner not found.");

    // 4. Log the transaction
    $stmt = $conn->prepare("INSERT INTO transactions_log (from_id, to_id, amount) VALUES (?, ?, ?)");
    $stmt->bind_param("iid", $buyerId, $ownerId, $price);
    $stmt->execute();

    // 5. Update product ownership
    $stmt = $conn->prepare("UPDATE trunks SET participents_id = ? WHERE id = ?");
    $stmt->bind_param("ii", $buyerId, $productId);
    $stmt->execute();

    $conn->commit();
    $_SESSION['message'] = "Purchase successful. Product ownership transferred.";
    header("Location: form.php");
    exit();

} catch (Exception $e) {
    $conn->rollback();
    // echo "Transaction failed: " . $e->getMessage();
    $_SESSION['message'] = "Purchase failed: " . $e->getMessage();
    header("Location: form.php");
    exit();
}

$conn->close();
?>
