
<?php 

if (!isset($_SESSION['username'])) {
  header('location: admin_login.php');
}

?>
<?php include 'admin_processes/process_admin_connect.php';?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	 <style>
    .error {color: #FF0000;}
</style>

</head>
<body>

  <?php
// define variables and set to empty values
$cnameErr = "";
$cname = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["cname"])) {
    $cnameErr = "Category name  is required";
  } else {
    $cname = test_input($_POST["cname"]);
    
  }  
  
}


function test_input($data) {
   global $conn;
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = mysqli_real_escape_string($conn,$data);
  return $data;
}



if ($cname == "") {
  echo "<center style = 'color:red; font-size:20px;'>Add Category</center>";
}

else{


 
if (isset($_POST['submit'])) {          
        

  $sql = "INSERT INTO category (name)
		VALUES ('$cname')";

if (mysqli_query($conn, $sql)) {
   echo"<center style = 'color:red; font-size:20px;'>Category added successifully</center>";
   
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
}

?>

<br>
<form method="post" action="admin_home.php?page=category">
	<input type="text" placeholder="Category" name="cname">
   <span class="error">* <?php echo $cnameErr;?></span>
  <br><br>
	<input type="submit" value="Add Category" name="submit">
</form>


</body>
</html>