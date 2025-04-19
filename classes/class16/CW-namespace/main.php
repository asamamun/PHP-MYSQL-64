<?php
require_once __DIR__ . '/src/image.php';
require_once __DIR__ . '/src/image/image.php';

use Src\Image;
use Src\Image\Image as Image2;
$image = new Image(__DIR__ . '/assets/images/chuppu.jpg');
//watermark
$image->addWatermark(__DIR__ . '/assets/images/watermark-preview.png');
$image->compress(50);
$image->resize(300, 200);
$image->save(__DIR__ . '/assets/images/placeholder-compressed.jpg');

$image2 = new Image2(__DIR__ . '/assets/images/placeholder-compressed.jpg');
$image2->crop(50,50,100,100);
$image2->save(__DIR__ . '/assets/images/placeholder-compressed2.jpg');
?>


