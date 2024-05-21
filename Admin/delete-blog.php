<?php
include '../connect.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $selectSql = "SELECT * FROM blogs WHERE ID = $id";
  $selectResult = mysqli_query($conn, $selectSql);
  if (mysqli_num_rows($selectResult) > 0) {
    $sql = "DELETE FROM blogs WHERE ID = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      header('location:view-blog.php');
    } else {
      header('location:error.php');
    }
  } else {
    header('location:error.php');
  }
} else {
  header('location:error.php');
}
