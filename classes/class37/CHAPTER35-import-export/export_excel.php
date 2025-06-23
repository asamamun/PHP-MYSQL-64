<?php
$conn = new mysqli('localhost', 'root', '', 'r64_php');
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=products_export.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "<table border='1'>";
echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price ($)</th>
        <th>Quantity</th>
        <th>Created At</th>
      </tr>";

$result = $conn->query("SELECT id, name, price, quantity, created_at FROM products");
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>" . htmlspecialchars($row['name']) . "</td>
            <td>{$row['price']}</td>
            <td>{$row['quantity']}</td>
            <td>{$row['created_at']}</td>
          </tr>";
}
echo "</table>";
?>
