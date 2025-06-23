<?php
//products.php?page=3&per_page=10
require "db.php";
$total = $conn->query("SELECT count(*) as total from products where 1")->fetch_assoc()['total'];
$per_page = $_GET['per_page']??2;
$total_pages = ceil($total/$per_page);
$page = $_GET['page']??1;
$index = ($page - 1) * $per_page;
// $q = "SELECT * FROM products where 1 limit 0,5";
$q = "SELECT * FROM products where 1 limit $index,$per_page";
echo $q;
$result = $conn->query($q);
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
    <h3>Products Table</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <!-- <th scope="col">Description</th> -->
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Category</th>
                <!-- <th scope="col">Image</th> -->
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['name']}</td>";
                // echo "<td>{$row['description']}</td>";
                echo "<td>{$row['price']}</td>";
                echo "<td>{$row['quantity']}</td>";
                echo "<td>{$row['category_id']}</td>";
                // echo "<td>{$row['images']}</td>";
                echo "<td><a href='edit.php?id={$row['id']}'>Edit</a> | <a href='delete.php?id={$row['id']}'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <hr>
    <div>
        <p>Total Products: <?php echo $total; ?></p>
    </div>
    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item">
      <a class="page-link" href="?page=1">First</a>
    </li>
    <li class="page-item <?php echo $page == 1 ? 'disabled' : ''; ?>">
      <a class="page-link" href="?page=<?php echo $page-1;?>">Previous</a>
    </li>
    <?php
    for($i=1; $i<=$total_pages; $i++){
if( abs($i-$page) <=2){
if($i == $page){
            echo "<li class='page-item active'><a class='page-link' href='?page=$i&per_page=$per_page'>$i</a></li>";
            continue;
        }
        else{
            echo "<li class='page-item'><a class='page-link' href='?page=$i&per_page=$per_page'>$i</a></li>";
        }
}

        
        
    }
    ?>
    <li class="page-item <?php echo $page == $total_pages ? 'disabled' : ''; ?>">
      <a class="page-link" href="?page=<?php echo $page+1;?>">Next</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="?page=<?php echo $total_pages;?>">Last</a>
    </li>
  </ul>
</nav>
</body>
</html>