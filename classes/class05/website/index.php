<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="asstes/css/bootstrap.min.css">
<style>
    /* Custom styles for header and footer */
    .header {
      background-color: #346444; /* Dark background */
      color: rgb(87, 153, 102); /* White text */
      padding: 10px 0;
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
  <!-- Header -->
<?php include "inc/header.php"; ?>
  <!-- carousel start -->
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/july14.png" class="d-block w-100" alt="...">
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
    <p>This is the main content area. You can add your content here.</p>
  
  <div class="clearfix">
    <img src="images/july09.png" class="col-md-6 float-md-end mb-3 ms-md-3" alt="...">
  
    <p>
      A paragraph of placeholder text. We're using it here to show the use of the clearfix class. We're adding quite a few meaningless phrases here to demonstrate how the columns interact here with the floated image.
    </p>
  
    <p>
      As you can see the paragraphs gracefully wrap around the floated image. Now imagine how this would look with some actual content in here, rather than just this boring placeholder text that goes on and on, but actually conveys no tangible information at. It simply takes up space and should not really be read.
    </p>
  
    <p>
      And yet, here you are, still persevering in reading this placeholder text, hoping for some more insights, or some hidden easter egg of content. A joke, perhaps. Unfortunately, there's none of that here.
    </p>
  </div>
</main>

  <!-- Footer -->
<?php include "inc/footer.php"; ?>
  
  
    
    
 
  

  <!-- Bootstrap JS (Optional, for toggling the navbar on small screens) -->
  
</body>
</html>
    <script src="asstes/js/bootstrap.min.js">

    </script>
</body>
</html>