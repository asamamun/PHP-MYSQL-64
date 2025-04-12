<?php require "class.EngToBanglaDate.php"; ?>
<footer>
    <div class="footer-container">
      <div class="footer-section about">
        <h2>About Us</h2>
        <p>We provide quality content and services to help you grow your business.</p>
      </div>
      
      <div class="footer-section links">
        <h2>Quick Links</h2>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
      
      <div class="footer-section contact">
        <h2>Contact Us</h2>
        <p>Email: info@example.com</p>
        <p>Phone: +123 456 7890</p>
      </div>
      
      <div class="footer-section social">
        <h2>Follow Us</h2>
        <a href="#"><img src="images/fb.png" alt="Facebook"></a>
        <a href="#"><img src="images/x.png" alt="Twitter"></a>
        <a href="#"><img src="images/insta.png" alt="Instagram"></a>
      </div>
    </div>
    <?php
  $d = new EngToBanglaDate(date("U"));
  $d->convert();
  $banglaDate = $d->showBanglaDate();
  $d->nextYear();
 $nextyear = $d->get_date();
  // var_dump($nextyear);

// var_dump($d->get_date());
    ?>
    <div class="footer-bottom">
      <p>&copy; <?php echo $banglaDate[2]; ?>-<?php echo $nextyear[2]; ?> YourCompany. All Rights Reserved.</p>
    </div>
  </footer>