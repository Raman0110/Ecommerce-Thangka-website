<?php require('session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="responsive.css" />
</head>

<body>
  <?php
  include 'connect.php';
  $username = $_SESSION['username'];
  $sql = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result)>0) {
    $row = mysqli_fetch_assoc($result);
  }else{
    header('location:error404.php');
  }
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
              <a href="">About</a>
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
              <a href="">Contact</a>
            </li>
          </ul>
        </nav>
        <div class="icons">
          <a href=""><i class="fa fa-search fa-2x icon" aria-hidden="true"></i></a>
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
                <a href="" class="active">Home</a>
              </li>
              <li>
                <a href="">About</a>
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
                <a href="">Contact</a>
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
        <i class="fa fa-home"></i><a href="index.php">Home</a><i class="fa fa-angle-right"></i><a href="user-profile.php">Profile</a>
      </div>
    </div>
  </section>
  <div class="admin-details flex">
    <div class="admin-card">
      <div class="admin-icon flex">
        <i class="fa fa-user-circle fa-3x"></i>
      </div>
      <div class="admin-info flex">
        <h3 id="admin-name"><?php echo $row['username'] ?></h3>
        <p>Email: <?php echo $row['email'] ?></p>
        <p>Phone: <?php echo $row['phone'] ?></p>
        <a href="user-changepw.php"><button id="admin-change-pw">Change password</button></a>
      </div>
    </div>
  </div>
  <script src="script.js"></script>
</body>

</html>