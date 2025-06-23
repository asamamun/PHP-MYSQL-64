<?php
$conn = new mysqli("localhost", "root", "", "r64_php");
/*
get all products: mainly ID, price
update the price in the following rules:
if price is less than 1000 , price will be same,
if price id greater than or equal to 1000 , price will increase 5%,
if price id greater than or equal to 10000 , price will increase 10%,
if price id greater than or equal to 50000 , price will increase 20%,
if price id greater than or equal to 100000 , price will increase 50%
*/
$result = $conn->query("SELECT id, price FROM products");
while ($row = $result->fetch_assoc()){
    $price = $row['price'];
    if ($price < 1000) {
        $price = $price;
    } elseif ($price >= 1000 && $price < 10000) {
        $price = $price * 1.05;
    } elseif ($price >= 10000 && $price < 50000) {
        $price = $price * 1.10;
    } elseif ($price >= 50000 && $price < 100000) {
        $price = $price * 1.20;
    } else {
        $price = $price * 1.50;
    }
    $conn->query("UPDATE products SET price = $price WHERE id = ".$row['id']);
}
