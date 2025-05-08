<?php
 $mysqli = new mysqli('localhost', 'root', '','r64_php');
 // Create the query
 $query = 'SELECT `id`, `name`, `email`, `phone`, `role` FROM `users` ORDER by `role`';
 // Send the query to MySQL
 $result = $mysqli->query($query);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>PHP MySQLi Fetch Associative Array</h1>
        <table class="table table-striped table-hover table-bordered">
            <caption><?= "Total Records: " . $result->num_rows; ?></caption>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
            </tr>
        
<?php 
$serial = 1;
 while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>" . $serial++ . "</td>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
    echo "<td>" . $row['role'] . "</td>";
    echo "</tr>";
 }
    
 $result->free();
 $mysqli->close();  

?>
</table>
</div>
</body>
</html>
 