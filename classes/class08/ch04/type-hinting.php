<h2>Type hinting means specifying the expected data type of a function's parameters (and return type) so that PHP can enforce that the right type is used.</h2>
<h3>Example With Type Hinting:</h3>
<pre>
    <code>
function greet(string $name): string {
    return "Hello, $name";
}
    </code>
</pre>
<?php
function sq2($n){
    return "$n x $n = " . $n*$n;
}
function sq(int $n):string{
    return "$n x $n = " . $n*$n;
}
// echo sq(5);
echo sq("A");//Argument #1 ($n) must be of type int, string given
