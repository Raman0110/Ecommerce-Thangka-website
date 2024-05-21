<?php
include '../connect.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $selectSql = "SELECT * FROM blogCategories WHERE ID = $id";
  $selectResult = mysqli_query($conn, $selectSql);
  if (mysqli_num_rows($selectResult) > 0) {
    $sql = "DELETE FROM blogCategories WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      header('location:view-blog-category.php');
      $Msg = "Item Deleted Successfully";
    } else {
      header('location:error.php');
    }
  } else {
    header('location:error.php');
  }
} else {
  header('location:error.php');
}
