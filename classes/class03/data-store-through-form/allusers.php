<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Cards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <a href="index.html" class="btn btn-outline-info">Add User</a>
        <div class="row">
            <?php
            // Read the CSV file
            $file = 'data.csv';
            if (($handle = fopen($file, 'r')) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    // Extracting data from the formatted CSV
                    $name = explode(": ", $data[0])[1];
                    $email = explode(": ", $data[1])[1];
                    $password = explode(": ", $data[2])[1]; // Not recommended to display
                    $position = explode(": ", $data[3])[1];
                    $gender = explode(": ", $data[4])[1];
            ?>
                    <div class="col-md-4">
                        <div class="card shadow-lg mb-4">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($name); ?></h5>
                                <p class="card-text"><strong>Position:</strong> <?php echo htmlspecialchars($position); ?></p>
                                <p class="card-text"><strong>Gender:</strong> <?php echo htmlspecialchars($gender); ?></p>
                                <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                            </div>
                        </div>
                    </div>
            <?php
                }
                fclose($handle);
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
