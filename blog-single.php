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
          <?php
          $relatedBlogSql = "SELECT * FROM blogs LIMIT 3";
          $relatedBlogResult = mysqli_query($conn,$relatedBlogSql);
          if($relatedBlogResult){
            if(mysqli_num_rows($relatedBlogResult)>0){
              while($relatedBlogRow = mysqli_fetch_assoc($relatedBlogResult)){
                echo
                "   <a href='blog-single.php?id=".$relatedBlogRow['id']."'>
                    <div class='more-product more-blog flex'>
                      <div class='image'>
                        <img src='uploads/" . $relatedBlogRow['image'] . "'>
                      </div>
                      <div class='info'>
                        <h4>".$relatedBlogRow['title']."</h4>
                        <p><i class='fa fa-calendar'></i>".$relatedBlogRow['Date']."</p>
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