<?php
session_start();
function issetUsername(){
  if(!isset($_SESSION['username']) || $_SESSION['isAdmin']!=true){
    header('location:/project-thangka/login.php');
  }
}
?>