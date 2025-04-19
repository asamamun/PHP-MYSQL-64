<?php

namespace Src\Image;

class Image
{
    private $image;

    public function __construct($imagePath)
    {
        $this->image = imagecreatefromjpeg($imagePath);
    }

    public function crop($x, $y, $width, $height)
    {
        $croppedImage = imagecrop($this->image, ['x' => $x, 'y' => $y, 'width' => $width, 'height' => $height]);
        $this->image = $croppedImage;

        // return $this;
    }

    public function resize($width, $height)
    {
        $resizedImage = imagescale($this->image, $width, $height);
        $this->image = $resizedImage;

        // return $this;
    }

    public function save($path)
    {
        imagejpeg($this->image, $path);
    }
}
