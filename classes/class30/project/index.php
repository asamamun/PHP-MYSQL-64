<?php
session_start();
require "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">
<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <!-- login and registration link with bootstrap icons -->
      <ul class="navbar-nav ms-auto">
        <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
          if($_SESSION['role'] == 'admin'){
            echo '<li class="nav-item">
              <a class="nav-link" href="admin/dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
            </li>';
          }
          echo '<li class="nav-item">
            <a class="nav-link" href="profile.php"><i class="bi bi-person-fill"></i> '.$_SESSION['username'].'</a></li>';
          echo '<li class="nav-item">
          <a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </li>';
        } else{
          echo '<li class="nav-item">
            <a class="nav-link" href="login.php"><i class="bi bi-box-arrow-in-right"></i> Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registration.php"><i class="bi bi-person-plus-fill"></i> Register</a>
          </li>';
        } ?>
        <!-- <li class="nav-item">
          <a class="nav-link" href="login.php"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php"><i class="bi bi-person-plus-fill"></i> Register</a>
        </li> -->
        <!-- logout link with bootstrap icon -->
        
      </ul>
    </div>
  </div>
</nav>
<!-- navbar end -->
<!-- categories -->
<div class="container py-4">
  <div id="categoryCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php
      
      $categories = $conn->query("SELECT * FROM categories");
      $count = 0;
      $total = $categories->num_rows;
      $itemIndex = 0;

      while($category = $categories->fetch_assoc()) {
          if ($count % 6 === 0) {
              if ($count > 0) echo '</div></div>'; // close previous item
              echo '<div class="carousel-item' . ($itemIndex === 0 ? ' active' : '') . '">';
              echo '<div class="row row-cols-1 row-cols-md-6 g-4">';
              $itemIndex++;
          }
      ?>
          <div class="col">
            <div class="card h-100 text-center">
              <div class="card-body">
                <h5 class="card-title">
                  <i class="<?php echo $category['icon']; ?>"></i><br>
                  <?php echo $category['name']; ?>
                </h5>
              </div>
            </div>
          </div>
      <?php
          $count++;
      }

      if ($total > 0) echo '</div></div>'; // close final carousel-item and row
      ?>
    </div>

    <!-- Carousel controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#categoryCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#categoryCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<!-- categories end -->
 <hr>
 <!-- products start -->
 <?php

$query = "
    SELECT p.id, p.name, p.description, p.price, p.quantity, p.created_at, c.name AS category, p.images
    FROM products p
    LEFT JOIN categories c ON p.category_id = c.id
    ORDER BY p.created_at DESC
";

$result = $conn->query($query);
?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container py-5">
  <h2 class="mb-4">All Products</h2>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

    <?php while($product = $result->fetch_assoc()) { ?>
      <div class="col">
        <div class="card h-100 shadow-sm">
          <?php
          if($product['images'] != null ){
            ?>
            <img src="assets/products/<?php echo explode(',', $product['images'])[0]; // get first image from comma separated list of images $product['images']; ?>" class="card-img-top" alt="...">
          <?php
          }
          ?>
        
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
            <p class="card-text small text-muted mb-2"><?php echo htmlspecialchars($product['category']); ?></p>
            <?php
$desc = htmlspecialchars($product['description']);
$short = substr($desc, 0, 100);
$isLong = strlen($desc) > 100;
$uniqueId = 'desc_' . $product['id'];
?>

<p class="card-text">
  <?php echo nl2br($short); ?>
  <?php if ($isLong): ?>
    <span id="<?php echo $uniqueId; ?>" class="collapse"><?php echo nl2br(substr($desc, 100)); ?></span>
    <a href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#<?php echo $uniqueId; ?>" class="text-primary ms-1">
      Read more
    </a>
  <?php endif; ?>
</p>
            <div class="mt-auto">
              <p class="fw-bold text-primary">$<?php echo number_format($product['price'], 2); ?></p>
              <span class="badge bg-secondary">Qty: <?php echo $product['quantity']; ?></span>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>

  </div>
</div>

<?php
$result->free();
$conn->close();
?>

 <!-- products end -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>