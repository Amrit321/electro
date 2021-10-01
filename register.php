
<?php include'header.php';?>
<?php include'connect.php'?>
<!DOCTYPE HTML>  
<html>
<head>
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


  

<style>
.error {color: #FF0000;}
</style>
</head>
<body>  
   

<?php
// define variables and set to empty values
$nameErr = $passwordErr = $retypepasswordErr = "";
$name = $password = $retypepassword  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    
  }
  
  if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  } else {
    $password = test_input($_POST["password"]);
    
    
  }
    

  if (empty($_POST["retypepassword"])) {
    $retypepasswordErr = "retypepassword is required";
  } else {
    $retypepassword = test_input($_POST["retypepassword"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if ($name == "" || $password=="" || $retypepassword=="") {
  echo "<center style = 'color:red; font-size:20px;'>Fill the form below to crete account</center>";
}
else if ($password!==$retypepassword) {
  echo"<center style = 'color:red; font-size:20px;'>Password didn't match!!</center>";
}
else{


 
if (isset($_POST['submit'])) {
  $sql = "INSERT INTO customer (username, password)
VALUES ('$name','$password')";

if (mysqli_query($conn, $sql)) {
   echo"<center style = 'color:red; font-size:20px;'>Your account has been registered successfull</center>";
   
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
}

?>



 <h2 class="col-md-5 flex container mt-5">Sign UP</h2><br>
<p class="col-md-5 flex container"><span class="error ">* required field</span></p>
<form class="col-md-5 flex container" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" placeholder="Enter username">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Password: <input type="password" name="password" placeholder="Enter password">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  Retype Password: <input type="password" name="retypepassword" placeholder="Retype password" >
  <span class="error">*<?php echo $retypepasswordErr;?></span>
 
  <br><br>
  <input type="submit" name="submit" value="Sign Up" class="btn-primary">  
</form>
<div class="col-md-5 flex container mt-2">
<P>Alredy have account , click below to login</P>
<a href="login.php"> <button class="btn-danger">Login</button></a>
</div>


</body>

</html>