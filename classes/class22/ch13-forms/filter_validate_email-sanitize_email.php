<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div style="border:1px solid #ccc; border-radius:8px; padding:20px; max-width:500px; font-family:sans-serif; box-shadow:0 4px 8px rgba(0,0,0,0.1);">
  <h2 style="color:#4CAF50;">PHP filter_var() with FILTER_VALIDATE_EMAIL and FILTER_SANITIZE_EMAIL</h2>
  
  <h3>Purpose:</h3>
  <p><strong>FILTER_VALIDATE_EMAIL</strong> checks if an email is valid.</p>
  <p><strong>FILTER_SANITIZE_EMAIL</strong> removes unwanted characters from an email address (like spaces or symbols).</p>
  
  <h3>Example Code:</h3>
  <pre style="background-color:#f9f9f9; padding:10px; border-radius:5px;">
&lt;?php
    // User input (example email with unwanted characters)
    $email = " user@example.com ";
    
    // Sanitize the email
    $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    // Validate the sanitized email
    if (filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL)) {
        echo "Valid email: " . $sanitizedEmail;
    } else {
        echo "Invalid email";
    }
?&gt;
  </pre>

  <h3>Explanation:</h3>
  <p>In the example above:</p>
  <ul>
    <li><strong>Sanitize:</strong> <code>FILTER_SANITIZE_EMAIL</code> removes any invalid characters.</li>
    <li><strong>Validate:</strong> <code>FILTER_VALIDATE_EMAIL</code> checks if the email structure is correct (e.g., user@example.com).</li>
  </ul>

  <p style="margin-top:10px; font-size:14px; color:gray;">
    ✨ Always sanitize and validate user input, especially when handling emails, to prevent errors and security issues!
  </p>
</div>
<?php
    // User input (example email with unwanted characters)
    $email = " user@@example.com ";
    
    // Sanitize the email
    $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    // Validate the sanitized email
    if (filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL)) {
        echo "Valid email: " . $sanitizedEmail . "<br>";
        echo "Original length: " . strlen($email) . " characters<br>";
        echo "Sanitized length: " . strlen($sanitizedEmail) . " characters<br>";
    } else {
        echo "Invalid email";
        echo "Original length: " . strlen($email) . " characters<br>";
        echo "Sanitized length: " . strlen($sanitizedEmail) . " characters<br>";
    }
?>
<hr>
<?php
$userInput = "Love the site. E-mail me at <a href='http://www.example.
com'>Spammer</a>.";
$sanitizedInput = filter_var($userInput, FILTER_SANITIZE_STRING);
// $sanitizedInput = Love the site. E-mail me at Spammer
echo $sanitizedInput;
?>
</body>
</html>