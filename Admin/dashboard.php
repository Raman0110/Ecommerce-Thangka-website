<?php require('../session.php');
issetUsername(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="admin-style.css" />
</head>

<body>
  <div class="layout-container">
    <?php
      include 'side-bar.php';
    ?>
    <main class="main-section">
    <?php
      include 'top-bar.php';
    ?>
      <?php
      include '../connect.php';
      $username = $_SESSION['username'];
      $sql = "SELECT * FROM users WHERE username = '$username'";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $row = mysqli_fetch_assoc($result);
      }
      ?>
      <h3>Welcome <?php echo $row['username'] ?></h3>
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
            <a href="view-product.php" class="detail-card">
            <div>
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
            </a>
            <a href="view-blog.php" class="detail-card">
            <div>
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
            </a>
            <a href="view-product-category.php" class="detail-card">
            <div>
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
            </a>
            <a href="view-blog-category.php" class="detail-card">
            <div>
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
            </a>
            <a href="order.php" class="detail-card">
            <div>
              <p>No of Orders</p>
              <span>
                <?php
                $orderNumSql = "SELECT COUNT(*) as orderNum FROM Orders";
                $orderNumResult = mysqli_query($conn, $orderNumSql);
                if ($orderNumResult) {
                  $orderNums = mysqli_fetch_assoc($orderNumResult);
                  echo $orderNums['orderNum'];
                }
                ?>
              </span>
            </div>
            </a>
            <a href="order.php" class="detail-card">
            <div>
              <p>Overall Turnover</p>
              <span>
                <?php
                $totalTurnoverSql = "SELECT SUM(TotalAmount) as total FROM Orders";
                $totalTurnoverResult = mysqli_query($conn, $totalTurnoverSql);
                if ($totalTurnoverResult) {
                  $turnOver = mysqli_fetch_assoc($totalTurnoverResult);
                  $amount  = $turnOver['total']>0?'Rs'.$turnOver['total']:0;
                  echo "<h4 id='turnOver'>$amount</h4>";
                }
                ?>
              </span>
            </div>
            </a>
          </div>
        </div>
      </div>
    </main>
  </div>
  <script src="admin-script.js"></script>
</body>

</html>