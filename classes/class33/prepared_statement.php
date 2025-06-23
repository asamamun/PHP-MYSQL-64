<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Prepared Statements - Pros & Cons</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .card {
      width: 500px;
      background: white;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.1);
      overflow: hidden;
    }

    .card-header {
      background: #0066cc;
      color: white;
      padding: 16px;
      font-size: 20px;
      font-weight: bold;
    }

    .card-section {
      padding: 20px;
    }

    .section-title {
      font-size: 16px;
      font-weight: bold;
      margin-bottom: 8px;
      color: #333;
    }

    ul {
      margin: 0;
      padding-left: 20px;
    }

    li {
      margin-bottom: 6px;
      color: #555;
    }

    .pros {
      background: #e8f5e9;
      border-left: 4px solid #2e7d32;
      padding: 12px;
      border-radius: 6px;
      margin-bottom: 16px;
    }

    .cons {
      background: #ffebee;
      border-left: 4px solid #c62828;
      padding: 12px;
      border-radius: 6px;
    }
  </style>
</head>
<body>

  <div class="card">
    <div class="card-header">Prepared Statements: Pros & Cons</div>
    <div class="card-section">
      <div class="pros">
        <div class="section-title">✅ Pros</div>
        <ul>
          <li>Prevents SQL injection (security boost)</li>
          <li>Reduces parsing overhead on repeated queries</li>
          <li>Cleaner and more maintainable code</li>
          <li>Automatic handling of parameter types</li>
          <li>Improved performance for bulk operations</li>
        </ul>
      </div>
      <div class="cons">
        <div class="section-title">❌ Cons</div>
        <ul>
          <li>More verbose syntax compared to raw SQL</li>
          <li>Can't bind table or column names (only values)</li>
          <li>Slight overhead for one-time queries</li>
          <li>Driver or engine-specific limitations</li>
        </ul>
      </div>
    </div>
  </div>

</body>
</html>
