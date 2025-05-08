<?php
/*  $mysqli = new mysqli('localhost', 'root', '','r64_php');
 // Create the query
 $query = 'SELECT `id`, `name`, `email`, `phone`, `role` FROM `users` ORDER by `role`';
 // Send the query to MySQL
 $result = $mysqli->query($query);
 echo "Total Records: " . $result->num_rows . "<br>";

 while($row = $result->fetch_assoc()){
    echo "ID: " . $row['id'] . " , Name: " . $row['name'] . " , Email: " . $row['email'] . " , Phone: " . $row['phone'] . " , Role: " . $row['role'];
    echo "<br>";
 }    
 $result->free();
 $mysqli->close();   */
?>
<h3>Prepared Statement</h3>
<p>Using a prepared statement is generally recommended for better security (e.g., protection against SQL injection) and performance in some cases. <br>

In your current example, <mark>there are no user inputs, so SQL injection isn't an immediate concern</mark> — but for consistency and good practice, here's how you'd rewrite it using a prepared statement:</p>
<?php
$mysqli = new mysqli('localhost', 'root', '', 'r64_php');

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare the SQL statement
$stmt = $mysqli->prepare('SELECT `id`, `name`, `email`, `phone`, `role` FROM `users` ORDER BY `role`');

// Execute the statement
$stmt->execute();

// Bind the result variables
$stmt->bind_result($id, $name, $email, $phone, $role);

// Fetch and display results
$count = 0;
while ($stmt->fetch()) {
    echo "ID: $id , Name: $name , Email: $email , Phone: $phone , Role: $role<br>";
    $count++;
}
echo "Total Records: $count<br>";

// Close statement and connection
$stmt->close();
$mysqli->close();
?>

