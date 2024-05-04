<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:/ecommerce/login.php');
}
?>