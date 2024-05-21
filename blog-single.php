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
  ?>
  <?php
  include 'header.php';
  $id = $_GET['id'];
  $sql = "SELECT * FROM blogs WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  } else {
    header('location:error404.php');
  }
  $sql2 = "SELECT * FROM blogCategories WHERE id = " . $row['categoryId'] . "";
  $result2 = mysqli_query($conn, $sql2);
  if ($result2) {
    $row2 = mysqli_fetch_assoc($result2);
  }

  ?>
  <section class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-content flex">
        <i class="fa fa-home"></i><a href="index.php">Home</a><i class="fa fa-angle-right"></i><a href="blog.php">Blog</a>
      </div>
    </div>
  </section>
  <section class="main-section">
    <div class="container">
      <div class="main-content flex">
        <div class="main-product">
          <img src='<?php echo "uploads/" . $row['image'] . "" ?>' alt="">
          <p class="category"><?php echo $row2['name'] ?></p>
          <h2><?php echo $row['title'] ?></h2>
          <p><?php echo $row['description'] ?></p>
        </div>
        <div class="related-product">
          <h2>Recent Post</h2>
          <div class="more-product more-blog flex">
            <div class="image">
              <img src="./buddha.jpg" alt="">
            </div>
            <div class="info">
              <h4>50 Facts about Mandala Art</h4>
              <p><i class="fa fa-calendar"></i>April 7, 2024</p>
            </div>
          </div>
          <div class="more-product more-blog flex">
            <div class="image">
              <img src="./Green-Tara.jpg" alt="">
            </div>
            <div class="info">
              <h4>50 Facts about Mandala Art</h4>
              <p><i class="fa fa-calendar"></i>April 7, 2024</p>
            </div>
          </div>
          <div class="more-product more-blog flex">
            <div class="image">
              <img src="./mandala.jpg" alt="">
            </div>
            <div class="info">
              <h4>50 Facts about Mandala Art</h4>
              <p><i class="fa fa-calendar"></i>April 7, 2024</p>
            </div>
          </div>
          <div class="more-product more-blog flex">
            <div class="image">
              <img src="./mandala.jpg" alt="">
            </div>
            <div class="info">
              <h4>50 Facts about Mandala Art</h4>
              <p><i class="fa fa-calendar"></i>April 7, 2024</p>
            </div>
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