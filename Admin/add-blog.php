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
  
  
  $Msg = '';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $uploadDir = '../uploads/';
    $fileName = pathinfo($_FILES['image']['name'],PATHINFO_FILENAME).date('YmdHis').'.'.pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
    $targetDir = $uploadDir.$fileName;
    $Date = date('Y-m-d');
    include '../connect.php';
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetDir)) {
      $sql = "INSERT INTO blogs(title,categoryId,description,Date,image) values ('$name','$category','$description','$Date','$fileName')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $Msg = 'Blog added successfully';
      } else {
        $Msg = 'Unable to add blog';
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
        <h3 class="heading">Add Blog</h3>
        <div class="form-container">
          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" onsubmit="return validateBlog(true)" enctype="multipart/form-data">
            <div class="form-input">
              <label for="name">Blog Title</label>
              <input type="text" name="name" id="b-name" />
              <p class="error" id="b-name-error"></p>
            </div>
            <div class="form-input">
              <label for="category">Category</label>
              <br>
              <select name="category" id="b-category">
                <option value="">Select Category</option>
                <?php
                include '../connect.php';
                $sql1 = 'SELECT * FROM blogCategories';
                $result = mysqli_query($conn, $sql1);
                if ($result) {
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<option value = '" . $row['id'] . "'>" . $row['name'] . "</option>";
                    }
                  }
                }


                ?>
              </select>
              <p class="error" id="b-category-error"></p>
            </div>
            <div class="form-input">
              <label for="description">Description</label>
              <textarea name="description" id="b-description" rows="5"></textarea>
              <p class="error" id="b-description-error"></p>
            </div>
            <div class="form-input">
              <label for="image">Upload Image</label>
              <input type="file" name="image" id="b-image" />
              <p class="error" id="b-image-error"></p>
            </div>
            <button type="submit" class="btn-submit" id="">Submit</button>
            <p class="success"> <?php echo $Msg ?></p>
          </form>
        </div>
      </div>
    </main>
  </div>
  <script src="admin-script.js"></script>
</body>

</html>