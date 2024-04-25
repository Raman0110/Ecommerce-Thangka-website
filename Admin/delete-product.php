<?php
  include '../connect.php';
  $id = $_GET['id'];
  $sql = "DELETE FROM products WHERE ID = $id";
  $result = mysqli_query($conn,$sql);
  if($result){
    header('location:view-product.php');
  }





?>