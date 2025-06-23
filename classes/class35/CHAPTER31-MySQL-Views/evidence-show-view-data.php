<?php
$conn = new mysqli("localhost","root","","r64_php") or die("Connection Problem!!");

$view = "SELECT * FROM product_gt_5k";

$result = $conn->query($view);

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th><th>Price</th><th>Quantity</th><!--th>Desc</th--></tr>";

if($result->num_rows){
    while( $row = $result->fetch_assoc() ) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['price']."</td>";
        echo "<td>".$row['quantity']."</td>";
        echo "<!--td>".$row['description']."</td-->";
        echo "</tr>";
    }
}
echo "</table>";
