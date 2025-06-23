<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Money Transfer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h2>Transfer Money</h2>
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
    <form action="transfer.php" method="post">
        <label>Sender Account ID:</label><br>
        <input type="number" name="sender_id" class="form-control" required><br><br>

        <label>Receiver Account ID:</label><br>
        <input type="number" name="receiver_id" class="form-control" required><br><br>

        <label>Amount:</label><br>
        <input type="number" name="amount" step="0.01" class="form-control" required><br><br>

        <input type="submit" value="Transfer" class="btn btn-primary">
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
