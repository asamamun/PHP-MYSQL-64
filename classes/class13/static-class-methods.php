<?php
class MathUtils
{ // Static method
    public static function add(int $a, int $b): int
    {
        return $a + $b;
    }
    // Regular instance method 
    public function subtract(int $a, int $b): int
    {
        return $a - $b;
    }
}
// Calling static method (no instance needed)
echo MathUtils::add(5, 3); // Output: 8
// Calling instance method (requires object)
$math = new MathUtils();
echo $math->subtract(5, 3); // Output: 2