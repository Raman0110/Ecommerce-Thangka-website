<?php require('session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Change Password</title>
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
  if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);
  } else {
    header('location:error404.php');
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $msg = "";
    $currentPassword = $_POST['current-pw'];
    $newPassword = $_POST['new-pw'];
    if ($row['password'] !== $currentPassword) {
      $msg = "<p class='error'>Old password didn't match</p>";
    } elseif ($row['password'] === $newPassword) {
      $msg = "<p class='error'>Password can't be same as old password</p>";
    } else {
      $updateSql = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";
      $resultSql = mysqli_query($conn, $updateSql);
      if ($resultSql) {
        $msg = "<p class='success'>Password Changed Successfully</p>";
      }
    }
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
                <a href="blog.php">Blog</a>
              </li>
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
        <i class="fa fa-home"></i><a href="index.php">Home</a><i class="fa fa-angle-right"></i><a href="user-profile.php">Profile</a><i class="fa fa-angle-right"></i><a href="user-profile.php">Change password</a>
      </div>
    </div>
  </section>
  <div class="admin-details flex">
    <div class="admin-card">
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="return validateChangePw()" method="POST" class="flex change-pw-form">
        <label for="current-pw">Current Password</label>
        <input type="password" name="current-pw" id="current-pw">
        <p class="error" id="current-pw-err"></p>
        <label for="new-pw">New Password</label>
        <input type="password" name="new-pw" id="new-pw">
        <p class="error" id="new-pw-err"></p>
        <label for="confirm-pw">Confirm Password</label>
        <input type="password" name="confirm-pw" id="confirm-pw">
        <p class="error" id="confirm-pw-err"></p>
        <button type="submit" id="admin-change-pw">Change Password</button>
        <?php echo $msg ?>
      </form>
    </div>
  </div>
  <script src="script.js"></script>
</body>

</html>