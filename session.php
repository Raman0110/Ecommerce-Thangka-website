<?php
session_start();
function issetUsername(){
  if(!isset($_SESSION['username']) || $_SESSION['isAdmin']!=true){
    header('location:/ecommerce/login.php');
  }
}
?>