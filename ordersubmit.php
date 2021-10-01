 <?php



           include "connect.php";                  
                            // define variables and set to empty values
                            

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                              $categoryname = $_POST["categoryname"];
                              $productid = $_POST["productid"];
                              $productname = $_POST["productname"];
                              $pdescription = $_POST["pdescription"];
                              $pprice = $_POST["pprice"];
                              $customerdescription = $_POST["customerdescription"];
                               
                                $quantity = $_POST["quantity"];
                                
                              
                              
                              
                                $customername = $_POST["customername"];
                                

                              
                                $email = $_POST["email"];
                              

                             
                                $address = $_POST["address"];
                                
                                
                              
                              
                                $contact = $_POST["contact"];
                                
                                
                              
                              

                               
                                
                                
                              
                            }

                           
                             
                            if (isset($_POST['submit'])) {
                              


                              
                                        
                                    

                              $sql = "INSERT INTO orders (category,product_id, product_name, product_description, price, quantity, customer_name, customer_email, customer_address, customer_contact_no, customer_description)
                            VALUES ('$categoryname', '$productid', '$productname', '$pdescription', '$pprice', '$quantity', '$customername', '$email', '$address', '$contact', '$customerdescription')";

                            if (mysqli_query($conn, $sql)) {
                               echo "<script>
                              alert('Order Successfull');
                              window.location.href='index.php';  
                              </script>";

                               
                            } else {
                              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }

                            mysqli_close($conn);
                            }
                            

                            ?>