<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="responsive.css" />
</head>

<body>
  <?php
  require('session.php');
  ?>
  <?php
  include 'header.php';
  ?>
  <section class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-content flex">
        <i class="fa fa-home"></i><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Contact us
      </div>
    </div>
  </section>
  <section class="contact-section">
    <div class="container">
      <div class="flex justify-center">
        <div class="contact-form flex">
          <div class="form-section">
            <form action="contactus.php" class="flex contact-input" method="POST">
              <label for="name">Name</label>
              <input type="text" name="name" id="name">
              <label for="email">Email</label>
              <input type="text" name="email" id="email">
              <label for="subject">Subject</label>
              <input type="text" name="subject" id="subject">
              <label for="message">Message</label>
              <textarea name="message" id="message" rows="10"></textarea>
              <button type="submit" id="contact-btn" name = "send" >Send</button>
            </form>
          </div>
          <div class="info-section">
            <h1>Please feel free to contact us anytime for related queries</h1>
            <p><i class="fa fa-envelope-o" aria-hidden="true"></i>
              mythankas@gmail.com</p>
            <p><i class="fa fa-phone" aria-hidden="true"></i>
              +977 9800000000</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
  include 'footer.php';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="script.js"></script>
</body>

</html>