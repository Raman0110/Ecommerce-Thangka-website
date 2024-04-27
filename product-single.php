<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="responsive.css">
</head>

<body>
  <?php
  $id = $_GET['id'];
  include 'connect.php';
  $sql = "SELECT * FROM products WHERE ID = $id";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $row = mysqli_fetch_assoc($result);
  }
  ?>




  <header class="header">
    <div class="container">
      <div class="flex">
        <div class="logo">
          <h2>Logo</h2>
        </div>
        <nav class="nav">
          <ul>
            <li>
              <a href="index.php">Home</a>
            </li>
            <li>
              <a href="">About</a>
            </li>
            <li>
              <a href="">Green Tara</a>
            </li>
            <li>
              <a href="">Mandala</a>
            </li>
            <li>
              <a href="">Buddha Life</a>
            </li>
            <li>
              <a href="blog.php">Blog</a>
            </li>
            <li>
              <a href="">Contact</a>
            </li>
          </ul>
        </nav>
        <div class="icons">
          <a href=""><i class="fa fa-user-circle fa-2x icon" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-search fa-2x icon" aria-hidden="true"></i></a>
          <i class="fa fa-bars fa-2x icon" id="bars" aria-hidden="true"></i>
        </div>
        <div class="mobile-nav">
          <div class="menu-exit">
            <i class="fa fa-times fa-lg" id="exit-icon"></i>
          </div>
          <div class="navigations">
            <ul>
              <li>
                <a href="" class="active">Home</a>
              </li>
              <li>
                <a href="">About</a>
              </li>
              <li>
                <a href="">Green Tara</a>
              </li>
              <li>
                <a href="">Manjushree</a>
              </li>
              <li>
                <a href="">Buddha Life</a>
              </li>
              <li>
                <a href="">Mandala</a>
              </li>
              <li>
                <a href="">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  <section class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-content flex">
        <i class="fa fa-home"></i><a href="index.php">Home</a><i class="fa fa-angle-right"></i><a href="">Product</a>
      </div>
    </div>
  </section>
  <section class="main-section">
    <div class="container">
      <div class="main-content flex">
        <div class="main-product">
          <img src='<?php echo "uploads/" . $row['Image_URL'] . "" ?>' alt="">
          <h2><?php echo $row['Title']?></h2>
          <p><?php echo $row['Description']?></p>
          <p>Price: <?php echo $row['Price']?></p>
          <p>Size: <?php echo $row['Dimensions']?></p>
        </div>
        <div class="related-product">
          <h2>Related Products</h2>
          <div class="more-product flex">
            <div class="image">
              <img src="./mandala.jpg" alt="">
            </div>
            <div class="info">
              <h4>Mandala Art</h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
          </div>
          <div class="more-product flex">
            <div class="image">
              <img src="./buddha.jpg" alt="">
            </div>
            <div class="info">
              <h4>Buddha Life</h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
          </div>
          <div class="more-product flex">
            <div class="image">
              <img src="./mandala.jpg" alt="">
            </div>
            <div class="info">
              <h4>Mandala Art</h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="footer-content flex">
        <div class="footer-section">
          <h3>Logo</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, sed. Molestiae quam porro dolores aspernatur excepturi esse cum accusamus deserunt?</p>
        </div>
        <div class="footer-section">
          <div class="m-auto">
            <h4>Quick links</h4>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="">About us</a></li>
              <li><a href="">Contact us</a></li>
              <li><a href="blog.php">Blog</a></li>
            </ul>
          </div>
        </div>
        <div class="footer-section">
          <h4>Contact us</h4>
          <ul>
            <li><a href=""><i class="fa fa-phone"></i>+977 9800000000</a></li>
            <li><a href=""><i class="fa fa-envelope"></i>mythankas@gmail.com</a></li>
            <li><a href=""><i class="fa fa-map-marker"></i>Boudha-06, Kathmandu</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="script.js"></script>
</body>

</html>