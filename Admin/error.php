<?php require('../session.php'); issetUsername()     ?>  <!DOCTYPE html>
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
  <?php
      include 'side-bar.php';
  ?>
    <main class="main-section">
    <?php
      include 'top-bar.php';
    ?>
      <div class="error-msg">
        <h2>Page not found!</h2>
      </div>
    </main>
  </div>
  <script src="admin-script.js"></script>
</body>

</html>