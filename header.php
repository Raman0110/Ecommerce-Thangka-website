<?php
include 'connect.php';
?>
<header class="header">
  <div class="container">
    <div class="flex">
      <div class="logo">
        <h2>Logo</h2>
      </div>
      <nav class="nav">
        <ul>
          <li>
            <a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">Home</a>
          </li>
          <li>
            <a href="aboutus.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'aboutus.php' ? 'active' : '' ?>">About</a>
          </li>
          <?php
          $navSql = "SELECT * FROM categories LIMIT 3";
          $navResult = mysqli_query($conn, $navSql);
          if ($navResult) {
            if (mysqli_num_rows($navResult) > 0) {
              while ($navs = mysqli_fetch_assoc($navResult)) {
                $classAddress = basename($_SERVER['PHP_SELF']) == 'product-category.php' && isset($_GET['id']) && $_GET['id'] == $navs['ID'] ? 'active' : '';
                echo
                "
                    <li>
                      <a href='product-category.php?id=" . $navs['ID'] . "' class = '$classAddress'>" . $navs['Name'] . "</a>
                    </li>
                    ";
              }
            }
          }
          ?>
          <li>
            <a href="blog.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'blog.php' ? 'active' : '' ?>">Blog</a>
          </li>
          <li>
            <a href="contactus.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'contactus.php' ? 'active' : '' ?>">Contact</a>
          </li>
        </ul>
      </nav>
      <div class="icons">
        <a href="#"><i class="fa fa-search fa-2x icon" aria-hidden="true" id="search-btn"></i></a>
        <?php
        if (isset($_SESSION['username'])) {
          echo
          "
            <a href='user-profile.php'><i class='fa fa-user-circle fa-2x icon' aria-hidden='true'></i></a>
            <a href = 'cart.php'><i class='fa fa-shopping-cart fa-2x icon'></i></a>
            <a href = 'logout.php'><i class='fa fa-sign-out fa-2x icon'></i></a>
            
            ";
        } else {
          echo
          "
            <a href='login.php' class='login-btn'>Login</a>
            ";
        }
        ?>
        <i class="fa fa-bars fa-2x icon" id="bars" aria-hidden="true"></i>
      </div>
      <div class="mobile-nav">
        <div class="menu-exit">
          <i class="fa fa-times fa-lg" id="exit-icon"></i>
        </div>
        <div class="navigations">
          <ul>
            <li>
              <a href="" class="active">Home</a>
            </li>
            <li>
              <a href="aboutus.php">About</a>
            </li>
            <?php
            $navSql = "SELECT * FROM categories LIMIT 3";
            $navResult = mysqli_query($conn, $navSql);
            if ($navResult) {
              if (mysqli_num_rows($navResult) > 0) {
                while ($navs = mysqli_fetch_assoc($navResult)) {
                  echo
                  "          
                    <li>
                      <a href='product-category.php?id=" . $navs['ID'] . "'>" . $navs['Name'] . "</a>
                    </li>
                    ";
                }
              }
            }
            ?>
            <li>
              <a href="blog.php">Blog</a>
            </li>
            <li>
              <a href="contactus.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="searchForm d-none">
    <form action="search-item.php" method="GET">
      <input type="text" placeholder="Search" id="searchBox" name="search">
    </form>
  </div>
</header>