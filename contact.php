<?php
include('header.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/contact.css">
    <!-- Fontawesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
           <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../project/css/index.css">
<link rel="stylesheet" href="../project/js/contact.js">
        </head>
   <body>

    <section class = "contact-section">
      <div class = "contact-bg">
        <h3>Get in Touch with Us</h3>
        <h2>contact us</h2>
        <div class = "line">
          <div></div>
          <div></div>
          <div></div>
        </div>
        <p class = "text">"As a membership site, we're always focused on reducing churn and increasing satisfaction. We know that collecting feedback from customers throughout the customer's lifecycle has allowed us to achieve both." </p>
      </div>


      <div class = "contact-body">
        <div class = "contact-info">
          <div>
            <span><i class = "fas fa-mobile-alt"></i></span>
            <span>Phone No.</span>
            <span class = "text">9815104486</span>
          </div>
          <div>
            <span><i class = "fas fa-envelope-open"></i></span>
            <span>E-mail</span>
            <span class = "text">Chelibeti@gmail.com</span>
          </div>
          <div>
            <span><i class = "fas fa-map-marker-alt"></i></span>
            <span>Address</span>
            <span class = "text">Bhajapatan-13, Pokhara, Kaski, Nepal</span>
          </div>
          <div>
            <span><i class = "fas fa-clock"></i></span>
            <span>Opening Hours</span>
            <span class = "text">Sunday - Friday (10:00 AM to 5:00 PM)</span>
          </div>
        </div>

        <div class = "contact-form">
        <form action="https://formspree.io/f/xdovplaj" method="POST">
            <div>
              <input type = "text" class = "form-control" placeholder="First Name">
              <input type = "text" class = "form-control" placeholder="Last Name">
            </div>
            <div>
              <input type = "email" class = "form-control" placeholder="E-mail">
              <input type = "text" class = "form-control" placeholder="Phone">
            </div>
            <textarea rows = "5" placeholder="Message" class = "form-control"></textarea>
            <input type = "submit" class = "send-btn" value = "send message">
          </form>

          <div>
            <img src = "../project/pic/desk.png" alt = "">
          </div>
        </div>
      </div>
      <div class = "map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3515.449364969461!2d83.97851441507343!3d28.224037482580798!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3995943f649d200b%3A0x4ee44c3d0bca654e!2sMount%20Annapurna%20Campus!5e0!3m2!1sen!2snp!4v1677583820508!5m2!1sen!2snp"      width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
      <?php
include('top.php');
?>
    </section>
    <?php
include('footer.php');
?>
    

  </body>
</html>