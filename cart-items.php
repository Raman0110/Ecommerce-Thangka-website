<?php
require('session.php');
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['add-cart-btn'])) {
    $name = $_POST['name'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $img = $_POST['img'];
    $productId = $_POST['product-id'];
    if (isset($_SESSION['cart'])) {
      $products = array_column($_SESSION['cart'], 'name');
      if (in_array($name, $products)) {
        echo "
        <script> 
        alert('Product already added') 
        window.history.go(-1);
        </script>
        ";
      } else {
        $count = count($_SESSION['cart']);
        $_SESSION['cart'][$count] = ['name' => $name, 'size' => $size, 'price' => $price, 'img' => $img, 'product-id' => $productId];
        echo "
        <script> 
        alert('Product added successfully') 
        window.history.go(-1);
        </script>
        ";
      }
    } else {
      $_SESSION['cart'][0] = ['name' => $name, 'size' => $size, 'price' => $price, 'img' => $img, 'product-id' => $productId];
      echo "
        <script> 
        alert('Product added successfully') 
        window.history.go(-1);
        </script>
        ";
    }
  }
  if (isset($_POST['remove-btn'])) {
    $itemIndex =  $_POST['item-index'];
    echo "</br>";
    unset($_SESSION['cart'][$itemIndex]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    echo
    "
    <script>
    alert('Product removed successfully');
    window.history.go(-1);
    </script>
    ";
  }
  if (isset($_POST['remove-all'])) {
    if (count($_SESSION['cart'])>0) {
      $_SESSION['cart'] = [];
      echo
      "
      <script>
      alert('Product removed successfully');
      window.history.go(-1);
      </script>
      ";
    } else {
      echo "
      <script>
      alert('Cart is empty');
      window.history.go(-1);
      </script>";
    }
  }
  if (isset($_POST['buy-btn'])) {
    $totalAmount = $_POST['total-amount'];
    $userName = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username = '$userName'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $row = mysqli_fetch_assoc($result);
    }
    $userId = $row['userid'];
    $insertSql = "INSERT into Orders(userid,TotalAmount) VALUES('$userId','$totalAmount')";
    $insertResult = mysqli_query($conn, $insertSql);
    $orderId = mysqli_insert_id($conn);
    if ($insertResult) {
      foreach ($_SESSION['cart'] as $myCart) {
        $productId = $myCart['product-id'];
        $productPrice = $myCart['price'];
        $insertSql2 = "INSERT into OrderItems(OrderID,ProductID,Price) VALUES('$orderId','$productId','$productPrice')";
        $insertResult2 = mysqli_query($conn, $insertSql2);
      }
      $_SESSION['cart'] = [];
      echo
      "
          <script>
          alert('Order placed successfully. View your orders from profile');
          window.history.go(-1);
          </script>
          ";
    }
  }
}
