<?php require('../session.php'); issetUsername() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="admin-style.css" />
</head>

<body>
  <?php
  include '../connect.php';
  $username = $_SESSION['username'];
  $sql = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $row = mysqli_fetch_assoc($result);
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $msg = "";
    $currentPassword = $_POST['current-pw'];
    $newPassword = $_POST['new-pw'];
    if ($row['password'] !== $currentPassword) {
      $msg = "<p class='error'>Old password didn't match</p>";
    }
    elseif($row['password']===$newPassword) {
      $msg = "<p class='error'>Password can't be same as old password</p>";
    }
    else{
      $updateSql = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";
      $resultSql = mysqli_query($conn, $updateSql);
      if ($resultSql) {
        $msg = "<p class='success'>Password Changed Successfully</p>";
      }
    }
      
  }
  ?>
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
    </main>
  </div>
  <script src="admin-script.js"></script>
</body>

</html>