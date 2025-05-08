<?php
//affected_rows works on update, insert, delete. REMEMBER: affected_rows does not work on select
$conn = new mysqli('localhost', 'root', '','r64_php');
// Create the query
$sql = "update users set role='user' where role = 'admin'";
// Send the query to MySQL
$conn->query($sql);
echo "Total Affected Rows: " . $conn->affected_rows . "<br>";
$conn->close();