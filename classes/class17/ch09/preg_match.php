<?php
$pattern = "/hello/i";  // i = case-insensitive
$text = "world Hello !";

if (preg_match($pattern, $text)) {
    echo "Match found!";
} else {
    echo "No match.";
}
?>
<hr>
<?php
$string = '88 The number is 42.';
if (preg_match('/\d+/', $string, $matches)) {
    echo "Found number: " . $matches[0];
    echo "<br>";
    var_dump($matches);
}
else{
    echo "no match!!!";
}
?>
<hr>
<?php
$string = '88 -The number is -42.';
if (preg_match_all('/-\d+/', $string, $matches)) {
    echo "Found text: " ;
    var_dump($matches);
    echo "<br>";
    // var_dump($matches);
}
else{
    echo "no match!!!";
}
?>
<hr>
<?php
$string = '88 The number is 42.';
if (preg_match_all('/\d+/', $string, $matches)) {
    echo "Found number: ";
    var_dump($matches);
    echo "<br>";
    
}
else{
    echo "no match!!!";
}
?>
<hr>
<?php
$string = 'Emails: john@example.com, jane@example.org, idb@bisew.company';
preg_match_all('/\S+@\S+\.\S+/', $string, $matches);
print_r($matches[0]);
?>
<hr>
<?php
$line = "vim is the greatest Vimbar word processor ever created! Oh vim, how I love thee!";
 if (preg_match("/\bVim/", $line, $match)) {
    print "Match found!";
    var_dump($match);
 }
 else{
    echo "no match!!!";
 }


