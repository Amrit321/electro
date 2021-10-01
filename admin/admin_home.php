 

<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header('location: admin_login.php');
}

?>








<!DOCTYPE html>
<html>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
  <h3 class="w3-bar-item">Menu</h3>
  <a href="admin_home.php?page=category" class="w3-bar-item w3-button">Category</a>
  <a href="admin_home.php?page=products" class="w3-bar-item w3-button">Products</a>
  <a href="admin_home.php?page=orders" class="w3-bar-item w3-button">Orders</a>
</div>

<!-- Page Content -->
<div style="margin-left:25%">
	<div class="w3-container w3-teal">
	  <h1><?php 

echo $_SESSION['username'];
?> &nbsp;<a href="admin_processes/process_admin_logout.php" style="color: blue; text-align: right;">Logout</a></h1>


	</div>
	<div>
		
			<h1 class="text-center text-primary">Welcome</h1>
			
		
		<?php 
			if(isset($_GET['page'])){
				$page = "admin_".$_GET['page'].".php";
				include($page);
			}
		?>
	</div>
</div>

</body>
</html>


