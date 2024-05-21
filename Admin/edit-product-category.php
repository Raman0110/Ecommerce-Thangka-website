<?php require('../session.php');
issetUsername()     ?>
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
  <?php
  $Msg = '';
  include "../connect.php";
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM categories WHERE ID = $id";
    $result1 = mysqli_query($conn, $sql1);
    if ($result1) {
      if (mysqli_num_rows($result1) > 0) {
        $row1 = mysqli_fetch_assoc($result1);
      } else {
        header('location:error.php');
      }
    }
  }else{
    header('location:error.php');
  }





  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $categoryName = $_POST['category-name'];
    $sql = "";
    $isFeatured = $_POST['featured'];
    if ($isFeatured == 1) {
      $sql = "UPDATE categories SET Name = '$categoryName', featured = '1' WHERE ID = '$id'";
    } else {
      $sql = "UPDATE categories SET Name = '$categoryName', featured = '0' WHERE ID = '$id'";
    }
    $result = mysqli_query($conn, $sql);
    if ($result) {
      header('location:view-product-category.php');
      $Msg = "Category updated successfully";
    } else {
      $Msg = "Somthing went wrong";
    }
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
      <div class="add-form">
        <h3 class="heading">Edit Product Category</h3>
        <div class="form-container">
          <form action="" onsubmit="return validateCate()" method="POST">
            <div class="form-input">
              <label for="category-name">Category Name</label>
              <input type="text" name="category-name" id="category-name" value="<?php echo $row1['Name'] ?>" />
              <p class="error" id="categoryErr"></p>
              <input type="checkbox" name="featured" id="featured" value='1'>
              Is featured
            </div>
            <button type="submit" class="btn-submit">Submit</button>
            <p class="success"> <?php echo $Msg ?></p>
          </form>
        </div>
      </div>
    </main>
  </div>
  <script src="admin-script.js">
  </script>
</body>

</html>