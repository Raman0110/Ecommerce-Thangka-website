<?php
include '../connect.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $selectSql = "SELECT * FROM products WHERE ID = $id";
  $selectResult = mysqli_query($conn, $selectSql);
  if ($selectResult) {
    if (mysqli_num_rows($selectResult) > 0) {
      $sql = "DELETE FROM products WHERE ID = $id";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        header('location:view-product.php');
      } else {
        header('location:error.php');
      }
    }else {
      header('location:error.php');
    }
  }
} else {
  header('location:error.php');
}
