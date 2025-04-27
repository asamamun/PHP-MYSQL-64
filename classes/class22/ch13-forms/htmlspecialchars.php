<?php
// Initialize a variable for sanitized input
$sanitizedName = '';
$sanitizedEmail = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the raw user inputs
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    // Sanitize user inputs using htmlspecialchars()
    $sanitizedName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $sanitizedEmail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanitize User Input Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: 0 auto;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Sanitize User Input Example</h2>

    <form method="POST">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($sanitizedName) ?>" required>

        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($sanitizedEmail) ?>" required>

        <button type="submit">Submit</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div class="result">
            <h3>Sanitized Output:</h3>
            <p><strong>Name:</strong> <?= $sanitizedName ?></p>
            <p><strong>Email:</strong> <?= $sanitizedEmail ?></p>
            <p><strong>Name:</strong> <?= $name ?></p>
            <p><strong>Email:</strong> <?= $email ?></p>

        </div>
    <?php endif; ?>
</div>

</body>
</html>
