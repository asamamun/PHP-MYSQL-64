<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP system() vs exec()</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f0f2f5;
      padding: 40px;
    }
    .card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.1);
      padding: 24px;
      max-width: 800px;
      margin: auto;
    }
    h2 {
      font-size: 26px;
      margin-top: 0;
    }
    .section {
      margin-bottom: 30px;
    }
    .func-name {
      font-size: 20px;
      color: #007bff;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .desc {
      margin-bottom: 10px;
    }
    .code {
      background: #f6f8fa;
      padding: 12px;
      border-radius: 8px;
      font-family: monospace;
      font-size: 14px;
      white-space: pre;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      padding: 10px;
      border-bottom: 1px solid #ccc;
      text-align: left;
    }
    th {
      background: #f2f2f2;
    }
  </style>
</head>
<body>

  <div class="card">
    <h2>⚙️ PHP Shell Execution: <code>system()</code> vs <code>exec()</code></h2>

    <div class="section">
      <div class="func-name">system()</div>
      <div class="desc">
        Executes a command and <strong>immediately outputs</strong> the result to the browser.
      </div>
      <div class="code">
system('dir');
// Output goes directly to browser
      </div>
    </div>

    <div class="section">
      <div class="func-name">exec()</div>
      <div class="desc">
        Executes a command and <strong>stores the output</strong> in a variable (does not print it directly).
      </div>
      <div class="code">
exec('dir', $output);
print_r($output); // Output stored in $output array
      </div>
    </div>

    <table>
      <thead>
        <tr>
          <th>Function</th>
          <th>Output Behavior</th>
          <th>Return Value</th>
          <th>Use Case</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><code>system()</code></td>
          <td>Directly printed</td>
          <td>Last line of output</td>
          <td>Quick command display</td>
        </tr>
        <tr>
          <td><code>exec()</code></td>
          <td>Stored in variable</td>
          <td>Last line of output (also full output in array)</td>
          <td>Process or manipulate output</td>
        </tr>
      </tbody>
    </table>
  </div>

</body>
</html>
