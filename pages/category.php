<?php 

if(isset($_GET['value'])){
	$value = $_GET['value'];
}


// get products from database and display here
$con=mysqli_connect("127.0.0.1","root","","ecommerce");

if($con){

		$sql = "SELECT * FROM products WHERE category = '$value'";
		$res = mysqli_query($con, $sql);
		$count = mysqli_num_rows($res);

		if($count > 0){//product exist in db

			//get all products under that category
			while($row = mysqli_fetch_assoc($res)) {
			    $product_id = $row['product_id'];
			    $product_name = $row['name'];
			    $category = $row['category'];
			    $price = $row['price'];
			    $imagename = $row['imagename'];
			    $description = $row['description'];

			    echo "
			    	<div style='margin:10px;padding:10px;width:250px; height:350px; border:1px solid gray'>";
			    	echo "<span>$category</span>";
			    		

			    echo"</div>";
			}

		}
	}else die("Connection Problem");