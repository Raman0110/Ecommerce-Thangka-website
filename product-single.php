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
  require('session.php');
  include 'header.php';
  // For clicked product
  $id = $_GET['id'];
  $sql = "SELECT p.*, c.Name AS cata 
  FROM products p 
  INNER JOIN categories c ON c.ID = p.Category_ID 
  WHERE p.ID = $id;";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  } else {
    header('location:error404.php');
  }
  ?>
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
          <p class="category"><?php echo $row['cata'] ?></p>
          <h2><?php echo $row['Title'] ?></h2>
          <p><?php echo $row['Description'] ?></p>
          <p>Price: <?php echo $row['Price'] ?></p>
          <p>Size: <?php echo $row['Dimensions'] ?></p>
          <?php

          if (isset($_SESSION['username'])) {
            $product_name = $row['Title'];
            $product_price = $row['Price'];
            $product_size = $row['Dimensions'];
            $product_img = $row['Image_URL'];
            echo
            "
            <form action='cart-items.php' method='POST'>
            <input type='hidden' name='name' value='$product_name'>
            <input type='hidden' name='price' value='$product_price'>
            <input type='hidden' name='size' value='$product_size'>
            <input type='hidden' name='img' value='$product_img'>
            <input type='hidden' name='product-id' value='$id'>
            <button id='cart-btn' name='add-cart-btn' type = 'submit'>Add to cart</button>
            </form>
            ";
          }
          ?>
        </div>

        <div class="related-product">
          <h2>Latest Products</h2>
          <?php
          //For related product
          $sql2 = "SELECT * FROM products LIMIT 3";
          $result2 = mysqli_query($conn, $sql2);
          if ($result2) {
            if (mysqli_num_rows($result2) > 0) {
              while ($recentRow = mysqli_fetch_assoc($result2)) {
                echo
                "
                  <a href='product-single.php?id=" . $recentRow['ID'] . "'>
                  <div class='more-product flex'>
                    <div class='image'>
                      <img src='uploads/" . $recentRow['Image_URL'] . "' alt='Error loading image'>
                    </div>
                    <div class='info'>
                      <h4>" . $recentRow['Title'] . "</h4>
                      <p>" . $recentRow['Description'] . "</p>
                    </div>
                  </div>
                  </a>
                  ";
              }
            }
          }
          ?>
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