<?php
require __DIR__ . '/vendor/autoload.php'; // PhpSpreadsheet autoloader
use PhpOffice\PhpSpreadsheet\IOFactory;

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'r64_php';

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['excel_file'])) {
    $file = $_FILES['excel_file']['tmp_name'];

    try {
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        // Skip header row
        for ($i = 1; $i < count($rows); $i++) {
            [$name, $description, $quantity, $price] = $rows[$i];

            // Prepare insert
            $stmt = $conn->prepare("INSERT INTO import_export (name, description, quantity, price) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssid", $name, $description, $quantity, $price);
            $stmt->execute();
        }

        $message = "Excel data imported successfully!";
    } catch (Exception $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Excel Import</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Upload Excel File</h2>
    <?php if ($message): ?>
        <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="excel_file" class="form-label">Select Excel File (.xlsx, .xls)</label>
            <input type="file" name="excel_file" id="excel_file" class="form-control" accept=".xlsx,.xls" required>
        </div>
        <button type="submit" class="btn btn-primary">Import</button>
    </form>
</div>
</body>
</html>
