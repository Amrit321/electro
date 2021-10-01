<?php 

//get form data
$category = $_POST['category'];
$productname = $_POST['productname'];
$price = $_POST['price'];
$imagename = $_FILES["image"]["name"];
$description = $_POST['description'];


//DB operation
$con = mysqli_connect("localhost", "root", "", "ecommerce");
$sql = "INSERT INTO products (product_id, category, price, imagename, description) VALUES (NULL, '$category', '$price','$imagename', '$description')";
mysqli_query($con, $sql);


// move image to products folder
$path = "../../products_images/".$imagename;
$tempname = $_FILES["image"]["tmp_name"];

if (move_uploaded_file($tempname, $path))  {
    header("location:../admin_home.php?page=products");
}else{
	$msg = "Failed to upload image";
	echo $msg;
}




