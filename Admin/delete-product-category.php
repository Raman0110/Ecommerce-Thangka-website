<?php
  include '../connect.php';
  $id = $_GET['id'];
  $sql = "DELETE FROM categories WHERE ID = $id";
  $result = mysqli_query($conn,$sql);
  if($result){
    header('location:view-product-category.php');
  }else{
    header('location:error.php');
  }





?>