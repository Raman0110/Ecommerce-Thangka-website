<?php require('../session.php'); issetUsername();?>  
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="admin-style.css" />
</head>

<body>
  <div class="layout-container">
    <aside class="sidebar">
      <h2>Logo</h2>
      <ul class="sidebar-nav">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="dropdown">
          <div class=" flex justify-between">
            Product <i class="fa fa-angle-down fa-1x"></i>
          </div>
          <ul class="dropdown-menu d-none">
            <li><a href="view-product.php">View Product</a></li>
            <li><a href="add-product.php">Add Product</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <div class=" flex justify-between">
            Product Category <i class="fa fa-angle-down fa-1x"></i>
          </div>
          <ul class="dropdown-menu d-none">
            <li><a href="view-product-category.php">View Product Category</a></li>
            <li><a href="add-product-category.php">Add Product Category</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <div class=" flex justify-between">
            Blog <i class="fa fa-angle-down fa-1x"></i>
          </div>
          <ul class="dropdown-menu d-none">
            <li><a href="view-blog.php">View Blog</a></li>
            <li><a href="add-blog.php">Add Blog</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <div class=" flex justify-between">
            Blog Category <i class="fa fa-angle-down fa-1x"></i>
          </div>
          <ul class="dropdown-menu d-none">
            <li><a href="view-blog-category.php">View Blog Category</a></li>
            <li><a href="add-blog-category.php">Add Blog Category</a></li>
          </ul>
        </li>
      </ul>
    </aside>
    <main class="main-section">
      <div class="top-bar flex">
        <div class="icons">
          <a href="admin-profile.php"><i class="fa fa-user fa-2x "></i></a>
          <a href = '../logout.php'><i class="fa fa-sign-out fa-2x"></i></a>
        </div>
      </div>
      <h3>Welcome User</h3>
      <div class="main-content flex justify-between">
        <div class="recent-content">
          <h4>Recent Product</h4>
          <table>
            <tr>
              <th>S.N</th>
              <th>Name</th>
              <th>Price</th>
              <th>Size</th>
              <th>Date</th>
            </tr>
            <?php
            include '../connect.php';
            $recentPostSql = "SELECT * FROM products ORDER BY Date DESC LIMIT 5";
            $recentPostResult = mysqli_query($conn, $recentPostSql);
            if ($recentPostResult) {
              if (mysqli_num_rows($recentPostResult) > 0) {
                $i = 1;
                while ($postRow = mysqli_fetch_assoc($recentPostResult)) {
                  echo "
                  <tr>
                    <td>$i</td>
                    <td>" . $postRow['Title'] . "</td>
                    <td>" . $postRow['Price'] . "</td>
                    <td>" . $postRow['Dimensions'] . "</td>
                    <td>" . $postRow['Date'] . "</td>
                  </tr>
                  ";
                  $i++;
                }
              } else {
                echo "No data Found";
              }
            } else {
              mysqli_connect_error();
            }
            ?>
          </table>
        </div>
        <div class="overall-content">
          <div class="overall-detail flex">
            <div class="detail-card">
              <p>No of Products</p>
              <span>
                <?php
                $productNoSql = "SELECT COUNT(*) as num FROM products";
                $productNoResult = mysqli_query($conn, $productNoSql);
                if ($productNoResult) {
                  $nums = mysqli_fetch_assoc($productNoResult);
                  echo $nums['num'];
                }
                ?>
              </span>
            </div>
            <div class="detail-card">
              <p>No of Blog</p>
              <span>
                <?php
                $blogNumSql = "SELECT COUNT(*) as blogNum FROM blogs";
                $blogNumResult = mysqli_query($conn, $blogNumSql);
                if ($blogNumResult) {
                  $blogNums = mysqli_fetch_assoc($blogNumResult);
                  echo $blogNums['blogNum'];
                }
                ?>

              </span>
            </div>
            <div class="detail-card">
              <p>No of Product Category</p>
              <span>
                <?php
                $productCataSql = "SELECT COUNT(*) as pCataNum FROM categories";
                $productCataResult = mysqli_query($conn, $productCataSql);
                if ($productCataResult) {
                  $cataNums = mysqli_fetch_assoc($productCataResult);
                  echo $cataNums['pCataNum'];
                }
                ?>
              </span>
            </div>
            <div class="detail-card">
              <p>No of Blog Category</p>
              <span>
                <?php
                $blogCataSql = "SELECT COUNT(*) as bCataNum FROM blogCategories";
                $blogCataResult = mysqli_query($conn, $blogCataSql);
                if ($blogCataResult) {
                  $bcataNums = mysqli_fetch_assoc($blogCataResult);
                  echo $bcataNums['bCataNum'];
                }
                ?>
              </span>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <script src="admin-script.js"></script>
</body>

</html>