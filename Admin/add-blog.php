<!DOCTYPE html>
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
            <i class="fa fa-user fa-2x"></i>
            <i class="fa fa-sign-out fa-2x"></i>
          </div>
        </div>
        <div class="add-form">
          <h3 class="heading">Add/Edit Blog</h3>
          <div class="form-container">
            <form action="">
              <div class="form-input">
                <label for="name">Blog Title</label>
                <input type="text" name="name" id="name" />
              </div>
              <div class="form-input">
                <label for="category">Category</label>
                <br>
                <select name="category" id="category">
                  <option value="">Buddha</option>
                  <option value="">Green Tara</option>
                  <option value="">Mandala</option>
                  <option value="">Manjushree</option>
                </select>
              </div>
              <div class="form-input">
                <label for="description">Description</label>
                <textarea name="description" id="description"rows="5"></textarea>
              </div>
              <div class="form-input">
                <label for="image">Upload Image</label>
                <input type="file" name="image" id="image" />
              </div>
              <button type="submit" class="btn-submit">Submit</button>
            </form>
          </div>
        </div>
      </main>
    </div>
    <script src="admin-script.js"></script>
  </body>
</html>
