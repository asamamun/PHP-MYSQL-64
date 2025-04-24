<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP Shell Escape Functions</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f9f9f9;
      padding: 40px;
    }
    .card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.1);
      padding: 24px;
      max-width: 700px;
      margin: auto;
    }
    h2 {
      margin-top: 0;
      font-size: 24px;
      color: #333;
    }
    .function {
      margin-bottom: 20px;
    }
    .func-title {
      font-weight: bold;
      font-size: 18px;
      color: #007BFF;
    }
    .code {
      background: #f0f0f0;
      font-family: monospace;
      padding: 10px;
      border-radius: 6px;
      overflow-x: auto;
      white-space: pre;
    }
    .table {
      margin-top: 20px;
      width: 100%;
      border-collapse: collapse;
    }
    .table th, .table td {
      text-align: left;
      border-bottom: 1px solid #ddd;
      padding: 10px;
    }
    .table th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>

  <div class="card">
    <h2>🔒 PHP Shell Escape Functions</h2>

    <div class="function">
      <div class="func-title">escapeshellcmd()</div>
      <p>Escapes special characters in a **full command** string to prevent code injection.</p>
      <div class="code">
$cmd = 'ls; rm -rf /';<br>
$safe = escapeshellcmd($cmd);<br>
exec($safe); // runs: ls
      </div>
    </div>

    <div class="function">
      <div class="func-title">escapeshellarg()</div>
      <p>Escapes a **single argument** so it is treated literally, not as a command.</p>
      <div class="code">
$userInput = 'My Folder; rm -rf /';<br>
$cmd = 'ls ' . escapeshellarg($userInput);<br>
exec($cmd); // runs: ls 'My Folder; rm -rf /'
      </div>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th>Function</th>
          <th>Use Case</th>
          <th>Protects Against</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><code>escapeshellcmd()</code></td>
          <td>Whole command string</td>
          <td>Shell metacharacters</td>
        </tr>
        <tr>
          <td><code>escapeshellarg()</code></td>
          <td>Single user input or argument</td>
          <td>Command injection</td>
        </tr>
      </tbody>
    </table>
  </div>

</body>
</html>
