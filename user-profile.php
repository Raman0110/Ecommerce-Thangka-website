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
  include 'header.php';
  $username = $_SESSION['username'];
  $sql = "SELECT * FROM users WHERE username = '$username'";
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
        <a href="user-order.php"><button id="order-btn">View your orders</button></a>
        <a href="user-changepw.php"><button id="admin-change-pw">Change password</button></a>
      </div>
    </div>
  </div>
  <script src="script.js"></script>
</body>

</html>