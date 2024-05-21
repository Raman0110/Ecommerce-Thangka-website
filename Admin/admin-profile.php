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
  ?>
  <div class="layout-container">
  <?php
    include 'side-bar.php';
  ?>
    <main class="main-section">
    <?php
      include 'top-bar.php';
    ?>
      <div class="admin-details flex">
        <div class="admin-card">
        <div class="admin-icon flex">
          <i class="fa fa-user-circle fa-3x"></i>
        </div>
        <div class="admin-info flex">
          <h3 id="admin-name"><?php echo $row['username']?></h3>
          <p>Email: <?php echo $row['email']?></p>
          <p>Phone: <?php echo $row['phone']?></p>
          <a href="admin-changepw.php"><button id="admin-change-pw">Change password</button></a>
        </div>
        </div>
      </div>
    </main>
  </div>
  <script src="admin-script.js"></script>
</body>

</html>