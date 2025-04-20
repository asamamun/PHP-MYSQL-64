<?php
try {
    throw new Exception("Something went wrong", 100);
} catch (Exception $e) {
    echo "Message: " . $e->getMessage() . "<br>";
    echo "Code: " . $e->getCode() . "<br>";
    echo "File: " . $e->getFile() . "<br>";
    echo "Line: " . $e->getLine() . "<br>";
    echo "Trace: <pre>" . print_r($e->getTrace(), true) . "</pre>";
    echo "Trace as string: " . $e->getTraceAsString() . "<br>";
    echo "To string: " . $e->__toString();
}
?>
