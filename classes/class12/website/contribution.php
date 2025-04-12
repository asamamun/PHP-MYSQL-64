<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contribution</title>
    <link rel="stylesheet" href="asstes/css/bootstrap.min.css">
<style>
    /* Custom styles for header and footer */
    .header {
      background-color: #346444; /* Dark background */
      color: rgb(87, 153, 102); /* White text */
      padding: 10px 0;
    }

    .footer {
      background-color: #346444; /* Dark background */
      color: white; /* White text */
      padding: 20px 0;
      text-align: center;
    }

    /* Add some spacing for the main content */
    main {
      padding: 20px 0;
    }
    /* Custom hover effect for navbar links */
    .navbar-nav .nav-link {
      position: relative;
      color: white; /* Default text color */
      transition: color 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
      color: #ffc107; /* Text color on hover */
    }

    /* Optional: Add an underline effect on hover */
    .navbar-nav .nav-link::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      background: #ffc107; /* Underline color */
      bottom: 0;
      left: 0;
      transition: width 0.3s ease;
    }

    .navbar-nav .nav-link:hover::after {
      width: 100%; /* Expand underline on hover */
    }
    footer {
      background-color: #135223;
      color: white;
      padding: 20px 0;
    } 
    .footer-container {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      max-width: 1200px;
      margin: auto;
    }
    .footer-section {
      flex: 1;
      margin: 10px;
      min-width: 200px;
    }
    .footer-section h2 {
      border-bottom: 2px solid rgb(31, 109, 42);
      padding-bottom: 5px;
    }
    .footer-section ul {
      list-style: none;
      padding: 0;
    }
    .footer-section ul li {
      margin: 5px 0;
    }
    .footer-section ul li a {
      color: white;
      text-decoration: none;
    }
    .footer-section.social a img {
      width: 30px;
      margin-right: 10px;
    }
    .footer-bottom {
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <!-- header -->
<?php include "inc/header.php"; ?>

     <!-- carousel start -->
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/july14.png" class="d-block w-100" alt="">
      </div>
      <div class="carousel-item">
        <img src="images/july03.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/july05.png" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- carousel end -->
  <!-- Main Content -->
  <main class="container">
    <h1>July Shaheed'24</h1>
    <p>Most of the students of our school have been killed by the terrorists.They are contribute this Movment.</p>
    <div>
    <h3 class="text-center">ARE YOU A VICTIM?</h3>
    <p>If you are a victim of the Quota Reform Movement 2024 or know someone who has been affected, we encourage you to reach out to us. Your voice matters.</p>
</div>
    <br>
    <div class="form-container">
        <h2 class="text-center mb-4">Registration Form</h2>
        <form>
          <!-- Name Field -->
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
          </div>
    
          <!-- Email Field -->
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
          </div>
    
          <!-- Password Field -->
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
          </div>
    
          <!-- Gender Selection -->
          <div class="mb-3">
            <label class="form-label">Gender</label>
            <div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                <label class="form-check-label" for="male">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                <label class="form-check-label" for="female">Female</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                <label class="form-check-label" for="other">Other</label>
              </div>
            </div>
          </div>
          <!-- Terms and Conditions -->
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="terms" required>
            <label class="form-check-label" for="terms">I agree to the terms and conditions</label>
          </div>
    
          <!-- Submit Button -->
          <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
      </div>
  </main>

  <!-- Footer -->
  <?php include "inc/footer.php"; ?>

  <!-- Bootstrap JS (Optional, for toggling the navbar on small screens) -->
  
    <script src="asstes/js/bootstrap.min.js">

    </script>
</body>
</html>