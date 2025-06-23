<?php
$conn = new mysqli("localhost", "root", "", "r64_exam");
$result = $conn->query("select * from products");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        table{
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <table width="50%" border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>" . $row["quantity"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>