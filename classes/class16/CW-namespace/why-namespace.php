<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Namespaces in PHP</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f4f4f4;
      padding: 2rem;
    }
    .card {
      background: #fff;
      max-width: 900px;
      margin: auto;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #343a40;
    }
    .section {
      margin-top: 2rem;
    }
    .section h3 {
      color: #007bff;
    }
    .code-block {
      background: #f8f9fa;
      border-left: 5px solid #6c757d;
      padding: 1rem;
      margin-top: 1rem;
      font-family: monospace;
      white-space: pre;
      overflow-x: auto;
      border-radius: 8px;
    }
    .danger {
      border-left-color: #dc3545;
      background: #fff5f5;
    }
    .success {
      border-left-color: #28a745;
      background: #f1fdf3;
    }
    .note {
      background: #fff3cd;
      border-left: 5px solid #ffc107;
      padding: 1rem;
      border-radius: 5px;
      margin-top: 2rem;
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>Why PHP Namespaces Are Important</h2>

    <div class="section">
      <h3>✅ With Namespaces</h3>
      <div class="code-block success">
use Src\Image;
use Src\Image\Image as Image2;

$image = new Image("photo.jpg");      // Handles watermarking
$image2 = new Image2("photo.jpg");    // Handles cropping
      </div>
      <p>→ Two classes named <code>Image</code>, no problem. They're in separate namespaces!</p>
    </div>

    <div class="section">
      <h3>❌ Without Namespaces</h3>
      <div class="code-block danger">
require_once "src/Image.php";
require_once "src/image/Image.php";

$image = new Image("photo.jpg"); // Which class is this?

// 🔴 Fatal error: Cannot redeclare class Image
      </div>
      <p>→ PHP gets confused because both files define a class named <code>Image</code> globally.</p>
    </div>

    <div class="note">
      <strong>What happens without namespaces?</strong>
      <ul>
        <li>⚠️ Class name collisions</li>
        <li>⚠️ Only one <code>Image</code> class can exist in the global scope</li>
        <li>⚠️ Difficult to organize code in large applications</li>
      </ul>
    </div>

    <div class="note" style="background:#e2f0ff;border-left-color:#17a2b8;">
      <strong>Namespaces = Virtual folders for your classes</strong><br>
      Just like you can have two files named <code>image.php</code> in different folders, namespaces let you have two <code>Image</code> classes in different "code folders".
    </div>
  </div>
</body>
</html>
