  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product</title>
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
          <i class="fa fa-home"></i><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Product
        </div>
      </div>
    </section>
    <section class='product greenTara'>
      <div class='container'>
        <div class='section-body flex justify-center'>
          <?php
          $searchProduct = $_GET['search'];
          $searchSql = "SELECT * FROM products WHERE Title like '%$searchProduct%'";
          $searchResult = mysqli_query($conn, $searchSql);
          if ($searchResult) {
            if (mysqli_num_rows($searchResult) > 0) {
              while ($displayProduct = mysqli_fetch_assoc($searchResult)) {
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
                          <h4 class='product-name'><a href=''>" . $displayProduct['Title'] . "</a></h4>
                          <p>" . $displayProduct['Dimensions'] . "</p>
                        </div>
                        <p>Rs " . $displayProduct['Price'] . "</p>
                        <a href='product-single.php?id=" . $displayProduct['ID'] . "'>View Details</a>
                      </div>
                </div>
                ";
              }
            } else {
              echo
              "
              <h4>Sorry no matching items found</h4>
              ";
            }
          }
          ?>
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