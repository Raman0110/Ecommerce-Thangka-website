<?php require('../session.php'); issetUsername()     ?>  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="admin-style.css" />
  </head>
  <body>
    <?php
    
    $Msg = '';
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $name = $_POST['name'];
      include '../connect.php';
      if(isset($_POST['featured'])){
        $sql = "INSERT INTO blogCategories(name,featured) values ('$name','1')";
      }else{
        $sql = "INSERT INTO blogCategories(name) values ('$name')";
      }
      $result = mysqli_query($conn,$sql);
      if($result){
        $Msg = 'Blog Category added successfully';
      }else{
        $Msg = mysqli_connect_error();
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
          <h3 class="heading">Add Blog Category</h3>
          <div class="form-container">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" onsubmit="return validateCate()" method="POST">
              <div class="form-input">
                <label for="category-name">Category Name</label>
                <input type="text" name="name" id="category-name" />
                <p class="error" id="categoryErr"></p>
                <input type="checkbox" name="featured" id="featured" value = '1'>
                Is featured
              </div>
              <button type="submit" class="btn-submit">Submit</button>
              <p class="success"> <?php echo $Msg?></p>
            </form>
          </div>
        </div>
      </main>
    </div>
    <script src="admin-script.js"></script>
  </body>
</html>
