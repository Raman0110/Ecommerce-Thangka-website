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
  <?php
  include 'header.php';
  ?>
  <section class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-content flex">
        <i class="fa fa-home"></i><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Blog
      </div>
    </div>
  </section>
  <section class="Blogs">
    <div class="container">
      <div class="section-heading">
        <h2>Blogs & News</h2>
      </div>
      <div class="section-body flex justify-center align-stretch">
        <?php
        $sql = 'SELECT * FROM blogs';
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
  <?php
  include 'footer.php';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="script.js"></script>
</body>

</html>