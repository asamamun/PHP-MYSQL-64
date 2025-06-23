<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product Search</title>
  <style>
    .product-card {
      border: 1px solid #ccc;
      padding: 1rem;
      margin: 1rem;
      border-radius: 10px;
      max-width: 300px;
      display: inline-block;
      vertical-align: top;
    }
    .filter-form {
      margin-bottom: 2rem;
    }
  </style>
</head>
<body>

<h2>🔍 Product Search</h2>

<form method="GET" class="filter-form">
  <input type="text" name="search" placeholder="Search products..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
  <input type="number" name="min_price" placeholder="Min Price" value="<?= htmlspecialchars($_GET['min_price'] ?? '') ?>">
  <input type="number" name="max_price" placeholder="Max Price" value="<?= htmlspecialchars($_GET['max_price'] ?? '') ?>">
  <button type="submit">Search</button>
</form>

<?php
// Base query
$query = "SELECT * FROM products WHERE 1";

// Search filter
if (!empty($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $query .= " AND MATCH(name, description) AGAINST('$search' IN NATURAL LANGUAGE MODE)";
}

// Price filters
if (!empty($_GET['min_price'])) {
    $min = floatval($_GET['min_price']);
    $query .= " AND price >= $min";
}
if (!empty($_GET['max_price'])) {
    $max = floatval($_GET['max_price']);
    $query .= " AND price <= $max";
}
echo $query;
// Execute query
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product-card'>";
        echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
        echo "<p><strong>Price:</strong> $" . number_format($row['price'], 2) . "</p>";
        echo "<p>" . nl2br(htmlspecialchars($row['description'])) . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No products found.</p>";
}
?>

</body>
</html>
