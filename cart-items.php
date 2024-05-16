<?php
require('session.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['add-cart-btn'])) {
    $name = $_POST['name'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $img = $_POST['img'];
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
        $_SESSION['cart'][$count] = ['name' => $name, 'size' => $size, 'price' => $price, 'img' => $img];
        echo "
        <script> 
        alert('Product added successfully') 
        window.history.go(-1);
        </script>
        ";
      }
    } else {
      $_SESSION['cart'][0] = ['name' => $name, 'size' => $size, 'price' => $price, 'img' => $img];
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
    }else{
      echo "
      <script>
      alert('Cart is empty');
      window.history.go(-1);
      </script>";
    }
  }
}
