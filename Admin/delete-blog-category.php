<?php
  include '../connect.php';
  $id = $_GET['id'];
  $sql = "DELETE FROM blogCategories WHERE id = '$id'";
  $result = mysqli_query($conn,$sql);
  if($result){
    header('location:view-blog-category.php');
    $Msg = "Item Deleted Successfully";
  }




?>