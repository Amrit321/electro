<?php 

if (!isset($_SESSION['username'])) {
  header('location: admin_login.php');
}
?>
<br><br>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>




  <table class="table">
  <thead>
    <tr>
      <th scope="col">Order Id</th>
      <th scope="col">Category</th>
      <th scope="col">Product Id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Description</th>
      <th scope="col">Price per Quantity</th>
      <th scope="col">Quantity</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Contact no.</th>
      <th scope="col">customer description</th>
    </tr>
  </thead>
  
      
    <?php 
                include "admin_processes/process_admin_connect.php";
                 
                   $result = mysqli_query($conn,"SELECT * FROM orders");
                   if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_array($result)) {
                         $orderid = $row['order_id'];
                        $category = $row['category'];
                        $productid = $row['product_id'];

                         $productname = $row['product_name'];
                         $productdescription= $row['product_description'];
                         $productprice = $row['price'];
                          $quantity = $row['quantity'];
                          $customername = $row['customer_name'];

                          $customeremail = $row['customer_email'];
                          $address = $row['customer_address'];
                          $customercontact = $row['customer_contact_no'];
                          $customerdescription = $row['customer_description'];
                        

echo '
  <tbody>
    <tr>
      <th scope="row">'.$orderid.'</th>
      <td>'.$category.'</td>
      <td>'.$productid.'</td>
      <td>'.$productname.'</td>
      <td>'.$productdescription.'</td>
      <td>'.$productprice.'</td>
      <td>'.$quantity.'</td>
      <td>'.$customername.'</td>
      <td>'.$customeremail.'</td>
      <td>'.$address.'</td>
      <td>'.$customercontact.'</td>
      <td>'.$customerdescription.'</td>
    </tr>
    
  </tbody>
  ';
  }
}
 ?>
</table>

</body>
</html>