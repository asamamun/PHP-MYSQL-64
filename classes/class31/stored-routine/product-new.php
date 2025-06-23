<?php
require "db.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['stock_quantity']);
    $category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : null;

    // image upload start
    $images = $_FILES['images']??null;
    $imageNames = [];
    if (isset($images['name'][0])) {
        foreach ($images['name'] as $key => $image) {
            $image_tmp = $images['tmp_name'][$key];
            // echo "../assets/products/$image <br>";
            move_uploaded_file($image_tmp, "products/$image");
            $imageNames[] = $image;
        }
    }
    // image upload end
    $routine = "call InsertProduct('$name','$description','$price','$quantity','$category_id','".
    implode(",",$imageNames)."')";
    $result = $conn->query($routine);

    if ($result) {
        $message = "Product added successfully";
    } else {
        $message = "Error adding product";
    }


} 
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">

        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="image/profile.jpg" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Setting</a>
                                <a href="logout.php" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Add New Product</h4>
                        <a href="product-all.php" class="btn btn-primary">All Products</a>
                    </div>

                    <!-- product add -->
                     <?php
                        if (isset($message)) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            ' . $message . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        }
                     ?>
                    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="name" name="name" required />
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
      </div>

      <div class="mb-3">
        <label for="price" class="form-label">Price ($)</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" required />
      </div>

      <div class="mb-3">
        <label for="stock_quantity" class="form-label">Stock Quantity</label>
        <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" required />
      </div>

      <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select class="form-select" id="category_id" name="category_id">
          <option selected disabled>Choose category</option>
          <?php
          // Fetch categories from the database
          $stmt = $conn->prepare("SELECT id, name FROM categories");
          $stmt->execute();
          $result = $stmt->get_result();
          while ($row = $result->fetch_assoc()) {
              echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
          }
          ?>
<!--           <option value="1">Automobiles</option>
          <option value="2">Electronics</option>   -->        
          <!-- Add more categories as needed -->
        </select>
      </div>
      <!-- image upload -->
      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="images[]" multiple accept="image/*" capture />
      </div>

      <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
                    <!-- product add end -->
                </div>
            </main>
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>CodzSwod</strong>
                                </a>
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Contact</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">About Us</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Terms</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Booking</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
