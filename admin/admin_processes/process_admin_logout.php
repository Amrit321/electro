
<?php 

session_start();
unset($_SESSION['username']);
header('location:../admin_login.php');

?>