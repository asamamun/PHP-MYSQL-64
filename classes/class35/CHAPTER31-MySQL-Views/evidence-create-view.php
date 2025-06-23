<?php
$conn = new mysqli("localhost","root","","r64_php") or die("Connection Problem!!");

$view = "CREATE or replace VIEW product_gt_5k AS SELECT * FROM products WHERE price > 5000 ORDER BY price DESC";

if ($conn->query($view) === TRUE) {
    echo "View created successfully";
} else {
    echo "Error creating view: " . $conn->error;
}