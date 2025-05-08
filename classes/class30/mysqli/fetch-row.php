<?php
 $mysqli = new mysqli('localhost', 'root', '','r64_php');
 // Create the query
 $query = 'SELECT `id`, `name`, `email`, `phone`, `role` FROM `users` ORDER by `role`';
 // Send the query to MySQL
 $result = $mysqli->query($query);
 echo "Total Records: " . $result->num_rows . "<br>";
 // Iterate through the result set
/*  print_r($result->fetch_row());
 print_r($result->fetch_row()); */
/*  while(list($i, $n, $e, $p, $r) = $result->fetch_row())
printf("ID: %d, Name: %s, Email: %s, Phone: %s, Role: %s<br>", $i, $n, $e, $p, $r); */
 while($row = $result->fetch_row()){
    print_r($row);
    echo "<br>";
 }
    
 $result->free();
 $mysqli->close();  

?>