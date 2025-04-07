<?php
$str = "hello world";//দ্বিতীয় প্রথম পৃথিবী
echo strlen($str);
echo "<br>";
echo mb_strlen($str);
echo "<br>";
echo str_word_count($str);
echo "<br>";
echo strrev($str);
echo "<br>";
echo strpos($str, "World");
echo "<br>";
echo str_replace("World", "PHP", $str);
echo "<br>";