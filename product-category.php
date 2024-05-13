
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="responsive.css" />
  </head>

  <body>
    <?php
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
                <a href="aboutus.php">About</a>
              </li>
              <?php
              include 'connect.php';
              $id = $_GET['id'];
              
            $navSql = "SELECT * FROM categories LIMIT 3";
              $navResult = mysqli_query($conn, $navSql);
              if ($navResult) {
                if (mysqli_num_rows($navResult) > 0) {
                  while ($navs = mysqli_fetch_assoc($navResult)) {
                    $navId = $navs['ID'];
                    
                    echo
                    "          
                    <li>
                      <a href='product-category.php?id=" . $navId . "' class = ".(($id==$navId)?'active':'').">" . $navs['Name'] . "</a>
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
          if(isset($_SESSION['username'])){
            echo 
            "
            <a href='user-profile.php'><i class='fa fa-user-circle fa-2x icon' aria-hidden='true'></i></a>
            <a href = 'cart.php'><i class='fa fa-shopping-cart fa-2x icon'></i></a>
            <a href = 'logout.php'><i class='fa fa-sign-out fa-2x icon'></i></a>
            ";
          }else{
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
                  <a href="">Home</a>
                </li>
                <li>
                  <a href="aboutus.php">About</a>
                </li>
                <?php
                
            $navSql = "SELECT * FROM categories LIMIT 3";
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
          <i class="fa fa-home"></i><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Product<i class="fa fa-angle-right"></i>
          <?php
          $sql = "SELECT * FROM categories WHERE ID = '$id' ";
          $result = mysqli_query($conn,$sql);
          if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            echo $row['Name'];
          }
          else{
            header('location:error404.php');
          }
          ?>
        </div>
      </div>
    </section>
    <section class='product greenTara'>
      <div class='container'>
        <div class='section-body flex justify-center'>
          <?php
          $productSql = "SELECT * FROM products WHERE category_ID = '$id'";
          $productResult = mysqli_query($conn, $productSql);
          if ($productResult) {
            if (mysqli_num_rows($productResult) > 0) {
              while ($displayProduct = mysqli_fetch_assoc($productResult)) {
                echo
                "
                <div class='product-card'>
                      <div class='product-image'>
                        <a href='product-single.php?id=" . $displayProduct['ID'] . "'>
                          <img src='uploads/" . $displayProduct['Image_URL'] . "' alt='Unable to load image' class='w-100' />
                        </a>
                      </div>
                      <div class='product-info'>
                        <div class='flex'>
                          <h4 class='product-name'><a href='product-single.php?id=" . $displayProduct['ID'] . "'>" . $displayProduct['Title'] . "</a></h4>
                          <p>" . $displayProduct['Dimensions'] . "</p>
                        </div>
                        <p>Rs " . $displayProduct['Price'] . "</p>
                        <a href='product-single.php?id=" . $displayProduct['ID'] . "'>View Details</a>
                      </div>
                </div>
                ";
              }
            }
          }
          ?>
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