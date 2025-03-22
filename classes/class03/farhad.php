<?php
// Define an array of random names
$names = ["Mr. Hello", "Ms. World", "Dr. Foo", "Prof. Bar", "Captain PHP", "Agent CSS"];

// Check if a name is provided in the URL using the GET method
if (isset($_GET['name']) && !empty($_GET['name'])) {
    // Use the name from the URL
    $name = $_GET['name']; // Sanitize the input
} else {
    // Select a random name from the array
    $randomIndex = array_rand($names); // Gets a random index
    $name = $names[$randomIndex]; // Retrieves the name at the random index
}

// Display the welcome message
echo 'Welcome to our website, ' . $name . '!';
?>