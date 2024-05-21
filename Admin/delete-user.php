<?php
include '../connect.php';
  $id = $_GET['id'];
  $sql = "DELETE FROM users WHERE userid = '$id'";
  $result = mysqli_query($conn,$sql);
  if($result){
    header('location:view-user.php');
  }
?>