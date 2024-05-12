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
  
  $Msg = '';
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $productName = $_POST['p-name'];
    $size = $_POST['size'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $uploadDir = '../uploads/';
    $fileName = pathinfo($_FILES['image']['name'],PATHINFO_FILENAME).date('YmdHis').'.'.pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION); 
    $targetDir = $uploadDir.$fileName;
    $date = date("Y-m-d");
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetDir)) {
      $sql = "INSERT INTO products(Title,Description,Price,Dimensions,Image_URL,Date,Category_ID) values('$productName','$description','$price','$size','$fileName','$date','$category')";
    $result  = mysqli_query($conn, $sql);
      if ($result) {
        $Msg = 'Product added successfully';
      }else{
        $Msg = 'Unable to add post';
      }
    } else {
      $Msg = 'Error uploading file';
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
        <h3 class="heading">Add Product</h3>
        <div class="form-container">
          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="return validateProduct(true)" method="POST" enctype="multipart/form-data">
            <div class="form-input">
              <label for="p-name">Product Name</label>
              <input type="text" name="p-name" id="p-name" />
              <p class="error" id="p-name-error"></p>
            </div>
            <div class="form-input">
              <label for="size">Size</label>
              <input type="text" name="size" id="size" />
              <p class="error" id="size-error"></p>
            </div>
            <div class="form-input">
              <label for="category">Category</label>
              <br>
              <select name="category" id="category">
                <option value="">Select a category</option>
                <?php
                include '../connect.php';
                $sql1 = 'SELECT * FROM categories';
                $result1 = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result1) > 0) {
                  while ($row = mysqli_fetch_assoc($result1)) {
                    echo "<option value='".$row['ID']."'>".$row['Name']."</option>";
                  }
                }
                ?>
              </select>
              <p class="error" id="category-error"></p>
            </div>
            <div class="form-input">
              <label for="price">Price</label>
              <input type="text" name="price" id="price" />
              <p class="error" id="price-error"></p>
            </div>
            <div class="form-input">
              <label for="description">Description</label>
              <textarea name="description" id="description" rows="5"></textarea>
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