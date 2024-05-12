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
  <?php
  include '../connect.php';
  
  
  $Msg = $registermsg='';
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userName = $_POST['nusername'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $password = $_POST['npassword'];
      $getUsername = "SELECT * FROM users WHERE username = '$userName'";
      $resultUsername = mysqli_query($conn,$getUsername);
      if(mysqli_num_rows($resultUsername)>0){
        $registermsg = "Username already taken";
      }
      else{
      $sql = "INSERT INTO users(username,phone,email,password) values('$userName','$phone','$email','$password')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $Msg = "User account created you may login";
      }else{
        $registermsg = "User account creation failed";
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
          <div class="flex justify-between">
            Product <i class="fa fa-angle-down fa-1x"></i>
          </div>
          <ul class="dropdown-menu d-none">
            <li><a href="view-product.php">View Product</a></li>
            <li><a href="add-product.php">Add Product</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <div class="flex justify-between">
            Product Category <i class="fa fa-angle-down fa-1x"></i>
          </div>
          <ul class="dropdown-menu d-none">
            <li>
              <a href="view-product-category.php">View Product Category</a>
            </li>
            <li>
              <a href="add-product-category.php">Add Product Category</a>
            </li>
          </ul>
        </li>
        <li class="dropdown">
        <div class=" flex justify-between">
            Users<i class="fa fa-angle-down fa-1x"></i>
          </div>
          <ul class="dropdown-menu d-none">
            <li><a href="view-user.php">View Users</a></li>
            <li><a href="add-user.php">Add User</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <div class="flex justify-between">
            Blog <i class="fa fa-angle-down fa-1x"></i>
          </div>
          <ul class="dropdown-menu d-none">
            <li><a href="view-blog.php">View Blog</a></li>
            <li><a href="add-blog.php">Add Blog</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <div class="flex justify-between">
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
      <div class="add-form">
        <h3 class="heading">Add User</h3>
        <div class="form-container">
          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="return validateSignup()" method="POST" >
            <div class="form-input">
              <label for="p-name">User Name</label>
              <input type="text" name="nusername" id="r-username" />
              <p class="error" id="r-username-err"></p>
            </div>
            <div class="form-input">
              <label for="phone">Phone</label>
              <input type="number" name="phone" id="phone" />
              <p class="error" id="phone-err"></p>
            </div>
            <div class="form-input">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" />
              <p class="error" id="email-err"></p>
            </div>
            <div class="form-input">
              <label for="password">Password</label>
              <input type="password" name="npassword" id="r-password" />
              <p class="error" id="r-password-err"></p>
            </div>
            <div class="form-input">
              <label for="c-password">Confirm Password</label>
              <input type="password" name="cpassword" id="c-password" />
              <p class="error" id="c-password-error"></p>
            </div>
            <button type="submit" class="btn-submit">Submit</button>
            <p class="success"><?php echo $Msg; ?> </p>
            <p class="error"><?php echo $registermsg; ?> </p>
          </form>
        </div>
      </div>
    </main>
  </div>
  <script src="admin-script.js"></script>
</body>

</html>