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
$cnameErr = $pnameErr = $priceErr = "";
$cname = $pname = $price = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["cname"])) {
    $cnameErr = "Category name  is required";
  } else {
    $cname = test_input($_POST["cname"]);
    
  }
  
  if (empty($_POST["pname"])) {
    $pnameErr = "Product name is required";
  } else {
    $pname = test_input($_POST["pname"]);
    
    
  }


    

  if (empty($_POST["price"])) {
    $priceErr = "Price is required";
  } else {
    $price = test_input($_POST["price"]);
  }

  $description = test_input($_POST["description"]);

  

   $file_name = $_FILES['file']['name'];
      
      $file_tmp = $_FILES['file']['tmp_name'];
      
      $tmp=explode('.',$_FILES['file']['name']);
      move_uploaded_file($file_tmp,"images/".$file_name);
    
    
  
}


function test_input($data) {
   global $conn;
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = mysqli_real_escape_string($conn,$data);
  return $data;
}



if ($cname == "" || $pname=="" || $price=="") {
  echo "<center style = 'color:red; font-size:20px;'>Add Product</center>";
}

else{

 
if (isset($_POST['submit'])) {          
        

  $sql = "INSERT INTO products (name, category, price, description,imagename)
		VALUES ('$pname', '$cname', '$price','$description', '$file_name')";

if (mysqli_query($conn, $sql)) {
   echo"<center style = 'color:red; font-size:20px;'>Product added successifully</center>";
   
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
}

?>

<br>


<form enctype="multipart/form-data" method="post" action="admin_home.php?page=products" >
  
  <h6>Category Name</h6>
	<select name="cname">
    <option>Select Category</option>
    <?php 

                   $result = mysqli_query($conn,"SELECT * FROM category");
                   if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_array($result)) {
                         $cid = $row['category_id'];
                        $cname = $row['name'];

                        echo "<option value='$cname'>$cname</option>";
                      }
                    }
?>
  </select>

	 <span class="error">* <?php echo $cnameErr;?></span>

	<br>
  <h6>Product</h6>
	<input type="text" name="pname" placeholder="Product Name">
	 <span class="error">* <?php echo $pnameErr;?></span>
	<br>
  <h6>Price</h6>
	<input type="number" name="price" placeholder="Price">
	 <span class="error">* <?php echo $priceErr;?></span>
	<br>
  <h6>Description</h6>
	<textarea rows="5" cols="50" name="description" placeholder="Description"></textarea>
	<br>
  <h6>Image</h6>
	<input type="file" name="file">
	<br><br>
	<input type="submit" value="Add Product" name="submit">
</form>

</body>
</html>
