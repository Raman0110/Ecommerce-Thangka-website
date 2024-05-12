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
  include 'connect.php';
  require('session.php');
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
              <a href=""class="active">About</a>
            </li>
            <?php
            $navSql = "SELECT * FROM categories";
            $navResult = mysqli_query($conn, $navSql);
            if ($navResult) {
              if (mysqli_num_rows($navResult) > 0) {
                while ($navs = mysqli_fetch_assoc($navResult)) {
                  echo
                  "          
                    <li>
                      <a href='product-category.php?id=" . $navs['ID'] . "'>" . $navs['Name'] . "</a>
                    </li>
                    ";
                }
              }
            }
            ?>
            <li>
              <a href="blog.php">Blog</a>
            </li>
            <li>
              <a href="contactus.php">Contact</a>
            </li>
          </ul>
        </nav>
        <div class="icons">
          <a href="#"><i class="fa fa-search fa-2x icon" aria-hidden="true" id="search-btn"></i></a>
          <?php
          if (isset($_SESSION['username'])) {
            echo
            "
            <a href='user-profile.php'><i class='fa fa-user-circle fa-2x icon' aria-hidden='true'></i></a>
            <a href = 'logout.php'><i class='fa fa-sign-out fa-2x icon'></i></a>
            ";
          } else {
            echo
            "
            <a href='login.php' class='login-btn'>Login</a>
            ";
          }
          ?>
          <i class="fa fa-bars fa-2x icon" id="bars" aria-hidden="true"></i>
        </div>
        <div class="mobile-nav">
          <div class="menu-exit">
            <i class="fa fa-times fa-lg" id="exit-icon"></i>
          </div>
          <div class="navigations">
            <ul>
              <li>
                <a href="index.php">Home</a>
              </li>
              <li>
                <a href="aboutus.php">About</a>
              </li>
              <?php
              $navSql = "SELECT * FROM categories";
              $navResult = mysqli_query($conn, $navSql);
              if ($navResult) {
                if (mysqli_num_rows($navResult) > 0) {
                  while ($navs = mysqli_fetch_assoc($navResult)) {
                    echo
                    "          
                    <li>
                      <a href='product-category.php?id=" . $navs['ID'] . "'>" . $navs['Name'] . "</a>
                    </li>
                    ";
                  }
                }
              }
              ?>
              <li>
                <a href="blog.php">Blog</a>
              </li>
              <li>
                <a href="contactus.php">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="searchForm d-none">
      <form action="search-item.php" method="GET">
        <input type="text" placeholder="Search" id="searchBox" name="search">
      </form>
    </div>
  </header>
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
              <li><a href="">Home</a></li>
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