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
  include '../connect.php';
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE ID = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    } else {
      header('location:error.php');
    }
  }else{
    header('location:error.php');
  }
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $productName = $_POST['p-name'];
    $size = $_POST['size'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $uploadDir = '../uploads/';
    $fileName = $_FILES['image']['name'];
    if (empty($fileName)) {
      $sql2 = "UPDATE products SET Title = '$productName',Description = '$description',Category_ID = '$category', Price = '$price', Dimensions = '$size' WHERE ID = $id ";
      $result2  = mysqli_query($conn, $sql2);
      if ($result2) {
        header('location:view-product.php');
        $Msg = 'Product Edited successfully';
      } else {
        $Msg = 'Unable to edit post';
      }
    } else {
      $newFile = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME) . date('YmdHis') . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
      $targetDir = $uploadDir . $newFile;
      if (move_uploaded_file($_FILES['image']['tmp_name'], $targetDir)) {
        $sql2 = "UPDATE products SET Title = '$productName', Description = '$description',Category_ID = '$category', Price = '$price', Dimensions = '$size', Image_URL = '$newFile' WHERE ID = $id ";
        $result2  = mysqli_query($conn, $sql2);
        if ($result2) {
          $Msg = 'Product Edited successfully';
          header('location:view-product.php');
        } else {
          $Msg = 'Unable to edit post';
        }
      }
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
        <h3 class="heading">Edit Product</h3>
        <div class="form-container">
          <form action="" onsubmit="return validateProduct(false)" method="POST" enctype="multipart/form-data">
            <div class="form-input">
              <label for="p-name">Product Name</label>
              <input type="text" name="p-name" id="p-name" value="<?php echo $row['Title'] ?>" />
              <p class="error" id="p-name-error"></p>
            </div>
            <div class="form-input">
              <label for="size">Size</label>
              <input type="text" name="size" id="size" value="<?php echo $row['Dimensions'] ?>" />
              <p class="error" id="size-error"></p>
            </div>
            <div class="form-input">
              <label for="category">Category</label>
              <br>
              <select name="category" id="category">
                <option value="">Select a category</option>
                <?php
                $sql1 = 'SELECT * FROM categories';
                $result1 = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result1) > 0) {
                  while ($row1 = mysqli_fetch_assoc($result1)) {
                    echo "<option value='" . $row1['ID'] . "'" . ($row['Category_ID'] === $row1["ID"] ? "selected" : "") . ">" . $row1['Name'] . "</option>";
                  }
                }
                ?>
              </select>
              <p class="error" id="category-error"></p>
            </div>
            <div class="form-input">
              <label for="price">Price</label>
              <input type="text" name="price" id="price" value="<?php echo $row['Price'] ?>" />
              <p class="error" id="price-error"></p>
            </div>
            <div class="form-input">
              <label for="description">Description</label>
              <textarea name="description" id="description" rows="5"><?php echo $row['Description'] ?></textarea>
              <p class="error" id="description-error"></p>
            </div>
            <div class="form-input">
              <label for="image">Upload Image</label>
              <input type="file" name="image" id="image" />
              <p class="error" id="image-error"></p>
            </div>
            <button type="submit" class="btn-submit">Submit</button>
            <p class="success"><?php echo $Msg ?> </p>
          </form>
        </div>
      </div>
    </main>
  </div>
  <script src="admin-script.js"></script>
</body>

</html>