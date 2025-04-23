<?php
// you dont need to create object to access static method
class FileUtils {
    public static function calculateDirectorySize($path) {
        $size = 0;
        $files = glob($path . "/*");

        foreach ($files as $file) {
            if (is_dir($file)) {
                $size += self::calculateDirectorySize($file);
            } else {
                $size += filesize($file);
            }
        }

        return $size;
    }
}
