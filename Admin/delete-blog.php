<?php
  include '../connect.php';
  $id = $_GET['id'];
  $sql = "DELETE FROM blogs WHERE ID = $id";
  $result = mysqli_query($conn,$sql);
  if($result){
    header('location:view-blog.php');
  }else{
    header('location:view-user.php');
  }
?>