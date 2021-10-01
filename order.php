<?php include'header.php';?>
<?php 

if (!isset($_SESSION['customer_name'])) {
  header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Style Zone</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
<body>


 <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>
<section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">



<?php 
                include "connect.php";

                 $id = $_GET['id'];
                   $result = mysqli_query($conn,"SELECT * FROM products WHERE product_id = $id ");
                   if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_array($result)) {
                         $pid = $row['product_id'];
                        $pname = $row['name'];
                         $cname = $row['category'];
                         $price = $row['price'];
                         $image = $row['imagename'];
                          $description = $row['description'];

                      }
                  }
                 
                 ?>

                          
                     
                    <div class="col mb-5">
                        <div class="card h-100">
                           
                            <?php echo '<img src="admin/images/'.$image.'">';?>

                           
                            <div class="card-body p-4">
                                <div class="text-center">

                                    <h5 class="fw-bolder"><?php echo "$cname";?></h5>
                                    
                                    <h6 class="fw-bolder"><?php echo "$pname";?></h6>
                                     <span class="fw-bolder"><?php echo "$description";?></span>
                                    <br>
                                    <span>Rs. <?php echo "$price"; ?></span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><center>Fill the form to make order</center></div>
                            </div>
                        </div>
                    </div>

                     <div class="col mb-12" >
                        <div class="col-md-12 " >
                           <form class="col mb-5 text-center" method="post" action="ordersubmit.php">

                                <input  type="hidden" name="categoryname" value="<?php echo $cname; ?>">
                                 <input   type="hidden" name="productid" value="<?php echo $id; ?>">
                                  <input  type="hidden" name="productname" value="<?php echo $pname;?>">
                                   <input   type="hidden" name="pdescription" value="<?php echo $description;?>">
                                    <input   type="hidden" name="pprice" value="<?php echo $price;?>">

                           	 <div class="form-group">
							    <label for="quantity">Quantity</label>
							    <input type="number" class="form-control" id="qty" aria-describedby="NameHelp" placeholder="Enter Quantity" name="quantity" required="">
                                
							   
							  </div>
							  <br>
							  <div class="form-group">
							    <label for="Name">Full Name</label>
							    <input type="text" class="form-control" name="customername" id="name" aria-describedby="NameHelp" placeholder="Enter Full Name" value = <?php echo $_SESSION["customer_name"]; ?> readonly >
                                
							   
							  </div>
							  <br>
							  <div class="form-group">
							    <label for="exampleInputEmail1">Email address</label>
							    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required="">
							    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                
							  </div>
							  <br>
							  <div class="form-group">
							    <label for="Address">Address</label>
							    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="addressHelp" placeholder="Enter Address" name="address" required="">
                                
							    
							  </div>
							  <br>
							  <div class="form-group">
							    <label for="exampleInputContact">Contact Number</label>
							    <input type="number" class="form-control" id="exampleInputContact" placeholder="Enter Contact Number" name="contact" required="">
                                
							  </div>
							  <br>
							  <div class="form-group">
							    <label for="Address">Description</label>
							    <Textarea type="text" class="form-control" aria-describedby="addressHelp" placeholder="Enter Description" name="customerdescription" required=""></Textarea>

							    
							  </div>
							  <br>
							 <div>
							  <center><button type="submit" class="btn btn-primary" name="submit" class="col ">Order</button></center>
							</div>
						</form>
                           
                           
                            
                            <!-- Product actions-->
                            
                        </div>
                    </div>
               
                   

                </div>
            </div>
        </section>






<?php include'footer.php';?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>


