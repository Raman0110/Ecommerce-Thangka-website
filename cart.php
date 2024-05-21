<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="responsive.css" />
</head>

<body>
  <?php
  require('session.php');
  ?>
  <?php
  include 'header.php';
  ?>
  <section class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-content flex">
        <i class="fa fa-home"></i><a href="index.php">Home</a><i class="fa fa-angle-right"></i><a href="">Cart</a>
      </div>
    </div>
  </section>
  <section class="cart-section">
    <div class="container">
      <div class="cart-box">
        <div class="cart-heading flex">
          <h4>Shopping Cart</h4>
            <form action="cart-items.php" method = "POST">
              <button class="remove-all" name = "remove-all">Remove all</button>
            </form> 
        </div>
        <?php
        $total = 0;
        if (count($_SESSION['cart'])>0) {
          foreach ($_SESSION['cart'] as $cartItem) {
            $total += $cartItem['price'];
            $itemIndex = array_search($cartItem['name'], array_column($_SESSION['cart'], 'name'));
            echo
            "
              <div class='cart-content flex'>
              <div class='product-img-name flex'>
                <img src='uploads/" . $cartItem['img'] . "' alt=''>
                <div class='product-details'>
                  <h3>" . $cartItem['name'] . "</h3>
                  <p>" . $cartItem['size'] . "</p>
                </div>
              </div>
              <div class='product-price'>
                <h3>Rs " . $cartItem['price'] . "</h3>
                <form action='cart-items.php' method='POST'>
                  <input type='hidden' name='item-index' value='$itemIndex'>
                  <button class='remove-btn' name = 'remove-btn'>Remove</button>
                </form>
              </div>
            </div>
            ";
          }
        }else{
          echo "<h2 class='empty'>Cart Empty</h2>";
        }
        ?>
        <div class="cart-checkout">
          <h3><span>Total </span>Rs<?php echo $total ?> </h3>
          <form action="cart-items.php" method="POST">
          <input type="hidden" name = "total-amount" value = '<?php echo $total ?>'>
          <button id="buy-btn" name="buy-btn">Check out</button>
          </form>
        </div>
      </div>
  </section>
  <?php
  include 'footer.php';
  ?>
  <script src="script.js"></script>
</body>

</html>