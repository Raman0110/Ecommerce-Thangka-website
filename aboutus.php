<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us</title>
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
        <i class="fa fa-home"></i><a href="index.php">Home</a><i class="fa fa-angle-right"></i>About us
      </div>
    </div>
  </section>
  <section class="about-us container">
    <div class="flex">
      <div class="about-text">
        <h2>About us</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat eligendi ipsum reiciendis! Odio quia cupiditate, praesentium maxime nisi, atque obcaecati, assumenda sapiente qui quam perspiciatis eveniet!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo vero laborum dolorem culpa impedit veritatis aut est soluta ad similique cupiditate, expedita atque id magni beatae eaque cumque quidem, sint illum reprehenderit totam ex facere quis eveniet. Quasi, odio nisi?Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab maxime, eum ipsam, fugit natus veniam, dignissimos nostrum sequi omnis quidem doloremque quaerat cum ducimus dolorum. </p>
      </div>
      <div class="about-image">
        <img src="Green-Tara.jpg" alt="">
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