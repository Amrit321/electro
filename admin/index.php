<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header('location: admin_login.php');
}
else{
  header('location: admin_home.php');
}