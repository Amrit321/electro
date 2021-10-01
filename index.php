
 <?php include'header.php';?>
   
    <body>
        <!-- Navigation-->
        
           

        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Laptops and Mobiles</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop</p>
                </div>
            </div>
        </header>
<section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">



<?php 
                include "connect.php";
                 
                   $result = mysqli_query($conn,"SELECT * FROM products");
                   if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_array($result)) {
                         $pid = $row['product_id'];
                        $pname = $row['name'];
                         $cname = $row['category'];
                         $price = $row['price'];
                         $image = $row['imagename'];
                          $description = $row['description'];

                          
                     echo '
                    <div class="col mb-5">
                        <div class="card h-100">
                           
                             <img src="admin/images/'.$image.'">
                           
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">'.$cname.'</h5>
                                    <h6 class="fw-bolder">'.$pname.'</h6>
                                    <span class="fw-bolder">'.$description.'</span><br>
                                    
                                    <span>Rs. '.$price.'</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="order.php?id='.$pid.'" >Order Now</a></div>
                            </div>
                        </div>
                    </div>
                    ';
               
                          
                      }
                  }
                 
                 ?>

                </div>
            </div>
        </section>



        <!-- Section-->
        
        <!-- Footer-->
       
       <?php include'footer.php';?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
