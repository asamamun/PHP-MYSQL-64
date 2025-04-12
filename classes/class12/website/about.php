<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About</title>
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
      <div class="container overflow-hidden text-center">
        <div class="row gx-5">
          <div class="col">
           <div class="p-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos sunt enim autem itaque dolore voluptas aperiam iure fuga pariatur numquam tempore delectus deleniti, odio, similique quis explicabo consequatur modi minus.
           Earum laborum a recusandae deserunt mollitia sed voluptatem fuga dicta quos hic sunt necessitatibus nulla modi odio nihil, exercitationem repellendus? Dolor repudiandae sint modi quam cum. Dolorum numquam optio expedita?
           Dolore, consequatur? Molestias fugiat quibusdam corporis, expedita ipsa voluptate perferendis hic! Accusantium excepturi quisquam dolores dignissimos animi placeat debitis iste vero! Esse eaque porro expedita soluta culpa nihil ab voluptas?
           Fugit delectus debitis porro reiciendis ducimus minus doloribus nemo error fugiat, accusamus suscipit perferendis natus eaque nisi harum! Aut modi illo similique quod placeat accusantium molestias autem nemo atque illum!
           Amet tempore iusto libero fugit consequuntur. Illum excepturi repellat dolorum neque alias doloribus delectus voluptate sunt culpa quia cumque mollitia, modi accusamus officia quaerat omnis. Cupiditate ex voluptate numquam veritatis!
           Optio cumque est suscipit commodi a, in maxime cupiditate veritatis repudiandae labore totam ipsa ipsum, minima odio nisi neque natus ipsam reiciendis. Ab nisi tempore ducimus deleniti est incidunt eos?
           Eos minima ipsam fugit sapiente alias mollitia in, obcaecati ab pariatur! Magni, temporibus exercitationem veniam, soluta voluptates iste iure quae doloremque, libero quo expedita quisquam dignissimos porro quibusdam repudiandae. Architecto.
           Eligendi aut ipsum minima cumque, quisquam impedit, velit vero quasi recusandae alias explicabo pariatur molestiae cupiditate beatae vel laudantium ipsam eos! Harum nihil est at atque veritatis facilis alias a?
           Reiciendis omnis amet blanditiis excepturi deserunt eaque! Alias non natus cumque iusto nulla iste facere mollitia iure unde explicabo suscipit doloribus dolores eaque sapiente labore, ea dignissimos dolore voluptates molestiae!
           Dolores suscipit neque earum, amet atque distinctio iusto accusamus nulla, illum quod reiciendis iste fuga laudantium exercitationem corrupti nam sed recusandae voluptatibus! Velit facere reprehenderit doloribus deserunt ipsum dolorem assumenda.</div>
          </div>
          <div class="col">
            <div class="p-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus id tenetur corporis nam quasi dolorum exercitationem a architecto, dolorem et sequi minus delectus eligendi repellat itaque in. Minus, iure vitae.
            Commodi repellat iure fuga explicabo nulla alias doloribus aspernatur sed quo quaerat dolores temporibus, quis iste laboriosam suscipit facere impedit! Qui esse ipsum alias amet at quasi obcaecati et! Similique.
            Nihil repellendus magnam libero placeat perferendis veniam voluptates. Alias reprehenderit nesciunt expedita ab corrupti, maxime, et corporis omnis numquam tenetur optio exercitationem aliquid facilis ratione. Nulla beatae reprehenderit neque molestiae!
            Eum doloremque totam amet laudantium tempore optio quibusdam eos, at illo ipsum aperiam. Qui iste blanditiis enim voluptates iusto voluptatem, sapiente maxime minima impedit aliquid quo ea ab minus ducimus.
            Quia quaerat enim quidem praesentium et ullam cum quisquam reprehenderit eos quibusdam voluptatum vitae fuga tenetur, hic magnam in dolorem eius autem mollitia, consequuntur non. Sed quisquam saepe praesentium harum.
            Tempore, dolor aut reiciendis quis nesciunt omnis! Ratione inventore perspiciatis, velit illo earum ipsam, voluptatum, dolor ab mollitia voluptatem minima doloremque. Reiciendis expedita unde repellat provident vel! Pariatur, veniam tenetur.
            Cum animi delectus, distinctio sit ratione inventore, illum natus asperiores modi, cumque amet? Nulla aperiam assumenda expedita cum quibusdam dicta dolorum, recusandae, ad itaque explicabo praesentium repudiandae iste iusto officiis.
            In deserunt alias aliquid iste quo nostrum aut aspernatur, ut eveniet id iure optio nulla natus ducimus, sapiente incidunt molestiae, obcaecati neque beatae nemo dolore odio. Nemo sit atque voluptate!</div>
          </div>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <?php include "inc/footer.php"; ?>

    <!-- Bootstrap JS (Optional, for toggling the navbar on small screens) -->

    <script src="asstes/js/bootstrap.min.js"></script>
  </body>
</html>
