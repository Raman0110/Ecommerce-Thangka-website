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
  <header class="header">

    <div class="container">
      <div class="flex">
        <div class="logo">
          <h2>Logo</h2>
        </div>
        <nav class="nav">
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
                <a href="blog.php">Blog</a>
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
  <div class="banner">
    <div class="swiper banner-swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="banner-slider">
            <img src="banner.jpg" alt="" class="banner-img" />
            <div class="container">
              <div class="banner-text">
                <h1>Welcome to My Thankas</h1>
                <a href="" class="banner-btn">Learn More <i class="fa fa-angle-double-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="banner-slider">
            <img src="banner.jpg" alt="" class="banner-img" />
            <div class="container">
              <div class="banner-text">
                <h1>Welcome to My Thankas</h1>
                <a href="" class="banner-btn">Learn More <i class="fa fa-angle-double-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="banner-slider">
            <img src="banner.jpg" alt="" class="banner-img" />
            <div class="container">
              <div class="banner-text">
                <h1>Welcome to My Thankas</h1>
                <a href="" class="banner-btn">Learn More <i class="fa fa-angle-double-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </div>

  <!-- Product Section -->
  <?php
  include 'connect.php';
  $featureQuery = "SELECT * FROM categories WHERE featured = 1";
  $featureResult = mysqli_query($conn,$featureQuery);
  echo $featureQuery;
  if($featureResult){
    while($newRow = mysqli_fetch_assoc($feaureResult)){
      $catId = $newRow['ID'];
      $sql = "SELECT * FROM products WHERE Category_ID = '$catId' LIMIT 4";
      $result = mysqli_query($conn, $sql);
    //   echo 
    //   "
    //   <section class='product greenTara'>
    // <div class='container'>
    //   <div class='flex'>
    //     <div class='section-heading'>
    //       <h2>Green Tara</h2>
    //     </div>
    //     <a href=' class='view-button'>View all<i class='fa fa-angle-double-right'></i></a>
    //   </div>
    //   <div class='section-body flex justify-center'>";
    //     if ($result) {
    //       if (mysqli_num_rows($result) > 0) {
    //         while ($row = mysqli_fetch_assoc($result)) {
    //           echo
    //           "
    //             <div class='product-card'>
    //                   <div class='product-image'>
    //                     <a href='product-single.php?id=" . $row['ID'] . "'>
    //                       <img src='uploads/" . $row['Image_URL'] . "' alt='Unable to load image' class='w-100' />
    //                     </a>
    //                   </div>
    //                   <div class='product-info'>
    //                     <div class='flex'>
    //                       <h4 class='product-name'><a href=''>" . $row['Title'] . "</a></h4>
    //                       <p>" . $row['Dimensions'] . "</p>
    //                     </div>
    //                     <p>Rs " . $row['Price'] . "</p>
    //                     <a href='product-single.php?id=" . $row['ID'] . "'>View Details</a>
    //                   </div>
    //             </div>
    //             ";
    //         }
    //       }
    //     }
    //         echo"
    //         </div>
    //         </div>
    //         </section>
    //         ";
          }
        };
          ?>
  <section class="Blogs">
    <div class="container">
      <div class="section-heading">
        <h2>Blogs & News</h2>
      </div>
      <div class="section-body flex justify-center align-stretch">
        <?php
        $sql = 'SELECT * FROM blogs LIMIT 3';
        $result = mysqli_query($conn, $sql);
        if ($result) {
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $categories = $row['categoryId'];
              $sql2 = "SELECT * FROM blogCategories WHERE id = $categories";
              $result2 = mysqli_query($conn, $sql2);
              if ($result2) {
                $row2 = mysqli_fetch_assoc($result2);
              }
              echo
              "<div class='blog-card'>
              <div class='blog-image'>
                <a href='blog-single.php?id=" . $row['id'] . "'>
                  <img src='uploads/" . $row['image'] . "' alt='' class='w-100'>
                </a>
              </div>
              <div class='blog-info'>
                <p class='blog-catagory'>" . $row2['name'] . "</p>
                <h4>" . $row['title'] . "</h4>
                <p>" . substr($row['description'], 0, 50) . "</p>
                <a href='blog-single.php?id=" . $row['id'] . "'>Read More<i class='fa fa-angle-double-right fa-lg'></i></a>
              </div>
            </div>";
            }
          }
        }
        ?>
      </div>
    </div>
  </section>
  <section class="features">
    <div class="container">
      <div class="feature-section flex">
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fa fa-truck fa-2x" aria-hidden="true"></i>
          </div>
          <div class="feature-text">
            <h4>Fast Shipping</h4>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde rem veniam blanditiis, debitis quae dolorum?</p>
          </div>
        </div>
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fa fa-truck fa-2x" aria-hidden="true"></i>
          </div>
          <div class="feature-text">
            <h4>Fast Shipping</h4>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde rem veniam blanditiis, debitis quae dolorum?</p>
          </div>
        </div>
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fa fa-truck fa-2x" aria-hidden="true"></i>
          </div>
          <div class="feature-text">
            <h4>Fast Shipping</h4>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde rem veniam blanditiis, debitis quae dolorum?</p>
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