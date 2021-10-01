<?php include'header.php';?>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>



<?php 
  require_once('connect.php');
  if (isset($_POST['submit'])){
  $name = $_POST['name'];
  $password = $_POST['password'];
  $q = "SELECT * FROM customer WHERE username ='$name' AND password= '$password' ";
  $result = mysqli_query($conn,$q);
  if (mysqli_num_rows($result) > 0) {

      while ($row = mysqli_fetch_assoc($result)) {
      $user = $row["username"];
      $_SESSION['customer_name'] = $row['username'];
      $pass = $_row["password"];

    }
    header('location: index.php');
  }
  
  else{
      echo "<center style = 'color:red; font-size:20px;'>Invalid Username or Password</center>";
    }
  }
  
?>

  <body>
     

    <h2 class="col-md-5 flex container mt-5">Login To Make Order</h2>

    <form class="col-md-5 flex container " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method ="post">
      <br>
        <div class="form-group">
          <label for="exampleInputEmail1">User Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter User Name" name="name">
       </div>
       <br>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password" name="password">
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="submit">Login</button><br><br>
    </form>

    <div class="col-md-5 flex container mt-2">
      <P>don't have account , click below to sign up</P>
      <a href="register.php"> <button class="btn-danger">Sign Up</button></a>
    </div>


  </body>

</html>

