<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'r64_php');
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Fetch products
$result = $conn->query("SELECT id, name, price, quantity, created_at FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Products List</h2>
    <a href="export_excel.php" class="btn btn-success mb-3">Download as Excel</a>
    
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price ($)</th>
                <th>Quantity</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= number_format($row['price'], 2) ?></td>
                <td><?= $row['quantity'] ?></td>
                <td><?= $row['created_at'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
