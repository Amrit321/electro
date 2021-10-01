
 <?php 
session_start();
?>

<?php 
  require_once('admin_processes/process_admin_connect.php');
  if (isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $q = "SELECT * FROM users WHERE email ='$email' AND password= '$password' ";
  $result = mysqli_query($conn,$q);
  if (mysqli_num_rows($result) > 0) {

      while ($row = mysqli_fetch_assoc($result)) {
      $uid=$_row["user_id"];
      $user = $row["name"];
      $email=$_row["email"];

      $_SESSION['username'] = $row['name'];
      $pass = $_row["password"];

    }
    header('location: admin_home.php');
  }
  
  else{
      echo "<center style = 'color:red; font-size:20px;'>Invalid Username or Password</center>";
    }
  }
  
?>
 


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Login</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default" name="submit">Submit</button>
  </form>
</div>

</body>
</html>
