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

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $uploadDir = '../uploads/';
    $fileName = pathinfo($_FILES['image']['name'],PATHINFO_FILENAME).date('YmdHis').'.'.pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
    $targetDir = $uploadDir.$fileName;
    $Date = date('Y-m-d');
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetDir)) {
      $sql = "INSERT INTO blogs(title,categoryId,description,Date,image) VALUES('$name','$category','$description','$Date','$fileName')";
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
  <?php
      include 'side-bar.php';
  ?>
    <main class="main-section">
    <?php
      include 'top-bar.php';
    ?>
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
