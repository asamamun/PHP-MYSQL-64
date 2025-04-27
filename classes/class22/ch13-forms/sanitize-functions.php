<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div style="border:1px solid #ccc; border-radius:8px; padding:20px; max-width:500px; font-family:sans-serif; box-shadow:0 4px 8px rgba(0,0,0,0.1);">
  <h2 style="color:#4CAF50;">PHP Input Sanitization Functions</h2>
  <ul>
    <li><strong>htmlspecialchars()</strong> — Escape HTML special characters (prevents XSS)</li>
    <li><strong>strip_tags()</strong> — Remove all HTML and PHP tags</li>
    <li><strong>filter_var()</strong> — Filter and sanitize strings, emails, URLs, etc.</li>
    <li><strong>trim()</strong> — Remove extra whitespace from beginning and end</li>
    <li><strong>addslashes()</strong> — Escape quotes for database (less recommended now)</li>
    <li><strong>mysqli_real_escape_string()</strong> — Escape special characters for SQL (use with MySQL)</li>
  </ul>
  <p style="margin-top:10px; font-size:14px; color:gray;">
    ✨ Best practice: Always validate + sanitize input before storing or displaying it!
  </p>
</div>
<hr>
<div style="border:1px solid #ccc; border-radius:8px; padding:20px; max-width:500px; font-family:sans-serif; box-shadow:0 4px 8px rgba(0,0,0,0.1);">
  <h2 style="color:#4CAF50;">PHP htmlspecialchars() Example</h2>
  <p><strong>Purpose:</strong> The <code>htmlspecialchars()</code> function is used to convert special characters to HTML entities, which helps prevent cross-site scripting (XSS) attacks.</p>
  
  <h3>Example Code:</h3>
  <pre style="background-color:#f9f9f9; padding:10px; border-radius:5px;">
&lt;?php
    $userInput = '&lt;script&gt;alert(&#39;Hacked!&#39;)&lt;/script&gt;';
    $sanitizedInput = htmlspecialchars($userInput, ENT_QUOTES, 'UTF-8');
    echo $sanitizedInput;
?&gt;
  </pre>

  <p><strong>Explanation:</strong> The user input <code>&lt;script&gt;alert(&#39;Hacked!&#39;)&lt;/script&gt;</code> is sanitized by <code>htmlspecialchars()</code> to become <code>&lt;script&gt;alert(&#39;Hacked!&#39;)&lt;/script&gt;</code>, which makes it safe to display in HTML.</p>

  <p style="margin-top:10px; font-size:14px; color:gray;">
    ✨ Using <code>htmlspecialchars()</code> prevents potentially dangerous input from being executed as code in the browser!
  </p>
</div>

</body>
</html>