<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gallery</title>
    <link rel="stylesheet" href="asstes/css/bootstrap.min.css" />
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
     /* Card hover effect */
     .card {
      overflow: hidden; /* Ensures the image doesn't overflow */
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: scale(1.05); /* Slightly scale up the card */
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Add shadow on hover */
    }

    /* Image hover effect */
    .card-img-top {
      transition: transform 0.3s ease;
    }

    .card:hover .card-img-top {
      transform: scale(1.1); /* Scale up the image */
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
    <div
      id="carouselExampleAutoplaying"
      class="carousel slide"
      data-bs-ride="carousel"
      data-bs-interval="2000"
    >
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/july14.png" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item">
          <img src="images/july03.png" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item">
          <img src="images/july05.png" class="d-block w-100" alt="..." />
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- carousel end -->
    <!-- Main Content -->
    <main class="container">
      <h1>July Shaheed'24</h1>
      <p>This is the main content area. You can add your content here.</p>
    </main>
    <!-- images start -->
    <div class="container mt-5">
      <div class="row">
        <!-- Card 1 -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july01.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">July Movment</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july02.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july03.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july04.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july05.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july06.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july07.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july08.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july09.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july10.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july11.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july12.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july13.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july14.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july15.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july16.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july17.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july18.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july19.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july20.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july21.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july22.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july23.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july24.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july25.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july26.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july27.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july28.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july29.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <!-- <div class="card">
            <img src="images/july30.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div> -->
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july31.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/july22.png" class="card-img-top" alt="Image 1" />
            <div class="card-body">
              <h5 class="card-title">Card 1</h5>
              <p class="card-text">July Shaheed</p>
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- images end -->
    <!-- object fit start -->
    <!-- <img
      src="images/july01.png"
      class="object-fit-contain border rounded"
      alt="..."
    />
    <img
      src="images/july02.png"
      class="object-fit-cover border rounded"
      alt="..."
    />
    <img
      src="images/july05.png"
      class="object-fit-fill border rounded"
      alt="..."
    />
    <img
      src="images/july03.png"
      class="object-fit-scale border rounded"
      alt="..."
    />
    <img
      src="images/july08.png"
      class="object-fit-none border rounded"
      alt="..."
    /> -->
    <!-- object fit end -->

    <!-- Footer -->
    <?php include "inc/footer.php"; ?>

    <!-- Bootstrap JS (Optional, for toggling the navbar on small screens) -->

    <script src="asstes/js/bootstrap.min.js"></script>
  </body>
</html>
