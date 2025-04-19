<?php
require_once __DIR__ . '/src/image.php';
require_once __DIR__ . '/src/image/image.php';

use Src\Image;
use Src\Image\Image as Image2;

$generatedImages = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $uploadDir = __DIR__ . '/assets/images/';
    $originalName = basename($_FILES['image']['name']);
    $uploadPath = $uploadDir . $originalName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
        // 1. Watermark, compress, resize
        $image = new Image($uploadPath);
        $image->addWatermark(__DIR__ . '/assets/images/watermark-preview.png');
        $image->compress(50);
        $image->resize(300, 200);
        $processedImage1 = 'placeholder-compressed.jpg';
        $image->save($uploadDir . $processedImage1);
        $generatedImages[] = $processedImage1;

        // 2. Crop the compressed image
        $image2 = new Image2($uploadDir . $processedImage1);
        $image2->crop(50, 50, 100, 100);
        $processedImage2 = 'placeholder-compressed2.jpg';
        $image2->save($uploadDir . $processedImage2);
        $generatedImages[] = $processedImage2;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Image Processor</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 2rem;
      background: #f8f9fa;
    }
    .container {
      max-width: 600px;
      margin: auto;
      background: #fff;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    input[type="file"] {
      margin-bottom: 1rem;
    }
    .image-list {
      margin-top: 2rem;
    }
    .image-list li {
      background: #e9ecef;
      margin: 0.5rem 0;
      padding: 0.5rem 1rem;
      border-radius: 5px;
    }
    .image-preview img {
      max-width: 100%;
      margin-top: 1rem;
      border-radius: 6px;
      border: 1px solid #ccc;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Upload an Image</h2>
    <form method="post" enctype="multipart/form-data">
      <input type="file" name="image" required><br>
      <button type="submit">Upload & Process</button>
    </form>

    <?php if (!empty($generatedImages)): ?>
      <div class="image-list">
        <h3>Generated Images:</h3>
        <ul>
          <?php foreach ($generatedImages as $img): ?>
            <li><?= htmlspecialchars($img) ?></li>
            <div class="image-preview">
              <img src="assets/images/<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($img) ?>">
            </div>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>
