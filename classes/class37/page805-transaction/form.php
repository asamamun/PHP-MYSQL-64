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
// Fetch trunks with owner name
$sql = "SELECT trunks.id AS trunk_id, productname, participents.name AS owner_name, participents.id AS owner_id
        FROM trunks
        JOIN participents ON trunks.participents_id = participents.id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="bg-light">
<?php
if (isset($_SESSION['message'])) {
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong><?php echo $_SESSION['message']; ?></strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php

    unset($_SESSION['message']);
}
?>

    <!--  -->

<div class="container mt-5">
    <h2 class="mb-4">Available Products</h2>
    <div class="row g-4">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($row['productname']) ?></h5>
                        <p class="card-text">Owner: <?= htmlspecialchars($row['owner_name']) ?> (ID: <?= $row['owner_id'] ?>)</p>
                        
                        <!-- Buy Form -->
                        <form method="POST" action="buy.php">
                            <input type="hidden" name="product_id" value="<?= $row['trunk_id'] ?>">
                            <div class="mb-2">
                                <label for="buyer_id_<?= $row['trunk_id'] ?>" class="form-label">Your Buyer ID:</label>
                                <input type="number" class="form-control" name="buyer_id" id="buyer_id_<?= $row['trunk_id'] ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Buy</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

    <!--  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>
</html>
