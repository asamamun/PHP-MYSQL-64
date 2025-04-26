<?php

namespace Src;

class Image
{
    private $image;
    private $compressionQuality = 80;

    public function __construct($imagePath)
    {
        $this->image = imagecreatefromjpeg($imagePath);
    }

    public function addWatermark($watermarkPath, $opacity = 50)
    {
        // Load watermark and ensure alpha blending is on
        $watermark = imagecreatefrompng($watermarkPath);
        imagealphablending($watermark, true);
        imagesavealpha($watermark, true);

        $watermarkWidth = imagesx($watermark);
        $watermarkHeight = imagesy($watermark);

        $dstX = (imagesx($this->image) - $watermarkWidth) / 2;
        $dstY = (imagesy($this->image) - $watermarkHeight) / 2;

        // Create a true color image with alpha to merge
        $cut = imagecreatetruecolor($watermarkWidth, $watermarkHeight);
        imagealphablending($cut, false);
        imagesavealpha($cut, true);

        // Copy the area from the base image where the watermark will go
        imagecopy($cut, $this->image, 0, 0, $dstX, $dstY, $watermarkWidth, $watermarkHeight);

        // Merge the watermark with the cutout
        imagecopy($cut, $watermark, 0, 0, 0, 0, $watermarkWidth, $watermarkHeight);

        // Merge with opacity
        imagecopymerge($this->image, $cut, $dstX, $dstY, 0, 0, $watermarkWidth, $watermarkHeight, $opacity);

        imagedestroy($watermark);
        imagedestroy($cut);
    }
    public function compress($quality = 80)
    {
        $this->compressionQuality = $quality;
    }
    public function resize($width, $height)
    {
        $resizedImage = imagescale($this->image, $width, $height);
        $this->image = $resizedImage;
    }
    public function save($path)
    {
        imagejpeg($this->image, $path, $this->compressionQuality);
    }
}
