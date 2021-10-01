<?php

$con=mysqli_connect("127.0.0.1","root","","ecommerce");

$category = $_POST['category'];

$query = "INSERT INTO category (category_id, name) VALUES (NULL,'$category')";

if(mysqli_query($con, $query)){
	header("location:../admin_home.php?page=category");
}